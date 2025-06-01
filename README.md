# Bikcraft - Ambiente de Desenvolvimento PHP com Docker

Este projeto fornece um ambiente completo para desenvolvimento PHP utilizando Docker, MySQL e Nginx, pronto para uso local.

## Pré-requisitos

Antes de começar, certifique-se de ter instalado em sua máquina:

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Estrutura do Projeto

```
bikcraft/
├── app/                # Código-fonte PHP da aplicação
├── docker/
│   ├── Dockerfile      # Dockerfile para PHP-FPM
│   └── nginx/
│       └── default.conf # Configuração do Nginx
├── docker-compose.yml  # Orquestração dos serviços
├── .env.example        # Exemplo de variáveis de ambiente
└── README.md
```

## Serviços

- **app**: PHP 8.1-FPM, com extensões comuns e Xdebug.
- **nginx**: Servidor web, encaminha requisições PHP para o serviço `app`.
- **mysql**: Banco de dados MySQL 8.0, persistente via volume.
- **mailcatcher**: Captura e visualiza e-mails enviados pela aplicação (interface web em `localhost:1080`).

## Configuração

1. **Clone o repositório e configure as variáveis de ambiente:**

    ```sh
    cp .env.example .env
    # Edite o arquivo .env conforme necessário
    ```

2. **Suba os containers:**

    ```sh
    docker-compose up -d
    ```

3. **Acesse a aplicação:**

    - [http://localhost](http://localhost) — Página inicial
    - [http://localhost/phpinfo.php](http://localhost/phpinfo.php) — Informações do PHP
    - [http://localhost:1080](http://localhost:1080) — Mailcatcher (visualização de e-mails)

## Dicas

- O código-fonte está na pasta `app/`.
- O banco de dados MySQL está disponível no serviço `mysql` (host: `mysql`, porta: `3306`).
- Variáveis de ambiente devem ser configuradas no arquivo `.env`.
- Para logs, utilize os comandos do Docker, por exemplo:
  ```sh
  docker-compose logs nginx
  docker-compose logs app
  ```

## Comandos Úteis

- **Parar os containers:**
  ```sh
  docker-compose down
  ```
- **Ver status dos containers:**
  ```sh
  docker-compose ps
  ```

## Observações

- O volume do banco de dados é persistente e não será perdido ao reiniciar os containers.
- Para facilitar o gerenciamento dos containers durante o desenvolvimento, recomenda-se instalar o [lazydocker](https://github.com/jesseduffield/lazydocker), uma interface visual para monitoramento e controle dos serviços Docker.

---
> Desenvolvido para facilitar o setup de ambientes PHP modernos com Docker.