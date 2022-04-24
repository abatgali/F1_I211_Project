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

        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //retrieve other user input from the registration form
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
        $firstname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

        if (empty($username) || empty($password) || empty($lastname) || empty($firstname) || empty($email)) {
            throw new Exception("Values were missing in one or more fields. All fields must be filled.");
        }
        //construct an INSERT query
        $sql = "INSERT INTO " . $this->tblUsers. " VALUES(NULL, '$username', '$hashed_password', '$email', '$firstname', '$lastname')";

        //execute the query and return true if successful or false if failed
        if ($this->dbConnection->query($sql) === TRUE) {
            return true;
        } else {
            echo $this->dbConnection->query($sql);
            return false;
        }
    }

    //verify username and password against a database record
    public function verify_user()
    {
        //retrieve username and password
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING));
        $password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING));

        //sql statement to filter the users' table data with a username
        $sql = "SELECT password FROM " . $this->tblUsers . " WHERE username='$username'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //verify password; if password is valid, set a temporary cookie
        if ($query and $query->num_rows > 0) {
            $result_row = $query->fetch_assoc();
            $hash = $result_row['password'];
            if (password_verify($password, $hash)) {
                if (!isset($_SESSION))
                {
                    session_start();
                    //$_SESSION["user"] = "";
                }
                $_SESSION["user"] = $username;
                setcookie("user",$username);

                return true;
            }
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

        //hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        //the sql statement for update
        $sql = "UPDATE  " . $this->db->getUserTable() . " SET password='$hashed_password' WHERE username='$username'";

        //execute the query
        $query = $this->dbConnection->query($sql);

        //return false if no rows were affected
        if (!$query || $this->dbConnection->affected_rows == 0) {

            return false;
        }

        return true;
    }

    // retrieve user info
    public function userInfo($username)
    {
        // retrieve details from the database
        $sql = "SELECT * FROM ". $this->tblUsers. " WHERE username =". $username;

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