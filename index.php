<?php 
    //Modelos
    require_once "modelo/modelo.usuarios.php";

    //Controladores
    require_once "controladores/Constrolador.usuarios.php";
    require_once "controladores/Controlador.plantilla.php";

    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla();