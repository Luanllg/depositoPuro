<?php
// processa_financeiro.php
require 'conexaoBD.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: financeiro.php'); exit; }

$tipo = $_POST['tipo'] ?? '';
$descricao = trim($_POST['descricao'] ?? '');
$valor = (float)($_POST['valor'] ?? 0);
$data = $_POST['data'] ?? '';

$sql = "INSERT INTO financeiro (tipo, descricao, valor, data) VALUES (:tipo, :descricao, :valor, :data)";
$stmt = $conexao->prepare($sql);
$stmt->execute([':tipo'=>$tipo, ':descricao'=>$descricao, ':valor'=>$valor, ':data'=>$data]);

header('Location: financeiro.php');
