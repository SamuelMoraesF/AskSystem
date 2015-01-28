<?php include 'functions.php'; ?>

<?php if (SHOWSLIDES == false): ?>

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
        <h1 class="lectitle"><?php echo NOMEEVENTO ?></h1><h2 class="bytitle">por <?php echo PALESTRANTE ?></h2>
      </header>
      <?php askalert() ?>
      <form class="ask" method="post" action="<?php echo FULLURL ?>/">
        <input type="text" name="pergunta" placeholder="Faça uma pergunta" class="pergunta" required>
        <input type="submit" value="Perguntar">
        <input type="text" name="nome" placeholder="Seu Nome" class="nome" required>
        <input type="email" name="email" placeholder="Seu Email" class="email" required>
        <input type="hidden" name="acao" value="envia">
      </form>
    </div>
    <script src="<?php echo FULLURL ?>/js/jquery.min.js"></script>
    <script src="<?php echo FULLURL ?>/js/form.js"></script>
    <script src="http://mozorg.cdn.mozilla.net/tabzilla/tabzilla.js"></script>
  </body>
</html>

<?php else: ?>

<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo NOMEEVENTO ?></title>

    <link href="<?php echo FULLURL ?>/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .ask {
            position: fixed;
            top:0;
            left:0;
        }
        .ask a{
            border-radius:0 0 10px 0;
        }
        .ask span {
            padding-right:5px;
        }
    </style>

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="overflow:hidden;">

    <div class="ask"><a href="#" data-toggle="modal" data-target="#ask" class="btn btn-success"><span class="glyphicon glyphicon-question-sign"></span> Perguntar</a></div>

    <iframe src="<?php echo SLIDESURL ?>" style="width:100%;height:100vh;border:0;"></iframe>

    <div class="modal fade" id="ask" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pergunte para o palestrante!</h4>
          </div>
          <div class="modal-body">
            <form class="pergunta" method="post" action="<?php echo FULLURL ?>/">
              <input style="margin-bottom:10px;" class="form-control" type="text" name="nome" placeholder="Seu Nome" class="nome" required>
              <input style="margin-bottom:10px;" class="form-control" type="email" name="email" placeholder="Seu Email" class="email" required>
              <textarea style="margin-bottom:10px;" class="form-control" name="pergunta" placeholder="Sua Pergunta" class="pergunta" required></textarea>
              <input class="form-control" type="hidden" name="acao" value="envia">
              <input class="btn btn-default" style="width:100%;" type="submit" value="Perguntar">
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="<?php echo FULLURL ?>/js/jquery.min.js"></script>
    <script src="<?php echo FULLURL ?>/js/bootstrap.min.js"></script>
  </body>
</html>

<?php endif; ?>