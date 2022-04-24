<?php

/*
 * Author: Piper Varney
 * Date: 04/18/2022
 * Name: user_controller.class.php
 * Description: the controller of the application.
 */
class UserController {

    private $user_model;  //an object of the UserModel class

    //create an instance of the UserModel class in the default constructor

    public function __construct() {
        $this->user_model = UserModel::getUserModel();
    }

    //display the registration form and/or
    //create a user account by calling the addUser method of a userModel object
    public function register() {

        // display registration page
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $view = new Register();
            $view->display();
        }

        // work with submitted form details
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //call the addUser method of the UserModel object
            $result = $this->user_model->add_user();

            //if registration is successful, then redirect user to login page
            // with a confirmation message
            if ($result) {
                $this->login("successful");
            }
            else
                $view = new Register();
                $view->display("failed");
            // display error msg: Registration unsuccessful or something
        }


    }

    //display the login form
    public function login($attempt = "") {
        $view = new Login();
        $view->display($attempt);
    }

    //verify username and password by calling the verifyUser method defined in the model.
    //It then calls the display method defined in a view class and pass true or false.
    // login form submission triggers verify
    public function verify() {

        // by default setting attempt to failed
        $attempt = "failed";

        //call the verifyUser method of the UserModel object
        $result = $this->user_model->verify_user();

        // check result to direct user accordingly
        if ($result) {
            //show user profile
            $this->profile($_SESSION["user"]);
            return true;
        }
        else {
            // letting user know login failed
            $this->login($attempt);
            return false;
        }
    }

    // displays user's details
    public function profile($username)
    {
        //check if user is logged in
        //if (isset($_SESSION["user"])) {

        try {


            // retrieving details of the logged-in user
            $user = $this->user_model->userInfo($username);


            // display user profile
            $view = new ProfileView();
            $view->display($user);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }

        //} else {
            // error: login required
        //}

    }

    //log out a user by calling the logout method defined in the model and then
    //display a confirmation message
    public function logout() {
        $this->user_model->logout();
        $view = new Logout();
        $view->display();
    }

    //display the password reset form or an error message.
    public function reset() {
        if (!isset($_SESSION['user'])) {  //if the user has not logged in
            $this->error("To reset your password, please log in first.");
        } else { //if the user has logged in.
            $user = $_SESSION['user'];
            $view = new Reset();
            $view->display($user);
        }
    }

    //reset password by calling the resetPassword method in user model
    public function do_reset() {

        $result = $this->user_model->reset_password();
        //exit($result);

        $view = new ResetConfirm();
        $view->display($result);
    }

    //display an error message
    public function error($message) {
        $view = new UserError();
        $view->display($message);
    }

}