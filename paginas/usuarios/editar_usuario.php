<!Doctype html>
<html>
    <head>
        <title>Cadastro de Usuários</title>
           <meta charset="UTF-8">
        <script src="../../lib/jquery-3.1.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../../lib/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../../style/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="../../lib/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
        include_once '../../lib/componentesPagina.php';
       include_once '../../lib/utilitariosBD.php';
        echo getNav();

        if (isset($_POST["cadastrar_usuario"]) && !empty(($_GET["idUsuario"]))) {
            $idUsuarios = $_GET["idUsuario"];
            $nomeusuario = $_POST["nomeusuario"];
            $CPF = $_POST["CPF"];
            $tipo_usuario = $_POST["tipou_usuario"];
            $senha = $_POST["senha"];

            $retornoDB = updateUsuario($idUsuarios, $tipo_usuario, $nomeusuario, $CPF, $senha);
            if ($retornoDB) {                
                echo "<script>alert('Dados de {$nomeusuario} atualizados com sucesso!');location.href = 'usuarios.php?filtro=$idUsuarios';</script>";
            } else {
                echo "<script>alert('Erro ao abrir atualizar dados do usuário {$nomeusuario}!');</script>";
            }
        }

        if (isset($_GET["idUsuario"]) && !empty(($_GET["idUsuario"]))) {
            $idUsuarios = $_GET["idUsuario"];
            $retornoDB = getUsuarios($idUsuarios);

            if ($retornoDB) {
                while ($registro = $retornoDB->fetch_array()) {
                    $nomeusuario = $registro["Nome"];
                    $CPF = $registro["CPF"];
                    $Tipo = $registro["Tipo"];
                    $idUsuario = $registro["idUsuario"];
                    $idTipoUsuario = $registro["idTipoUsuario"];
                }
            }
        }
        ?>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">


                </div>
                <div class="col-sm-8 text-left well">


                    <div align="center">
                        <h3>Cadastro de Usuários</h3>
                        <hr>
                        <form name="editar_usuario" method='POST'>            
                            <table>
                                <tr>
                                    <th>Nome</th>
                                    <td><input type='text' value='<?php echo $nomeusuario ?>' name='nomeusuario' required class="form-control"></tr>

                                <tr>
                                    <th>CPF</th>
                                    <td><input type="number" value="<?php echo $CPF ?>" name='CPF' required="required" class="form-control"/></td>
                                </tr>     

                                <tr>
                                    <th>Tipo</th>
                                    <td>                                       
                                        <select name='tipou_usuario' required="required" class="form-control">
                                            <option value="">Selecione</option>                                            
                                            <option value="1" <?php if ($idTipoUsuario == 1) echo "selected" ?>>Administrador</option>
                                            <option value="2" <?php if ($idTipoUsuario == 2) echo "selected" ?>>Cliente</option>                                            
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

        <?php echo getRodape(); ?>        

    </body>
</html>