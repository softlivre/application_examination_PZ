# Questão 3: Proposta de métodos de API
$endPoint = “https://propz.com.br/api/v1”;

** Todos os retornos em JSON

GET	    /sku/nome/{id}		Retorna/encontra o nome de um sku

GET 	/sku/marca/{id}	    Retorna/encontra a marca de um sku

GET 	/sku/categoria/{id} Retorna/encontra a hierarquia de classificação de um sku, com no mínimo 2 níveis (categoria e subcategoria) e no máximo 5 níveis

POST	/sku/			    Adiciona um novo sku

PUT	    /sku/nome/{id}		Atualiza o nome de um sku existente

PUT	    /sku/marca/{id}	    Atualiza a marca de um sku existente

PUT	    /sku/categoria/{id}	Atualiza categoria, subcategoria, e demais níveis de um sku existente	

DELETE 	/sku/{id}           Remove um sku existente (internamente o item não será excluído, apenas marcado como inativo)

PATCH	/sku/nome/{id}		Atualiza o nome de um sku

PATCH	/sku/marca/{id}	    Atualiza a marca de um sku

PATCH	/sku/categoria/{id} Atualiza a hierarquia de classificação de um sku, com no mínimo 2 níveis (categoria e subcategoria) e no máximo 5 níveis

