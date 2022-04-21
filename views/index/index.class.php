<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: index.class.php
 * Description: Homepage image carousel
 */

class Index extends IndexView
{
    public function display()
    {
        parent::displayHeader("F1 Home")
        ?>

        <div class="mx-auto w-50 mt-3">
            <form action="<?php echo BASE_URL. "/driver/search"?>">
                <div class="input-group mb-3 shadow-sm">
                    <input type="text" class="form-control" placeholder="" name="terms" aria-label="Search input" aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-dark" type="submit" ">Search</button>
                </div>
        </form>
        </div>
        <div class="container m-4 w-50">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner homepageImages">
                    <div class="carousel-item active">
                        <img src="static/img/unsplash5.jpeg" class="d-block w-100" alt="racing">
                        <div class="carousel-caption d-none d-md-block">
                            <button type="button" class="btn btn-primary btn-lg" onclick="location.href='<?=BASE_URL?>/team/'">Create Account</button>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="static/img/unsplash2.jpeg" class="d-block w-100 " alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="static/img/unsplash3.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="static/img/unsplash1.jpeg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="static/img/unsplash4.jpeg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <?php
        parent::displayFooter();
    }
}