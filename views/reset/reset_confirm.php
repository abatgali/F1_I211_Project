<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: reset_confirm.php
 * Description: This class defines a method "display" that confirms the password reset.
 */

class ResetConfirm extends IndexView {

    public function display($result) {
        parent::displayHeader("Reset Password");

        $message = $result ? "You have successfully reset your password." : "Your last attempt to reset password failed. Please try again.";
        ?>

        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p><?= $message ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">
                <?php
                if ($result) { //if the user has logged in, display the logout button
                    echo "Want to log out? <a href='index.php?action=logout'>Logout</a>";
                } else { //if the user has not logged in, display the login button
                    echo "Reset password? <a href='index.php?action=reset'>Reset</a>";
                }
                ?>
            </span>
            <span style="float: right">Don't have an account? <a href="index.php">Register</a></span>
        </div>
        <?php
        parent::displayFooter();
    }

}
