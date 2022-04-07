<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: car.class.php
 * Description: displays cars
 */

class CarView extends IndexView {

    public function display($cars)
    {
        //display header
        parent::displayHeader("F1 Cars");

        ?>

        <table class="table">
            <thead>
                <th>ID</th>
                <th>Chassis</th>
                <th>Power Unit</th>
<!--                <th>Car Image</th>-->
                <th>Team</th>
            </thead>
            <!-- create a new row for each car -->
            <?php
            foreach ($cars as $car) {
                echo "<tr>";
                echo "<td>", $car->getCarID(), "</td>";
                echo "<img src=".BASE_URL."/static/img/cars/".$car->getCarID().".png>";
                echo "<td>", $car->getChassis(), "</td>";
                echo "<td>", $car->getPowerUnit(), "</td>";
                /*echo "<td>", ,$car->getCarImage(), "</td>";*/
                echo "<td>", $car->getTeam(), "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <?php

        parent::displayFooter();
    }
}