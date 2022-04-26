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


        <?php
        parent::displayFooter();
    }

}
