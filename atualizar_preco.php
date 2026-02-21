<?php
// atualizar_preco.php
declare(strict_types=1);
require __DIR__ . "/config.php";

header("Content-Type: application/json; charset=utf-8");

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

$id = isset($data["id"]) ? (int)$data["id"] : 0;
$preco = isset($data["preco"]) ? (float)$data["preco"] : -1;

if ($id <= 0 || $preco < 0) {
  http_response_code(400);
  echo json_encode(["erro" => "Dados inválidos."]);
  exit;
}

// Atualiza
$stmt = $pdo->prepare("UPDATE dbo.Produtos SET Preco = :preco WHERE Id = :id");
$stmt->execute([
  ":preco" => $preco,
  ":id" => $id
]);

$linhasAfetadas = $stmt->rowCount();

// Confere se existe
$check = $pdo->prepare("SELECT Id FROM dbo.Produtos WHERE Id = :id");
$check->execute([":id" => $id]);
if (!$check->fetch()) {
  http_response_code(404);
  echo json_encode(["erro" => "Produto não encontrado."]);
  exit;
}

echo json_encode([
  "ok" => true,
  "id" => $id,
  "preco" => $preco,
  "preco_formatado" => number_format($preco, 2, ",", ".")
]);
