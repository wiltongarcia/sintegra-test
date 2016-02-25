# Sintegra Test

## Requisitos Funcionais
### Banco de Dados:
Criar uma tabela usuario (id, usuario, senha);
Criar uma tabela sintegra (id, idusuario, cnpj, resultado_json);

### API:
Desenvolver uma API Rest, com autenticação (utilizar a tabela usuario), que receberá um CNPJ como parâmetro e realizar uma requisição no Sintegra Espirito Santo;
Parsear os dados utilizando RegEX e retornar um JSON;
Salvar os dados parseados na tabela sintegra;
### Tela:

Desenvolver uma tela de autenticação (utilizar a tabela usuario);
Desenvolver uma tela com um campo de CNPJ e botão de pesquisar, para realizar a chamada na API desenvolvida no item anterior e apresentar os dados do JSON retornado na tela;
Desenvolver uma tela para listar as consultas salvas, com possibilidade de excluir o registro do banco de dados;
## Requisitos :
- PHP5;
- ZendFramework 1.7 ou Laravel 5.1;
- MySQL (Banco de Dados);
- Bootstrap 3 (Tela);

## Especificações do Desenvolvedor
- Desenvolvido usando o Laravel 5.1
- Alterei o nome das tabelas de usuarios para users e sintegra para results
- Utilizei session para o login da api devido a dinamica dos requisitos, caso fosse uma api para outros sites usaria JTW(https://jwt.io/)
- Como o layout do json não estava definido nos requisitos desenvolvi da forma mais facil e performatica para o backend
