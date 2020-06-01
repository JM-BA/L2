<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
		body{background-color: #264673; box-sizing: border-box; font-family: Arial;}

		form{
			background-color: white;
			padding: 10px;
			margin: 100px auto;
			width: 400px;
		}

		input[type=text], input[type=email]{
			padding: 10px;
			width: 380px;
		}
		input[type="submit"]{
			border: 0;
			background-color: #ED8824;
			padding: 10px 20px;
		}	

		.error{
			background-color: #FF9185;
			font-size: 12px;
			padding: 10px;
		}
		.correcto{
			background-color: #A0DEA7;
			font-size: 12px;
			padding: 10px;
		}
	</style>
</head>
<body>
    <form method="post" action="#">
        <input type="text" name="codigo" placeholder="Codigo" required/><br>
        <input type="text" name="nombres" placeholder="Nombres" required/><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required/><br>
        <input type="text" name="telefono" placeholder="Telefono"/><br>        
        <input type="email" name="correo" placeholder="Email"/><br>
        <input type="submit" name="añadir" value="Añadir Datos">
        <input type="submit" name="actualizar" value="Actualizar Datos">
        <input type="submit" name="eliminar" value="Eliminar Datos">

    </form>
</body>
</html>

<?php
if(isset($_POST["añadir"])){
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];

    $dsn = "mysql:host=localhost;dbname=udh";
    $usuario = "root";
    $pass = "";
    
        echo "datos recibidos ";
        function crear($cod,$nom,$ape,$tel,$corr)
        {
         
         try{
              $conn=new PDO($dsn,$user,$pass);
              $data=[
               
              ];
              
               $sql="insert into estudiantes(codigo,nombre,apellidos,telefono,correo,id_pa) values('$cod','$nom','$ape','$tel','$corr',1)";
             
               $resultado=$conn->prepare($sql);
               $resultado->execute();
               echo "<br>";
              if($resultado->rowCount()!==0){
                echo "INSERTASTE : ".$resultado->rowCount()." ESTUDIANTE";
              }else{
                echo "<p>NO INSERTASTE<p>";
                   }
            }catch(PDOException $e){
            echo $e->getMessage("fallaste");
                                                  }
     
        }
        function actualizar($cod,$nom,$ape,$tel,$corr)
        {
            try{
                $conn=new PDO($dsn,$user,$pass);
                $data=[
                 
                ];
                 
           
                 $sql1="update estudiantes set nombre='$nombre' where id=$id ";
                 $sql2="select nombre from estudiantes where id=$id";
                 
                 $resultado=$conn->prepare($sql2);
                 $resultado->execute();
                 $arreglo=$resultado->fetchAll();
                 $nom_antiguo=$arreglo[0]['nombre'];
                 echo "<br>";
                 $resultado=$conn->prepare($sql1);
                 $resultado->execute();
                if($resultado->rowCount()!==0){
                  echo $resultado->rowCount()." fila actualizada<br>";
                  echo "el nuevo nombre de ".$nom_antiguo." es :".$nombre;
                }else{
                  echo "<p>ninguna fila afectada<p>";
                }
            }catch(PDOException $e){
              echo $e->getMessage("fallaste");
           }
           function eliminar()
           {
            try{
                $conn=new PDO($dsn,$user,$pass);
                $data=[
                 
                ];
                 //$query="select * from estudiantes";
           
                 $sql1="delete from estudiantes where id=$id ";
                 $sql2="select nombre from estudiantes where id=$id";
                 //$sql="insert into estudiantes(codigo,nombres,apellidos,telefono,correo,id_pa) values(?,?,?,?,?,1)";
                 $resultado=$conn->prepare($sql2);
                 $resultado->execute();
                 
                foreach($resultado->fetchAll() as $arreglo){
                   echo$arreglo['nombre']."<br>";
                } 
                 echo "<br>";
                 $resultado=$conn->prepare($sql1);
                 $resultado->execute();
                if($resultado->rowCount()!==0){
                  echo $resultado->rowCount()." fila eliminada";
                }else{
                  echo "<p>ninguna fila afectada<p>";
                }
            }catch(PDOException $e){
              echo $e->getMessage("fallaste");
           }
           }
        }
            crear($codigo,$nombres,$apellidos,$telefono,$email);
            actualizar($codigo,$nombres,$apellidos,$telefono,$email);
            eliminar($codigo,$nombres,$apellidos,$telefono,$email);
//comentario


      }
    
     ?>