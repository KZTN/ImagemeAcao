<?php
require_once("Equipe.php");
require_once("Jogo.php");
$equipes = array();
$equipe1 = new Equipe();
array_push($equipes, $equipe1);
$equipe2 = new Equipe();
array_push($equipes, $equipe2);
$jogo = new Jogo($equipes);

$host = "127.0.0.1";
$port = 20205;
set_time_limit(0);

$socket = socket_create(AF_INET, SOCK_STREAM, 0) or die("Não foi possível criar o socket!\n");
$result = socket_bind($socket, $host, $port) or die("Não foi possível ligar o socket!\n");
$result = socket_listen($socket, 3) or die("Não foi possível configurar o listener do socket\n");
echo("Aguardando por conexões\n");
$jogo->controladorPartida();
    do {
        if($jogo->getnRodada() == 6) {
            return;
        }
        $accept = socket_accept($socket) or die("Não foi possível aceitar a conexão\n");
        $msg = socket_read($accept, 1024) or die("não foi possível ler o input\n");
        $msg = trim($msg);
        echo("Client says: " .$msg. "\n");
        if($msg == "gg") {
            $reply = "O time da vez desistiu!\n";
            socket_write($accept, $reply, strlen($reply)) or die("Não foi possível escrever a saída\n");
            $jogo->controladorPartida();
        }
       if($jogo->verificaTentativa($msg)) {
            $reply = "Parabéns! A equipe pontuou\n";
            socket_write($accept, $reply, strlen($reply)) or die("Não foi possível escrever a saída\n");
            $jogo->controladorPartida(); 
       } else {
         $reply = "Continuem tentando!\n";
        socket_write($accept, $reply, strlen($reply)) or die("Não foi possível escrever a saída\n"); 
       }
    } while ($jogo->getnRodada() != 6);
    $reply = $jogo->fimdeJogo();
    echo($reply);
    socket_write($accept, $reply, strlen($reply)) or die("Não foi possível escrever a saída\n"); 
    socket_close($socket);


?>