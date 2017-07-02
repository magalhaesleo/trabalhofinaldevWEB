<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("location: ../index.php");
}
?>
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
        <div class="container">

            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php
                    if (isset($_SESSION['logado'])) {
                        echo "Bem vindo " . $_SESSION['userLogged']."<br>";
                        ?>
                        <a href="../Login/logout.php" style="font-size: 20px">Logout</a>
                        <?php
                    } else {
                        ?> 
                        <a href="Login/login.php" style="font-size: 20px">Login</a>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="menu">
                        <a href="../index.php">Leonardo NEWS</a>
                        <p>Contato: (49) 99970-2932</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form action="SalvaAviso.php" method="POST">
                        <label for="titulo">Aviso:</label>
                        <input type="text" name="tituloAviso" id="titulo" placeholder="Informe seu aviso aqui." <?php if(isset($_POST['aviso'])){ echo "value='{$_POST['aviso']}'"; } ?> required><br>
                        <label for="datainicio">Data Inicial:</label>
                        <input name="datainicio" id="datainicio" type="datetime-local" required>
                        <label for="datafinal">Data final:</label>
                        <input name="datafinal" id="datafinal" type="datetime-local" required><br>
                        <input type="hidden" name="autor" value="<?php echo $_SESSION['userLogged']; ?>">
                        <input type="button" name="cancel" value="Cancelar" style="float: right" onClick="window.location = '../index.php';" />
                        <input type="submit" style="float: right" value="Salvar">
                    </form>
                </div>
            </div>



        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="../js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="../js/bootstrap.min.js"></script>
    </body>

</html>