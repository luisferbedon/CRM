<?php

$var0 = $_POST['id'];

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

$sql = "DELETE FROM tabla_clientes WHERE id = ".$var0;

if ($conn->query($sql) === TRUE) {
    $status = "Dato borrado exitosamente";
} else {
    $status = "Error: " . $sql . "<br>" . $conn->error;
}

$myJSON = json_encode($status);
echo $myJSON;

$conn->close();


?>