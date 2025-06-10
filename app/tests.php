<?php
// filepath: /home/dev/projects/php/bikcraft/app/tests.php
require_once __DIR__ . '/core/index.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <? include_app_header() ?>

    <main>
        <form action="/api/submit_event.php" method="POST">
            <select name="type">
                <option value="aviso">Aviso imediato</option>
                <option value="compromisso">Compromisso agendado</option>
            </select><br>

            <input type="text" name="title" placeholder="Título" required><br>
            <textarea name="message" placeholder="Mensagem" required></textarea><br>

            <input type="datetime-local" name="start_at"><br>

            <button type="submit">Cadastrar</button>
        </form>
    </main>

    <script>
        // Controla o formulario
        document.querySelector('form').addEventListener('submit', function (e) {
            e.preventDefault(); // Impede o envio padrão do formulário

            const formData = new FormData(this);
            fetch('/api/submit_event.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        alert(data.message);
                        this.reset(); // Limpa o formulário
                    } else {
                        alert('Erro ao cadastrar evento: ' + data.message);
                    }
                })
                .catch(error => console.error('Erro:', error));
        });
    </script>
</body>

</html>