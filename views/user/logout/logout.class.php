<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: logout.class.php
 * Description: This class defines a method "display" that displays a logout message.
 */

class Logout extends IndexView {

    public function display() {
        parent::displayHeader("Logout");

        ?>


        <div class="container m-5">
            <h5>You have successfully logged out.</h5>
        </div>


        <?php
        parent::displayFooter();
    }

}
