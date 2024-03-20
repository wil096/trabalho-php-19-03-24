<?php
session_start();

// Array de livros
$livros = array(
    array("titulo" => "Dom Casmurro", "autor" => "Machado de Assis"),
    array("titulo" => "O Pequeno Príncipe", "autor" => "Antoine de Saint-Exupéry"),
    array("titulo" => "1984", "autor" => "George Orwell"),
    array("titulo" => "O Senhor dos Anéis", "autor" => "J.R.R. Tolkien")
);

// Verifica se o método de envio é POST para adicionar um novo livro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['titulo']) && isset($_POST['autor'])) {
    $livroNovo = array("titulo" => $_POST['titulo'], "autor" => $_POST['autor']);
    array_push($livros, $livroNovo);
}

// Verifica se o método de envio é GET para obter os dados dos livros
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo json_encode($livros);
}

// Funções de cookies e sessões
if (!isset($_COOKIE['visitas'])) {
    setcookie('visitas', 1, time() + (86400 * 30), "/"); // Define o cookie por 30 dias
} else {
    $visitas = $_COOKIE['visitas'] + 1;
    setcookie('visitas', $visitas, time() + (86400 * 30), "/"); // Atualiza o cookie
}

$_SESSION['usuario'] = "exemplo"; // Define uma variável de sessão
?>
