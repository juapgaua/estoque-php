<?php
declare(strict_types=1);

$server = "localhost";   // ou NOME_DO_SERVIDOR\INSTANCIA
$database = "LojaExU2A3"; // pelo seu print
$user = "";               // se for autenticação Windows, deixe vazio
$password = "";

$dsn = "sqlsrv:Server=$server;Database=$database";

try {
    $pdo = new PDO($dsn, $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}