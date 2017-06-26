<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Noticias</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/estilos.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
        include '../Data/ConnectDataBase.php';
        ?>
        <div class="container">

            <div class="row">
                <div class="col-md-11"></div>
                <?php
                if (isset($_SESSION['logado'])) {
                    echo '<div class="col-md-1 col-md-pull-1">
                        <a href="Login/logout.php" style="font-size: 20px">Logout</a>
                        </div>';
                } else {
                    echo '<div class="col-md-1 col-md-pull-1">
                    <a href="Login/login.php" style="font-size: 20px">Login</a>
                </div>';
                }
                ?>

            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="menu">
                        <h3>Leonardo NEWS</h3>
                        <p>Contato: (49) 99970-2932</p>
                    </div>
                </div>
            </div>
            <form action="/action_page.php">
                Titulo: <input type="text" name="titulo" value="Titulo"><br>
                Mensagem: <input type="text" name="LastName" value="Mouse"><br>
                <input type="submit" value="Submit">
            </form>



        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="../js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>