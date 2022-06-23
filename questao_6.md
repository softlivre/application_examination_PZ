# Questão 6: Suporte no Propz Studio - Hipóteses e sequência de passos

Não se sabe (a questão não menciona) se o Propz Studio é uma solução standalone (por exemplo um executável do Windows) ou mesmo um serviço web acessado diretamente pelo navegador, assim vamos abordar estas duas hipóteses mais prováveis.

Antes de pressupor que a dificuldade está mesmo com o ambiente do cliente, é prudente e recomendado testar a rota em questão, eliminando um problema maior no servidor da Propz.
Hipótese 1 browser: um arquivo Javascript desatualizado está armazenado no cache (a Propz atualizou a interface e o cliente está com o arquivo antigo).
Atualizar o mesmo com CTRL + F5 ou CTRL+SHIFT+R para forçar a limpeza do cache. 

Hipótese 2 browser: cliente está usando um navegador sem suporte a novos recursos.
Questionar qual browser o cliente está usando, e caso confirmada a hipótese, sugerir a troca para o Chrome, Firefox ou Edge, nesta ordem.

Hipótese 3 standalone: cliente está usando uma versão desatualizada do software. Uma rota específica da API pode ter sido atualizada e o software antigo não a enxerga.
Questionar qual a versão instalada (normalmente disponível em ajuda -> sobre), e caso constatado, sugerir a atualização.

Hipótese 4 standalone: cliente está com dificuldades na conexão à internet e não percebeu, e logo pediu o suporte. Ou ainda, o seu firewall está bloqueando uma rota específica de uma API.
Solicitar online um teste de conexão (exemplo fast.com), e caso esteja navegando normalmente enviar um link de teste da api para acesso diretamente pelo browser para eliminar possibilidade de firewall bloqueando a conexão/rota.
Hipótese 5: realizadas as verificações de praxe e sem solução, verificar novamente se a rota específica ainda está disponível. Adicionalmente, verificar se as campanhas de marketing dos varejistas estão ativas, e ainda se existem vínculos que podem ter sido excluídos acidentalmente (no banco de dados, alguma relação pode ter sido corrompida).


