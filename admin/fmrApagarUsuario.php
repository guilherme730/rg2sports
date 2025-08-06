<?php
    session_start();
    include ("../banco/conexao.php");

    if (isset($_POST['apagarUsuario'])) {
        $usuario_id = mysqli_real_escape_string($conexao, $_POST['apagarUsuario']);

        $sql = "DELETE FROM usuarios WHERE idUsuario = '$usuario_id'";

        mysqli_query($conexao, $sql);

        if (mysqli_affected_rows($conexao) > 0) {
            header('Location: listarUsuarios.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }


?>