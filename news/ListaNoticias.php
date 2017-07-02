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
        <title>Avisos</title>

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
                        echo "Bem vindo " . $_SESSION['userLogged'];
                        ?>
                        <br><a href="Login/logout.php" style="font-size: 20px;">Logout</a>
                        <?php
                    } else {
                        ?>
                        <a href="Login/login.php" style="font-size: 20px;">Login</a>
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

                    <?php
                    include '../Data/ConnectDataBase.php';
                    $sql = "select * from news";
                    $result = mysqli_query($DBConn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Data Inicial</th>
                                        <th>Data Final</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $row['autor']; ?></td>
                                        <td><?php echo $row['titulo']; ?></td>
                                        <td><?php echo $row['data_inicial']; ?></td>
                                        <td><?php echo $row['data_final']; ?></td>
                                        <td>
                                            <form action="excluirNoticia.php" method="post" id="formExcluir">

                                            </form>
                                            <form action="verNoticia.php" method="post" id="formLernoticia">

                                            </form>
                                            <form action="NovaNoticia.php" method="post" id="formeditanoticia">
                                                <input type="hidden" name="titulonoticia" value="<?php echo $row['titulo']; ?>">
                                                <input type="hidden" name="conteudonoticia" value="<?php echo $row['conteudo']; ?>">
                                            </form>

                                            <div class="btn-group" role="group" aria-label="...">
                                                <button type="submit" form="formLernoticia" class="btn btn-default btn-xs" name="id_noticia" value="<?php echo $row['id_noticia']; ?>">
                                                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true">Ler</span>
                                                </button>
                                                <button type="submit" form="formeditanoticia" class="btn btn-default btn-xs">
                                                    <span class="glyphicon glyphicon-edit" aria-hidden="true">Editar</span>
                                                </button>
                                                <button type="submit" form="formExcluir" class="btn btn-default btn-xs" name="id_noticia" value="<?php echo $row['id_noticia']; ?>">
                                                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true">Excluir</span>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php
                        }
                    } else {
                        echo "Sem noticias Cadastradas";
                    }
                    mysqli_close($DBConn);
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