# Critérios atendidos

###Requisitos
- Permite cadastro e edição dos dados do usuário, e ele precisa estar logado para isso
- Retorno de todos os comentários sem autenticação nesta rota, montei o relacionamento na model e coloquei um filtro pra não expor dados sensíveis do usuário, somente o nome é exibido, e como author, para não expor diretamente na api em rota não autenticada campo com mesmo nome ao que tem no banco de dados, por segurança.
- O sistema retorna o autor e dia e horário da postagem na listagem de todos posts


###Desejáveis
- Criptografia da senha do usuário, utilizando o Hash do Laravel
- Permite ao usuário excluir comentários, apenas comentários que ele é o dono


###Plus

- Collection do Postman com exemplo das requisições para facilitar os testes pela equipe da BetaLabs







# Selecao-Back-End
Você deverá forkar este repositório para fazer o seu exercício. Para entregar envie o link do seu repositório por e-mail.

O exercício deve ser feito apenas pelo candidato e tem como objetivo medir o seu nível de conhecimento para melhor alocação dentro da Betalabs. Existem as seguintes exigências técnicas:
- Linguagem do lado servidor: PHP 8.0;
- Linguagem cliente: JSON;
- Banco de dados: MySQL.

Para instalar o PHP/Laravel no local é recomendado usar o [Homestead](https://laravel.com/docs/8.x/homestead) pela facilidade na instalação porém qualquer instalação é válida. Entretanto a avaliação do exercício será feito usando o Homestead mais atualizado.

O exercício deve ser feito necessariamente utilizando a framework Laravel 8.0. A quantidade e qualidade da implementação dos requisitos são usadas para a avaliação do candidato.
Na seção de requisitos do sistema os requisitos são divididos em dois grupos:
- Obrigatório: o requisito deve ser implementado;
- Desejável: é interessante se o requisito for implementado, porém não é obrigatório.

## Cenário
A empresa solicitou o desenvolvimento de um sistema de comentários para um novo produto que estão lançando. Como trata-se de um sistema que será utilizado por outros agentes, então deve ser feito obrigatoriamente via API com entradas e saídas no formato JSON. Esse sistema deve manter os dados dos usuários que comentarem.

### Requisitos do sistema
#### Obrigatórios:
- O sistema deverá gerenciar os usuários, permitindo-os se cadastrar e editar seu cadastro;
- O sistema poderá autenticar o usuário através do e-mail e senha do usuário e, nas outras requisições, utilizar apenas um token de identificação;
- O sistema deverá retornar comentários a todos que o acessarem, porém deverá permitir inserir comentários apenas a usuários autenticados;
- O sistema deverá retornar qual é o autor do comentário e dia e horário da postagem;
- O Readme.md do projeto deverá conter de forma curta e objetiva uma breve explicação de onde e como cada um dos critérios (obrigatórios e desejaveis) busca ser atendido.
#### Desejáveis:
- O sistema deverá permitir o usuário editar os próprios comentários (exibindo a data de criação do comentário e data da última edição);
- O sistema deverá possuir histórico de edições do comentário;
- O sistema deverá permitir o usuário excluir os próprios comentários;
- O sistema deverá possuir um usuário administrador que pode excluir todos os comentários;
- O sistema deverá criptografar a senha do usuário;
- Implementação de testes automatizados utilizando phpunit
