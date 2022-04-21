<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: login.class.php
 * Description: This class defines a method "display" that displays a login form.
 */
class Login extends IndexView {

    public function display() {
        parent::displayHeader("Login");
        ?>
        <div>Login</div>
        <div>
            <p>Please enter your username and password.</p>
            <form method="post" action="<?= BASE_URL ?>/user/verify">
                <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <div>
            <span style="float: left">Don't have an account? <a href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}