<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RG2 Sports</title>
<link rel="stylesheet" href="../folha/stylelogin.css">
</head>
<body>

<?php
if (isset($_SESSION['nao_autenticado'])):
?>
<div class="alert alert-danger">Usuário e/ou senha inválidos</div>
<?php
// Remove a variável da sessão para que a mensagem não apareça novamente
unset($_SESSION['nao_autenticado']);
endif;
?>

<form action="login.php" method="post">
  <div class="imgcontainer">
    <img src="../imagens/Logo Dinâmico RG2 Sports.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="uname"><b>Nome de Usuário</b></label>
    <input type="text" placeholder="Nome de Usuario" name="nomeUsuario" required>

    <label for="psw"><b>Senha</b></label>
    <input type="password" placeholder="Senha" name="senhaUsuario" required>
        
    <button type="submit">Entrar</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Manter-me conectado
    </label>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <span class="psw">Esqueceu sua <a href="#">senha?</a></span>
  </div>
</form>

</body>
</html>
