<?php
//connection bdd

namespace App\Application;

use \Dotenv\Dotenv;


class DatabaseConfig
{
    
    /**
     * @var PDO
     */
    public $db;

    private function config()
    {
        $dotenv = \Dotenv\Dotenv::create('../');
        $dotenv->load();

        try{
            $this->db = new \PDO('mysql:host='.getenv('HOSTNAME').';dbname='.getenv('DBNAME'), getenv('USER'), getenv('PASSWORD'));  
            //"self::"-> pour appeler une constante .getenv()remplace self:: pour charger les fichiers d'environnement
    
        }
    

    catch(Exception $e)
    {
        die('Erreur :' . $e->getMessage());
    }


    }

    public function connect(){
        $this->config(); //execution la connection bdd
    }
}