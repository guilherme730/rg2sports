<?php 
    include ("../banco/conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Painel Administrativo - RG2 Sports</title>
    <!-- Estilos base do admin -->
    <link rel="stylesheet" href="../folha/styleadmin.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        /* ===== AJUSTES COMPLEMENTARES AO styleadmin.css ===== */
    </style>
</head>

<body>
    <!-- MENU LATERAL (expansão por hover já em styleadmin.css) -->
    <nav class="menu" id="menuAdmin">
        <ul class="menu-content">
            <li><a href="#Home"><span class="material-symbols-outlined">home</span><span>Home</span></a></li>
            <li class="dropdown">
              <a href="listarSobre.php"><span class="material-symbols-outlined">dashboard</span><span>Sobre</span></a>
</li>
<li class="dropdown">
            <a href="#"><span class="material-symbols-outlined">sports_soccer</span><span>Modalidades</span></a>
  <ul class="dropdown-content">
    <li><a href="frmCadastrarModalidades.php"><span class="material-symbols-outlined">person_add</span><span>Cadastrar</span></a></li>
    <li><a href="listarModalidades.php"><span class="material-symbols-outlined">list</span><span>Listar</span></a></li>
  </ul>
</li>
                        
            <li><a href="#Galeria"><span class="material-symbols-outlined">photo_library</span><span>Galeria</span></a>
            </li>
            <li><a href="#Contatos"><span class="material-symbols-outlined">contact_mail</span><span>Contatos</span></a>
            </li>
            <li><a href="#OndeEstamos"><span class="material-symbols-outlined">location_on</span><span>Onde
                        Estamos</span></a></li>
                        <li class="dropdown">
                            <a href="#"><span class="material-symbols-outlined">person</span><span>Usuários</span></a>
                            <ul class="dropdown-content">
                              <li><a href="fmrCadastrarUsuario.php"><span class="material-symbols-outlined">person_add</span><span>Cadastrar</span></a></li>
                              <li><a href="listarUsuarios.php"><span class="material-symbols-outlined">list</span><span>Listar</span></a></li>
                            </ul>
                          </li>
                          
                        
            <li><a href="#Logout"><span class="material-symbols-outlined">logout</span><span>Logout</span></a></li>
        </ul>
    </nav>
   <main>


        <div class="admin-card">
            <h2>Usuários Cadastrados</h2>

            <table class="tabela-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Login</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT idUsuario, nomeUsuario, emailUsuario, loginUsuario FROM usuarios";
                        $usuarios = mysqli_query($conexao, $sql);

                        if (mysqli_num_rows($usuarios) > 0) {
                            foreach($usuarios as $usuario) {
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($usuario['idUsuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['nomeUsuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['emailUsuario']) ?></td>
                        <td><?= htmlspecialchars($usuario['loginUsuario']) ?></td>
                        <td>
                            <a href="verUsuario.php?idUsuario=<?= $usuario['idUsuario'] ?>" class="botao-acao">Ver</a>
                            <a href="fmrEditarUsuario.php?idUsuario=<?= $usuario['idUsuario'] ?>" class="botao-acao botao-editar">Editar</a>
                            <form action="fmrApagarUsuario.php" method="post" style="display:inline-block;">
                                <button type="submit" name="apagarUsuario" value="<?= $usuario['idUsuario'] ?>" class="botao-acao botao-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="5">Nenhum usuário encontrado.</td></tr>';
                        }
                    ?>
                </tbody>
            </table>

            <div style="margin-top: 24px;">
                <a href="fmrCadastrarUsuario.php" class="botao-admin">Novo Usuário</a>
            </div>
        </div>
    </main>
</body>

</html>