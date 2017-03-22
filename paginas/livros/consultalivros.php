<!Doctype html>
<html>
    <head>
        <title>Usuários</title>
        <meta charset="UTF-8">
        <script src="../../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../lib/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        //error_reporting(1);
        //session_start();
        include_once '../../lib/componentesPagina.php';
         $opcoesDoMenu = '<li><a href="../home/index.php">Home</a></li>
                    <li><a href="../usuarios/usuarios.php">Usuários</a></li>                    
                    <li><a href="../livros/cadastrolivros.php">Cadastrar de Livros</a></li>
                    <li><a href="../livros/consultalivros.php">Consultar Livros</a></li>';
        echo getNav($opcoesDoMenu);
        ?>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">
                    <a href="cadastrousuarios.php" class="btn btn-primary" >Cadastrar usuarios</a>
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
                                    <th>Nome</th>
                                    <th>Perfil</th>  
                                    <th>CPF</th>                                                                                              
                                </tr>                

                                <?php
                                include_once '../../lib/utilitariosBD.php';
                                                                
                                if (isset($_POST["deleteUsuario"])) {
                                    $id = $_POST["deleteUsuario"];
                                    $nomeusuario = $_POST["nomeusuario"];
                                    
                                    $retornoDB = deleteUsuario($id);
                                    if ($retornoDB) {
                                        echo "<script>alert('Usuário {$nomeusuario} excluído com sucesso!');location.href = 'usuarios.php';</script>";                                        
                                    } else {
                                        echo "<script>alert('Erro ao excluir o usuário {$nomeusuario}!');</script>";
                                    }
                                }

                                $retornoDB = getUsuarios();
                                // Check query                                
                                if ($retornoDB) {
                                    while ($registro = $retornoDB->fetch_array()) {
                                        $nomeusuario = $registro["Nome"];
                                        $CPF = $registro["CPF"];
                                        $Tipo = $registro["Tipo"];
                                        $idUsuario = $registro["idUsuario"];
                                        $idTipoUsuario = $registro["idTipoUsuario"];
                                        echo "     
                                            <tr>
                                            <td>{$nomeusuario}</td>                                            
                                            <td>{$Tipo}</td>
                                            <td>{$CPF}</td>                                                                       
                                        ";

                                        //$idTipoUsuario = 1 (admin) 
                                        //$idTipoUsuario = 2 (Cliente) 
                                        if (true) {
                                            echo "  
                                                <th>
                                                    <a id='editarUsuario' href='editar_usuario.php?idUsuario={$idUsuario}' class='glyphicon glyphicon-pencil'></a>
                                                </th>  

                                                <th>
                                                    <form method='POST'>
                                                        <button id='removerUsuario' name='deleteUsuario' value='{$idUsuario}' class='glyphicon glyphicon-remove-sign'></button>                                
                                                        <input name='nomeusuario' type='hidden' value='{$nomeusuario}' />
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


                    </body>
                    </html>