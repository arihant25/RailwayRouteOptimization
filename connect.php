<?php
$servername = "localhost";
$username = "root";
$password = "ari";
$db ="login";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
	//echo 'suuu';
}
//echo "Connected successfully";
?>
