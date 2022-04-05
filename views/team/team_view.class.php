<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: team_view.class.php
 * Description: displays teams
 */

class TeamView extends View{
    public function display($toys)
    {
        //display header
        parent::header();

        ?>

        <table border="0">
            <tr>
                <th>ID</th>
                <th>Team Name</th>
                <th>First Team Entry</th>
                <th>World Championships</th>
                <th>Base Country</th>
            </tr>
            <!-- create a new row for each toy -->
            <?php
            foreach ($teams as $team) {
                echo "<tr>";
                echo "<td>", $team->getTeamID(), "</td>";
                echo "<td>", $team->getTeamName(), "</td>";
                echo "<td>", $team->getFirstTeamEntry(), "</td>";
                echo "<td>", $team->getWorldChampionships(), "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </body>
        </html>

        <?php
    }

}