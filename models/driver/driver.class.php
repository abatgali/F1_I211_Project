<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver.class.php
 * Description: models a F1 driver
 */

class Driver
{
    // private data members
    private $driverID, $firstName, $lastName, $dateOfBirth, $country, $rNum, $podiums, $careerPoints, $championships, $team;


    // constructor
    public function __construct($driverID, $firstName, $lastName, $dateOfBirth, $country, $rNum, $podiums, $careerPoints, $championships, $team)
    {
        $this->driverID = $driverID;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->dateOfBirth = $dateOfBirth;
        $this->country = $country;
        $this->rNum = $rNum;
        $this->podiums = $podiums;
        $this->careerPoints = $careerPoints;
        $this->championships = $championships;
        $this->team = $team;
    }


    // getter functions
    public function getDriverID()
    {
        return $this->driverID;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function getRNum()
    {
        return $this->rNum;
    }

    public function getPodiums()
    {
        return $this->podiums;
    }

    public function getCareerPoints()
    {
        return $this->careerPoints;
    }

    public function getChampionships()
    {
        return $this->championships;
    }

    public function getTeam()
    {
        return $this->team;
    }
}