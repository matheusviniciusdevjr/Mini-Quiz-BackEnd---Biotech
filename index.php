<?php
session_start();
include 'Perguntas.php';


if (isset($_GET['action']) && $_GET['action'] == "reset") {
    session_destroy();
    header('Location: index.php');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == "iniciar") {
    $_SESSION['quiz_iniciado'] = true;
    $_SESSION['indice'] = 0;
    $_SESSION['acertos'] = 0;
}


if (isset($_SESSION['quiz_iniciado']) && $_SESSION['quiz_iniciado']) {

    if (isset($_SESSION['indice']) && $_SESSION['indice'] >= count($perguntas)) {
        header('Location: resultado.php');
        exit;
    }
?>

<!--- Aqui começa o HTML  e PHP da tela das perguntas-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Biotech</title>
    <link rel="shortcut icon" type="image-png" href="./assets/letra-b.png">
    <link rel="stylesheet" href="estiloPerguntas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
</head>
<body>
'<div class="quiz">
    <div class="quizHeader">
      <i class="fa-solid fa-dna iconeQuiz"></i>
      <h1>Mini Quiz</h1>
    </div>            
        <form id="quizForm" action="quiz.php" method="post">
          <h2 id="pergunta">
              <?php
              $indiceAtual = $_SESSION['indice'] ?? 0;
              echo $perguntas[$indiceAtual]['pergunta'];
              ?>
          </h2>
          <div class="opcoes">
          <?php
          $indiceAtual = $_SESSION['indice'] ?? 0;
          $opcoes = $perguntas[$indiceAtual]['opcoes'];
          ?>
          <?php foreach ($opcoes as $chave => $valor): ?>
              <div class="opcao">
                  <input type="radio" id="opcao<?= $chave ?>" name="opcao" value="<?= $chave ?>" required />
                  <label for="opcao<?= $chave ?>"><?= $valor ?></label><br>
          </div>  <?php endforeach; ?>
             </div>  <br>        
          <button  class="botaoEnviar" type="submit">Enviar</button>          
      </form>    
</div>
</body>
</html>
<?php
} else {
    
?>
<!-- Aqui começa o HTML da tela inicial-->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <title>Biotech</title>
    <link rel="stylesheet" href="estilo.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="./assets/letra-b.png" type="image/x-icon">
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
        <div class="containerIniciar">
            <div class="divIniciar" id="secao_iniciar">
                <i class="fa-solid fa-dna iconeQuiz"></i>
                <h1>Mini Quiz</h1>
                <a  href="index.php?action=iniciar"><button class="botaoIniciar" type="button" id="btn_iniciar">Começar</button></a>
            </div>
        </div>
    </main>
     <footer class="siteFooter">
  <div class="footerContainer ">  
    <div class="footerColuna">
      <h3>Sobre Nós</h3>
      <p>
        Somos uma empresa dedicada à educação ambiental, desenvolvimento de tecnologias sustentáveis e parcerias com startups inovadoras.
      </p>
    </div>
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
<?php
}
?>