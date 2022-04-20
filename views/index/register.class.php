<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: register.class.php
 * Description:
 */
class Register extends IndexView {

    public function display($result) {
        parent::displayHeader("Register");

        ?>
        <div class="top-row">CREATE AN ACCOUNT</div>
        <div class="middle-row">
            <p><?= $result ?></p>
        </div>
        <div class="bottom-row">
            <span style="float: left">Already have an account? <a href="index.php?action=login">Login</a></span>
            <span style="float: right">Don't have an account? <a href="index.php?action=index">Register</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
