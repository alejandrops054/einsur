<?php
 
 class conexion{
   static public function conectar(){
      
      $link = new PDO("mysql:host=localhost;dbname=einsur-supply","root", "");
      $link->exec("set name utf8");
  
      return $link;
   }
 }