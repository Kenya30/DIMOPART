<?php
$servername="localhost";
$username="root";
$password="";
$dbname="dispositivos";

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
    die ("Conection failed".$conn->connect_error);
}

?>
 