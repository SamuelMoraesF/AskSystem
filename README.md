AskSystem
=========

Sistema de perguntas para palestras


Permite o envio das perguntas para o palestrante via Email ou através do [Pushover](https://pushover.net/). É possível o armazenamento em uma base de dados SQLite, isto ativa o painel de gerenciamento, onde é possível remover algumas perguntas e enviá-las para o palestrante.

Instalando
==========

- Mova o arquivo `config.php.example` para `config.php` e edite-o
- Edite o arquivo `gerenciamento/.htaccess` e aponte o caminho completo para o aquivo `gerenciamento/.666` na linha `AuthUserFile`.


Pronto, o sistema está configurado, basta acessá-lo em seu site. O painel de gerenciamento fica na subpasta `gerenciamento`(assim, se o sistema de perguntas estiver em `http://example.org/perguntas`, o painel de gerenciamento ficará em `http://example.org/perguntas/gerenciamento`).

Faça login utilizando o usuário `acesso` com a senha `1234`(você poderá alterar esta senha e adicionar novos usuários utilizando o comando `htpasswd` no shell linux)
