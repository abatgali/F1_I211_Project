<?php
/**
 * Author: Piper Varney
 * Date: 4/18/22
 * File: user_model.class.php
 * Description:
 */
class UserModel
{

    //private data members
    private $db;
    private $dbConnection;
    static private $_instance = NULL;
    private $tblUsers;

    public function __construct()
    {
        $this->db = Database::getDatabase();
        $this->dbConnection = $this->db->getConnection();
        $this->tblUsers = $this->db->getUsersTable();
    }

    //static method to ensure there is just one UserModel instance
    public static function getUserModel()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new UserModel();
        }
        return self::$_instance;
    }

    //add a user into the "users" table in the database
    public function add_user()
    {
        //retrieve password from the registration form
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //retrieve other user input from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password) || empty($lastname) || empty($firstname) || empty($email)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }

            //Handle data length exception. The min length of a password is 5.
            if (strlen($password) < 5) {
                throw new DataLengthException("Your password was invalid. The minimum length of a password is 5.");
            }

            //Handle email format exception.
            if (!Utilities::checkemail($email)) {
                throw new EmailFormatException("Your email format was invalid. The general format of an email address is user@example.com.");
            }
            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            //construct an INSERT query
            $sql = "INSERT INTO " . $this->db->getUsersTable() . " VALUES(NULL, '$username', '$hashed_password', '$email', '$firstname', '$lastname')";

            //Execute the query. Throw a database exception if the query failed.
            if ($this->dbConnection->query($sql) === FALSE) {
                throw new DatabaseException("We are sorry, but we cannot create your account at this moment. Please try again later.");
            }

            return "Your account has been successfully created.";
        } catch (DataMissingException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (DataLengthException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (EmailFormatException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }
    }

    //verify username and password against a database record
    public function verify_user()
    {
        //retrieve username and password
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }

            //sql statement to filter the users table data with a username
            $sql = "SELECT password FROM " . $this->db->getUsersTable() . " WHERE username='$username'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            if (!$query) {
                throw new DatabaseException("We are sorry, but we cannot create your account at this moment. Please try again later.");
            }
            //verify password; if password is valid, set a temporary cookie
            if ($query->num_rows > 0) {
                $result_row = $query->fetch_assoc();
                $hash = $result_row['password'];
                if (password_verify($password, $hash)) {
                    setcookie("user", $username);
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                    $_SESSION["user"] = $username;
                    return true;

                } else {
                    throw new DatabaseException("Your username and/or password were invalid. Please try again.");
                }
            } else {
                throw new DatabaseException("Your username and/or password were invalid. Please try again.");
            }
        } catch (DataMissingException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (DatabaseException $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }

        return false;

    }

    //logout user: destroy session data
    public function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        //destroy session data
        session_destroy();
        unset($_COOKIE["user"]);

        return true;
    }

    //reset password
    public function reset_password()
    {
        //retrieve username and password from a form
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        try {
            //Handle data missing exception. All fields are required.
            if (empty($username) || empty($password)) {
                throw new DataMissingException("Values were missing in one or more fields. All fields must be filled.");
            }

            //Handle data length exception. The min length of a password is 5.
            if (strlen($password) < 5) {
                throw new DataLengthException("Your password is invalid. The minimum length of a password is 5.");
            }

            //hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            //the sql statement for update
            $sql = "UPDATE  " . $this->db->getUsersTable() . " SET password='$hashed_password' WHERE username='$username'";

            //execute the query
            $query = $this->dbConnection->query($sql);

            //return false if no rows were affected
            if (!$query || $this->dbConnection->affected_rows == 0) {
                throw new DatabaseException("We are sorry, but we cannot reset your password at this moment. Please try again later.");
            }

            return "You have successfully reset your password.";
        } catch (DataMissingException $e) {
            return $e->getMessage();
        } catch (DataLengthException $e) {
            return $e->getMessage();
        } catch (DatabaseException $e) {
            return $e->getMessage();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    // retrieve user info
    public function userInfo($user)
    {
        /*if (isset($_SESSION["user"]))
            $username = $_SESSION["user"];
        else
            return false;*/

        // retrieve details from the database
        $sql = "SELECT userID, username, email, firstname, lastname FROM ". $this->tblUsers. " WHERE username = '$user'";

        $query = $this->dbConnection->query($sql);

        if (!$query)
            return false;

        if ($query->num_rows == 0)
            return 0;

        $obj = $query->fetch_object();

        // returning the user object
        return new User(stripslashes($obj->userID),stripslashes($obj->username), stripslashes($obj->email), stripslashes($obj->firstname), stripslashes($obj->lastname));
    }
}