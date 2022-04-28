<?php
/**
 * Author: Anant Batgali
 * Date: 4/20/22
 * File: result_view.class.php
 * Description: This page displays the search results
 */

class ResultView extends DriverIndexView
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
                    </a>
                    <?php
                    if (isset($_SESSION["user"])) {
                        $user = $_SESSION["user"];
                    }
                    else {
                        $user = 0;
                    }
                    ?>
                    <!--fav button-->
                    <button onclick="fav(<?=$driverID?>, '<?=$user?>')" type="button" class="btn btn-outline-danger float-end">

                        <!--                    <button onclick="window.location.href='http://localhost/I211/F1_I211_Project/favorite/save/?driverID=<?/*=$driverID*/?>&user=<?/*=$_SESSION["user"]*/?>'" type="button" class="btn btn-outline-danger float-end">-->
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
            <script src="<?php echo BASE_URL."/static/js/favorites.js" ?>"></script>
            </div>
        </div>

<?php

        parent::displayFooter();
    }
}