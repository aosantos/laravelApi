Todos os requisitos descritos no teste foram feitos!

Não devem existir dois clientes com o mesmo email. OK
O pastel deve possuir foto. OK
Os dados devem ser validados.OK
O sistema deve conter uma série de tipos de pastéis já definidos. OK
O pedido deve contemplar N pastéis. OK
O cliente pode contemplar N pedidos. OK
Após a criação do pedido o sistema deve disparar um email para o cliente contendo os detalhes do seu pedido.OK
Os registros devem conter a funcionalidade de soft deleting. OK


O arquivo de sql se chama laravelapi.sql que está dentro do projeto podendo ser executado no banco mysql

Não foi possível ter uma documentação porém tenho alguns exemplos de executar a Api

Obs: os exemplos abaixos são apenas  algumas requisições de amostra , o projeto possui todo o CRUD funcionando de acordo com os requisitos! 

Obs: a url em questão está em localhost que foi gerada pelo (php artisan serve) do Laravel

Obs: Os parâmetros nos campos são ficticios ao executar procurar por valores reais do banco de dados

Listar todos os clientes
http://localhost:8000/api/v1/cliente

Detalhe ou deletar cliente
http://localhost:8000/api/v1/cliente/1

Cadastar cliente
http://localhost:8000/api/v1/cliente/?nome=Juca4&email=juca@hotmail.com.br&telefone=11987654365&data=13/10/2019&dataNascimento=26/09/1993&endereco=Rua Sampa&complemento&bairro=Jardim Brasil&cep=09867645

Editar Cliente
http://localhost:8000/api/v1/cliente/2?nome=Zeca&email=joao@hotmail.com&telefone=11987654365&data=12/09/2019&dataNascimento=12/09/2000&endereco=Rua Sampa&complemento&bairro=Jardim Brasil&cep=09867645&dataCadastro&Content-Type=application/json&X-Requested-With=XMLHttpRequest

Listar Pastel
http://localhost:8000/api/v1/pastel/

Cadastrar Pastel
http://localhost:8000/api/v1/pastel/?nome=Pastel de Feira&preco=10,00&Content-Type=application/json&X-Requested-With=XMLHttpRequest

Listar Pedido
http://localhost:8000/api/v1/pedido/

Cadastrar Pedido
http://localhost:8000/api/v1/pedido/?idCliente=1&idPastel=2&dataCriacao

Editar Pedido
http://localhost:8000/api/v1/pedido/1?idCliente=1&idPastel=4&dataCriacao

Detalhe ou deletar pedido
http://localhost:8000/api/v1/pedido/2












