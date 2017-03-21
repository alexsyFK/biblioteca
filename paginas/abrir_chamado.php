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
                                        <input type='text' value='' name='nomeCliente' required class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nome do equipamento</th>
                                    <td>
                                        <input type="text" name='nomeEquipamento' required="required" class="form-control"/>                              
                                    </td>
                                </tr>     

                                <tr>
                                    <th>Status</th>
                                    <td>                                       
                                          <select name='status_chamado' required="required" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value='Pendente'>Pendente</option>
                                            <option value='Em Reparo'>Em Reparo</option>
                                            <option value='Finalizado'>Finalizado</option>                                 
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Observação</th>
                                    <td>
                                        <textarea name='descricao' maxlength='250' placeholder="Observações" class="form-control"></textarea>
                                    </td>
                                </tr>

                                <tr>
                                    <td></td>
                                    <th>
                                        <input type='submit' value='Abrir chamado' name='encaminharChamado' class="form-control">
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

        <footer class="container-fluid text-center">
            <p>AJB</p>
        </footer> 


        <?php
        //Conex�o com banco de dados
        include_once "../lib/conexaobd.php";

        if ($_POST != NULL) {
            $nomeCliente = $_POST["nomeCliente"];
            $nomeEquipamento = $_POST["nomeEquipamento"];
            $status_chamado = $_POST["status_chamado"];             
            $descricao = $_POST["descricao"]; 

            $sql = "INSERT INTO chamados(nome_cliente, nome_equipamento, status_chamado, descricao)
                                Values('$nomeCliente', '$nomeEquipamento', '$status_chamado', '$descricao')";

            $retorno = $con->query($sql);

            if ($retorno) {
                echo "<script>alert('Chamado aberto com sucesso!');location.href = 'chamados.php?filtro=$codigoEquipamento';</script>";
            } else {
                echo "<script>alert('Erro ao abrir chamado!');</script>";
            }
        }
        ?>
    </body>
</html>