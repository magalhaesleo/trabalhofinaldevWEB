<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Pagina de Login</title>

        <!-- Bootstrap -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1><center>LOGIN</center></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <form method="post" action="ValidaUser.php">
                        <input type="text" name="login" placeholder="Username" required="required" style="align-content: center"/>
                        <br>
                        <input type="password" name="pass" placeholder="Password" required="required" />
                        <br>
                        <button type="submit" class="btn btn-primary btn-block btn-large">Vamos lá!</button>
                    </form>
                    <?php
                    session_start();
                    if (isset($_SESSION['invalidUser'])) {
                        echo "<div class='alert alert-warning alert-dismissible fade in' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button>
                        <strong>Senha Invalida! Tente Novamente</strong>
                     </div>";
                    }
                    session_destroy();
                    ?>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>



        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="../js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
</html>