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
                <!--fill asynchronously-->
                <div id="fill_favs">

                </div>
            </div>


        </div>
        <script id="showFavs" type="text/javascript" src="<?php echo BASE_URL."/static/js/show_favs.js";?>"></script>


        <!--sticky footer-->
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