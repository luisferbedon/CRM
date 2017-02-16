<?php

$id = $_POST['id'];

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

$sql = "SELECT * FROM clientes_fundel WHERE id = ".$id ;//primero en q record empezar, cuantos recorsds tomar
$result = $conn->query($sql);

$datos=array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$filas = array();
        array_push($filas, $row['nombre'], $row['correo'], $row['telefono'], $row['ciudad'], $row['curso']);
		array_push($datos,$filas);
    }
} else {
    //echo "0 results";
}

$myJSON = json_encode($datos);
echo $myJSON;

$conn->close();

?>