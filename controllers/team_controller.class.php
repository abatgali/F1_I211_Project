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
        try {
            //retrieve all teams and store them in an array
            $teams = $this->team_model->getTeams();

            //if there is no team or retrieving teams from the database failed, display an error message
            if (!$teams) {
                throw new DatabaseException("Teams cannot be displayed");
            }

            //create an object of the TeamView class
            $view = new TeamView();

            //display all teams
            $view->display($teams);
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }
    }


    // display driver stats for the 2022 season
    public function standings()
    {
        $view = new TeamStandingsView();
        $view->display();
    }
}
