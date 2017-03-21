<!Doctype html>
<html>
    <head>
        <title>Help-Desk Sistem Usuários</title>
        <meta charset="UTF-8">
        <script src="../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../lib/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        //error_reporting(1);
        session_start();
        ?>

        <nav class="navbar navbar-inverse">
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
                        <li><a href="chamados.php">Chamados</a></li>
                        <li class="active"><a href="usuarios.php">Usuários</a></li>                        
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="usuarios.php?filtro=<?php echo $_SESSION["matricula"]; ?> "> <?php
                                echo $_SESSION["cargo"];
                                echo " " . $_SESSION["nome"];
                                ?></a></li>
                        <li><a href="sair.php"><span class="glyphicon glyphicon-log-out"></span> Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <?php
                    //Só técnico poderá abrir chamados
                    if ($_SESSION["cargo"] == "Supervisor") {
                        echo "<a href='cadastro.php' class='btn btn-primary btn-block'>Cadastrar Usuários</a>";
                    }
                    ?>
                </div>
                <div class="col-sm-8 text-left">

                    <div class="well">                

                        <!--Cabaçalho da tablela campo para filtro-->
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form method="GET">
                                    <div class="input-group">
                                        <input id="filtro" type="text" class="form-control" placeholder="*.*" name="filtro">
                                        <span class="input-group-btn">
                                            <input type="submit" class="btn btn-default" value="Filtrar">
                                        </span>
                                    </div>
                                </form>   
                            </div>
                            <table id="tabelaUsuarios" class="table">
                                <tr class="info">
                                    <th>Matrícula</th>
                                    <th>Cargo</th>  
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Sexo</th>                              
                                </tr>                

                                <?php
                                //error_reporting (1);    
                                //Usuário está logado? se não, redireciona para página de login(index.php
                                session_start();
                                if ($_SESSION["logado"] != "OK") {
                                    header("Location: ../index.php");
                                }
                                //echo $_SESSION["cargo"];
                                //Conex�o com banco de dados
                                include_once "../lib/conexaobd.php";

                                if ($_POST != NULL && $_POST["remove"] != NULL) {
                                    $matricula = $_POST["remove"];

                                    $sql = "UPDATE usuarios SET ativo=0 WHERE matricula=$matricula";

                                    $retorno = $con->query($sql);
                                    if ($retorno) {
                                        echo "<script>alert('Usuário removido com sucesso!'); location.href = 'usuarios.php';</script>";
                                    } else {
                                        echo "<script>alert('Erro ao remover usuário!');</script>";
                                    }
                                }

                                if ($_GET != NULL && $_GET["filtro"] != "") {
                                    $filtro = $_GET["filtro"];
                                    $sql = "SELECT * FROM usuarios WHERE
                         (matricula LIKE '%$filtro%' or
                         nome LIKE '%$filtro%'  or
                         email LIKE '%$filtro%' or
                         cargo LIKE '%$filtro%' or
                         sexo LIKE '%$filtro%')  and                     
                         ativo=1";
                                    echo "<script>$('#filtro').val('$filtro');</script>";
                                } else {
                                    $sql = "SELECT * FROM usuarios WHERE ativo=1";
                                }

                                $retorno = $con->query($sql);

                                // Check query
                                if ($retorno) {
                                    while ($registro = $retorno->fetch_array()) {
                                        $matricula = $registro["matricula"];
                                        $nome = $registro["nome"];
                                        $email = $registro["email"];
                                        $cargo = $registro["cargo"];
                                        $sexo = $registro["sexo"];

                                        echo "     
                        <tr>
                        <td>$matricula</td>
                        <td>$cargo</td>
                        <td>$nome</td>
                        <td>$email</td>                        
                        <td>$sexo</td>                               
                    ";

                                        //Se for supervisor disponibiliza as opções Editar e apagar usuários
                                        if ($_SESSION['cargo'] == 'Supervisor') {
                                            echo "  
                                    <th>
                                        <a id='editarUsuario' href='editar.php?mat=$matricula' class='glyphicon glyphicon-pencil'></a>
                                    </th>  
                                                                        
                                    <th>
                                        <form method='POST'>
                                            <button id='removerUsuario' name='remove' value='$matricula' class='glyphicon glyphicon-remove-sign'></button>                                
                                        </form>
                                    </th>
                                <tr>";
                                        } else {
                                            echo "  </tr>";
                                        }
                                    }
                                } else {
                                    echo "<script>alert('Erro ao consultar no banco de dados!');</script>";
                                }

                                echo "</table> </div> </div>";
                                ?>


                        </div>
                        <div class="col-sm-2 sidenav">
                        
                    </div>
                </div>


                <footer class="container-fluid text-center">
                    <p>AJB</p>
                </footer> 
                </body>
                </html>