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

        $id = $userObj->getUserID();
        //echo $userObj;
        $firstName = $userObj->getFirstname();
        $lastName = $userObj->getLastname();
        $username = $userObj->getUsername();
        $email = $userObj->getEmail();

?>

        <div class="container m-5">


            <!--Retrieve user's detail through session id-->


            <!--Display Profile Info-->
            <h3>Hello, <i><?php echo "$firstName $lastName" ?></i></h3>
            <hr>

            <div class="userDetails w-50 m-2">
                <div class=" mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Username</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" value="<?= $username?>"
                           aria-describedby="inputGroup-sizing-default" disabled>
                </div>
                <div class=" mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="text" class="form-control" aria-label="Sizing example input" value="<?= $email?>"
                           aria-describedby="inputGroup-sizing-default" disabled>
                </div>
            </div>
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