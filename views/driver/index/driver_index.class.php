<?php
/**
 * Author: Anant Batgali
 * Date: 4/6/22
 * File: driver_index.class.php
 * Description: Displays season 2022 drivers
 */

class DriverIndex extends DriverIndexView
{

    public function display($drivers)
    {

        parent::displayHeader("F1 Drivers");
        ?>
        <!--Search bar -->
        <div class="mx-auto w-50 mt-3">
            <form action="<?php echo BASE_URL. "/driver/search"?>">
                <div class="input-group mb-3 shadow-sm">
                    <input type="text" class="form-control" name="terms" placeholder="" aria-label="Search input" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-dark" type="submit" >Search</button>
                </div>
            </form>
        </div>

        <div class="row row-cols-2">
        <?php

        foreach ($drivers as $driver) {

            $driverID = $driver->getDriverID();
            $lastName = $driver->getLastName();
            $rNum = $driver->getRNum();

            ?>
            <div class="card g-col-6 m-3 shadow-sm noDecor" style="width: 18rem; padding-top: 10px;">
                <a style="text-decoration: none; color: #3A1E1E" href="<?php echo BASE_URL."/driver/detail/".$driverID; ?>">

                <img src="<?php echo BASE_URL."/static/img/drivers/".$driverID.".jpeg"; ?>" class="card-img-top">
                    <div class="card-body" >
                        <h5 class="card-title"><?php echo $rNum;?></h5>
                        <p class="card-text"><?php echo $lastName;?></p>
                        <input id="favorites" type="checkbox" name="favorite">
                        <label for="favorites" style="font-size: small">Favorite</label>
                    </div>
                </a>

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
