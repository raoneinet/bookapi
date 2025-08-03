# 📚 Books Synopsis API

API RESTful para gerenciamento de sinopses de livros. Permite criar, ler, atualizar e deletar registros de sinopses armazenadas em banco MySQL.

---

## 🗄️ Banco de dados

- Host: `localhost`  
- Nome do banco: `books`  
- Nome da tabela: `booksapi`

### Estrutura da tabela `booksapi`:

| Campo    | Tipo         | Descrição                         |
|----------|--------------|----------------------------------|
| id       | INT AUTO_INCREMENT PRIMARY KEY | Identificação única da sinopse |
| title    | VARCHAR(255) | Título do livro                  |
| sinopsis | VARCHAR(1000) | Sinopse do livro                |
| author   | VARCHAR(255) | Autor do livro                   |

---

## 🚀 Funcionalidades da API

- **GET** `/sinopses` — Lista todas as sinopses;
- **GET** `/sinopses/{id}` — Retorna sinopse individual pelo ID;
- **POST** `/sinopses` — Insere nova sinopse (enviar JSON com `title`, `sinopsis`, `author`);
- **PUT** `/sinopses/{id}` — Atualiza sinopse existente pelo ID;
- **DELETE** `/sinopses/{id}` — Deleta sinopse pelo ID.

---

## 🛠️ Tecnologias utilizadas

- PHP (para backend da API)  
- MySQL (banco de dados)  
- Apache (via XAMPP/LAMPP)  
- JSON para comunicação

---

## ⚙️ Configuração

1. Clone o repositório:

   ```bash
   git clone https://github.com/seu-usuario/books-synopsis-api.git
Configure o banco de dados MySQL:

Crie o banco books no MySQL;

Execute o script SQL para criar a tabela booksapi:

sql

CREATE TABLE booksapi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  sinopsis VARCHAR(1000) NOT NULL,
  author VARCHAR(255) NOT NULL
);
Configure a conexão no arquivo config.php (ou similar):

php
<?php
$servername = "localhost";
$username = "root";       // Usuário do MySQL
$password = "";           // Senha do MySQL
$dbname = "books";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
Coloque os arquivos no diretório do servidor (ex: htdocs no XAMPP);

Acesse a API via URL, por exemplo:
http://localhost/booksapi/

🔍 Testando a API
Você pode usar ferramentas como RestTestTest ou Postman para testar as rotas da API.

Exemplo de requisição JSON para POST / PUT

{
  "title": "Dom Casmurro",
  "sinopsis": "Romance clássico de Machado de Assis que aborda ciúmes e memórias.",
  "author": "Machado de Assis"
}


✍️ Autor
Desenvolvido por Raone Ferreira
