<!Doctype html>
<html>
    <head>
        <title>Cadastro de Usuários</title>
        <meta charset="UTF-8">
        <script src="../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../lib/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include_once './tema.php';
        echo getNav();
        ?>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">


                </div>
                <div class="col-sm-8 text-left well">


                    <div align="center">
                        <h3>Cadastro de Usuários</h3>
                        <hr>
                        <form method='POST'>            
                            <table>
                                <tr>
                                    <th>Nome</th>
                                    <td><input type='text' value='' name='nomeusuario' required class="form-control"></tr>

                                <tr>
                                    <th>CPF</th>
                                    <td><input type="number" name='CPF' required="required" class="form-control"/></td>
                                </tr>     

                                <tr>
                                    <th>Tipo</th>
                                    <td>                                       
                                        <select name='tipou_usuario' required="required" class="form-control">
                                            <option value="">Selecione</option>
                                            <option value='1'>Administrador</option>
                                            <option value='2'>Cliente</option>                                            
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Senha</th>
                                    <td><input type="password" name='senha' required="required" class="form-control"/></td>
                                </tr>   

                                <tr>
                                    <td></td>
                                    <th>
                                        <input type='submit' value='cadastrar' name='cadastrar_usuario' class="form-control">
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

        <?php
        //Conexo com banco de dados
        include_once "../lib/utilitariosBD.php";
        if ($_POST != NULL) {
            $nomeusuario = $_POST["nomeusuario"];
            $CPF = $_POST["CPF"];
            $tipou_usuario = $_POST["tipou_usuario"];
            $senha = $_POST["senha"];

            $sql = "INSERT INTO Usuario(TipoUsuario_idTipoUsuario, Nome, CPF, Senha) VALUES ('$tipou_usuario', '$nomeusuario', '$CPF', '$senha');";

            $con = getConecxaoDB();
            $retorno = $con->query($sql);

            if ($retorno) {
                echo "<script>alert('Usuário {$nomeusuario} cadastrado com sucesso!');location.href = 'chamados.php?filtro=$codigoEquipamento';</script>";                
            } else {
                echo "<script>alert('Erro ao abrir chamado!');</script>";
            }

            /*while ($registro = $retorno->fetch_array()) {
                $idTipoUsuario = $registro["idTipoUsuario"];
                echo $idTipoUsuario . "---------------------------------------";
            }*/
        }
        echo getRodape();
        ?>        

    </body>
</html>