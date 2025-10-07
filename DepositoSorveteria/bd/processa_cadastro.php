<?php

require 'conexaoBD.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: cadastro.php');
    exit;
}

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if (!$nome || !$email || !$senha) {
    header('Location: cadastro.php?msg=erro');
    exit;
}

$hash = password_hash($senha, PASSWORD_DEFAULT);

try {
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conexao->prepare($sql);
    $stmt->execute([':nome'=>$nome, ':email'=>$email, ':senha'=>$hash]);
    header('Location: cadastro.php?msg=sucesso');
} catch (PDOException $e) {
    // email duplicado ou outro erro
    header('Location: cadastro.php?msg=erro');
}
