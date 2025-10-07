<?php
session_start();
require 'conexaoBD.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

$sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
$stmt = $conexao->prepare($sql);
$stmt->execute([':email' => $email]);
$user = $stmt->fetch();

if ($user && password_verify($senha, $user['senha'])) {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['nome'];
    header('Location: index.php');
    exit;
}

header('Location: login.php?msg=erro');
