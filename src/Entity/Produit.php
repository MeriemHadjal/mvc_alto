<?php

namespace App\Entity;

use App\Application\Database;

class Produit extends Database
{
    /**
     * @var int
     */
    private $id; //clic droit sur les propriétés "insert PHP getter and setter" pour avoir le code "get et set" de chacune.

    /**
     * @var string
     */
    private $designation;

    /**
     * @var float  //pr nb décimal
     */
    private $price;

    

    /**
     * Get the value of id
     *
     * @return  int
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  int  $id
     *
     * @return  self
     */ 
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of designation
     *
     * @return  string
     */ 
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @param  string  $designation
     *
     * @return  self
     */ 
    public function setDesignation(string $designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of price
     *
     * @return  float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @param  float  $price
     *
     * @return  self
     */ 
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    public function add(string $designation, float $price )
    {
        $sql='insert into produit(designation, price) values(:designation, :price)';
    //citation des champs (ici designation et price) plus ajout de leur valeur.

        $this->prepare($sql);
        $this->bindParam(':designation', $designation, \PDO::PARAM_STR); // :designation est un marqueur qui devra être lié à une variable. bindParam permet de faire l'association
        $this->bindParam(':price', $price, \PDO::PARAM_STR);
        $this->execute();
    }

    public function delete( int $id)
    {
        $sql = 'delete from produit where id=:id';
        $this->prepare($sql);
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
    }

    public function edit( int $id, string $designation, float $price)
    {
        $sql = 'update produit set designation=:designation, price=:price where id=:id';
        $this->prepare($sql);
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->bindParam(':id', $designation, \PDO::PARAM_STR);
        $this->bindParam(':id', $price, \PDO::PARAM_STR);
        $this->execute();

    }

    //maintenant on liste

    public function getAll()
    //on liste tout dans un premier temps
    {
        $sql = 'select id, designation, price from produit';
        $this->prepare($sql);
        $this->execute();
        return $this->fetchAll();
    }

    public function getOne(int $id)
    //on liste un par un 
    {
        $sql = 'select id, designation, price from produit';
        $this->prepare($sql);
        $this->bindParam(':id', $id, \PDO::PARAM_INT);
        $this->execute();
        return $this->fetch();
    }

  
    

}

