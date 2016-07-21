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

	$sql = "select count(1) from test where id=".str_replace('\"','',$_GET["digits"]);
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		while($row = $result->fetch_assoc()) {
			if($row["count(1)"]>0)
			{
				$file = fopen("missed calls.html","a");
				fwrite($file,"CallSid:".$_GET["CallSid"]."From:".$_GET["From"]."<br/>\n");
				fclose($file);
				$sql = "INSERT INTO calldetails VALUES ('".$_GET["CallSid"]."',".str_replace('\"','',$_GET["digits"]).")";
				$resultat = $conn->query($sql);
				header( "HTTP/1.1 200 OK" );
			}
			else {
				header( "HTTP/1.1 302 Found" );
			}
		}
	}else {
		header( "HTTP/1.1 302 Found" );
	}
	
	$conn->close();
?>