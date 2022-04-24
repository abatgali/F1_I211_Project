<?php
/**
 * Author: Piper Varney
 * Date: 4/19/22
 * File: user_error.class.php
 * Description:This class extends the View class. The "display" method displays an error message.
 *				To create the page header and footer, the display method calls the header and footer
 *				methods defined in the parent class.
 */

class UserError extends IndexView {
    public function display($message) {

        //call the header method defined in the parent class to add the header
        parent::displayHeader("Error");
        ?>
        <!-- page specific content starts -->
        <!-- top row for the page header  -->
        <div class="container m-5">

        <!-- middle row -->
        <div class="middle-row">
            <h3>We are sorry, but an error has occurred.</h3>
            <p><?= $message ?></p>
        </div>
        </div>


        <?php
        //call the footer method defined in the parent class to add the footer
        parent::displayFooter();
    }
}