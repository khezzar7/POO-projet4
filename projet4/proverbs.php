<?php
$category = '';
if(isset($_GET['category']))
 $category=$_GET= $_GET['category'];
 try {

   $pdo = new PDO('mysql:host=localhost;dbname=poo_projet3', 'root','',$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
 } catch (PDOException $e) {
   var_dump($e);
 }

 $query=$pdo->prepare('SELECT body
   From proverb_category
   JOIN category ON category.id = proverb_category.category_id
   JOIN proverb ON proverb.id = proverb_category.proverb_id
   WHERE category.name = :category');
   $query->execute([':category'=>$category]);
   $rows =$query->fetchAll(PDO::FETCH_OBJ);
   echo json_encode($rows);
?>
