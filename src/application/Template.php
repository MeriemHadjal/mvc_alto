<?php

namespace App\Application;

use \Twig_Loader_Filesystem;
use  \Twig_Environment;

class Template
{
    //on peut definir soit public,private ou protected 
    private const PATH = '../templates';

    /**
     * @var Twig_Loader_Filesystem
     */
    private $loader;
    /**
     * @var Twig_Environement
     */
    private $template;  //private $qqch = propriété  en langage objet une variable devient une propriété

    public function __construct()
    {
        $this->loader = new Twig_Loader_Filesystem(self::PATH);
        $this->template = new \Twig_Environment(
            $this->loader,
            array(
                'cache' => false
            )
        );
    }
    public function render (string $path,array $params = []):string{
        return $this->template->render(
            $path,
            $params
        );
    }
}

