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
        //create an instance of the MovieModel class
        $this->driver_model = DriverModel::getDriverModel();
    }

    //index action that displays all movies
    public function index() {
        //retrieve all movies and store them in an array
        $drivers = $this->driver_model->listAllDrivers();
        if (!$drivers) {
            //display an error
            $message = "There was a problem displaying movies.";
            echo $message;
            //$this->error($message);
            return;
        }
        // display all movies
        $view = new DriverIndex();
        $view->display($drivers);
    }

}