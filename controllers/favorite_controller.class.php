<?php
/**
 * Author: Anant Batgali
 * Date: 4/27/22
 * File: favorite_controller.class.php
 * Description: Controller for user favorites
 */

class FavoriteController
{
    private $favorites_model;

    //default constructor
    public function __construct() {
        //create an instance of the DriverModel class
        $this->favorites_model = FavoritesModel::getFavoritesModel();
    }

    // favorite button triggers this function
    // to save the driver in userFavorites table
    public function save()
    {
        $user =$_GET["user"];
        $driverID = $_GET["driverID"];
        //var_dump((int)$driverID, $user);
        $this->favorites_model->saveFavorite((int)$driverID, $user);

    }


    //
    public function drivers()
    {

        try {
            $user = $_GET["user"];

            $drivers = $this->favorites_model->retrieveFavorites($user);

            echo json_encode($drivers);


        } catch (Exception $e) {
            $view = new UserError();
            $view->display($e->getMessage());
        }

    }
}