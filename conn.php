<!DOCTYPE html>
<html>
<head>
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
	<form action="phpmysql.php" method="POST">
		<p>
		CODIGO:<br/>
		<input type="text" name="codigo">
		</p>

		<p>
		NOMBRES :<br/>
		<input type="text" name="nombres">
		</p>

		<p>
		APELLIDOS:<br/>
		<input type="text" name="apellidos">
		</p>

		<p>
		TELEFONO :<br/>
		<input type="text" name="telefono">
		</p>

		<p>
		CORREO :<br/>
		<input type="password" name="correo">
		</p>

		<p><input type="submit" value="enviar datos"></p>
		<?php
			
			if(isset($_POST['submit'])){
				 $codigo = $_POST['codigo'];
				 $nombres = $_POST['nombres'];
				 $apellidos = $_POST['apellidos'];
				$telefono = $_POST['telefono'];
				$correo = $_POST['correo'];


				$dsn="mysql:host=localhost;dbname=udh";
          $user="root";
            pass="";
   try{
     $conn=new PDO($dsn,$user,$pass);
 //    $query="select * from estudiantes";
 //    $resultado=$conn->prepare($query);
 //   $resultado->execute();
     $sql="INSERT INTO estudiantes(codigo,nombres,apellidos,telefono,correo) VALUES ('$codigo','$nombres','$apellidos','$telefono','$correo')";
     $resultado=$conn->prepare($sql);
     $resultado->execute($data);
     if ($resultado->rowCount()==1) {
     	echo "<p> se han guardado los datos </p>";
     }else {
     	echo "<p>hubo un error , no se gaurdo</p>";
     }

	</form>


</body>
</html>





















