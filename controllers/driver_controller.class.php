<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver_controller.class.php
 * Description:
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
            //$this->error($message);
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


}