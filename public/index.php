<?php


// retourne le chemin qui est dans apache2.conf
require_once dirname(__DIR__) . '/vendor/autoload.php';

$router = new AltoRouter();

$router->map('GET', '/', array('c' => 'BlogController', 'a' => 'index'));
$router->map('GET', '/list', array('c' => 'BlogController', 'a' => 'posts')); # route !! 
$router->map('GET', '/produit', array('c' => 'ProduitController', 'a' => 'default'));


$router->addMatchTypes(array('idProduit'=> '[0-9][1,5]'));
$router->map('GET', '/produit/delete/[i:idProduit]', array('c' => 'ProduitController', 'a' => 'delete'));



$match = $router->match();

$controller = 'App\\Controller\\' . $match['target']['c'];
$action = $match['target']['a'];


//instancier l'objet d apres l'url 
$object = new $controller();
if(count($match['params']) === 0)
$print = $object->{$action}();
else 
$print = $object->{$action}($match['params']);
echo $print;


