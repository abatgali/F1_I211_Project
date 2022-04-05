<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team_view.class.php
 * Description: displays teams
 */

class TeamView extends View{
    public function display($teams) {
        //display page header
        parent::header();
        ?>
        <div id="main-header"> Teams</div>

        <div class="grid-container">
            <?php
            if ($teams === 0) {
                echo "No team was found.<br><br><br><br><br>";
            } else {
                //display teams in a grid
                foreach ($teams as $team) {
                    $teamID = $team->getTeamId();
                    $teamName = $team->getTeamName();



                }
            }
            ?>
        </div>

        <?php
        //display page footer
        parent::displayFooter();
    } //end of display method

}