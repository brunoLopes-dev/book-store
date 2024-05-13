# Book Store API

## 🚀 Introdução

Bem-vindo à API Book Store! Esta API foi desenvolvida utilizando Laravel e PHP, com um banco de dados MySQL. Ela permite que os usuários interajam com um banco de dados de livros e lojas, permitindo gerenciar inventários de livros, detalhes das lojas e suas relações. Os usuários podem adicionar, atualizar, recuperar e excluir informações sobre livros e lojas, bem como associar livros a lojas específicas.

## 📋 Pré-requisitos

- PHP 8.3
- Laravel 11
- MySQL
- Composer
- Insomnia / Postman (para testar a API)

## 🔧 Instalação

- Clone o projeto usando `git clone <https://github.com/brunoLopes-dev/BookStore.git>`
- Navegue até o diretório do projeto e execute `composer install` para instalar todas as dependências.
- Configure seu ambiente local copiando o `.env.example` para `.env` e ajustando as configurações de banco de dados e outras variáveis de ambiente necessárias.
- Execute `php artisan migrate` para criar as tabelas no banco de dados.
- Execute `php artisan db:seed` para criar um usuário no banco de dados.
- Execute `php artisan serve` para iniciar o servidor local.

## 🚀 Vamos começar:

### Configurando o banco de dados:

- Crie um banco de dados MySQL.
- Configure as credenciais do banco de dados no arquivo `.env`.

### Testando as rotas:

- Com o servidor rodando, abra o Insomnia ou Postman.
- Teste a autenticação primeiro, fazendo login na rota `/api/login` para obter um token.
- Use este token como Bearer Token para autenticar as demais requisições.

## Detalhamento de Rotas

### Autenticação
| Método | Rota   | Descrição             |
| ------ | ------ | --------------------- |
| `POST` | /api/login | Autentica um usuário. |
| `POST` | /api/logout | Desloga o usuário. |

### Livros
| Método | Rota               | Descrição                                |
| ------ | ------------------ | ---------------------------------------- |
| `POST` | /api/books         | Adiciona um livro.                       |
| `GET`  | /api/books         | Lista todos os livros.                   |
| `GET`  | /api/books/{id}    | Detalha um livro específico.             |
| `PUT`  | /api/books/{id}    | Atualiza um livro.                       |
| `DELETE`| /api/books/{id}   | Exclui um livro.                         |

### Lojas
| Método | Rota               | Descrição                                |
| ------ | ------------------ | ---------------------------------------- |
| `POST` | /api/stores        | Adiciona uma loja.                       |
| `GET`  | /api/stores        | Lista todas as lojas.                    |
| `GET`  | /api/stores/{id}   | Detalha uma loja específica.             |
| `PUT`  | /api/stores/{id}   | Atualiza uma loja.                       |
| `DELETE`| /api/stores/{id}  | Exclui uma loja.                         |

## Respostas

| Código | Descrição                                     |
|--------|-----------------------------------------------|
| `200`  | Requisição executada com sucesso (success).   |
| `400`  | Erros de validação ou campos não encontrados. |
| `401`  | Dados de acesso inválidos.                    |
| `404`  | Registro não encontrado (Not found).          |

## 🛠️ Desenvolvido com:

- Laravel - O framework web usado
- MySQL - Sistema de gestão de banco de dados
- Composer - Gerente de Dependência

## ✒️ Autor

- Bruno Lopes

## 🎁 Agradecimentos

Expresso minha gratidão na criação deste projeto. Foi uma experiência enriquecedora trabalhar com Laravel e desenvolver uma API que gerencia livrarias.
