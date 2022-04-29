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
    public function index()
    {
        try {
            //retrieve all drivers and store them in an array
            $drivers = $this->driver_model->listAllDrivers();
            if (!$drivers) {
                //display an error
                $message = "There was a problem displaying drivers.";
                throw new DatabaseException($message);
            }
            // display all drivers
            $view = new DriverIndex();
            $view->display($drivers);
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }
        catch (Exception $exception) {
            $view = new UserError();
            $view->display($exception->getMessage());
        }
    }

    // display info of the selected driver
    public function detail($id) {

        try {
            $driver = $this->driver_model->driverInfo($id);

            if (!$driver) {
                throw new DatabaseException("Couldn't retrieve driver details. Database issues.");
            }

            $view = new DriverDetail();
            $view->displayDriver($driver);
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e)
        {
            $view = new UserError();
            $view->display($e->getMessage());
        }

    }


    //display a driver in a form for editing
    public function edit($id) {

        try {
            //retrieve the specific driver
            $driver = $this->driver_model->driverInfo($id);

            if (!$driver) {
                //display an error
                $message = "There was a problem displaying the movie id='" . $id . "'.";
                //$this->error($message);
                throw new DatabaseException($message);
            }
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
            return;

        } catch (Exception $e)
        {
            $view = new UserError();
            $view->display($e->getMessage());
            return;
        }

        $view = new DriverEdit();
        $view->display($driver);
    }

    //update a movie in the database
    public function update($id) {
        //update the movie
        try {
            $update = $this->driver_model->update_driver($id);
            if (!$update) {
                $message = "There was a problem updating the following driver ='" . $id . "'.";
                throw new DatabaseException($message);
            }
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
            return;

        } catch (Exception $e)
        {
            $view = new UserError();
            $view->display($e->getMessage());
            return;
        }


        //display the updated driver details
        $confirm = "The driver was successfully updated.";
        $driver = $this->driver_model->driverInfo($id);

        $view = new DriverDetail();
        $view->displayDriver($driver, $confirm);
    }

    // search and display results
    public function search()
    {
        try {
            // getting user input
            if(isset($_GET["terms"])) {

                $terms = $_GET["terms"];
                $searchTerms = explode(" ", filter_input(INPUT_GET, "terms"));
            }


            // calling the search function in driver model
            $output = $this->driver_model->search($searchTerms);

            $view = new ResultView();
            $view->display($terms, $output);

            } catch(Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
            return false;
            }
    }


    // display driver stats for the 2022 season
    public function standings()
    {
        $view = new StandingsView();
        $view->display();
    }

    // this function processes ajax request sent by script used in profile_view
    // returning driver objects in json
    public function favorites()
    {
        try {
            $driverIds = $_GET["ids"];
            //var_dump($driverIds);

            $objs = $this->driver_model->favDriversInfo($driverIds);

            echo json_encode($objs);
        } catch (Exception $e) {
            $view = new UserError();
            $view->display("favorites couldn't be fetched");
        }

    }
}