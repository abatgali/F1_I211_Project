<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: driver_index_view.class.php
 * Description: template for the driver index page
 */

class DriverIndexView extends IndexView {

    public static function displayHeader($page_title)
    {
        parent::displayHeader($page_title);


        ?>
        <div class="container m-4">

            <h4>
        <?php
                if ($page_title == "F1 Drivers")
                    echo "Season 2022 Drivers</h4><hr>";

    }

    public static function displayFooter()
    {
        ?>
        </div>

        <?php
        parent::displayFooter();
    }

}