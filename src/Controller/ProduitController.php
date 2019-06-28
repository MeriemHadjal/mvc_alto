<?php

namespace App\Controller;


use App\Application\Controller;
use App\Entity\Produit;

class ProduitController extends Controller //obligation d'utiliser "use" au dessus car les "use" servent à rattacher le mot controller et que le chemin soit bon car possibilité d'avoir plusieurs fichiers controller et "use" permet de les différencier
{

   public function default (){
       $objProduit = new Produit();//ON INSTANCIE LA CLASSE PRODUIT
       $produits = $objProduit->getAll();//=>pour lister les produits
       return $this->twig->render('produit/default.html.twig',
       [
           'produits' => $produits
       ]
       );
   }


   public function delete ($params = []){
    $id = $params['idProduit'];
    $produit = new Produit();
    $produit->delete($id);
    header('Location: /produit');
}

}