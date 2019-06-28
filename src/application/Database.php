<?php
namespace App\Application;

use App\Application\DatabaseConfig;

class Database extends DatabaseConfig
{
    /**
     * PDO _STATEMENT
     */
    private $sth;

    public function __construct() //on utilise la method connect du fichier databaseConfig(connection à la bdd) puisqu'on en herite
    {
        $this->connect();
    }
    //execution de requête à la bdd
    protected function prepare(string $sql):void //:void = quand ca ne retourne rien

    {
        $this->sth=$this->db->prepare($sql);

    }
    // select nom, prenom from user where nom = :nom
    protected function bindParam(string $param,  $var, $type):void
    {
         $this->sth->bindParam($param, $var, $type);
    }

    protected function execute():void
    {
        $this->sth->execute();
    }
    //retour resultat sql sous forme de tableau
    protected function fetchAll():array
    {
        return $this->sth->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function fetch():array
    {
        return $this->sth->fetchAll(\PDO::FETCH_ASSOC);
    }
}