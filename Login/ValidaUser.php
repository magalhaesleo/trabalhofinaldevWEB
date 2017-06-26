<?php
session_destroy();
session_start();
if (($_POST['login']=='admin')&&($_POST['pass']=='admin'))
{
    unset($_SESSION['invalidUser']);
    $_SESSION['logado'] = "on";
    header("location: ../index.php");
}
else
{
    $_SESSION['invalidUser'] = "on";
    header("location: login.php");
}