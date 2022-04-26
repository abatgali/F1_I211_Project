<?php
/*
 * Author: Sierra Braun
 * Date: April 23, 2022
 * File: driver_edit.class.php
 * Description: the display method in the class displays driver details in a form.
 *
 */
class DriverEdit extends DriverIndexView {

    public function display($driver) {
        //display page header
        parent::displayHeader("Edit Driver");

        //get driver ratings from a session variable
//        if (isset($_SESSION['id'])) {
//            $driver_id = $_SESSION['driver_id'];
//        }

        //retrieve driver details by calling get methods
        $id = $driver->getDriverID();
//        $firstName = $driver->getFirstName();
//        $lastName = $driver->getLastName();
//        $dob = date_format(date_create($driver->getDateOfBirth()), "F d Y");
//        $country = $driver->getCountry();
        $podiums = $driver->getPodiums();
        $championships = $driver->getChampionships();
        $points = $driver->getCareerPoints();
//        $rNum = $driver->getRNum();
        ?>

        <div id="main-header">Edit Driver Details</div>

        <!-- display driver details in a form -->
        <form class="new-media"  action='<?= BASE_URL . "/driver/update/" . $id ?>' method="post" style="border: 1px solid #bbb; margin-top: 10px; padding: 10px;">
            <input type="hidden" name="id" value="<?= $id ?>">

            <p><strong>Podiums</strong>:
                <input name="podiums" type="number" size="4" required value="<?= $podiums ?>"></p>

            <p><strong>Points</strong>:
                <input name="points" type="number" size="4" required value="<?= $points ?>"></p>

            <p><strong>Championships</strong>:
                <input name="championships" type="number" size="4" required value="<?= $championships ?>"></p>


            <input type="submit" name="action" value="Update Driver">
            <input type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/driver/detail/" . $id ?>"'>
        </form>
        <?php
        //display page footer
        parent::displayFooter();
    }

//end of display method
}