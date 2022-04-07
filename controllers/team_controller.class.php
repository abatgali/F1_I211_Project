<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team_controller.class.php
 * Description: controller for team
 */


class TeamController {

    //an object of ToyModel
    private $team_model;

    //the constructor
    public function __construct() {
        //create an object of the ToyModel class
        $this->team_model = new TeamModel();
    }

    //list all toys
    public function index() {
        //retrieve all toys and store them in an array
        $teams = $this->team_model->getTeams();

        //if there is no toy or retrieving toys from the database failed, display an error message
        if (!$teams) {
            $this->error("No team was found.");
            return;
        }

        //create an object of the ToyView class
        $view = new TeamView();

        //display all toys
        $view->display($teams);
    }

    //display an error message
    public function error($message) {
        //create an object of the Error class
        $error = new TeamError();

        //display the error page
        $error->display($message);
    }

}
