# Imagem e Ação

Este é um jogo que imita o já existente [Imagem e ação da Grow](https://www.lojagrow.com.br/jogo-imagem---acao-1---grow-01708/p). Implementado de forma simples para que duas janelas, cliente e servidor, interagam e consigam reproduzir a jogabilidade do Imagem e Ação. 



# Modo de jogar
O jogo terá um total de 5 rodadas(por padrão), e terá duas equipes. Durante as 5 rodadas, será feita o rodízio de rodada que cada equipe irá participar. Vence a equipe que no final pontuar mais;
A cada rodada, será selecionado um jogador por equipe da vez ou da maneira que acha melhor para selecionar, mas é interessante que todos participem. E então, este ficará no lado do servidor, onde só ele receberá a informação de qual papel deverá imitar para que seu time consiga acertar. É importante que este não infliga nas [regras do jogo](https://www.google.com/url?sa=i&rct=j&q=&esrc=s&source=images&cd=&ved=2ahUKEwji36uXq_vkAhUhJLkGHdeMBOIQjRx6BAgBEAQ&url=https://produto.mercadolivre.com.br/MLB-709827066-jogo-imagem-e-aco-junior-da-grow-regras-na-tampa-_JM&psig=AOvVaw3UDhXIwcjAVGU0-gyMqdYV&ust=1570028774370921), ou a equipe perderá a vez e não pontuará.
A equipe do jogador selecionado tentará adivinhar qual é o papel que está sendo imitado para pontuar. Ficando no lado do cliente.

# Requerimentos

 - Serviço php web para o cliente como um apache
 - Biblioteca websocket php
 

#  Getting Started
Para que o jogo se inicialize, carrege o arquivo `server.php` localizado na pasta raíz do projeto, este pode ser facilmente resolvido usando o comando `php` do seu terminal. E faça com que algum serviço web como apache se encarregue de reproduzir o `client.php`

# Contribuindo
Todo tipo de contribuição é bem-vinda. O projeto Imagem e Ação é um código livre sem apropiação ou restrição a uso. 
Tanto as regras de operação quanto a jogabilidade estão aptas a serem aperfeiçoadas. O jogo ainda funciona numalinha fixa de regras de operação, o que restringe a jogabilidade customizada. E funciona de forma crua em um terminal de comando sem uma interfaçe para o usuário, que é desmotivante. Se tem algo que o motive a querer melhorá-lo, por favor, fique livre para fazer as requisições.



