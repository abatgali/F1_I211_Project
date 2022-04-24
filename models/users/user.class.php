<?php
/**
 * Author: Anant Batgali
 * Date: 4/23/22
 * File: user.class.php
 * Description: User data class
 */

class User
{
    // private data members
    private $userID, $username, $email, $firstname, $lastname;

    // constructor
    public function __construct($userID, $username, $email, $firstname, $lastname)
    {
        $this->userID = $userID;
        $this->username = $username;
        $this->email = $email;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }


    // getter functions
    /**
     * @return mixed
     */
    public function getUserID()
    {
        return $this->userID;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }



}