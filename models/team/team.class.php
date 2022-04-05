<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team.class.php
 * Description: team class models a team
 */

class Team {
    //properties of a Toy object
    private $teamID, $teamName, $firstTeamEntry, $worldChampionships, $base;

    //constructor that initializes toy properties
    public function __construct($teamID, $teamName, $firstTeamEntry, $worldChampionships, $base) {
        $this->teamID = $teamID;
        $this->teamName = $teamName ;
        $this->firstTeamEntry = $firstTeamEntry;
        $this->worldChampionships = $worldChampionships;
        $this->base = $base;
    }

    //retrieve the id of a team
    public function getTeamID() {
        return $this->teamID;
    }

    //retrieve the name of a team
    public function getTeamName() {
        return $this->teamName;
    }

    //retrieve the first team entry of a team
    public function getFirstTeamEntry() {
        return $this->firstTeamEntry;
    }

    //retrieve the world championships of a team
    public function getWorldChampionships() {
        return $this->worldChampionships;
    }

    //retrieve the base country of a team
    public function getBase() {
        return $this->base;
    }
}