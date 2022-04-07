<?php
/**
 * Author: Anant Batgali
 * Date: 4/7/22
 * File: car_controller.class.php
 * Description:
 */

class CarController
{
    //an object of carModel
    private $car_model;

    //the constructor
    public function __construct() {
        //create an object of the ToyModel class
        $this->car_model = new CarModel();
    }

    //list all cars
    public function index() {
        //retrieve all toys and store them in an array
        $cars = $this->car_model->getCars();

        //if there is no car or retrieving cars from the database failed, display an error message
        if (!$cars) {
            //$this->error("No team was found.");
            return;
        }

        //create an object of the ToyView class
        $view = new CarView();

        //display all toys
        $view->display($cars);
    }
}