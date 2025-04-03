<?php
// tempo_leitura.php
include 'conexao.php';
session_start();

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(["status" => "erro", "mensagem" => "Usuário não autenticado"]);
    exit;
}

$usuario_id = $_SESSION['usuario_id'];
$ebook_id = $_POST['ebook_id'];
$tempo_por_pagina = $_POST['tempo_por_pagina'];

$sql = "INSERT INTO tempo_leitura (usuario_id, ebook_id, tempo_por_pagina) VALUES (?, ?, ?) 
        ON DUPLICATE KEY UPDATE tempo_por_pagina = VALUES(tempo_por_pagina)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iid", $usuario_id, $ebook_id, $tempo_por_pagina);

if ($stmt->execute()) {
    echo json_encode(["status" => "sucesso", "mensagem" => "Tempo de leitura atualizado"]);
} else {
    echo json_encode(["status" => "erro", "mensagem" => "Erro ao atualizar tempo de leitura"]);
}

$stmt->close();
$conn->close();
