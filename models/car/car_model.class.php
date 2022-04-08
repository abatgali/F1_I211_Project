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

    //the constructor that initializes two data members.
    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
    }

    /*
     * this method retrieves all cars from the database and returns an array of Car objects if successful or false if failed.
     */
    public function getCars()
    {

        $sql = "SELECT * FROM " . $this->db->getCarsTable();

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no car was found.
        if ($query->num_rows == 0)
            return 0;

        //create an array to store all returned cars
        $cars = array();

        while ($obj = $query->fetch_object()) {

            $car = new Car(stripslashes($obj->carID), stripslashes($obj->getChassis), stripslashes($obj->getPowerUnit), stripslashes($obj->getTeam));

                //add the team into the array
                $cars[] = $car;
            }
            return $cars;
        }

        /*//loop through all rows
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
    return false;            */


}
