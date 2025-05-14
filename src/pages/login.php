<?php

require_once "db/db.php"; // ajuste o caminho conforme seu projeto

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha']; // criptografar igual ao MySQL

    $sql = "SELECT * FROM login WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php?page=home");
        exit();
    } else {
        echo "<div class='alert alert-danger text-center'>Login inválido!</div>";
    }
}
?>

<!-- Seu formulário -->
<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-md-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h3 class="text-center mb-4">Acesso ao Sistema</h3>

                <form method="post" >
                    <div class="mb-3">
                        <label for="usuario" class="form-label">Usuário (e-mail):</label>
                        <input type="email" name="usuario" id="usuario" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="senha" class="form-label">Senha:</label>
                        <input type="password" name="senha" id="senha" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Entrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>