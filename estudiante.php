<?php

public class Estudiante 
{
    public $codigo;
    public $nombres;
    public $apellidos;
    public $telefono;
    public $correo;
    public function crearEstudiante ()
    {
        try{
            $conn = new PDO($dsn,$usuario, $pass);
            $data = [
                'cod' => $codigo,
                'nom' => $nombres,
                'ape' => $apellidos,
                'tel' => $telefono,
                'cor' => $correo,
                'pa' => 1,
            ];
    

          $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) VALUES('$codigo','$nombres', '$apellidos', '$telefono', '$correo', 1)";

            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                echo "<p>Se han guardado los datos</p>";
                echo "se han borrado ".$numRows." registros";
            }else{
                echo "<p>Hubo un error, no se guardo</p>";
            }
       

        }
        catch(PDOexception $e){
            echo $e->getMessage();
        }
    }
    }
}

?>