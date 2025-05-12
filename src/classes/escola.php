<?php
 
class Escola {
    public $nome;
    private $cnpj;
    public $endereco;
    public $cidade;
 
    // Construtor com validação
    public function __construct($nome, $cnpj, $endereco, $cidade) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (empty($cnpj)) {
            throw new Exception("O campo CNPJ é obrigatório.");
        }
        if (empty($endereco)) {
            throw new Exception("O campo Endereço é obrigatório.");
        }
        if (empty($cidade)) {
            throw new Exception("O campo Cidade é obrigatório.");
        }
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
    }
 
    // Getter do CPF (encapsulamento)
    public function getEndereco() {
        return $this->endereco;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "CNPJ: <strong>$this->cnpj</strong><br>";
        echo "Endereço: <strong>" . $this->getEndereco() . "</strong></p>";
        echo "<p>Cidade: <strong>$this->cidade</strong></p>";
    }
}