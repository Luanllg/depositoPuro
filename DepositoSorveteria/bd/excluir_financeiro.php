<?php
// excluir_financeiro.php
require 'conexaoBD.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    $stmt = $conexao->prepare("DELETE FROM financeiro WHERE id=:id");
    $stmt->execute([':id'=>$id]);
}
header('Location: financeiro.php');
