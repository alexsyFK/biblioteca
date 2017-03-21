<?php

function getNav(){
return '<nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="navbar-brand" src="../img/GATEIIlogo.png"/>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="cadastrousuarios.php">Cadastro de Usuários</a></li>
                    <li><a href="cadastrolivros.php">Cadastro de Livros</a></li>
                    <li><a href="consultalivros.php">Consultar Livros</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">                        


                </ul>
            </div>
        </div>
    </nav>';
}

function getRodape(){
    return  '<footer class="container-fluid text-center">
                <p>AJB</p>
            </footer>';
}
?>