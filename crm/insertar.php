<?php

$servername = "localhost";
$username = "megam180";
$password = "luisfer061991";
$dbname = "megam180_Clientes";

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$ciudad = $_POST['ciudad'];
$empresa = $_POST['empresa'];
$actividad = $_POST['actividad'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($id == 0){
	$sql = "INSERT INTO tabla_clientes (id, Nombre, Correo, Celular, Ciudad, Empresa, Actividad) VALUES (NULL, '".$nombre."', '".$correo."', '".$celular."', '".$ciudad."', '".$empresa."', '".$actividad."')";
	echo "Nuevo usuario ingresado correctamente";
}
else{
	
	$sql = "UPDATE tabla_clientes SET Nombre =  '".$nombre."', Correo =  '".$correo."', Celular =  '".$celular."', Ciudad =  '".$ciudad."', Empresa =  '".$empresa."', Actividad = '".$actividad."' WHERE  id =".$id;
	echo "Dato modificado correctamente";	
	
}




if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario ingresado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: index.html');
exit;

?>