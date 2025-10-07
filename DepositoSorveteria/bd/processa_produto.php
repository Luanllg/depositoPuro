<?php
// processa_produto.php
require 'conexaoBD.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: consulta.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$categoria = trim($_POST['categoria'] ?? '');
$preco = (float) ($_POST['preco'] ?? 0);
$estoque = (int) ($_POST['estoque'] ?? 0);
$descricao = trim($_POST['descricao'] ?? '');

$sql = "INSERT INTO produtos (nome, categoria, preco, estoque, descricao)
        VALUES (:nome, :categoria, :preco, :estoque, :descricao)";
$stmt = $conexao->prepare($sql);
$stmt->execute([
    ':nome'=>$nome,
    ':categoria'=>$categoria,
    ':preco'=>$preco,
    ':estoque'=>$estoque,
    ':descricao'=>$descricao
]);

header('Location: consulta.php');
