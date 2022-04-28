<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: logout.class.php
 * Description: This class defines a method "display" that displays a logout message.
 */

class Logout extends IndexView {

    public function display() {
        parent::displayHeader("Logout");

        ?>
        <script>
            // refresh to clear the profile and log out nav links from the header once user logs out
            window.onload = function () {
                let x = document.referrer;
                if (x != "http://localhost/I211/F1_I211_Project/user/logout"){
                    location.reload();
                }
            };
        </script>

        <div class="container m-5">
            <h5>You have successfully logged out.</h5>
            <br>
            <button type="button" class="btn btn-primary mb-4 ms-2" onclick="window.location.href='<?php echo BASE_URL."/index"; ?>'">Return to home page</button>
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
