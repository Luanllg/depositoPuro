<?php
// relatorio.php
require 'conexaoBD.php';
$stmt = $conexao->query("SELECT * FROM relatorio_vendas ORDER BY data DESC, id DESC");
$rows = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Relatório de Vendas</title></head>
<body>
    <h1>Relatório de Vendas</h1>

    <form action="bd/processa_relatorio.php" method="post">
        <input name="produto" placeholder="Produto" required>
        <input name="quantidade" type="number" min="1" placeholder="Quantidade" required>
        <input name="valor_total" type="number" step="0.01" placeholder="Valor total" required>
        <input name="data" type="date" required>
        <button type="submit">Adicionar</button>
    </form>

    <table border="1">
        <tr><th>ID</th><th>Produto</th><th>Quantidade</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
        <?php foreach($rows as $r): ?>
            <tr>
                <td><?= $r['id'] ?></td>
                <td><?= htmlspecialchars($r['produto']) ?></td>
                <td><?= $r['quantidade'] ?></td>
                <td><?= number_format($r['valor_total'],2,',','.') ?></td>
                <td><?= $r['data'] ?></td>
                <td>
                    <a href="bd/editar_relatorio.php?id=<?= $r['id'] ?>">Editar</a> |
                    <a href="bd/excluir_relatorio.php?id=<?= $r['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

