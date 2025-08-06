<?php
include("../banco/conexao.php");
include("verifica.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeUsuario = mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);
    $emailUsuario = mysqli_real_escape_string($conexao, $_POST['emailUsuario']);
    $loginUsuario = mysqli_real_escape_string($conexao, $_POST['loginUsuario']);
    $senhaUsuario = password_hash($_POST['senhaUsuario'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO usuarios (nomeUsuario, emailUsuario, loginUsuario, senhaUsuario) VALUES ('$nomeUsuario', '$emailUsuario', '$loginUsuario', '$senhaUsuario')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "'); window.history.back();</script>";
    }
}
?>
