<?php
/**
 * Author: Anant Batgali
 * Date: 4/25/22
 * File: team_standings_view.class.php
 * Description: Displays current points each driver has earned over this season using an API
 API source: https://www.postman.com/maintenance-astronomer-29796265/workspace/f1-api/documentation/19328871-63c4a82c-ae84-4a24-a58b-bd8a408b1c4e
 */

class StandingsView extends IndexView
{
    public function display()
    {
        parent::displayHeader("Driver Standings");


?>
        <!--AJAX script to add driver points table asynchronously-->
        <script type="text/javascript" src="<?php echo BASE_URL."/static/js/driver_standings.js";?>"></script>


        <div class="container m-5">
            <h3>Driver Standings 2022</h3>
            <hr>

            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Driver</th>
                    <th scope="col">Nationality</th>
                    <th scope="col">Points</th>
                    <th scope="col">Wins</th>
                </tr>
                </thead>
                <!--should get auto-populated by standings.js script thanks to http://ergast.com/api/f1/current/driverStandings-->
                <tbody id="fill_ajax">

                </tbody>
            </table>

        </div>

<?php

        parent::displayFooter();
    }
}