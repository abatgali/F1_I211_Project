<?php
/**
 * Author: Anant Batgali
 * Date: 4/22/22
 * File: profile_view.class.php
 * Description:
 */

class ProfileView extends IndexView
{
    public function display()
    {
        parent::displayHeader("User Profile");

?>

        <div class="container">


            <!--Retrieve user's detail through session id-->


            <!--Display Profile Info-->
            <h4>User</h4>
            <hr>


            <!--Display Favorites-->



        </div>

<?php
        parent::displayFooter();
    }
}