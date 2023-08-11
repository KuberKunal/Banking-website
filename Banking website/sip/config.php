
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login";

// Try connecting to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if ($conn === false) {
    die('Error: Cannot Connect');
}
?>
