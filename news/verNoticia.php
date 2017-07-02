<?php
if (isset($_POST['id_noticia'])) {
    include '../Data/ConnectDataBase.php';
    $idnoticia = $_POST["id_noticia"];
    $sql = "select titulo, conteudo, autor from news where id_noticia='$idnoticia'";
    $result = mysqli_query($DBConn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
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
        <title><?php echo $row['titulo']; ?></title>

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
                    session_start();
                    if (isset($_SESSION['logado'])) {
                        echo "Bem vindo " . $_SESSION['userLogged'];
                        ?>
                        <br><a href="../Login/logout.php" style="font-size: 20px;">Logout</a>
                        <?php
                    } else {
                        ?>
                        <a href="../Login/login.php" style="font-size: 20px;">Login</a>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="menu">
                        <a href="../index.php">Leonardo NEWS</a>
                        <!--<h3>Leonardo NEWS</h3>-->
                        <p>Contato: (49) 99970-2932</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h5 class="text-left">Autor da noticia: <?php echo $row['autor']; ?></h5>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1 class="text-info text-center"><?php echo $row['titulo']; ?></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><?php echo $row['conteudo']; ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <br><br><br>
                    <?php
                    if (isset($_SESSION['logado'])) {
                        ?>
                        <form action="excluirNoticia.php" method="post">
                            <button type="submit" class="btn" style="float: right;" name="id_noticia" value="<?php echo $idnoticia; ?>" class="btn-link">Excluir esta noticia?</button>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="../js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="../js/bootstrap.min.js"></script>
    </body>
    <? mysqli_close($DBConn); ?>
</html>