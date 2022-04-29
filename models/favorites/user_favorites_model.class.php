<?php
/**
 * Author: Anant Batgali
 * Date: 4/27/22
 * File: user_favorites_model.class.php
 * Description: Model for user favorites
 *
 */

class FavoritesModel
{
    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $favoritesTable;

    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->favoritesTable = $this->db->getUserFavoritesTable();
        $this->driverTable = $this->db->getDriversTable();

    }

    //static method to ensure there is just one DriverModel instance
    public static function getFavoritesModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new FavoritesModel();
        }
        return self::$_instance;
    }

    // to save drivers as favorites
    public function saveFavorite($driverID, $user)
    {
        try {
            $sql = "INSERT INTO $this->favoritesTable VALUES (NULL, '$user', $driverID)";


            $res = $this->dbConnection->query($sql);

            if (!$res) {
                throw new DatabaseException("Query failed to execute");
            }
            echo json_encode([$driverID, $user, $res]);

        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }

    }

    public function retrieveFavorites($username)
    {
        // create array to store driver objects
        $driver_ids = [];

        try {
            // create query to collect all the favorite drivers a user has
            $sql = "SELECT driverID FROM " . $this->favoritesTable . " WHERE username='$username'";


            // execute query
            if (!$this->dbConnection->query($sql)) {
                throw new DatabaseException("Favorites couldn't be retrieved, query didn't work.");
            }

            $query = $this->dbConnection->query($sql);

            // storing driver ids in the array
            while ($row = $query->fetch_assoc()) {
                $driver_ids[] = $row["driverID"] ;
            }

        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }
        //var_dump($driver_ids);
        return $driver_ids;
    }

}