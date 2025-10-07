<?php
session_start();
$msg = '';
if (isset($_GET['msg']) && $_GET['msg'] === 'erro') $msg = 'Credenciais inválidas.';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Login</title><link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login - Sorveteria Santos</h1>
    <?php if($msg) echo "<p style='color:red;'>$msg</p>"; ?>
    <form action="bd/processa_login.php" method="post">
        <label>Email:<br><input type="email" name="email" required></label><br>
        <label>Senha:<br><input type="password" name="senha" required></label><br>
        <button type="submit">Entrar</button>
    </form>
    <p><a href="cadastro.php">Cadastrar-se</a></p>
</body>
</html>

