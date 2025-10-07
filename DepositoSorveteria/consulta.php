<?php
// consulta.php
require 'conexaoBD.php';
$stmt = $conexao->query("SELECT * FROM produtos ORDER BY id DESC");
$produtos = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Consulta de Produtos</title><link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Produtos</h1>

    <h3>Adicionar Produto</h3>
    <form action="bd/processa_produto.php" method="post">
        <input name="nome" placeholder="Nome" required>
        <input name="categoria" placeholder="Categoria">
        <input name="preco" type="number" step="0.01" placeholder="Preço" required>
        <input name="estoque" type="number" placeholder="Estoque" required>
        <input name="descricao" placeholder="Descrição">
        <button type="submit">Adicionar</button>
    </form>

    <h3>Lista</h3>
    <table border="1">
        <tr><th>ID</th><th>Nome</th><th>Categoria</th><th>Preço</th><th>Estoque</th><th>Descrição</th><th>Ações</th></tr>
        <?php foreach($produtos as $p): ?>
            <tr>
                <td><?=htmlspecialchars($p['id'])?></td>
                <td><?=htmlspecialchars($p['nome'])?></td>
                <td><?=htmlspecialchars($p['categoria'])?></td>
                <td><?=number_format($p['preco'],2,',','.')?></td>
                <td><?=htmlspecialchars($p['estoque'])?></td>
                <td><?=htmlspecialchars($p['descricao'])?></td>
                <td>
                    <a href="editar_produto.php?id=<?= $p['id'] ?>">Editar</a> |
                    <a href="excluir_produto.php?id=<?= $p['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

