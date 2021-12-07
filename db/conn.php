<?php
//pieslēgšanās informācija
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "end_project";

// pieslēguma izveidošana datubāzei
$conn = new mysqli($servername, $username, $password, $dbname);
// pieslēguma pārbaude
if ($conn->connect_error) {
  die("Pieslēgums neizdevās: " . $conn->connect_error);
}
?>