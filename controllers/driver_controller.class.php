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


    //display a driver in a form for editing
    public function edit($id) {
        //retrieve the specific driver
        $driver = $this->driver_model->driverInfo($id);

        if (!$driver) {
            //display an error
            $message = "There was a problem displaying the movie id='" . $id . "'.";
            $this->error($message);
            return;
        }

        $view = new DriverEdit();
        $view->display($driver);
    }

    //update a movie in the database
    public function update($id) {
        //update the movie
        $update = $this->driver_model->update_driver($id);
        if (!$update) {
//            //handle errors
//            $message = "There was a problem updating the driver id='" . $id . "'.";
//            $this->error($message);
//            return;
        }

        //display the updateed movie details
        $confirm = "The driver was successfully updated.";
        $driver = $this->driver_model->driverInfo($id);

        $view = new DriverDetail();
        $view->displayDriver($driver, $confirm);
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


    // display driver stats for the 2022 season
    public function standings()
    {
        $view = new StandingsView();
        $view->display();
    }
}