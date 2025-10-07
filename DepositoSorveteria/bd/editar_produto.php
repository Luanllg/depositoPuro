<?php
// editar_produto.php
require 'conexaoBD.php';
$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: consulta.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $categoria = trim($_POST['categoria'] ?? '');
    $preco = (float)($_POST['preco'] ?? 0);
    $estoque = (int)($_POST['estoque'] ?? 0);
    $descricao = trim($_POST['descricao'] ?? '');

    $sql = "UPDATE produtos SET nome=:nome, categoria=:categoria, preco=:preco, estoque=:estoque, descricao=:descricao WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([
        ':nome'=>$nome, ':categoria'=>$categoria, ':preco'=>$preco, ':estoque'=>$estoque, ':descricao'=>$descricao, ':id'=>$id
    ]);
    header('Location: consulta.php');
    exit;
}

$stmt = $conexao->prepare("SELECT * FROM produtos WHERE id=:id");
$stmt->execute([':id'=>$id]);
$produto = $stmt->fetch();
if (!$produto) { header('Location: consulta.php'); exit; }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Editar Produto</title></head>
<body>
    <h1>Editar Produto #<?= $produto['id'] ?></h1>
    <form method="post">
        <input name="nome" value="<?=htmlspecialchars($produto['nome'])?>" required>
        <input name="categoria" value="<?=htmlspecialchars($produto['categoria'])?>">
        <input name="preco" type="number" step="0.01" value="<?=htmlspecialchars($produto['preco'])?>" required>
        <input name="estoque" type="number" value="<?=htmlspecialchars($produto['estoque'])?>" required>
        <input name="descricao" value="<?=htmlspecialchars($produto['descricao'])?>">
        <button type="submit">Salvar</button>
    </form>
    <p><a href="consulta.php">Voltar</a></p>
</body>
</html>
