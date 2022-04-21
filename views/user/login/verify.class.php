<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: verify.class.php
 * Description:This class defines a method "display" that displays a login confirmation message.
 */

class Verify extends IndexView {

    public function display($result) {
        parent::displayHeader("Login");

        $message = $result ? "You have successfully logged in." : "Your last attempt to login failed. Please try again.";
        ?>
        <div class="top-row">Login</div>
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if ($result) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='<?= BASE_URL ?>/user/logout'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "Already have an account? <a href='<?= BASE_URL ?>/user/login'>Login</a>";
                }
                ?>
            </span>
            <span style="float: right">Reset password? <a style="color: #A7030E;" href="../../../index.php">Reset</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
