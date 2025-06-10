<?php
require_once __DIR__ . '/../core/index.php';

$type = $_POST['type'];
$title = $_POST['title'];
$message = $_POST['message'];
$startAt = $_POST['start_at'] ?? null;

if ($type === 'aviso') {
    $stmp = $db->query("INSERT INTO avisos (titulo, mensagem, criado_em) VALUES (?, ?, NOW())", [$title, $message]);
    $redis->publish('avisos.novos', json_encode([
        'type' => 'aviso',
        'title' => $title,
        'message' => $message
    ]));
} elseif ($type === 'compromisso') {
    $stmp = $db->query("INSERT INTO compromissos (titulo, mensagem, inicio, criado_em) VALUES (?, ?, ?, NOW())", [$title, $message, $startAt]);
}

http_response_code(201); // Created
header('Content-Type: application/json');
header('Cache-Control: no-cache, no-store, must-revalidate');
header('Pragma: no-cache');
header('Expires: 0');
echo json_encode([
    'status' => 'success',
    'message' => 'Evento cadastrado com sucesso!'
]);
exit;