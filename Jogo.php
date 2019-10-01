<?php
require_once("Equipe.php");
class Jogo {
    private $equipes;
    private $banco_de_palavras;
    private $palavra_da_vez;
    private $time_da_vez;
    private $n_rodada;
    public function __construct(array $equipes) {
        $this->equipes = $equipes;
        $this->banco_de_palavras = array("galinha", "gato", "cachorro", "professor", "pedreiro", "padre", "motorista", "cantor", "jogador de futebol", "pirata");
        $this->n_rodada = 0;
        $this->time_da_vez = 2;
    }
    public function getTimadaVez() {
        return $this->time_da_vez;
    }
    public function getnRodada() {
        return $this->n_rodada;
    }
    public function sortear_Palavra() {
        $this->palavra_da_vez = $this->banco_de_palavras[rand(0, count($this->banco_de_palavras) -1)];
    }
    public function getPalavradaVez() : string {
        return $this->palavra_da_vez;
    }
    public function alternaTimedaVez() {
        if($this->time_da_vez == 1) {
            $this->time_da_vez = 2;
        } else {
            $this->time_da_vez = 1;
        }
    }
    public function verificaTentativa(string $palavra) : bool {
        if($this->palavra_da_vez == $palavra) {
            $this->equipes[$this->time_da_vez-1]->pontuaEquipe();
            return true;
        } else {
            return false;
        }
    }
    public function proximaRodada() {
        if($this->n_rodada != 6) {
            $this->n_rodada++;
        } else {
            $this->fimdeJogo();
        }
    }
    public function controladorPartida() {
        $this->alternaTimedaVez();
        $this->sortear_Palavra();
        $this->detalhar();
        $this->proximaRodada();
        if($this->getnRodada() == 6) return;
        echo("Esta é a: " .$this->getnRodada(). "º Rodada\n");
        echo("É a vez do time: " .$this->getTimadaVez(). "\nPreparem-se!\n");
        echo("A partida vai começar em: 5\n");
        sleep(1);
        echo("4\n");
        sleep(1);
        echo("3\n");
        sleep(1);
        echo("2\n");
        sleep(1);
        echo("1\n");
        sleep(1);
        echo("A palavra para fazer mímica é: " .$this->getPalavradaVez(). "\n");
        echo("A equipe da vez terá 3 minutos para conseguir acertar, caso não consiga perderá a vez!\n");
        echo("Que começem os jogos!\n");
    }
    public function fimdeJogo() : string {
        if($this->equipes[0]->getPontuacao() > $this->equipes[1]->getPontuacao()) {
            echo("Fim de jogo, O time: " .$this->equipes[0]->getTime(). "Venceu!\n");
            return ("Fim de jogo, O time: " .$this->equipes[0]->getTime(). "Venceu!\n");
        } else {
            echo("Fim de jogo, O time: " .$this->equipes[1]->getTime(). " Venceu!\n");
            return ("Fim de jogo, O time: " .$this->equipes[1]->getTime(). " Venceu!\n");
        }
        return "Empate, que tal mais uma rodada para desempate?\n";
    }
    public function detalhar() {
        foreach ($this->equipes as $key => $equipe) {
            $equipe->detalhar();
        }
    }

}
?>