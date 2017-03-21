<?php
//Cria conex�o com banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "helpdesksistemdb";

$con = new mysqli($servername, $username, $password, $database);

// Checa a cone��o com o banco de dados
if ($con->connect_errno) {
    echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
}

