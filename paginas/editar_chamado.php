<!Doctype html>
<html>
    <head>
        <title>Help-Desk Sistem Abrir Chamado</title>
        <meta charset="UTF-8">
        <script src="../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../lib/bootstrap.min.js"></script>
    </head>
    <body>
<?php
        error_reporting (1);      
        //Usuário está logado? se não, redireciona para página de login(index.php



        //Conex�o com banco de dados
        include_once "../lib/conexaobd.php";

        if ($_POST != NULL && $_POST["editar_chamado"] != NULL) {
            $filtro = $_GET["filtro"];
            $nomeCliente = $_POST["nomeCliente"];
            $nomeEquipamento = $_POST["nomeEquipamento"];
            $status_chamado = $_POST["status_chamado"];             
            $descricao = $_POST["descricao"]; 
            
            
            $sql = "UPDATE chamados SET nome_cliente='$nomeCliente', nome_equipamento='$nomeEquipamento', status_chamado='$status_chamado', descricao='$descricao' WHERE protocolo=$filtro";

            $retorno = $con->query($sql);
            if ($retorno) {
                echo "<script>alert('Chamado editado com sucesso!'); location.href = 'chamados.php';</script>";
            } else {
                echo "<script>alert('Erro atender chamado!');</script>";
            }
        }

        if ($_GET != NULL && $_GET["filtro"] != "") {                                   
            $filtro = $_GET["filtro"];
            $sql = "SELECT * FROM chamados WHERE protocolo='$filtro'"; 
        } 

        $retorno = $con->query($sql);

        // Check query
        if ($retorno == false) {
            echo "<script>alert('Erro ao consultar no banco de dados!');</script>";
        }

        while ($registro = $retorno->fetch_array()) {
            $protocolo = $registro["protocolo"];
            $nome_cliente = $registro["nome_cliente"];
            $nome_equipamento = $registro["nome_equipamento"];  
            $status_chamado = $registro["status_chamado"];
            $descricao = $registro["descricao"];                                    
            $mat_solicitante = $registro["mat_solicitante"];
            $mat_atendente = $registro["mat_atendente"];  
        }     
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
                                                              
                    </ul>
                    <ul class="nav navbar-nav navbar-right">                        
                     
                      
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">


                </div>
                <div class="col-sm-8 text-left well">


                    <div align="center">
                        <h3>Abrir Chamado</h3>
                        <hr>
                        <form method='POST'>            
                            <table>
                                <tr>
                                    <th>Nome do Cliente</th>
                                    <td>
                                        <input type='text' value='<?php echo $nome_cliente; ?>' name='nomeCliente' required class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nome do equipamento</th>
                                    <td>
                                        <input type="text" value='<?php echo $nome_equipamento; ?>' name='nomeEquipamento' required="required" class="form-control"/>                              
                                    </td>
                                </tr>     

                                <tr>
                                    <th>Status</th>
                                    <td>                                       
                                          <select name='status_chamado' required="required" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value='Pendente' <?php if ($status_chamado == 'Pendente') echo 'selected'; ?>>Pendente</option>
                                            <option value='Em Reparo' <?php if ($status_chamado == 'Em Reparo') echo 'selected'; ?>>Em Reparo</option>
                                            <option value='Finalizado' <?php if ($status_chamado == 'Finalizado') echo 'selected'; ?>>Finalizado</option>                                 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Observação</th>
                                    <td>
                                        <textarea value='' name='descricao' maxlength='250' placeholder="Observações" class="form-control"><?php echo $descricao; ?></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <th>
                                        <input type='submit' value='Editar chamado' name='editar_chamado' class="form-control">
                                    </th>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>

                               
    </body>
</html>