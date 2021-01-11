<?php

  function getDBConn_out_WP(){

  	  include dirname(__DIR__,4) . "/wp-config.php";

      try {
        $conn = new PDO('mysql:host=localhost;dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
      }
      catch (PDOException $e) {
        echo '<p>ERROR: No se conecto a la base de datos..!</p>';
        exit;
      }
  
      return $conn;
  }


?>