# Questão 5: Plano de teste de endpoint

Para realizar o teste proposto, eu realizei as seguintes etapas:

1-	Criei uma API em PHP e Postgresql para fins demonstrativos, com a estrutura solicitada, e que devolve o valor “value”. O valor é decrementado a cada acesso contendo a autenticação/parâmetros POST corretos. O valor inicial é de 5 e é decrementado até 0. Ainda para fins demonstrativos, cada vez que atinge 0 ele é resetado para 5.
2-	Criei uma estrutura de testes usando o Postman, com 4 tipos de request, sendo:

1 request válido, com método POST, com a autenticação (partnerPromotionId e customerId), que irá retornar o “value”. Ainda, neste teste, foram criados 4 testes automatizados, que testam se o retorno esperado 200 foi recebido, se existe um body e response válidos, se o contente header é um json, e se o valor de value foi menor que 100.
1 request inválido com método GET para a rota, que só foi feita para POST, para exibir que o método e inválido
1 request inválido com método GET, para uma rota não encontrada na API desenvolvida.
1 request inválido com método POST, para a rota correta, mas sem passar o payload de autenticação. Assim o retorno mostra payload inválido.

Acesso ao código fonte da api e dos testes: repositório do github no link: https://github.com/softlivre/application_examination_PZ

Acesso aos testes automatizados em API pelo Postman:
https://www.postman.com/blue-meadow-575475/workspace/propz/collection/17299005-87358c80-0182-454c-b765-46fe78ae74a9

Endereço da API demonstrativa: (acesso pelo browser será considerado GET e retornará método inválido. Acessar com POST e com autenticação, ou pelo Postman)
https://softlivre.com.br/provapropz/api/v1/databases/3434/retail/user-promotions/redeem
