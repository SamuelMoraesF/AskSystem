<?php include 'functions.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo FULLURL ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo FULLURL ?>/css/normalize.css">
    <link href="http://mozorg.cdn.mozilla.net/media/css/tabzilla-min.css" rel="stylesheet" />
    <title>Pergunte - <?php echo NOMEEVENTO ?></title>
    <!--[if lt IE 9]>
      <script src="<?php echo FULLURL ?>/js/html5shiv.js"></script>
      <script src="<?php echo FULLURL ?>/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <a href="/en-US/" id="tabzilla" data-infobar="translation">Mozilla</a>
    <div class="content">
      <header class="header">
        <h1 class="lectitle">Nome da Palestra</h1><h2 class="bytitle">por <?php echo PALESTRANTE ?></h2>
      </header>
      <?php askalert() ?>
      <form class="ask" method="get" action="<?php echo FULLURL ?>">
        <input type="text" name="pergunta" placeholder="Faça uma pergunta" class="pergunta" required>
        <input type="submit" value="Perguntar">
        <input type="text" name="nome" placeholder="Seu Nome" class="nome" required>
        <input type="email" name="email" placeholder="Seu Email" class="email" required>
        <input type="hidden" name="acao" value="envia">
      </form>
      <div class="areanotes">
        <textarea class="notes" readonly noresize>Aqui vai umas notas interessantes que podem ser úteis para enrolar os visitantes quando tem tempo de sobra. Posso pedir para enviarem alguns dados para a NSA com um link para o http://google.com.
          -> Item1
          -> Item2</textarea>
      </div>
    </div>
    <script src="<?php echo FULLURL ?>/js/jquery.min.js"></script>
    <script src="<?php echo FULLURL ?>/js/form.js"></script>
    <script src="http://mozorg.cdn.mozilla.net/tabzilla/tabzilla.js"></script>
  </body>
</html>