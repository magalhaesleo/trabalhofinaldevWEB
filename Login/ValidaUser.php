<?php

if (isset($_POST['login']) && isset($_POST['pass'])) {
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy();
    }
    session_start();
    include '../Data/ConnectDataBase.php';
    $sql = "select senha from users where login ='{$_POST['login']}'";
    $result = mysqli_query($DBConn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['senha'] == $_POST['pass']) {
            if ($_POST['login'] == 'admin') {
                $_SESSION['adminUser'] = "yes";
            }
            $_SESSION['userLogged'] = $_POST['login'];
            unset($_SESSION['invalidUser']);
            $_SESSION['logado'] = "on";
            header("location: ../index.php");
        } else {
            ?>
            <script>
                alert('Senha Invalida!');
                window.location = 'login.php';
            </script>
            //<?php

        }
    } else {
        $_SESSION['invalidUser'] = "on";
        header("location: login.php");
    }
    mysqli_close($DBConn);
} else {
    header("location: login.php");
}