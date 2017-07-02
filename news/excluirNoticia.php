<?php

session_start();
if (!isset($_SESSION['logado'])) {
    header("location: ../index.php");
}
if (isset($_POST['id_noticia'])) {
    include '../Data/ConnectDataBase.php';
    $resultado = mysqli_query($DBConn, "DELETE from news WHERE id_noticia = '{$_POST['id_noticia']}'");
    mysqli_close($DBConn);
}

$redirect = "..\index.php";
header("location: $redirect");
