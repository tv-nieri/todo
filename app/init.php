<?php
# Inicia a sessão do user.
session_start();

# Seta a sessão para o user de id 1.
$_SESSION['user_id'] = 1;

# Dados do banco.
$host="localhost";
$port=3306;
$socket="";
$user="root";
$password="";
$dbname="todo";

# Cria a conexão com o banco de dados.
$conn = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Could not connect to the database server' . mysqli_connect_error());

/* checa se a conexão funciona, se for falso, Retorna erro. */
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

# Se não houver nenhum user na sessão, retorna erro.
if (!isset($_SESSION['user_id'])) {
    die('Você não está logado');
}

//Todos os items do user 1.
$sql = "SELECT id, name, done FROM items WHERE user=1";
$result = $conn->query($sql);
 ?>
