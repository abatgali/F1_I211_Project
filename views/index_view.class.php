<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: index_view.class.php
 * Description: displays header and footer of the f1 website
 */

class IndexView {

    public static function displayHeader($title)
    {
        ?>

        <!DOCTYPE html>

        <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <link rel="stylesheet" href="<?=BASE_URL?>/static/css/styles.css">
            <title><?=$title?></title>
        </head>
        <body>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        -->


            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= BASE_URL ?>/index">
                        <img src="<?=BASE_URL?>/static/img/f1_logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
                        Formula 1
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link<?php if ($title == "F1 Home") {?> active <?php }?>" aria-current="page" href="<?= BASE_URL ?>/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link<?php if ($title == "F1 Teams") {?> active <?php }?>" href="<?= BASE_URL ?>/team/index">Teams</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($title == "F1 Drivers") {?> active <?php }?>" href="<?= BASE_URL ?>/driver/index">Drivers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($title == "F1 Cars") {?> active <?php }?>" href="<?= BASE_URL ?>/car/index">Cars</a>
                            </li>
                            <?php
                            if (isset($_SESSION["user"])) {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($title == "User Profile") {?> active <?php }?>" href="<?= BASE_URL ?>/user/profile/<?= $_SESSION["user"] ?>">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($title == "Logout") {?> active <?php }?>" href="<?= BASE_URL ?>/user/logout">Log Out</a>
                            </li>
                            <?php
                            } else {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($title == "Login") {?> active <?php }?>" href="<?= BASE_URL ?>/user/login">Log In</a>
                            </li>
        <?php
                            }
        ?>
                        </ul>
                    </div>
                </div>
            </nav>
        <?php
    }

    public static function displayFooter()
    {
        ?>
                <footer class="footer mt-auto py-3 bg-dark">
                    <div class="container">
                        <span class="text-muted"> &copy; Group 3 - I211 Project</span>
                    </div>
                </footer>
            </body>
        </html>

        <?php
    }
}