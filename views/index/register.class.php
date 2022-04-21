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
                <p>Please complete the entire form. All fields are required.</p>
                <form method="post" action="<?= BASE_URL ?>/user/register">
                    <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                    <div><input type="password" name="password" style="width: 99%" required minlength="5" placeholder="Password, 5 characters minimum"></div>
                    <div><input type="email" name="email" style="width: 99%" required="" placeholder="Email"></div>
                    <div><input type = 'text' name="fname" style="width: 99%" required placeholder="First name"></div>
                    <div><input type="text" name="lname" style="width: 99%" required placeholder="Last name"></div>
                    <div><input type="submit" class="button" value="register"></div>
                </form>
            </div>
        </div>
        <div>
            <span style="float: left">Already have an account? <a href="<?= BASE_URL ?>/user/login">Login</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}
