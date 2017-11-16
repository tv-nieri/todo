<?php
session_start();

$_SESSION['user_id'] = 1;

$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="todo";

$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

/* check connection */
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (!isset($_SESSION['user_id'])) {
    die('Você não está logado');
}

//Todos os items do user 1.
$sql = "SELECT id, name, done FROM items WHERE user=1";
$result = $conn->query($sql);
 ?>
