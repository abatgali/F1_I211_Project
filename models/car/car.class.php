<?php
/**
 * Author: Piper Varney
 * Date: 4/5/22
 * File: car.class.php
 * Description: this file creates the Car class
 */

class Car {
    //properties of a Car object
    private $carID, $chassis, $powerUnit, $carImage, $team;

    //constructor that initializes car properties
    public function __construct($carID, $chassis, $powerUnit, $team)
    {
        $this->carID = $carID;
        $this->chassis = $chassis;
        $this->powerUnit = $powerUnit;
        //$this->carImage = $carImage;
        $this->team = $team;
    }

    //method to retrieve carID
    public function getCarID()
    {
        return $this->carID;
    }

    //method to retrieve chassis
    public function getChassis()
    {
        return $this->chassis;
    }

    //method to retrieve powerUnit
    public function getPowerUnit()
    {
        return $this->powerUnit;
    }

  /*  //method to retrieve carImage
    public function getCarImage()
    {
        return $this->carImage;
    }*/

    //method to retrieve team
    public function getTeam()
    {
        return $this->team;
    }
}