<?php 

session_start();
include("../banco/conexao.php");

//verifica se as variáveis existem e não são nulas
if (empty($_POST['nomeUsuario']) || empty($_POST['senhaUsuario'])) {
    header('Location: index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conexao, $_POST['nomeUsuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senhaUsuario']);

$query ="SELECT * FROM usuarios WHERE nomeUsuario = '$usuario'";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $dados_banco = mysqli_fetch_assoc($result);
    $senha_banco = $dados_banco['senhaUsuario'];

    if (password_verify($senha, $senha_banco)) {
        $_SESSION['login'] = $usuario;
        header('Location: adm.php');
        exit();
    } else {
        $_SESSION['nao_autenticado'] = true;
        header('Location: index.php');
        exit();
    } 
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>