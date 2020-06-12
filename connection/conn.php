<?php
  try {
    $connection = new PDO("mysql:host=localhost;dbname=nasa_asteroid", 'root', '12345678');
    $connection->exec("SET NAMES UTF8");
  }
  catch(PDOException $e) {
    echo $e->getMessage()."<br/>";
    echo "Please check your connection ! ";
    die();
  }
?>
