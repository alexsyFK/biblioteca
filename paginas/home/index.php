<!Doctype html>
<html>
    <head>
        <title>Home</title>
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
        $opcoesDoMenu = '<li><a href="../home/index.php">Home</a></li>
                    <li><a href="../usuarios/usuarios.php">Usuários</a></li>                    
                    <li><a href="../livros/cadastrolivros.php">Cadastrar de Livros</a></li>
                    <li><a href="../livros/consultalivros.php">Consultar Livros</a></li>';
        echo getNav($opcoesDoMenu);
        ?>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">


                </div>
                <div class="col-sm-8 text-left well">


                    <div align="center">
                        <h3>Home</h3>
                        <hr>

                    </div>

                </div>
                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>

        <?php echo getRodape(); ?>        

    </body>
</html>