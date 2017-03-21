<?php

//Cria conex�o com banco de dados
function getConecxaoDB() {
    $servername = "localhost";
    $username = "root";
    $password = "123456";
    $database = "biblioteca";

    $con = new mysqli($servername, $username, $password, $database);

// Checa a conexo com o banco de dados
    if ($con->connect_errno) {
        echo "<script>alert('Erro ao conectar com o banco de dados!');</script>";
    }else{
        return $con;
    }
}
