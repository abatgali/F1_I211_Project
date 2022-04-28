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
                    Login attempt failed. Try again, or don't.
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

        <footer class="d-block w-100 bg-dark py-3 position-absolute" style="bottom: 0">

            <div class="container d-flex justify-content-between">
                <p class="text-muted"> &copy; Group 3 - I211 Final Project</p>
                <div class="text-muted">
                    <p ><a href="https://www.formula1.com">Data Source: F1 Website</a></p>
                    <p ><a href="https://www.postman.com/maintenance-astronomer-29796265/workspace/f1-api/collection/19328871-63c4a82c-ae84-4a24-a58b-bd8a408b1c4e?ctx=documentation">Standings: F1 Postman API </a></p>
                    <p ><a href="https://racingnews365.com/formula-1-calendar-2022">Race Calendar Source</a></p>
                </div>
            </div>
        </footer>
        <?php

    }

}