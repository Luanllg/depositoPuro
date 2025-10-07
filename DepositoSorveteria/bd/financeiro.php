<?php
// financeiro.php
require 'conexaoBD.php';
$stmt = $conexao->query("SELECT * FROM financeiro ORDER BY data DESC, id DESC");
$itens = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Financeiro</title><link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Financeiro</h1>

    <form action="processa_financeiro.php" method="post">
        <select name="tipo" required>
            <option value="">Tipo</option>
            <option value="Entrada">Entrada</option>
            <option value="Saída">Saída</option>
        </select>
        <input name="descricao" placeholder="Descrição" required>
        <input name="valor" type="number" step="0.01" placeholder="Valor" required>
        <input name="data" type="date" required>
        <button type="submit">Adicionar</button>
    </form>

    <h3>Lançamentos</h3>
    <table border="1">
        <tr><th>ID</th><th>Tipo</th><th>Descrição</th><th>Valor</th><th>Data</th><th>Ações</th></tr>
        <?php foreach($itens as $i): ?>
            <tr>
                <td><?= $i['id'] ?></td>
                <td><?= $i['tipo'] ?></td>
                <td><?= htmlspecialchars($i['descricao']) ?></td>
                <td><?= number_format($i['valor'],2,',','.') ?></td>
                <td><?= $i['data'] ?></td>
                <td>
                    <a href="editar_financeiro.php?id=<?= $i['id'] ?>">Editar</a> |
                    <a href="excluir_financeiro.php?id=<?= $i['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
