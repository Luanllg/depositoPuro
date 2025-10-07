<?php
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'bd_trabalho';

try {
    $dsn = "mysql:host=$servidor;dbname=$banco;charset=utf8mb4";
    $conexao = new PDO($dsn, $usuario, $senha, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>
