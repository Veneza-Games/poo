<?php
 
class Curso {
    public $titulo;
    public $horas;
    private $dias;
    public $alunos;
 
    // Construtor com validação
    public function __construct($titulo, $horas, $dias, $alunos) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (!filter_var($horas, FILTER_VALIDATE_INT) || $horas < 0) {
            throw new Exception("As Horas deve ser um número inteiro positivo.");
        }
        if (empty($dias)) {
            throw new Exception("O campo Dias é obrigatório.");
        }
        if (empty($alunos)) {
            throw new Exception("O campo Aluno é obrigatório.");
        }
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->alunos = $alunos;
    }
 
    // Getter do CPF (encapsulamento)
    public function getHoras() {
        return $this->horas;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Dias: <strong>$this->dias</strong><br>";
        echo "Horas: <strong>" . $this->getHoras() . "</strong></br>";
        echo "Aluno: <strong>$this->alunos</strong></p>";
    }
}