<?php

//clase usuario
class ControladorUsuario{

    //Ingresar Usuarios
    static public function ctrIngresarUsuario(){
        if(isset($_POST["ingUsuario"])){
            if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingUsuario"])){
                //encriptacion md5
                $encriptar = crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuarios";
                $item = "usuarios";
                $valor = $_POST["ingUsuarios"];

                $respuesta = modeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

                if($respuesta["usuarios"] == $_POST["ingUsuario"] && $respuesta["password"] ==$encriptar){
                    if($respuesta["estado"] == "1"){
                        $_SESSION["iniciarSession"] = "ok";
                        $_SESSION["id"] = $respuesta["id"];
                        $_SESSION["nombre"] = $respuesta["nombre"];
                        $_SESSION["usuario"] = $respuesta["usuario"];
                        $_SESSION["password"] = $respuesta["password"];
                        $_SESSION["email"] = $respuesta["email"];
                        $_SESSION["foto"] = $respuesta["foto"];
                        $_SESSION["perfil"] = $respuesta["perfil"];

                        //registro de fecha del ultimo login
                        date_default_timezone_get('America/Mexico_City');
                        $fecha = date('Y-m-d');
						$hora = date('H:i:s');

						$fechaActual = $fecha.' '.$hora;

						$item1 = "ultimo_login";
						$valor1 = $fechaActual;

						$item2 = "id";
						$valor2 = $respuesta["id"];

                        $ultimoLogin = modeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

                        if($ultimoLogin == "ok"){
                            echo '<script>
                                    window.location = "inicio";
                                  </script>';
                        }
                    }else{
                        echo '<br><div class="alert alert-danger">El usuario aún no esta activo</div>';
                    }
                }else{
                    echo '<br><div class="alert alert-danger">Error al ingresar, vuelva intenterlo</div>';
                }
            }
        }
    }
    //registro usuarios


    //mostrar usuarios
    static public function ctrMostrarUsuarios($item, $valor){

        $tabla = "usuarios";
        $respuesta = modeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);

        return $respuesta;
    }

}