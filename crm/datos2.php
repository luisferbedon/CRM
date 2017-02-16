<?php

$dat = $_GET['dat'];

$servername = "localhost";
$username = "megam180";
$password = "luisfer061991";
$dbname = "megam180_Empresas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Actividades FROM Actividades WHERE Empresa = '".$dat."'";
$result = $conn->query($sql);

$datos=array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        array_push($datos,$row['Actividades']);
    }
} else {
    //echo "0 results";
}

$myJSON = json_encode($datos);
echo $myJSON;

$conn->close();


?>