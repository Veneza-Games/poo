<?php include "src/views/header.php"; 

// Roteamento
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
switch ($page) {
    case 'Aluno':
        include "src/pages/cad_aluno.php";
        break;
    case 'Curso':
        include "src/pages/cad_curso.php";
        break;
    case 'Escola':
        include "src/pages/cad_escola.php";
        break;
    case 'Login':
        include "src/pages/login.php";
        break;
    default:
        include "src/pages/home.php";
        break;
}
?>

<?php include "src/views/footer.php"; ?>