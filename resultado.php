<?php
session_start();
include 'Perguntas.php';

if (!isset($_SESSION['acertos']) || $_SESSION['indice'] < count($perguntas)) {
    header('Location: index.php');
    exit;
}

$acertos = $_SESSION['acertos'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Biotech</title>
    <link rel="shortcut icon" type="image-png" href="./assets/letra-b.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="estiloResultado.css">
</head>
<body>
    <header>
        <div class="cabecalho">
        <h1 class="logotipo">BIOTECH</h1>

        <div>
            <ul class="menu">
                <li>Home</li>
                <li>Sobre Nós</li>
                <li>Tecnologias</li>
                <li>Projetos</li>
            </ul>
        </div>
            
        <div>
            <img src="">
        </div>
    
        </div>
    </header>
    <main>
      <div class="containerResultado">
          <div class="divResultado">
              <i class="fa-solid fa-award iconeResultado"></i>
              <h1>Resultado do Quiz</h1>
              <p>Você acertou <?php echo $acertos; ?> de <?php echo count($perguntas); ?> perguntas!</p>
              <a href="index.php?action=reset" class="link-recomecar"><button class="botaoResultado">Recomeçar Quiz</button></a>
          </div>
    </div>
    </main>
      <footer class="siteFooter">
    <div class="footerContainer">
    
      <div class="footerColuna">
        <h3>Sobre Nós</h3>
        <p>
          Somos uma empresa dedicada à educação ambiental, desenvolvimento de tecnologias sustentáveis e parcerias com startups inovadoras.
        </p>
      </div>
    </main>
    <div class="footerColuna">
      <h3>Links Úteis</h3>
      <ul>
        <li><a href="#">Início</a></li>
        <li><a href="#">Sobre Nós</a></li>
        <li><a href="#">Projetos</a></li>
        <li><a href="#">Startups</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
    </div>
    <div class="footerColuna">
      <h3>Contato</h3>
      <p>Email: contato@biotech.com</p>
      <p>Telefone: +55 11 99999-9999</p>
      <div class="footerSocial">
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
      </div>
    </div>
  </div>

  <div class="footerBottom">
    <p>© 2025 Nome da Empresa. Todos os direitos reservados.</p>
  </div>
</footer>

</body>
</html>