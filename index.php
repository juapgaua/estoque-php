<?php
// index.php
declare(strict_types=1);
require __DIR__ . "/config.php";

$stmt = $pdo->query("SELECT Id, Nome, Preco, Estoque FROM dbo.Produtos WHERE Estoque > 0 ORDER BY Nome");
$produtos = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Loja - Produtos</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 24px; }
    table { border-collapse: collapse; width: 100%; max-width: 900px; }
    th, td { border: 1px solid #ddd; padding: 10px; }
    th { background: #f5f5f5; text-align: left; }
    input[type="number"] { width: 120px; padding: 6px; }
    button { padding: 8px 12px; cursor: pointer; }
    .msg { margin-top: 14px; }
  </style>
</head>
<body>

  <h1>Produtos em estoque</h1>

  <table>
    <thead>
      <tr>
        <th>Produto</th>
        <th>Preço</th>
        <th>Estoque</th>
        <th>Novo preço</th>
        <th>Ação</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($produtos as $p): ?>
        <tr>
          <td><?= htmlspecialchars($p["Nome"]) ?></td>

          <td>
            R$ <span id="preco-<?= (int)$p["Id"] ?>">
              <?= number_format((float)$p["Preco"], 2, ",", ".") ?>
            </span>
          </td>

          <td><?= (int)$p["Estoque"] ?></td>

          <td>
            <input
              type="number"
              step="0.01"
              min="0"
              inputmode="decimal"
              id="novo-preco-<?= (int)$p["Id"] ?>"
              placeholder="Ex: 59.90"
            />
          </td>

          <td>
            <button onclick="atualizarPreco(<?= (int)$p['Id'] ?>)">
              Atualizar preço
            </button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <div class="msg" id="msg"></div>

<script>
async function atualizarPreco(produtoId) {
  const msg = document.getElementById("msg");
  msg.textContent = "";

  const input = document.getElementById(`novo-preco-${produtoId}`);
  const novoPreco = input.value;

  if (!novoPreco || Number(novoPreco) < 0) {
    msg.textContent = "Informe um preço válido.";
    return;
  }

  try {
    const resp = await fetch("atualizar_preco.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id: produtoId, preco: novoPreco })
    });

    const data = await resp.json();

    if (!resp.ok) {
      msg.textContent = data?.erro ?? "Erro ao atualizar.";
      return;
    }

    document.getElementById(`preco-${produtoId}`).textContent = data.preco_formatado;
    input.value = "";
    msg.textContent = "Preço atualizado com sucesso.";
  } catch (e) {
    msg.textContent = "Falha de comunicação com o servidor.";
  }
}
</script>

</body>
</html>