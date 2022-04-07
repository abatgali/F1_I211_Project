<?php
/**
 * Author: Piper Varney
 * Date: 4/2/22
 * File: car_model.class.php
 * Description: This class defines a function named getCars, which retrieves all cars stored in the database and returns an array of the Car objects
 */

class CarModel
{
    private $db;  //database object
    private $dbConnection;  //database connection object
    static private $_instance = NULL;
    private $tblCar;

    //the constructor that initializes two data members.
    public function __construct()
    {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
        $this->tblCar = $this->db->getCarsTable();
    }

    //static method to ensure there is just one DriverModel instance
    public static function getCarModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new CarModel();
        }
        return self::$_instance;
    }

    /*
     * this method retrieves all cars from the database and returns an array of Car objects if successful or false if failed.
     */
    public function getCars()
    {

        $sql = "SELECT * FROM " . $this->db->getCarsTable();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all cars
            $cars = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $car = new Car($query_row["carID"],
                    $query_row["chassis"],
                    $query_row["powerUnit"],
                    $query_row["carImage"],
                    $query_row["team"]);

                //push the toy into the array
                $cars[] = $car;
            }
            return $cars;
        }
        return false;
    }

}