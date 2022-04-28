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
    private $driverTable;

    private function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->favoritesTable = $this->db->getUserFavoritesTable();

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
        if ($user == 0) {
            echo json_encode([$driverID, $user, "couldn't save favorite since user is not logged in"]);
            return;
        }

        $check = "SELECT username FROM $this->favoritesTable WHERE driverID = $driverID LIMIT 1";

        $query = $this->dbConnection->query($check);
        $result_row = $query->fetch_assoc();
        $user_from_db = $result_row['username'];

        if ($user_from_db == $user) {
            echo json_encode([$driverID, $user, "driver already exists in favorites."]);
            return;
        }

        $sql = "INSERT INTO $this->favoritesTable VALUES (NULL, '$user', $driverID)";

        $res = $this->dbConnection->query($sql);

        echo json_encode([$driverID, $user, $res]);

    }

    public function retrieveFavorites($username)
    {
        $sql =
    }

}