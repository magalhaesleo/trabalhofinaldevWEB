<?php

include '../Data/ConnectDataBase.php';
$login = $_POST['login'];
$senha = $_POST['senha'];
$nomecompleto = $_POST['nomecompleto'];
$sql = "insert into users (login, senha, name) values ('$login','$senha','$nomecompleto')";
if (!mysqli_query($DBConn, $sql)) {
    mysqli_close($DBConn);
    ?>
    <script>
        alert("Dados Invalidos!");
        window.location.href = 'login.php';
    </script>
    <?php
} else {
    mysqli_close($DBConn);
    header("location: login.php");
}
