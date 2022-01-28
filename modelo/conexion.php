<?php
 
 class conexion{

    $link = new PDO("mysql:host=localhost;dbname=einsur-supply","root", "");
    $link->exec("set name utf8");

    return $link;
 }