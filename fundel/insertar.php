<?php

$var0 = $_POST['id'];
$var1 = $_POST['nombre'];
$var2 = $_POST['correo'];
$var3 = $_POST['celular'];
$var4 = $_POST['ciudad'];
$var5 = $_POST['actividad'];

$servername = "31.220.105.141";
$username = "megam180";
$password = "luisfer061991";
$dbname = "megam180_Clientes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($var0 == 0){
	$sql = "INSERT INTO clientes_fundel (id, nombre, correo, telefono, ciudad, curso) VALUES (NULL, '".$var1."', '".$var2."', '".$var3."', '".$var4."', '".$var5."')";
	echo "Nuevo usuario ingresado correctamente";
}
else{
	
	$sql = "UPDATE clientes_fundel SET nombre =  '".$var1."', correo =  '".$var2."', telefono =  '".$var3."', ciudad =  '".$var4."', curso =  '".$var5."' WHERE  id =".$var0;
	echo "Dato modificado correctamente";	
	
}

if ($conn->query($sql) === TRUE) {
    echo "....OK";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header('Location: index.html');
exit;

?>