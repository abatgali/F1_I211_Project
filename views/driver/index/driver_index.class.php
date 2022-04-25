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

            <div style="display: flex;" >
                <button style="margin-top: 18px;" type="button" class="btn btn-warning mb-4" onclick="window.location.href='<?php echo BASE_URL."/driver/standings"; ?>'">Live Driver Standings</button>

                <div class="mx-auto w-50 mt-3">
                    <form method="GET" action="<?php echo BASE_URL. "/driver/search"?>">

                        <div class="input-group shadow-sm">
                            <input type="text" class="form-control" onkeyup="handleKeyUp(event)"
                                   name="terms" id="searchtextbox" placeholder="" aria-label="Search input" aria-describedby="button-addon2" required>
                            <button class="btn btn-outline-dark" type="submit" >Search</button>
                        </div>
                    </form>
                    <!-- AJAX -->
                    <div id="suggestionDiv"></div>
                </div>

            </div>

        <!--Search bar -->


        <div class="row row-cols-2 mt-3">
        <?php

        foreach ($drivers as $driver) {

            $driverID = $driver->getDriverID();
            $lastName = $driver->getLastName();
            $rNum = $driver->getRNum();

            ?>
            <div class="card g-col-6 m-3 shadow-sm noDecor" style="width: 18rem; padding-top: 10px;">
                <a style="text-decoration: none; color: #3A1E1E" href="<?php echo BASE_URL."/driver/detail/".$driverID; ?>">

                <img src="<?php echo BASE_URL."/static/img/drivers/".$driverID.".jpeg"; ?>" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $rNum;?></h5>
                    <p class="card-text"><?php echo $lastName;?></p>

                </a>
                    <!--fav button-->
                    <button onclick="window.location.href=''" type="button" class="btn btn-outline-danger float-end">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                        </svg>
                        Favorite
                    </button>
            </div>
            </div>
            <?php
            }
            ?>
        <!--closing grid div-->
        </div>
        <script src="<?php echo BASE_URL."/static/js/ajax_search.js";?>"></script>

        <?php

        // calling footer function
        parent::displayFooter();


    }
}
