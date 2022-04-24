<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: logout.class.php
 * Description: This class defines a method "display" that displays a logout message.
 */

class Logout extends IndexView {

    public function display() {
        parent::displayHeader("Login");
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p>You have successfully logged out.</p>
        </div>
        <div class="bottom-row">
            <span style="background-color: #A7030E; border: none; float: left;">Already have an account? <a href="../../../index.php">Login</a></span>
            <span style=" float: left;">Don't have an account? <a style="color: #A7030E;" href="../../../index.php">Register</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
