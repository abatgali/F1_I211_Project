<?php
/**
 * Author: Anant Batgali
 * Date: 4/25/22
 * File: team_standings_view.class.php
 * Description: Displays current points each driver has earned over this season using an API
 API source: https://www.postman.com/maintenance-astronomer-29796265/workspace/f1-api/documentation/19328871-63c4a82c-ae84-4a24-a58b-bd8a408b1c4e
 */

class TeamStandingsView extends IndexView
{
    public function display()
    {
        parent::displayHeader("Team Standings");


?>
        <!--AJAX script to add driver points table asynchronously-->
        <script type="text/javascript" src="<?php echo BASE_URL."/static/js/team_standings.js";?>"></script>


        <div class="container m-5">
            <h3>Team Standings 2022</h3>
            <hr>

            <table class="table table-striped table-hover m-4 w-50">
                <thead>
                <tr>
                    <th scope="col">Position</th>
                    <th scope="col">Team</th>
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

        <footer class="d-block w-100 bg-dark py-3 position-absolute" style="bottom: 0">

            <div class="container d-flex justify-content-between">
                <p class="text-muted"> &copy; Group 3 - I211 Final Project</p>
                <div class="text-muted">
                    <p ><a href="https://www.formula1.com">Data Source: F1 Website</a></p>
                    <p ><a href="https://www.postman.com/maintenance-astronomer-29796265/workspace/f1-api/collection/19328871-63c4a82c-ae84-4a24-a58b-bd8a408b1c4e?ctx=documentation">Standings: F1 Postman API </a></p>
                    <p ><a href="https://racingnews365.com/formula-1-calendar-2022">Race Calendar Source</a></p>
                </div>
            </div>
        </footer>
<?php


    }
}