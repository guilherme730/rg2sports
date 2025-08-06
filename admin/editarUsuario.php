<?php
    session_start();
    include("../banco/conexao.php");
 
    if (isset($_POST['editarUsuario'])) {
        $usuario_id = mysqli_real_escape_string($conexao, trim($_POST['idUsuario']));
        $nomeUsuario = mysqli_real_escape_string($conexao, trim($_POST['nomeUsuario']));
        $emailUsuario = mysqli_real_escape_string($conexao, trim($_POST['emailUsuario']));
        $loginUsuario = mysqli_real_escape_string($conexao, trim($_POST['loginUsuario']));
        $senhaUsuario = mysqli_real_escape_string($conexao, trim($_POST['senhaUsuario']));
       
        $sql = "UPDATE usuarios SET nomeUsuario = '$nomeUsuario', emailUsuario = '$emailUsuario', loginUsuario = '$loginUsuario', senhaUsuario = '$senhaUsuario'";
        $sql .= " WHERE idUsuario = '$usuario_id'";
 
        mysqli_query($conexao, $sql);
 
        if(mysqli_affected_rows($conexao) > 0) {
            header('Location: listarUsuarios.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
 
?>
 