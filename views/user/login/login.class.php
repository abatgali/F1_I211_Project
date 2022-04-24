<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: login.class.php
 * Description: This class defines a method "display" that displays a login form.
 */
class Login extends IndexView {

    public function display($attempt = "") {
        parent::displayHeader("Login");

        if ($attempt === "failed") {
            // tell user by displaying toast msg
        ?>

        <div class="align-items-center text-white bg-danger border-0 opacity-50"  aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Login attempt failed, try again or don't.
                </div>
                <!--<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>-->
            </div>
        </div>
            <?php
        }

        if ($attempt === "successful") {

        ?>
            <div class="align-items-center text-white bg-success border-0 opacity-50"  aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    Registered Successfully.
                </div>
                <!--<button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>-->
            </div>
        </div>
            <?php

        }
            ?>
        <div class="container m-5 w-50">
        <form method="POST" action="<?php echo BASE_URL."/user/verify"; ?>">
            <div class="mb-3">
                <h1 class="top-row">Log In</h1>
                <p>Please enter your username and password.</p>
                <label for="exampleInputEmail1" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>

            <!--            <button type="submit" class="btn btn-primary">Submit</button>-->
            <div><input style="background-color: #A7030E; border: none;" type="submit" class="btn btn-primary" value="Login"></div>
        </form>

            <br>
            <span style="float: left">Don't have an account? <a style="color: #A7030E;" href="<?= BASE_URL ?>/user/register">Register</a></span>
        </div>

        <?php
        parent::displayFooter();
    }

}