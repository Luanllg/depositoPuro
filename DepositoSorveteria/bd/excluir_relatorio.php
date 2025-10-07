<?php
// excluir_relatorio.php
require 'conexaoBD.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    $stmt = $conexao->prepare("DELETE FROM relatorio_vendas WHERE id=:id");
    $stmt->execute([':id'=>$id]);
}
header('Location: relatorio.php');