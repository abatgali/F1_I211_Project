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

        <!--Search Bar-->
        <div class="mx-auto w-50 m-5">
            <form action="<?php echo BASE_URL . "/driver/search" ?>">
                <div class="input-group mb-3 shadow-sm">
                    <input type="text" class="form-control" placeholder="" name="terms" aria-label="Search input"
                           aria-describedby="button-addon2" required>
                    <button class="btn btn-outline-dark" type="submit">Search</button>
                </div>
            </form>
        </div>

        <div class="container p-4">
            <!--Race Calendar-->
            <div class="d-flex flex-row">
                <div class="calendar me-5">
                    <h4>Race Calendar 2022</h4>
                    <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Grand Prix</th>
                        <th class="align-right">Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/bahrain-gp">
                        <td><span class="table__text table__text--primary">1</span></td>

                        <td><span class="table__text--secondary">Bahrain International Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">20 Mar</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/saudi-arabian-gp">
                        <td><span class="table__text table__text--primary">2</span></td>

                        <td><span class="table__text--secondary">Jeddah Street Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">27 Mar</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/australian-gp">
                        <td><span class="table__text table__text--primary">3</span></td>

                        <td><span class="table__text--secondary">Albert Park</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">10 Apr</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/emilia-romagna-gp">
                        <td><span class="table__text table__text--primary">4</span></td>

                        <td><span class="table__text--secondary">Autodromo Enzo e Dino Ferrari</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">24 Apr</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/gp-miami">
                        <td><span class="table__text table__text--primary">5</span></td>

                        <td><span class="table__text--secondary">Miami International Autodrome</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">8 May</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/spanish-gp">
                        <td><span class="table__text table__text--primary">6</span></td>

                        <td><span class="table__text--secondary">Circuit de Catalunya</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">22 May</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/monaco-gp">
                        <td><span class="table__text table__text--primary">7</span></td>

                        <td><span class="table__text--secondary">Circuit de Monaco</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">29 May</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/azerbaijan-gp">
                        <td><span class="table__text table__text--primary">8</span></td>

                        <td><span class="table__text--secondary">Baku City Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">12 Jun</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/canadian-gp">
                        <td><span class="table__text table__text--primary">9</span></td>

                        <td><span class="table__text--secondary">Circuit Gilles Villeneuve</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">19 Jun</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/british-gp">
                        <td><span class="table__text table__text--primary">10</span></td>

                        <td><span class="table__text--secondary">Circuit Silverstone</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">3 Jul</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/austrian-gp">
                        <td><span class="table__text table__text--primary">11</span></td>

                        <td><span class="table__text--secondary">Red Bull Ring</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">10 Jul</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/french-gp">
                        <td><span class="table__text table__text--primary">12</span></td>

                        <td><span class="table__text--secondary">Circuit Paul Ricard</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">24 Jul</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/hungarian-gp">
                        <td><span class="table__text table__text--primary">13</span></td>

                        <td><span class="table__text--secondary">Hungaroring</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">31 Jul</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/belgian-gp">
                        <td><span class="table__text table__text--primary">14</span></td>

                        <td><span class="table__text--secondary">Spa-Francorchamps</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">28 Aug</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/dutch-gp">
                        <td><span class="table__text table__text--primary">15</span></td>

                        <td><span class="table__text--secondary">Circuit Zandvoort</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">4 Sep</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/italian-gp">
                        <td><span class="table__text table__text--primary">16</span></td>

                        <td><span class="table__text--secondary">Autodromo Nazionale Monza</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">11 Sep</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/russian-gp">
                        <td><span class="table__text table__text--primary">17</span></td>

                        <td><span class="table__text--secondary">-</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">25 Sep</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/singapore-gp">
                        <td><span class="table__text table__text--primary">18</span></td>

                        <td><span class="table__text--secondary">Marina Bay Street Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">2 Oct</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/japanese-gp">
                        <td><span class="table__text table__text--primary">19</span></td>

                        <td><span class="table__text--secondary">Suzuka Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">9 Oct</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/united-states-gp">
                        <td><span class="table__text table__text--primary">20</span></td>

                        <td><span class="table__text--secondary">Circuit of the Americas</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">23 Oct</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/mexican-gp">
                        <td><span class="table__text table__text--primary">21</span></td>

                        <td><span class="table__text--secondary">Autodromo Hermanos Rodriguez</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">30 Oct</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/brazilian-gp">
                        <td><span class="table__text table__text--primary">22</span></td>
                        <td><span class="table__text--secondary">Autodromo Jose Carlos Pace Interlagos</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">13 Nov</span></td>
                        <td class="align-right"></td>
                    </tr>
                    <tr data-href="https://racingnews365.com/formula-1-circuits/abu-dhabi-gp">
                        <td><span class="table__text table__text--primary">23</span></td>

                        <td><span class="table__text--secondary">Yas Marina Circuit</span></td>
                        <td class="table__text--date align-right"><span class="table__text--primary">20 Nov</span></td>
                        <td class="align-right"></td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="w-50">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner homepageImages">
                        <div class="carousel-item active">
                            <img src="static/img/unsplash5.jpeg" class="d-block w-100" alt="racing">
                            <div class="carousel-caption d-none d-md-block">
                                <button type="button" class="btn btn-primary btn-lg"
                                        onclick="location.href='<?= BASE_URL ?>/user/register'">Create Account
                                </button>
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="container-fluid mt-4">
                    <h3>The F1 Experience</h3>
                    <iframe src="https://www.youtube.com/embed/2M0inetghnk"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                    <iframe src="https://www.youtube.com/embed/wmIrqlUfp6Q"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen>
                    </iframe>
                </div>
            </div>

            </div>


        </div>
        <?php
        parent::displayFooter();
    }
}