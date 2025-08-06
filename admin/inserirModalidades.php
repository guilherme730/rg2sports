<?php
include("../banco/conexao.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeModalidade = mysqli_real_escape_string($conexao, $_POST['nomeModalidade']);
    $textoModalidade = mysqli_real_escape_string($conexao, $_POST['textoModalidade']);
    $professorModalidade = mysqli_real_escape_string($conexao, $_POST['professorModalidade']);

    $sql = "INSERT INTO modalidades (nomeModalidade, textoModalidade, professorModalidade) VALUES ('$nomeModalidade', '$textoModalidade', '$professorModalidade')";
    
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Modalidade cadastrada com sucesso!'); window.history.back();</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar: " . mysqli_error($conexao) . "'); window.history.back();</script>";
    }
}
?>
