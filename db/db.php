<?php
$host = 'localhost';
$user = 'root';       // ou outro se você definiu
$pass = '';           // coloque sua senha, se tiver
$db = 'projeto_poo'; // nome do banco de dados

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}
?>