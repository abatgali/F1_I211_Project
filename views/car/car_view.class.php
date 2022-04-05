<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: car.class.php
 * Description: displays cars
 */

class CarView extends View {
    public function display($cars)
    {
        //display header
        parent::header();

        ?>

        <table border="0">
            <tr>
                <th>ID</th>
                <th>Chassis</th>
                <th>Power Unit</th>
                <th>Car Image</th>
                <th>Team</th>
            </tr>
            <!-- create a new row for each car -->
            <?php
            foreach ($cars as $car) {
                echo "<tr>";
                echo "<td>", $car->getCarID(), "</td>";
                echo "<td>", $car->getChassis(), "</td>";
                echo "<td>", $car->getPowerUnit(), "</td>";
                echo "<td>", $car->getCarImage(), "</td>";
                echo "<td>", $car->getTeam(), "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </body>
        </html>

        <?php
    }
}