<?php
/**
 * Author: Anant Batgali
 * Date: 4/20/22
 * File: result_view.class.php
 * Description: This page displays the search results
 */

class ResultView extends IndexView
{
    public function display($terms, $drivers)
    {
        parent::displayHeader("Search Results");


?>
        <div class="container m-4">

            <h3>Search Results for "<?= $terms ?>"</h3><hr>
            <div class="row row-cols-2">

<?php

            if (count($drivers) == 0) {
                echo "<h5 class='m-5'>Your search bore no fruit...</h5>";
                echo "<img src='".BASE_URL."/static/img/panda_error.png'>";
            }

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
            </div>
        </div>

<?php

        parent::displayFooter();
    }
}