<?php

namespace App\Controller;

use App\Application\Controller;
use App\Application\DatabaseConfig;

class BlogController extends Controller     //la classe blogcontroller herite des méthodes et des propriétés de la classe controller (on a enlever le twig) blogcontroller=enfant controller=parent
{

    //Method
    function index()
    {
        $db = new DatabaseConfig();
        $db->connect();
        var_dump($db->db);
        return $this->twig->render('index.html.twig');  //$this=cet objet
    }

    function posts()
    {
        return $this->twig->render('list.html.twig');
    }
}
