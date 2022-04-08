<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: database.class.php
 * Description: establishes connection with the database
 */

class Database {

    //define database parameters
    private $param = array(
        'host' => 'localhost',
        'login' => 'phpuser',
        'password' => 'phpuser',
        'database' => 'formula1_db',
        'tblCars' => 'cars',
        'tblDrivers' => 'drivers',
        'tblTeams' => 'teams',
        'tblUsers' => 'users'
    );

    //define the database connection object
    private $objDBConnection = NULL;
    static private $_instance = NULL;

    //constructor
    public function __construct() {

        $this->objDBConnection = @new mysqli(
            $this->param['host'],
            $this->param['login'],
            $this->param['password'],
            $this->param['database']
        );
        if (mysqli_connect_errno() != 0) {
            exit("Connecting to database failed: " . mysqli_connect_error());
        }
    }

    //static method to ensure there is just one Database instance
    static public function getDatabase() {
        if (self::$_instance == NULL) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    //this function returns the database connection object
    public function getConnection() {
        return $this->objDBConnection;
    }

    //returns the name of the table storing drivers
    public function getDriversTable() {
        return $this->param['tblDrivers'];
    }

    //returns the name of the table storing cars
    public function getCarsTable() {
        return $this->param['tblCars'];
    }

    //returns the name of the table storing teams
    public function getTeamsTable() {
        return $this->param['tblTeams'];
    }

    //returns the name of the table storing users
    public function getUsersTable() {
        return $this->param['tblUsers'];
    }
}