CREATE TABLE avisos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  mensagem TEXT,
  criado_em DATETIME
);

CREATE TABLE compromissos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  mensagem TEXT,
  inicio DATETIME
);