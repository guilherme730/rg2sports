<?php
include ("verifica.php");
include("../banco/conexao.php");

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
            <li><a href="listarLocalizacao.php"><span class="material-symbols-outlined">location_on</span><span>Onde
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
    <h2>Detalhes da Modalidade</h2>
                        <?php
                        if(isset($_GET['idModalidade'])) {
                            $modalidade_id = mysqli_real_escape_string($conexao, $_GET['idModalidade']);
                            $sql = "SELECT * FROM modalidades WHERE idModalidade = '$modalidade_id'";
                            $query = mysqli_query($conexao, $sql);

                            if (mysqli_num_rows($query) > 0) {
                                $modalidade = mysqli_fetch_array($query);
                                //var_dump($usuario);
                    ?>

    <p><strong>Nome:</strong> <?= htmlspecialchars($modalidade['nomeModalidade']) ?></p>
    <p><strong>Descrição:</strong> <?= htmlspecialchars($modalidade['textoModalidade']) ?></p>
    <p><strong>Professores:</strong> <?= htmlspecialchars($modalidade['professorModalidade']) ?></p>

    <div style="margin-top: 24px;">
      <a href="listarModalidades.php" class="botao-admin">Voltar</a>
    </div>
  </div>
                      <?php
                            } else {
                                echo "<h5>Usuário não encontrado!</h5>";
                            }
                        }
                    ?>
</main>

</body>
</html>