<?php
session_start();
if (!isset($_SESSION['logado'])) {
    header("location: ../index.php");
}
if (isset($_POST['id_aviso'])) {
    include '../Data/ConnectDataBase.php';
    $resultado = mysqli_query($DBConn, "DELETE from notices WHERE id_aviso = '{$_POST['id_aviso']}'");
    mysqli_close($DBConn);
}

$redirect = "..\index.php";
header("location: $redirect");
