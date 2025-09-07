<?php
session_start();
include 'Perguntas.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opcao = $_POST['opcao'];
    $indice = $_SESSION['indice'];

    if ($opcao == $perguntas[$indice]['gabarito']) {
        $_SESSION['acertos']++;
    }
    $_SESSION['indice']++;

    header('Location: index.php');
    exit;
}
?>