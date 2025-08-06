<?php
include("../banco/conexao.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = mysqli_real_escape_string($conexao, $_POST['login']);

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $email = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = !empty($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : null;

    $updates = [];
    if (!empty($nome)) $updates[] = "nome = '$nome'";
    if (!empty($email)) $updates[] = "email = '$email'";
    if (!empty($senha)) $updates[] = "senha = '$senha'";

    if (count($updates) > 0) {
        $sql = "UPDATE usuarios SET " . implode(', ', $updates) . " WHERE login = '$login'";

        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Usuário atualizado com sucesso!'); window.history.back();</script>";
        } else {
            echo "<script>alert('Erro ao atualizar: " . mysqli_error($conexao) . "'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Nenhum dado novo foi enviado.'); window.history.back();</script>";
    }
}
?>
