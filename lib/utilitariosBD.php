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
    } else {
        return $con;
    }
}

function insertUsuario($tipo_usuario, $nomeusuario, $CPF, $senha) {
    $sql = "INSERT INTO Usuario(TipoUsuario_idTipoUsuario, Nome, CPF, Senha) VALUES ('$tipo_usuario', '$nomeusuario', '$CPF', '$senha');";

    $con = getConecxaoDB();
    $retorno = $con->query($sql);

    return $retorno;
}

function getUsuarios($id = null) {
    if ($id == null) {
        $sql = "SELECT * FROM Usuario INNER JOIN TipoUsuario ON Usuario.TipoUsuario_idTipoUsuario = TipoUsuario.idTipoUsuario;";
    } else {
        $sql = "SELECT * FROM Usuario INNER JOIN TipoUsuario ON Usuario.TipoUsuario_idTipoUsuario = TipoUsuario.idTipoUsuario WHERE idUsuario = {$id};";
    }

    $con = getConecxaoDB();
    $retorno = $con->query($sql);

    return $retorno;
}

function deleteUsuario($id) {
    $sql = "DELETE FROM Usuario WHERE idUsuario = {$id};";

    $con = getConecxaoDB();
    $retorno = $con->query($sql);

    return $retorno;
}

function updateUsuario($id = null, $tipo_usuario, $nomeusuario, $CPF, $senha) {
    if ($id != null) {
        $sql = "UPDATE Usuario SET TipoUsuario_idTipoUsuario = '{$tipo_usuario}', Nome = '{$nomeusuario}', CPF = '{$CPF}', Senha = '{$senha}' WHERE idUsuario = '{$id}';";
        $con = getConecxaoDB();
        $retorno = $con->query($sql);

        return $retorno;
    }
}

/*
$sql = "SELECT * FROM usuarios WHERE
                         (matricula LIKE '%$filtro%' or
                         nome LIKE '%$filtro%'  or
                         email LIKE '%$filtro%' or
                         cargo LIKE '%$filtro%' or
                         sexo LIKE '%$filtro%')  and                     
                         ativo=1";
 
  */