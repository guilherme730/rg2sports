<?php
include("../banco/conexao.php");

$result = mysqli_query($conexao, "SELECT nomeUsuario, emailUsuario, loginUsuario FROM usuarios");

echo "<table border='1' width='100%' cellpadding='8' style='color:#000;background:#fff;'>";
echo "<tr><th>Nome</th><th>Email</th><th>Login</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['nomeUsuario']) . "</td>";
    echo "<td>" . htmlspecialchars($row['emailUsuario']) . "</td>";
    echo "<td>" . htmlspecialchars($row['loginUsuario']) . "</td>";
    echo "</tr>";
}

echo "</table>";
?>
