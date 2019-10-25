<?php
  class Conexion{

    public function conectar(){
      //base de datos por PDO
      $link = new PDO("mysql:host=localhost;dbname=simple_stock","root","root");
      return $link;
    }

  }
?>