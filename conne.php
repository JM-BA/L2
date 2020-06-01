<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="#">
        <input type="text" name="codigo" placeholder="Codigo" required/><br>
        <input type="text" name="nombres" placeholder="Nombres" required/><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required/><br>
        <input type="text" name="telefono" placeholder="Telefono"/><br>        
        <input type="email" name="correo" placeholder="Email"/><br>
        <input type="submit" name="submit" value="Guardar">
    </form>
</body>
</html>

<?php
if(isset($_POST["submit"])){
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $dsn = "mysql:host=localhost;dbname=udh";
    $usuario = "root";
    $pass = "";

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

    //  $query = "SELECT * FROM estudiantes";
    //  $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) VALUES('$codigo','$nombres', '$apellidos', '$telefono', '$correo', 1)";
    //  $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) VALUES(?, ?, ?, ?, ?, ?)";
    //  $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) VALUES(:cod, :nom, :ape, :tel, :cor, :pa)";
    //  $sql = "UPDATE estudiantes SET nombres = 'Andrea', correo = 'andrea@gmail.com' WHERE id=11";
        $sql = "DELETE FROM estudiantes WHERE id_pa=0";

        $respuesta = $conn->prepare($sql);
    //    $respuesta->execute([$codigo, $nombres, $apellidos, $telefono, $correo, 1]);
        $respuesta->execute();
        $numRows = $respuesta->rowCount();
        if($numRows!=0){
            echo "<p>Se han guardado los datos</p>";
            echo "se han borrado ".$numRows." registros";
        }else{
            echo "<p>Hubo un error, no se guardo</p>";
        }
   
    //    foreach($respuesta as $estudiante){
    //        echo $estudiante[1]." ".$estudiante["apellidos"];
    //    }
    }
    catch(PDOexception $e){
        echo $e->getMessage();
    }
}