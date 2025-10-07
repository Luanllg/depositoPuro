<?php
// excluir_produto.php
require 'conexaoBD.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    $stmt = $conexao->prepare("DELETE FROM produtos WHERE id=:id");
    $stmt->execute([':id'=>$id]);
}
header('Location: consulta.php');
