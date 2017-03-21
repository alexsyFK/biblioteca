<!Doctype html>
<html>
    <head>
        <title>Help-Desk Sistem Chamado</title>
        <meta charset="UTF-8">
        <script src="../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../lib/bootstrap.min.js"></script>                        
    </head>
    <body>        


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
                        <li class="active"><a href="chamados.php">Chamados</a></li>
                                              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">                        

                       
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">                    
                    <a href='abrir_chamado.php' class='btn btn-primary btn-block'>Cadastrar Chamados</a>                    
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
                            <table class="table">
                                <tr class="info">
                                    <th>ID</th>
                                    <th>Nome do Clinte</th>
                                    <th>Status</th> 
                                    <th>Smartphone</th>                                            
                                    <th >Observação</th>                                                
                                </tr>                

                                <?php
                                error_reporting(1);
                                //Usuário está logado? se não, redireciona para página de login(index.php
                                //Conex�o com banco de dados
                                include_once "../lib/conexaobd.php";

                                if ($_POST != NULL && $_POST["atender_chamado"] != NULL) {
                                    $protocolo = $_POST["atender_chamado"];
                                    $status_chamado = $_POST["status_chamado"];
                                    $solucao = $_POST["solucao"];

                                    $sql = "UPDATE chamados SET status_chamado='$status_chamado', mat_atendente='$matricula', solucao_problema='$solucao' WHERE protocolo=$protocolo";

                                    $retorno = $con->query($sql);
                                    if ($retorno) {
                                        echo "<script>alert('Chamado atendido com sucesso!'); location.href = 'chamados.php';</script>";
                                    } else {
                                        echo "<script>alert('Erro atender chamado!');</script>";
                                    }
                                }

                                if ($_GET != NULL && $_GET["id"] != NULL) {
                                    $id = $_GET["id"];                                  

                                    $sql = "DELETE FROM chamados WHERE protocolo=$id";

                                    $retorno = $con->query($sql);
                                    if ($retorno) {
                                        echo "<script>alert('Chamado Excluido com sucesso!'); location.href = 'chamados.php';</script>";
                                    } else {
                                        echo "<script>alert('Erro Excluir chamado!');</script>";
                                    }
                                }




                                if ($_GET != NULL && $_GET["filtro"] != "") {
                                    $filtro = $_GET["filtro"];
                                    $sql = "SELECT * FROM chamados WHERE
                         protocolo LIKE '%$filtro%' or
                         nome_equipamento LIKE '%$filtro%' or
                         nome_cliente LIKE '%$filtro%' or
                         status_chamado LIKE '%$filtro%' or
                         mat_solicitante LIKE '%$filtro%'  or 
                         mat_atendente LIKE '%$filtro%'";

                                    echo "<script>$('#filtro').val('$filtro');</script>";
                                } else {
                                    $sql = "SELECT * FROM chamados";
                                }

                                $retorno = $con->query($sql);

                                // Check query
                                if ($retorno == false) {
                                    echo "<script>alert('Erro ao consultar no banco de dados!');</script>";
                                }

                                while ($registro = $retorno->fetch_array()) {
                                    $protocolo = $registro["protocolo"];
                                    $nome_cliente = $registro["nome_cliente"];
                                    $status_chamado = $registro["status_chamado"];
                                    $nome_equipamento = $registro["nome_equipamento"];
                                    $descricao = $registro["descricao"];

                                    echo "  
                                            <td>$protocolo</td>
                                            <td>$nome_cliente</td> 
                                            <td>$status_chamado</td>
                                            <td>$nome_equipamento</td>  
                                            <td><p style='width: 90px; word-wrap: break-word;'>$descricao</p></td>                                            
                                                <th><a href=editar_chamado.php?filtro=$protocolo class='btn btn-success'>Editar</a></th>                                                    </th>
                                                <th><a href=chamados.php?id=$protocolo class='btn btn-success'>Apagar</a> </th>
                                                </tr>


                                        ";
                                }

                                echo "</table> </div> </div>";
                                ?>


                        </div>
                        <div class="col-sm-2 sidenav">
                            <div class="well">
                                <img  src="../img/chamados.png">
                            </div>                            
                        </div>
                    </div>
                </div>


                <footer class="container-fluid text-center">
                    <p>AJB</p>
                </footer> 


                </body>
                </html>