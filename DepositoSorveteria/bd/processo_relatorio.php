<?php
// processa_relatorio.php
require 'conexaoBD.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: relatorio.php'); exit; }

$produto = trim($_POST['produto'] ?? '');
$quantidade = (int)($_POST['quantidade'] ?? 0);
$valor_total = (float)($_POST['valor_total'] ?? 0);
$data = $_POST['data'] ?? '';

$sql = "INSERT INTO relatorio_vendas (produto, quantidade, valor_total, data) VALUES (:produto, :quantidade, :valor_total, :data)";
$stmt = $conexao->prepare($sql);
$stmt->execute([':produto'=>$produto, ':quantidade'=>$quantidade, ':valor_total'=>$valor_total, ':data'=>$data]);

header('Location: relatorio.php');
