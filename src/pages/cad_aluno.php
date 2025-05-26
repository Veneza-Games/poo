<?php
require_once "src/classes/aluno.php";

// iniciando as variaveis
$nome = $idade = $cpf = $profissao ="";
$alunoCriado = false;


//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $idade = trim($_POST["idade"]);
    $cpf = trim($_POST["cpf"]);
    $profissao = trim($_POST["profissao"]);
    try {
        $aluno = new Aluno($nome, $idade, $cpf, $profissao);
        $alunoCriado = $aluno->cadastrar();
        if ($alunoCriado) {
            echo "<div class='alert alert-success'>Cadastro efetuado com sucesso</div>";
        } else {
            echo "<div class='alert alert-danger'>Erro ao cadastrar o aluno</div>";
        }
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}
$alunos = Aluno::listar();
// Listando os alunos
?>



<h2>Cadastro de Aluno</h2>
 
<form method="post" class="row g-3 mb-4">
    <div class="col-md-4">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" name="nome" id="nome" class="form-control"
            value="<?= htmlspecialchars($nome) ?>">
    </div>
 
    <div class="col-md-2">
        <label for="cpf" class="form-label">CPF:</label>
        <input type="text" name="cpf" id="cpf" class="form-control"
            value="<?= htmlspecialchars($cpf) ?>">
    </div>
 
    <div class="col-md-1">
        <label for="idade" class="form-label">Idade:</label>
        <input type="number" name="idade" id="idade" class="form-control"
            value="<?= htmlspecialchars($idade) ?>">
    </div>

    <div class="col-md-5">
        <label for="Profissao" class="form-label">Profissão:</label>
        <input type="text" name="profissao" id="profissao" class="form-control"
            value="<?= htmlspecialchars($profissao) ?>">
    </div>
 
    <div class="col-12">
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>
</form>

<h3>Lista de Alunos</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Idade</th>
            <th>Profissão</th>
        </tr>
    </thead>
    <tbody>
       <?php if ($alunos && count($alunos) > 0): ?>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['CPF']) ?></td>
                    <td><?= htmlspecialchars($aluno['Idade']) ?></td>
                    <td><?= htmlspecialchars($aluno['profissao']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum aluno cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>