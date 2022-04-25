<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team_controller.class.php
 * Description: controller for team
 */


class TeamController {

    //an object of TeamModel
    private $team_model;

    //the constructor
    public function __construct() {
        //create an object of the TeamModel class
        $this->team_model = new TeamModel();
    }

    //list all teams
    public function index() {
        //retrieve all teams and store them in an array
        $teams = $this->team_model->getTeams();

        //if there is no team or retrieving teams from the database failed, display an error message
        if (!$teams) {
            $this->error("No team was found.");
            return;
        }

        //create an object of the TeamView class
        $view = new TeamView();

        //display all teams
        $view->display($teams);
    }

    //display an error message
    public function error($message) {
        //create an object of the Error class
        $error = new TeamError();

        //display the error page
        $error->display($message);
    }

    // display driver stats for the 2022 season
    public function standings()
    {
        $view = new TeamStandingsView();
        $view->display();
    }
}
