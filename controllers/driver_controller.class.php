<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver_controller.class.php
 * Description: processes requests when user interacts with any of the driver pages
 */

class DriverController
{
    private $driver_model;

    //default constructor
    public function __construct() {
        //create an instance of the DriverModel class
        $this->driver_model = DriverModel::getDriverModel();
    }

    //index action that displays all drivers
    public function index() {
        //retrieve all drivers and store them in an array
        $drivers = $this->driver_model->listAllDrivers();
        if (!$drivers) {
            //display an error
            $message = "There was a problem displaying drivers.";
            echo $message;

            return;
        }
        // display all drivers
        $view = new DriverIndex();
        $view->display($drivers);
    }

    // display info of the selected driver
    public function detail($id) {

        $driver = $this->driver_model->driverInfo($id);

        if(!$driver) {
            return;
        }

        $view = new DriverDetail();
        $view->displayDriver($driver);

    }

    // search and display results
    public function search()
    {
        // getting user input
        if(isset($_GET["terms"])) {

            $terms = $_GET["terms"];
            $searchTerms = explode(" ", filter_input(INPUT_GET, "terms"));
        }
        else {
            $error = new UserError();
            $error->display("Missing input");
            return;
        }

        // calling the search function in driver model
        $output = $this->driver_model->search($searchTerms);

        $view = new ResultView();
        $view->display($terms, $output);
    }

    //autosuggestion
    public function suggest($terms) {
        //retrieve query terms
        $query_terms = urldecode(trim($terms));
        $drivers = $this->driver_model->search($query_terms);


        //retrieve all driver names and store them in an array
        $titles = array();
        if ($drivers) {
            foreach ($drivers as $driver) {
                $titles[] = $driver->getFirstName();
            }
        }

        echo json_encode($titles);
    }
}