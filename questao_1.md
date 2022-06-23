# Questão 1 - Criando o código fonte do diagrama de sequencia
Este código fonte pode ser importado em serviços online como https://sequencediagram.org/
para visualização.

## atores/entidades envolvidos

### cliente
### pdv
### propz
### DB


## código fonte para exportação e geração do diagrama UML

```TXT
title Diagrama de Sequencia UML - Questao 1

bottomparticipants

actor cliente
participant pdv
participant api

activate cliente
cliente->pdv:identificação por cpf \ncliente diz que tem direito a descontos

activate pdv

pdv->api:request {cpf,pdv}
activate api

pdv<<--api:response {valid offers}
deactivate api
pdv->cliente:operador informa ofertas válidas
deactivate pdv


cliente->pdv: passa sku 1 no pdv
activate pdv
pdv->api:request {cpf,pdv, sku1}
activate api
pdv<<--api:response {offer expired}
deactivate api
pdv->cliente:operador informa oferta expirada
deactivate pdv

cliente->pdv: passa sku 2 no pdv
activate pdv
pdv->api:request {cpf,pdv, sku2}
activate api
pdv<<--api:response {valid offer, 5% OFF}
deactivate api
deactivate pdv

cliente->pdv: passa sku 3 no pdv
activate pdv
pdv->api:request {cpf,pdv, sku3}
activate api
pdv<<--api:response {valid offer, 10% OFF}
deactivate api

pdv->cliente:operador questiona "algo mais? Forma Pagamento?"
deactivate pdv
cliente->pdv: isto é tudo! Cash
activate pdv

pdv->api:request {cpf,pdv, COMMIT sku2,3,4}\n(Decrementar o direito a usar a oferta X vezes)
activate api
pdv<<--api:response {200 OK}
deactivate api

pdv->cliente:obrigado e volte sempre!
deactivate pdv
deactivate cliente

```

