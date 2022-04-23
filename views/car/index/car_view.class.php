<?php
/**
 * Author: Piper Varney
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
        <div class="container mt-3">
        <table class="table table-striped table-hover">
            <thead>
                <th>ID</th>
                <th>Car</th>
                <th>Chassis</th>
                <th>Power Unit</th>
                <th>Team</th>
            </thead>
            <!-- create a new row for each car -->
            <?php
            foreach ($cars as $car) {
                echo "<tr>";
                echo "<td>", $car->getCarID(), "</td>";
                echo "<td><img src=".BASE_URL."/static/img/cars/".$car->getCarID().".png></td>";
                echo "<td>", $car->getChassis(), "</td>";
                echo "<td>", $car->getPowerUnit(), "</td>";
                echo "<td>", $car->getTeam(), "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </div>

        <?php

        parent::displayFooter();
    }
}