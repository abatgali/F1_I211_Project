<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: reset.class.php
 * Description: This class defines a method "display" that displays a reset password form.
 */

class Reset extends IndexView {

    public function display($user) {
        parent::displayHeader("Reset Password");
        ?>

        <div class="top-row">Reset password</div>
        <div class="middle-row">
            <p>Please enter a new password. Username is not changeable.</p>
            <form method="post" action="index.php?action=do_reset">
                <div><input type="text" name="username" style="width: 99%" required value="<?= $user ?>" readonly="readonly"></div>
                <div><input type="password" name="password" style="width: 99%;" required minlength="5" placeholder="Password, 5 characters minimum"></div>
                <div><input type="submit" class="button" value="Reset Password"></div>
            </form>
        </div>
        <div class="bottom-row">
            <span style="float: left">Cancel password reset? <a href="index.php?action=login">Cancel Reset</a></span>
            <span style="float: right"></span>
        </div>

        <?php
        parent::displayFooter();
    }

}