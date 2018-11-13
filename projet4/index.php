<?php

try {

  $pdo = new PDO('mysql:host=localhost;dbname=poo_projet3', 'root','',$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
} catch (PDOException $e) {
  var_dump($e);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Projet4</title>
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
    <h1>projet 4</h1>
    <form>
      <input id="category" type="text" name="" value="" placeholder="Saisir une catégorie">
    </form>
    <ul id="suggestions">

    </ul>
    <div id="proverbs"></div>
    <script src="js/app.js"></script>
  </body>
</html>
