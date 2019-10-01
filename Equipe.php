<?php
class Equipe {
    private $pontuacao;
    private static $iterator = 0;
    private $time;
    public function __construct() {
        $this->pontuacao = 0;
        $this->time = ++Equipe::$iterator;
    }

    public function pontuaEquipe() {
        $this->pontuacao++;
    }
    public function getPontuacao() {
        return $this->pontuacao;
    }
    public function getTime() {
        return $this->time;
    }
    public function getNumerodeMembros() {
        return $this->numero_de_membros;
    }
    public function detalhar() {
            echo("Equipe: " .$this->getTime(). "\t Pontuação: " .$this->getPontuacao(). "\n");
        }
}
    ?>