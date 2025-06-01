<?php
// filepath: /home/dev/projects/php/bikcraft/app/index.php
require_once __DIR__ . '/core/index.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Bikcraft - Tutorial de Uso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: sans-serif;
            background: #f7f7f7;
            margin: 0;
            padding: 0;
            color: #222;
            transition: background 0.2s, color 0.2s;
            display: grid;
            justify-items: center;
            justify-content: center;
            align-items: center;
            height: 100dvh;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px #0001;
            padding: 32px;
            transition: background 0.2s, color 0.2s;
        }

        h1 {
            color: #222;
        }

        code,
        pre {
            background: #eee;
            padding: 2px 6px;
            border-radius: 4px;
        }

        ul {
            margin-top: 0;
        }

        .footer {
            margin-top: 32px;
            font-size: 0.95em;
            color: #888;
        }

        /* Tema escuro */
        @media (prefers-color-scheme: dark) {
            body {
                background: #181a1b;
                color: #e3e3e3;
            }

            .container {
                background: #23272a;
                color: #e3e3e3;
                box-shadow: 0 2px 8px #0008;
            }

            h1 {
                color: #fff;
            }

            code,
            pre {
                background: #2d3136;
                color: #e3e3e3;
            }

            .footer {
                color: #aaa;
            }

            a {
                color: #8ecae6;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Bem-vindo ao Bikcraft 🚴‍♂️</h1>
        <p>Esta é uma aplicação PHP pronta para desenvolvimento local com Docker, MySQL e Nginx.</p>
        <h2>Como usar:</h2>
        <ol>
            <li>
                <strong>Clone o repositório e configure o ambiente:</strong>
                <pre><code>cp .env.example .env</code></pre>
                <small>Edite o arquivo <code>.env</code> se necessário.</small>
            </li>
            <li>
                <strong>Suba os containers:</strong>
                <pre><code>docker-compose up -d</code></pre>
            </li>
            <li>
                <strong>Acesse a aplicação:</strong>
                <pre><code>http://localhost</code></pre>
            </li>
            <li>
                <strong>Veja informações do PHP:</strong>
                <pre><code>http://localhost/phpinfo.php</code></pre>
            </li>
            <li>
                <strong>Envie e-mails de teste:</strong>
                <pre><code>http://localhost:1080</code></pre>
                <small>(Mailcatcher UI para visualizar e-mails enviados)</small>
            </li>
        </ol>
        <h2>Incluindo o core</h2>
        <p>
            Para usar o core da aplicação, inclua no início dos seus arquivos PHP:
        <pre><code>require_once '/var/www/html/src/core/index.php';</code></pre>
        </p>
        <div class="footer">
            <p>
                <strong>Dicas:</strong><br>
                - O código-fonte está na pasta <code>app/</code>.<br>
                - O banco de dados MySQL está disponível no serviço <code>mysql</code>.<br>
                - Variáveis de ambiente estão em <code>.env</code>.<br>
                - Para logs do Nginx/PHP, veja os containers correspondentes.<br>
            </p>
            <p>
                <a href="phpinfo.php">Ver informações do PHP</a>
            </p>
        </div>
    </div>
</body>

</html>