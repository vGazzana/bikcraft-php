<?php
require_once __DIR__ . '/../core/index.php';

header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('X-Accel-Buffering: no');

$pubsub = $redis->pubSubLoop();
$pubsub->subscribe('avisos.novos');

foreach ($pubsub as $message) {
    if ($message->kind === 'message') {
        echo "event: novo_aviso\n";
        echo "data: " . $message->payload . "\n\n";
        ob_flush();
        flush();
    }
}