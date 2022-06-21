# Criando o código fonte do diagrama de sequencia - questão 1
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
cliente->pdv:identificação por cpf
activate pdv

pdv->api:request {cpf,pdv}
activate api

pdv<<--api:response {valid offers}
deactivate api
cliente<<--pdv:operador informa ofertas válidas
deactivate pdv
deactivate cliente

cliente->pdv: passa sku 1 no pdv
activate cliente
activate pdv

pdv->api:request {cpf,pdv, sku1}
activate api
pdv<<--api:response {offer expired}
deactivate api

A->B:info
activate B
B->C:info
activate C
C->>D:info
activate D
B<--C:info
deactivate C
A<--B:info
deactivate B
B<-D:callback
deactivate D
activate B
A<<--B:info
deactivate B




```

