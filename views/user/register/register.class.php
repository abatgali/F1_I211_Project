<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: register.class.php
 * Description: Displays registration form
 */
class Register extends IndexView {

    public function display() {
        parent::displayHeader("Register");

        ?>

        <div class="container m-5 w-50">
            <form method="post" action="<?php echo BASE_URL."/user/register"; ?>">
                <div class="mb-3">
                    <h1 class="top-row">Create an account</h1>
                    <p>Please complete the entire form. All fields are required.</p>
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                    <div id="emailHelp" class="form-text">We'll always share your information with everyone.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lname">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I have read and agree to the Gettysburg Address</label>
                </div>
                <!--            <button type="submit" class="btn btn-primary">Submit</button>-->
                <div><input style="background-color: #A7030E; border: none; " type="submit" class="btn btn-primary" value="Register"></div>
            </form>

            <div>
                <br>
                <span style="float: left">Already have an account? <a style="color: #A7030E;" href="<?= BASE_URL ?>/user/login">Login</a></span>
                <br>
            </div>


        </div>
        <?php
        parent::displayFooter();
    }

}
