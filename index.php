<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- As 3 meta tags acima *devem* vir em primeiro lugar dentro do `head`; qualquer outro conteúdo deve vir *após* essas tags -->
        <title>Noticias</title>

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body>
        <?php
        session_start();
//        if (!isset($_SESSION['logado'])) {
//            header("location: Login/login.php");
//            exit;
//        }
        ?>
        <div class="container">

            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <?php
                    if (isset($_SESSION['logado'])) {
                        echo "Bem vindo " . $_SESSION['userLogged'] . "<br>";
                        ?>
                        <a href="Login/logout.php" style="font-size: 20px">Logout</a>
                        <?php
                        if (isset($_SESSION['adminUser'])) {
                            ?>
                            <br><a href="login/novoUsuario.php">Criar um novo Usuário</a>
                            <?php
                        }
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
                        <a href="index.php">Leonardo NEWS</a>
                        <!--<h3>Leonardo NEWS</h3>-->
                        <p>Contato: (49) 99970-2932</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">

                    <div id="notice">
                        <h4>Avisos</h4>


                        <?php
                        if (isset($_SESSION['logado'])) {
                            ?>

                            <a href="notice/NovoAviso.php" class="btn btn-primary btn-sm" style="float: left;">Novo aviso</a>
                            <a href="notice/ListaAvisos.php" class="btn btn-primary btn-sm" style="float: left;">Listar Todos os avisos</a>
                            <?php
                        }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                include 'Data/ConnectDataBase.php';
                                $sql = "select * from notices";
                                $result = mysqli_query($DBConn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $today = date("Y-m-d H:i:s");
                                        if ($row['data_inicial'] < $today && $row['data_final'] > $today) {
                                            ?>
                                            <p style="color: red; font-size: 15px; font-weight: bold;"><?php echo $row['aviso']; ?></p>
                                            <?php
                                        }
                                    }
                                }
                                mysqli_close($DBConn);
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-10">
                    <div id="news">
                        <h4>Noticias</h4>
                        <?php
                        if (isset($_SESSION['logado'])) {
                            ?>
                            <a href="news/NovaNoticia.php" class="btn btn-primary btn-sm" style="float: right;">Nova Noticia</a>
                            <a href="news/ListaNoticias.php" class="btn btn-primary btn-sm" style="float: right;">Listar Todas as Noticias</a>
                            <?php
                        }
                        ?>
                        <br>
                        <!--<a href="news/NovaNoticia.php">Nova Noticia</a><br>-->
                        <?php
                        include 'Data/ConnectDataBase.php';
                        $sql = "select * from news";
                        $result = mysqli_query($DBConn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $today = date("Y-m-d H:i:s");
                                if ($row['data_inicial'] < $today && $row['data_final'] > $today) {
                                    ?>
                                    <form action="news/verNoticia.php" method="post">
                                        <button type="submit" class="btn-link btn-block" name="id_noticia" value="<?php echo $row['id_noticia']; ?>" class="btn-link"><?php echo $row['titulo']; ?></button>
                                    </form>
                                    <?php
                                }
                            }
                        }
                        mysqli_close($DBConn);
                        ?>

                    </div>
                </div>
            </div>


        </div>
        <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
        <script src="js/jquery.min.js"></script>
        <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
        <script src="js/bootstrap.min.js"></script>
    </body>

</html>