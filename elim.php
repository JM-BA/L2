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
     <H1>eliminar</H1>
     <form action="#" method="post">
     <input type="text" name="id" placeholder="Ingrese id del estudiante" require>
     <input type="submit" name="eliminar" value="ELIMINAR ">
     </form>
</body>
<?php
if(isset($_POST['eliminar'])){
   $id=$_POST['id'];
   echo "dato recibidos: <br>";

 $dsn="mysql:host=localhost;dbname=udh";
 $user="root";
 $pass="";

 function eliminar($id){

 
try{
     $conn=new PDO($dsn,$user,$pass);
     $data=[
      
     ];
      $sql1="delete from estudiantes where id=$id ";
      $sql2="select nombre from estudiantes where id=$id";
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
 eliminar($id);
}

?>
</html>