<?php
// cadastro.php
session_start();
$msg = '';
if (isset($_GET['msg'])) {
    if ($_GET['msg'] === 'sucesso') $msg = 'Cadastro realizado com sucesso.';
    if ($_GET['msg'] === 'erro') $msg = 'Erro no cadastro. Email já existe ou dados inválidos.';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Cadastro</title><link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Sorveteria Santos - Cadastro</h1>
    <?php if($msg) echo "<p>$msg</p>"; ?>
    <form action="processa_cadastro.php" method="post">
        <label>Nome:<br><input type="text" name="nome" required></label><br>
        <label>Email:<br><input type="email" name="email" required></label><br>
        <label>Senha:<br><input type="password" name="senha" required></label><br>
        <button type="submit">Cadastrar</button>
    </form>
    <p><a href="login.php">Ir para login</a></p>
</body>
</html>
