<?php
if (!isset($_SESSION['logado']))
{
    header("location: ../index.php");
}
include '../Data/ConnectDataBase.php';
$titulo = $_POST['tituloAviso'];
$data_inicial = $_POST['datainicio'];
$data_final = $_POST['datafinal'];
$autor = $_POST['autor'];
$resultado = mysqli_query( $DBConn, "insert into notices (aviso, data_inicial, data_final, autor) values ('$titulo','$data_inicial','$data_final','$autor')" );
if (mysqli_query($DBConn, $resultado)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $resultado . "<br>" . mysqli_error($DBConn);
}
mysqli_close($DBConn);
//header("location: ../index.php");
echo $_POST['tituloAviso']."<br>";
echo $_POST['datainicio']."<br>";
echo $_POST['datafinal']."<br>";
echo $_POST['autor']."<br>";