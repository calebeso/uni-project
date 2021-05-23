<h1 align="center">
  <img alt="uniAmerica" title="#uniAmerica" src="{{ asset('images/unicamerica.png') }}" />
</h1>

## UniAmérica

Projeto de gerenciamento de sistema educacional, sendo possível consultar, cadastrar, editar, visualizar e excluir Usuários, Cursos e Alunos. 
Também é possível exportar a lista de alunos para Excel, antes ou depois de aplicar uma consulta. O sistema conta com pacotes de validações de documentos, 
sendo assim, aceitando apenas CPF's válidos. Também é possível atribuir cargos aos usuários cadastrados, onde um usuário com cargo básico pode apenas visualizar e consultar Cursos e Alunos. 
O sistema possui um sistema de autenticação através do login e senha criado pelo Administrador (user padrão, com acesso total). 

## Instalação

Após clonado, ajuste o arquivo .env que será copiado do arquivo .env.example com as credenciais do seu banco de dados. 

Baixe as dependências do sistema através do comando: 

 `composer install`

Gere uma chave para aplicação através do comando: 

`php artisan key:generate`

Crie a estrutura do banco de dados com os seus devidos dados padrões já populados através do comando: 

`php artisan migrate --seed`

## Autor

Calebe Santana   
calebesantana.com.br

