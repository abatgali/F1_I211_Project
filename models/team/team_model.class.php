<?php
/**
 * Author: Sierra Braun
 * Date: 4/2/22
 * File: team_model.class.php
 * Description:
 */

class TeamModel {
    private $db;  //database object
    private $dbConnection;  //database connection object

    //the constructor that initializes two data members.
    public function __construct() {
        $this->db = Database::getInstance();
        $this->dbConnection = $this->db->getConnection();
    }

    /*
     * this method retrieves all toys from the database and
     * returns an array of Toy objects if successful or false if failed.
     */
    public function getTeams() {

        $sql = "SELECT * FROM " . $this->db->getTeamsTable();

        //execute the query
        $query = $this->dbConnection->query($sql);

        if ($query && $query->num_rows > 0) {
            //array to store all toys
            $teams = array();

            //loop through all rows
            while ($query_row = $query->fetch_assoc()) {
                $team = new Team($query_row["id"],
                    $query_row["teamName"],
                    $query_row["firstTeamEntry"],
                    $query_row["worldChampionships"],
                    $query_row["base"]
                );

                //push the toy into the array
                $teams[] = $team;
            }
            return $teams;
        }
        return false;
    }
}