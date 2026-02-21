# Loja Virtual - Projeto Web Design

## Descrição

Projeto desenvolvido para a disciplina de Web Design – Unidade 2: Ferramentas de Desenvolvimento Web – Aula 3.

A aplicação simula uma loja virtual que:

- Carrega produtos diretamente de um banco de dados SQL Server utilizando PHP.
- Atualiza dinamicamente o preço de um produto sem recarregar a página, utilizando JavaScript.

## Funcionalidades

- Conexão com banco de dados SQL Server.
- Listagem de produtos carregados dinamicamente com PHP.
- Atualização individual de preço via requisição assíncrona.
- Atualização parcial da interface sem recarregamento da página.

## Tecnologias Utilizadas

- PHP
- SQL Server
- JavaScript
- HTML5

## Estrutura do Projeto

/estoque-php  
│  
├── index.php    
├── config.php   
└── atualizar_preco.php    

## Arquivos

### index.php
Responsável por:
- Conectar ao banco de dados.
- Consultar os produtos disponíveis.
- Exibir os dados na página HTML.
- Acionar a atualização dinâmica de preço via JavaScript.

### config.php
Arquivo responsável pela configuração da conexão com o SQL Server:
- Servidor
- Nome do banco
- Usuário
- Senha

### atualizar_preco.php
Recebe a requisição enviada via JavaScript e:
- Atualiza o preço do produto no banco de dados.
- Retorna o novo valor para atualização na interface.

## Banco de Dados

O projeto utiliza SQL Server.

Para executar:

1. Criar um banco de dados no SQL Server.
2. Criar a tabela de produtos.
3. Configurar corretamente os dados de conexão no arquivo `config.php`.

## Como Executar Localmente

1. Instalar um servidor local com suporte a PHP.
2. Instalar e configurar o driver `sqlsrv` para integração com SQL Server.
3. Colocar a pasta do projeto dentro do diretório do servidor.
4. Iniciar o servidor.
5. Acessar via navegador:

http://localhost:8080

## Prints

<img width="1581" height="471" alt="image" src="https://github.com/user-attachments/assets/bdaa6a2e-4ed0-489a-848a-4547df52504b" />

<img width="1401" height="517" alt="image" src="https://github.com/user-attachments/assets/cb6099fd-aea8-4f51-ace8-4c68b7427fe6" />

<img width="1188" height="469" alt="image" src="https://github.com/user-attachments/assets/55a9f2ad-599e-4f53-b5aa-03e88011842a" />

<img width="1399" height="520" alt="image" src="https://github.com/user-attachments/assets/66b94c3f-c72b-45e4-b751-6f9c16279550" />


## Objetivo Acadêmico

Este projeto tem finalidade acadêmica e foi desenvolvido para aplicar:

- Integração entre front-end e back-end.
- Conexão PHP com SQL Server.
- Manipulação de dados em banco relacional.
- Atualização dinâmica de conteúdo com JavaScript.
