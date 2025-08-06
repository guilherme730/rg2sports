<?php
    session_start();
    include("../banco/conexao.php");
 
    if (isset($_POST['editarSobre'])) {
        $sobre_id = mysqli_real_escape_string($conexao, trim($_POST['idSobre']));
        $textoSobre = mysqli_real_escape_string($conexao, trim($_POST['textoSobre']));
        $imagemUsuario = mysqli_real_escape_string($conexao, trim($_POST['imagemSobre']));
        $missaoSobre = mysqli_real_escape_string($conexao, trim($_POST['missaoSobre']));
        $visaoSobre = mysqli_real_escape_string($conexao, trim($_POST['visaoSobre']));
         $valoresSobre = mysqli_real_escape_string($conexao, trim($_POST['valoresSobre']));
       
        $sql = "UPDATE sobre SET textoSobre = '$textoSobre', imagemSobre = '$imagemSobre', missaoSobre = '$missaoSobre', visaoSobre = '$visaoSobre', valoresSobre = '$valoresSobre'";
        $sql .= " WHERE idSobre = '$sobre_id'";
 
        mysqli_query($conexao, $sql);
 
        if(mysqli_affected_rows($conexao) > 0) {
            header('Location: listarSobre.php');
            exit;
        } else {
            header('Location: index.php');
            exit;
        }
    }
 
?>
 