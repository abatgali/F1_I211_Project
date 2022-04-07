<?php
/**
 * Author: Sierra Braun
 * Date: 4/5/22
 * File: driver_index_view.class.php
 * Description: displays drivers
 */

class DriverIndexView extends IndexView {

    public static function displayHeader($page_title)
    {
        parent::displayHeader($page_title);

        ?>
        <div class="container m-4">
            <h4>Season 2022 Drivers</h4>
            <hr>
        <?php
    }

    public static function displayFooter()
    {
        ?>
        </div>

        <?php
        parent::displayFooter();
    }

}