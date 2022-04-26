<?php
/**
 * Author: Anant Batgali
 * Date: 4/17/22
 * File: driver_detail.class.php
 * Description: The page displays additional info about the driver after user navigates from driver index view
 */

class DriverDetail extends DriverIndexView
{
    public function displayDriver($driver)
    {
        parent::displayHeader("Driver Info");

        $id = $driver->getDriverID();
        $firstName = $driver->getFirstName();
        $lastName = $driver->getLastName();
        $dob = date_format(date_create($driver->getDateOfBirth()), "F d Y");
        $country = $driver->getCountry();
        $podiums = $driver->getPodiums();
        $championships = $driver->getChampionships();
        $points = $driver->getCareerPoints();
        $team = $driver->getTeam();
        $rNum = $driver->getRNum();

        echo "<h1>$rNum </h1><h3>$firstName $lastName</h3><hr>";
        ?>

        <div class="row m-4">
            <div class="column imageDriverDetail me-3">
                <img style="min-width: 400px;" src="<?php echo BASE_URL . "/static/img/drivers/" . $id . ".jpeg"; ?>" class="img-fluid rounded shadow-lg">
            </div>
            <div class="column w-50" style="min-width: 84%;">
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                Team
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                             aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">

                                <img id="teamImg" style="max-width: 100%;" src="<?php  if ($team != 7) echo BASE_URL . "/static/img/teams/" . $team . ".jpeg";
                                else echo BASE_URL . "/static/img/teams/" . $team . ".png";?>" class="rounded mx-auto d-block imageTeam " >

                            </div>
                        </div>
                    </div>
                    <div class=" accordion-item ">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                Career
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body">
                                <strong>Podiums: </strong><?= $podiums ?><br>
                                <strong>Points: </strong><?= $points ?><br>
                                <strong>Championships: </strong><?= $championships ?><br>
                                <?php
                                if (isset($_SESSION["user"]) and $_SESSION["user"] == "admin") {

                                ?>
                                <a class="btn btn-primary" href="<?= BASE_URL ?>/driver/edit/<?= $id ?>" role="button">Edit</a>
                                    <?php
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                Bio
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                             aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body">

                                <strong>Date of Birth:</strong> <?= $dob ?><br>
                                <strong>Country:</strong> <?= $country ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        parent::displayFooter();
    }
}