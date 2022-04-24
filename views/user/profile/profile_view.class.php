<?php
/**
 * Author: Anant Batgali
 * Date: 4/22/22
 * File: profile_view.class.php
 * Description:
 */

class ProfileView extends IndexView
{
    public function display($userObj)
    {
        parent::displayHeader("User Profile");

        //$id = $userObj->getUserID();
        echo $userObj;
        //$firstName = $userObj->getFirstname();
        //$lastName = $userObj->getLastname();

?>

        <div class="container m-5">


            <!--Retrieve user's detail through session id-->


            <!--Display Profile Info-->
            <h3>Hello, <i>firstname</i></h3>
            <hr>

            <?php

            echo "<h5>Username: ". $_SESSION['user']."</h5>";
            echo "<h5>Email:  </h5>";


            ?>

            <!--Display Favorites-->
            <div class="mt-5">
                <h3>Favorites</h3>
                <hr>
            </div>


        </div>

<?php
        parent::displayFooter();
    }
}