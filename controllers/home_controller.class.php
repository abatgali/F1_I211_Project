<?php
/**
 * Author: Anant Batgali
 * Date: 4/2/22
 * File: home_controller.class.php
 * Description:
 */

class HomeController
{
    public function index()
    {
        $view = new Index();
        $view->display();
    }
}