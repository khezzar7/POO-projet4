<?php
$search='';
if(isset($_GET['search'])) $search = $_GET['search'];
try {

  $pdo = new PDO('mysql:host=localhost;dbname=poo_projet3', 'root','',$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
  var_dump($e);
}
$query = $pdo->prepare('SELECT name FROM category WHERE name LIKE :search ');
$query->execute([':search'=>'%'. $search.'%']);
 $rows= $query->fetchAll(PDO::FETCH_OBJ);
//Version text
//  $str = '';
//  foreach ($rows as $i=>$row) {
// $str .= $row->name;
// //si ce n'est pas le dernier element,
// //j'ajoute une virgule (element séparateur)à la concaténation
//    if($i < sizeof($rows)-1) $str .= ' ,';
//
//  }
//version retour standardisé en JSON
echo json_encode($rows);

?>
