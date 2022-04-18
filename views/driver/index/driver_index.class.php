<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver_index.class.php
 * Description: Displays all the 2022 Season's drivers
 */

class DriverIndex extends DriverIndexView
{

    public function display($drivers)
    {

        parent::displayHeader("F1 Drivers");
        ?>
        <div class="row row-cols-2">
        <?php

        foreach ($drivers as $driver) {

            $driverID = $driver->getDriverID();
            $lastName = $driver->getLastName();
            $rNum = $driver->getRNum();

            ?>
<!--        <div class="g-col-6 m-2">-->
            <div class="card g-col-6 m-3" style="width: 18rem;">
                <a href="<?php echo BASE_URL."/driver/detail/".$driverID; ?>">

                <img src="<?php echo BASE_URL."/static/img/drivers/".$driverID.".jpeg"; ?>" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $rNum;?></h5>
                        <p class="card-text"><?php echo $lastName;?></p>
                    </div>
                </a>
                <!--<ul class="list-group list-group-flush">
                    <li class="list-group-item">An item</li>
                    <li class="list-group-item">A second item</li>
                    <li class="list-group-item">A third item</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                </div>-->
            </div>
            <?php
            }


            ?>
        <!--closing grid div-->
        </div>
        <?php

        // calling footer function
        parent::displayFooter();


    }
}
