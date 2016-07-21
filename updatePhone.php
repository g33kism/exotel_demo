<?php
	$servername = "mysql17.000webhost.com";
	$username = "a3511597_root";
	$password = "root123";

	// Create connection
	$conn = new mysqli($servername, $username, $password,"a3511597_root");

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "update test set phone_number=".str_replace('\"','',$_GET["digits"])." where id = (select c.id from calldetails c where c.CallSid='".$_GET["CallSid"]."')";
	$resultat = $conn->query($sql);
	if ($resultat == TRUE) {
		header( "HTTP/1.1 200 OK" );
	} else {
		header( "HTTP/1.1 302 Found" );
	}

	$conn->close();
?>