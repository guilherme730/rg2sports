<?php 
    include ("verifica.php");
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
           <li><a href="adm.php"><span class="material-symbols-outlined">home</span><span>Home</span></a></li>
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
                          
                        
  <li><a href="logout.php"><span class="material-symbols-outlined">logout</span><span>Logout</span></a></li>
        </ul>
    </nav>
   <main>

  <div class="admin-card">
<h2>Modalidades Cadastradas</h2>

            <table class="tabela-admin">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Modalidade</th>
                        <th>Descrição</th>
                        <th>Professores</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                                $sql = "SELECT * FROM modalidades";
                                $modalidades = mysqli_query($conexao, $sql);
                                if (mysqli_num_rows($modalidades) > 0) {
                                    foreach($modalidades as $modalidade) {
                                
                            ?>
                    <tr>
                        <td><?= htmlspecialchars($modalidade['idModalidade']) ?></td>
                        <td><?= htmlspecialchars($modalidade['nomeModalidade']) ?></td>
                        <td><?= htmlspecialchars($modalidade['textoModalidade']) ?></td>
                        <td><?= htmlspecialchars($modalidade['professorModalidade']) ?></td>
                        <td>
                            <a href="verModalidade.php?idModalidade=<?= $modalidade['idModalidade'] ?>" class="botao-acao">Ver</a>
                            <a href="frmEditarModalidade.php?idModalidade=<?= $modalidade['idModalidade'] ?>" class="botao-acao botao-editar">Editar</a>
                            <form action="frmApagarModalidade.php" method="post" style="display:inline-block;">
                                <button type="submit" name="apagarModalidade" value="<?= $modalidade['idModalidade'] ?>" class="botao-acao botao-excluir" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    <?php
                            }
                        } else {
                            echo '<tr><td colspan="5">Nenhuma modalidade encontrada.</td></tr>';
                        }
                    ?>
                </tbody>
            </table>

            <div style="margin-top: 24px;">
                <a href="frmCadastrarModalidades.php" class="botao-admin">Nova Modalidade</a>
            </div>

  
  </div>
</main>
</div>
</div>
</body>

</html>