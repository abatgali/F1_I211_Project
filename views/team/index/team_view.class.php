<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team_view.class.php
 * Description: displays teams
 */

class TeamView extends IndexView{
    public function display($teams)
    {
        //display header
        parent::displayHeader("F1 Teams");

        ?>
        <div class="container m-5">
            <h5>Season 2022 Teams </h5>
            <hr>
            <button type="button" class="btn btn-primary mb-4 ms-2" onclick="window.location.href='<?php echo BASE_URL."/team/standings"; ?>'">Team Standings</button>
        <table class="table table-striped table-hover">
            <thead>
                <th scope="col">ID</th>
                <th scope="col">Team Name</th>
                <th scope="col">First Team Entry</th>
                <th scope="col">World Championships</th>
                <th scope="col">HQ</th>
            </thead>
            <tbody>
            <!-- create a new row for each team -->
            <?php
            foreach ($teams as $team) {
                echo "<tr>";
                echo "<th scope='row'>", $team->getTeamID(), "</th>";
                echo "<td>", $team->getTeamName(), "</td>";
                echo "<td>", $team->getFirstTeamEntry(), "</td>";
                echo "<td>", $team->getWorldChampionships(), "</td>";
                echo "<td>", $team->getBase(), "</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        </div>

        <?php

        parent::displayFooter();
    }

}