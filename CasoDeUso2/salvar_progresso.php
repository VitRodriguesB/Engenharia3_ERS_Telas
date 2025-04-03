<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["pagina_atual"] = $_POST["pagina"];
    echo json_encode(["success" => true, "mensagem" => "Progresso salvo com sucesso!"]);
    exit();
}
?>
