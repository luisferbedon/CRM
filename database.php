<?php

$operation = $_POST['operacion'];
$id = $_POST['id'];
$data = $_POST['data'];

$servername = "localhost";
$username = "megam180";
$password = "luisfer061991";
$dbname = "megam180_Clientes";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($operation == 'contactos'){
	$sql = "SELECT * FROM clientes_fundel WHERE disponible = 1" ;
	$result = $conn->query($sql);
	$datos=array();
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			array_push($datos,$row);
    	}
	} 
	$myJSON = json_encode($datos);
	echo $myJSON;
}

if($operation == 'id_contacto'){
	$sql = "SELECT * FROM clientes_fundel WHERE id = ".$id;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$myJSON = json_encode($row);
	echo $myJSON;
}

if($operation == 'contact_disponible'){
	$sql = "UPDATE clientes_fundel SET disponible = '0' WHERE id =".$id;
	$result = $conn->query($sql);
	$myJSON = json_encode();
	echo $myJSON;
}

if($operation == 'procesados'){
	$sql = "SELECT * FROM tabla_vendedores WHERE id IN ( SELECT MAX( id ) FROM tabla_vendedores GROUP BY old_id ) AND transaccion =  'process' ORDER BY f_proxima ASC " ;
	$result = $conn->query($sql);
	$datos=array();
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			array_push($datos,$row);
    	}
	} 
	$myJSON = json_encode($datos);
	echo $myJSON;
}

if($operation == 'process_insertar'){
	
	$sql = "INSERT INTO tabla_vendedores (nombre, edad, correo, telefono, ciudad, curso, f_inicio, fecha, f_proxima, forma_contacto, notas, transaccion, vendedor, old_id) VALUES ('".$data['nombre']."', '".$data['edad']."', '".$data['correo']."', '".$data['telefono']."', '".$data['ciudad']."', '".$data['curso']."', '".$data['f_inicio']."', '".$data['fecha']."', '".$data['f_proxima']."', '".$data['forma_contacto']."', '".$data['notas']."', '".$data['transaccion']."', '".$data['vendedor']."', '".$data['old_id']."');";
	$result = $conn->query($sql);
	$myJSON = json_encode();
	echo $myJSON;
}

if($operation == 'id_proceso'){
	$sql = "SELECT * FROM tabla_vendedores WHERE old_id = ".$id." ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$myJSON = json_encode($row);
	echo $myJSON;
}

if($operation == 'accept_insertar'){
	$sql = "UPDATE tabla_vendedores SET transaccion='accept' WHERE old_id='".$id."' ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$myJSON = json_encode();
	echo $myJSON;
}

if($operation == 'aceptados'){
	$sql = "SELECT * FROM tabla_vendedores WHERE transaccion = 'accept' ORDER BY f_proxima DESC " ;
	$result = $conn->query($sql);
	$datos=array();
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			array_push($datos,$row);
    	}
	} 
	$myJSON = json_encode($datos);
	echo $myJSON;
}

if($operation == 'reject_insertar'){
	$sql = "UPDATE tabla_vendedores SET transaccion='reject' WHERE old_id='".$id."' ORDER BY id DESC LIMIT 1";
	$result = $conn->query($sql);
	$myJSON = json_encode();
	echo $myJSON;
}

if($operation == 'rechazados'){
	$sql = "SELECT * FROM tabla_vendedores WHERE transaccion = 'reject' ORDER BY f_proxima DESC " ;
	$result = $conn->query($sql);
	$datos=array();
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			array_push($datos,$row);
    	}
	} 
	$myJSON = json_encode($datos);
	echo $myJSON;
}


//UPDATE tabla_vendedores SET transaccion='accept' WHERE old_id='".$id."' ORDER BY id DESC LIMIT 1;

/*

if($operation == 'reject_insertar'){
	$sql = "UPDATE clientes_fundel SET transaccion = 'reject' WHERE id =".$id;
	$result = $conn->query($sql);
	$myJSON = json_encode();
	echo $myJSON;
}

*/

$conn->close();

//"SELECT * FROM tabla_vendedores WHERE transaccion = 'process' AND disponible =1 ORDER BY f_proxima DESC " ;

//$datos=array($data['nombre'], $data['edad'], $data['correo'], $data['telefono'], $data['ciudad'], $data['curso'], $data['f_inicio'], $data['fecha'], $data['f_proxima'], $data['forma_contacto'], $data['notas'], $data['transaccion'], $data['vendedor']);

?>