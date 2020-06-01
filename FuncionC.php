<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>FUNCIONES</title>
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
     <H1>FUNCIONES</H1>
     <form action="#" method="post">
     <input type="text" name="codigo" placeholder="Ingrese codigo" require><br>
     <input type="text" name="nombres"placeholder="Ingrese nombres"><br>
     <input type="text" name="apellidos"placeholder="Ingrese apellidos"><br>
     <input type="text" name="telefono" placeholder="Ingrese telefono"><br>
     <input type="email" name="correo" placeholder="Ingrese correo">
     <input type="submit" name="enviar" value="ENVIAR DATOS" >
     <input type="submit" name="actualizar" value="ACTUALIZAR ">
     <input type="submit" name="eliminar" value="ELIMINAR ">
     </form>
</body>
<?php
if(isset($_POST['enviar'])){
   $codigo=$_POST['codigo'];
   $nombres=$_POST['nombres'];
   $apellidos=$_POST['apellidos'];
   $telefono=$_POST['telefono'];
   $email=$_POST['correo'];
   echo "datos recibidos ";

   function crear($cod,$nom,$ape,$tel,$corr)
   
   {
   
    $dsn="mysql:host=localhost;dbname=udh";
     $user="root";
     $pass="";
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

  function actualizar()
 
  {

  }

  function eliminar()
 
  {
    
  }

     crear($codigo,$nombres,$apellidos,$telefono,$email);

}

?>
</html>