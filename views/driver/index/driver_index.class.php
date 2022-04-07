<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver_index.class.php
 * Description: Displays all the drivers and their stats
 */

class DriverIndex extends DriverIndexView
{

    public function display($drivers)
    {

        parent::displayHeader("F1 Drivers");
        ?>
        <div class="grid">
        <?php
        $i = 0;
        foreach ($drivers as $driver) {

            $driverID = $driver->getDriverID();
            $lastName = $driver->getLastName();
            $rNum = $driver->getRNum();

            ?>
            <div class="g-col-6 m-2"><?php echo "$lastName $rNum";?></div>
            <?php


           /*
            * extra details that can be displayed if user clicks on the driver

            $firstName = $driver->getFirstName();
            $dob = $driver->getDateOfBirth();
            $country = $driver->getCountry();
            $podiums = $driver->getPodiums();
            $championships = $driver->getChampionships();
            $points = $driver->getCareerPoints();
            $team = $driver->getTeam();

           */

            $i++;

        // for loop closes
        }

        // closing the grid div
        ?>
        </div>
        <?php

        // calling footer function
        parent::displayFooter();


    }
}
