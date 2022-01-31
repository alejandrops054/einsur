<?php 

require_once "conexion.php";

 //modelo usuarios
class modeloUsuarios{


        //mostrar usuarios
        static public function mdlMostrarUsuarios($tabla, $item, $valor){

            if($item != null){
                $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $item");
                $stmt-> bindParam(":".$item, $valor, PDO::PARAM_STR);
                $stmt->execute();

                return $stmt->fetch();
            }else{
                $stmt = conexion::conectar()->prepare("SELECT * FROM $tabla");
                $stmt->execute();

                return $stmt->fetchAll();
            }
            $stmt->close();
            $stmt = null;
        }

        //resgistro de usuarios
        static public function mdlIngresarUsuarios($tabla,$datos){

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,usuarios,password,email,perfil, foto)VALUES(:nombre,:usuarios,:password,:email,:perfil, :foto)");
            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":usuarios", $datos["usuarios"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt->close();
            $stmt = null;
        }

        //Actualizar mdlActualizarUsuario
        static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

            $stmt = conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
            $stmt->bindParam(":",$valor1, $valor1, PDO::PARAM_STR);
            $stmt->bindParam(":",$valor2, $valor2, PDO::PARAM_STR);

            if($stmt->execute()){
                return "ok";
            }else{
                return "error";
            }
            $stmt->close();
            $stmt = null;
        }
}