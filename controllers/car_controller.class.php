<?php
/**
 * Author: Piper Varney
 * Date: 4/7/22
 * File: car_controller.class.php
 * Description:
 */

class CarController
{
    private $car_model;

    //default constructor
    public function __construct() {
        //create an instance of the MovieModel class
        $this->car_model = CarModel::getCarModel();
    }

    //index action that displays all cars
    public function index() {
        //retrieve all cars and store them in an array
        $cars = $this->car_model->getCars();
        if (!$cars) {
            //display an error
            $message = "There was a problem displaying cars.";
            echo $message;
            return;
        }
        // display all movies
        $view = new DriverIndex();
        $view->display($cars);
    }

}