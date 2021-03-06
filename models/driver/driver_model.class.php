<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: driver_model.class.php
 * Description: retrieves F1 drivers' data as per the function call from driver controller
 */

class DriverModel
{

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblDriver;


    //To use singleton pattern, this constructor is made private. To get an instance of the class, the getDriverModel method must be called.
    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblDriver = $this->db->getDriversTable();

    }

    //static method to ensure there is just one DriverModel instance
    public static function getDriverModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new DriverModel();
        }
        return self::$_instance;
    }

    /*
     * the list_driver method retrieves all drivers from the database and
     * returns an array of driver objects if successful or false if failed.
     */
    public function listAllDrivers()
    {
        /* construct the sql SELECT statement in this format
         * SELECT ...
         * FROM ...
         * WHERE ...
         */
        $sql = "SELECT * FROM " . $this->tblDriver . " ORDER BY careerPoints DESC";

        //execute the query
        $query = $this->dbConnection->query($sql);

        // if the query failed, return false.
        if (!$query)
            return false;

        //if the query succeeded, but no driver was found.
        if ($query->num_rows == 0)
            return 0;

        //handle the result
        //create an array to store all returned drivers
        $drivers = array();

        //loop through all rows in the returned record sets
        while ($obj = $query->fetch_object()) {

            $driver = new Driver(stripslashes($obj->driverID),stripslashes($obj->firstName), stripslashes($obj->lastName), stripslashes($obj->dateOfBirth), stripslashes($obj->country), stripslashes($obj->rNum), stripslashes($obj->podiums), stripslashes($obj->careerPoints), stripslashes($obj->championships), stripslashes($obj->team));

            //add the movie into the array
            $drivers[] = $driver;
        }
        return $drivers;
    }

    // method to retrieve details of a selected driver
    public function driverInfo($id)
    {
        $sql = "SELECT * FROM ". $this->tblDriver. " WHERE driverID = ". $id;

        $query = $this->dbConnection->query($sql);

        if (!$query)
            return false;

        if ($query->num_rows == 0)
            return 0;

        $obj = $query->fetch_object();

        return new Driver(stripslashes($obj->driverID),stripslashes($obj->firstName), stripslashes($obj->lastName), stripslashes($obj->dateOfBirth), stripslashes($obj->country), stripslashes($obj->rNum), stripslashes($obj->podiums), stripslashes($obj->careerPoints), stripslashes($obj->championships), stripslashes($obj->team));
    }


    // search drivers
    public function search($searchTerms)
    {
        // fields to search
        $fields = array("firstName", "lastName", "dateOfBirth", "country", "rNum");

        // creating the sql query
        $sql = "SELECT * FROM ".$this->tblDriver." WHERE ";
        foreach ($fields as $column) {
            foreach ($searchTerms as $term) {

                $sql .= "$column LIKE '%".$term."%' OR ";
            }
        }

        // removing the extra "OR" from the query
        $sql = rtrim($sql, " OR ");

        // executing sql query
        if (!$this->dbConnection->query($sql))
            echo "query failed";

        $result = $this->dbConnection->query($sql);

        // retrieving drivers from result
        $drivers = [];
        while ($obj = $result->fetch_object()) {

            $driver = new Driver(stripslashes($obj->driverID), stripslashes($obj->firstName), stripslashes($obj->lastName),
                $obj->dateOfBirth, stripslashes($obj->country), stripslashes($obj->rNum), stripslashes($obj->podiums),
                stripslashes($obj->careerPoints), stripslashes($obj->championships), stripslashes($obj->team));

            $drivers[] = $driver;
        }

        return $drivers;
    }

    public function update_driver($id) {

        try {

            //if the script did not received post data, display an error message and then terminate the script immediately
            if (!filter_has_var(INPUT_POST, 'podiums') ||
                !filter_has_var(INPUT_POST, 'points') ||
                !filter_has_var(INPUT_POST, 'championships')) {

                throw new DataMissingException("Data Missing, please provide input in all fields.");
            }

            //retrieve data for the new movie; data are sanitized and escaped for security.
            $podiums = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'podiums', FILTER_DEFAULT)));
            $careerPoints = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'points', FILTER_DEFAULT)));
            $championships = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'championships', FILTER_DEFAULT)));

            //query string for update
            $sql = "UPDATE " . $this->tblDriver .
                " SET podiums='$podiums', careerPoints='$careerPoints', championships='$championships' WHERE driverID='$id'";

        } catch (DataMissingException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }

        //execute the query
        return $this->dbConnection->query($sql);
    }

    // retrieve driver objects after receiving an array of ids
    public function favDriversInfo($driverIDs)
    {

        $objs = [];
        $favInfo = array();

        // cycling through ids array and storing corresponding driver object
        foreach ($driverIDs as $ID) {
            $objs[] = $this->driverInfo($ID);
        }

        // extracting only the necessary info
        foreach ($objs as $driver) {
            $favInfo[$driver->getDriverID()] = ["firstName"=>$driver->getFirstName(), "lastName"=>$driver->getLastName(), "rNum"=>$driver->getRNum()];
        }

        return $favInfo;
    }
}