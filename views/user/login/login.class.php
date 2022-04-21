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

        <div class="container m-5 w-50">
        <form method="post" action="../../../index.php">
            <div class="mb-3">
                <h1 class="top-row">Log In</h1>
                <p>Please enter your username and password.</p>
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="passowrd">
            </div>

            <!--            <button type="submit" class="btn btn-primary">Submit</button>-->
            <div><input style="background-color: #A7030E; border: none;" type="submit" class="btn btn-primary" value="Login"></div>
        </form>


        <!--<div>Login</div>
        <div>
            <p>Please enter your username and password.</p>
            <form method="post" action="../../../index.php">
                <div><input type="text" name="username" style="width: 99%" required placeholder="Username"></div>
                <div><input type="password" name="password" style="width: 99%" required placeholder="Password"></div>
                <div><input type="submit" class="button" value="Login"></div>
            </form>
        </div>
        <div>-->
            <br>
            <span style="float: left">Don't have an account? <a style="color: #A7030E;" href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}