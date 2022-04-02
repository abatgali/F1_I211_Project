<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: index.class.php
 * Description:
 */

class Index extends View
{
    public function display()
    {
        parent::header();
        ?>

        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="static/img/unsplash1.jpeg" class="d-block w-100" alt="racing">
                </div>
                <div class="carousel-item">
                    <img src="static/img/unsplash2.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/img/unsplash3.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/img/unsplash4.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="static/img/unsplash5.jpeg" class="d-block w-100" alt="...">
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

        <?php
        parent::footer();
    }
}