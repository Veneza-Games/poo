<?php
 
require_once "db/db.php";


class Aluno {
    public $nome;
    public $idade;
    private $cpf;
    public $profissao;
 
    // Construtor com validação
    public function __construct($nome, $idade, $cpf, $profissao) {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (!filter_var($idade, FILTER_VALIDATE_INT) || $idade < 0) {
            throw new Exception("A Idade deve ser um número inteiro positivo.");
        }
        if (empty($cpf)) {
            throw new Exception("O campo CPF é obrigatório.");
        }
        if (empty($profissao)) {
            throw new Exception("O campo Profissão é obrigatório.");
        }
        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->profissao = $profissao;
    }
 
    // Getter do CPF (encapsulamento)
    public function getCpf() {
        return $this->cpf;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Idade: <strong>$this->idade</strong> anos<br>";
        echo "CPF: <strong>" . $this->getCpf() . "</strong></p>";
        echo "<p>Profissão: <strong>$this->profissao</strong></p>";
    }

    // Método para cadastrar o aluno no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO aluno (nome, idade, cpf, profissao) VALUES (:nome, :idade, :cpf, :profissao)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':profissao', $this->profissao);
 
         // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para listar os alunos
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM aluno";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}