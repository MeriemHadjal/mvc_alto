<?php

namespace App\Application;

use App\Application\Template;


class Controller{

    /**
     * @var Template
     */
    // private $twig; on remplace par

    protected $twig;

    public function __construct(){ //"__" précède les fonctions magiques
        $this->twig = new Template();
    }

    
}