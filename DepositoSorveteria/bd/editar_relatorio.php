<?php
// editar_relatorio.php
require 'conexaoBD.php';
$id = (int)($_GET['id'] ?? 0);
if (!$id) { header('Location: relatorio.php'); exit; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = trim($_POST['produto'] ?? '');
    $quantidade = (int)($_POST['quantidade'] ?? 0);
    $valor_total = (float)($_POST['valor_total'] ?? 0);
    $data = $_POST['data'] ?? '';

    $sql = "UPDATE relatorio_vendas SET produto=:produto, quantidade=:quantidade, valor_total=:valor_total, data=:data WHERE id=:id";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':produto'=>$produto, ':quantidade'=>$quantidade, ':valor_total'=>$valor_total, ':data'=>$data, ':id'=>$id]);
    header('Location: relatorio.php');
    exit;
}

$stmt = $conexao->prepare("SELECT * FROM relatorio_vendas WHERE id=:id");
$stmt->execute([':id'=>$id]);
$r = $stmt->fetch();
if (!$r) header('Location: relatorio.php');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Editar Registro</title></head>
<body>
    <h1>Editar #<?= $r['id'] ?></h1>
    <form method="post">
        <input name="produto" value="<?=htmlspecialchars($r['produto'])?>" required><br>
        <input name="quantidade" type="number" value="<?= $r['quantidade'] ?>" required><br>
        <input name="valor_total" type="number" step="0.01" value="<?= $r['valor_total'] ?>" required><br>
        <input name="data" type="date" value="<?= $r['data'] ?>" required><br>
        <button type="submit">Salvar</button>
    </form>
    <p><a href="relatorio.php">Voltar</a></p>
</body>
</html>
