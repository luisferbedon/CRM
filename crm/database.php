<?php

$servername = "localhost";
$username = "megam180";
$password = "luisfer061991";
$dbname = "megam180_Clientes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tabla_clientes" ;

$result = $conn->query($sql);

$datos=array();

//id, Nombre, Correo, Celular, Ciudad, Empresa, Actividad

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
		$filas = array();
        array_push($filas, $row['id'], $row['Nombre'], $row['Correo'], $row['Celular'], $row['Ciudad'], $row['Empresa'], $row['Actividad'], $row['fecha']);
		array_push($datos,$filas);
    }
} else {
    //echo "0 results";
}

$myJSON = json_encode($datos);
echo $myJSON;

$conn->close();

?>