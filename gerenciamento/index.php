<?php include '../config.php' ?>
<?php if(SENDMETHOD == "sqlite") : ?>
<?php 

if(isset($_GET['acao']) && isset($_GET['idreq'])){

	if($_GET['acao'] == "del") {

		$dbsqlite = new SQLite3('../'.SQLITEDB);

		$dbsqlite->query("DELETE FROM perguntas WHERE id= ".$_GET['idreq']);

		$alert = '<section class="alert">Pergunta <b>#'.$_GET['idreq'].'</b> excluída</section>';

	} else if($_GET['acao'] == "pushover") {


		$dbsqlite = new SQLite3('../'.SQLITEDB);
		$query = "select * FROM perguntas WHERE id = ".$_GET['idreq'];

		$result = $dbsqlite->query($query);

		while ($row = $result->fetchArray()) {


			$PUSHOVERTITLE = "Pergunta de ".$row["nome"];
			$PUSHOVERTOKEN = PUSHOVERTOKENNOTIFY;
			$PUSHOVERUSER = PUSHOVERUSERNOTIFY;
			$PUSHOVERMESSAGE = $row['pergunta'];
			$PUSHOVERURL = "mailto:".$row['email'];
			curl_setopt_array($ch = curl_init(), array(
	  			CURLOPT_URL => "https://api.pushover.net/1/messages.json",
  				CURLOPT_POSTFIELDS => array(
	    			"token" => $PUSHOVERTOKEN,
    				"user" => $PUSHOVERUSER,
    				"message" => $PUSHOVERMESSAGE,
    				"title" => $PUSHOVERTITLE,
    				"url" => $PUSHOVERURL,
    				"url_title" => $row['email'],
    				"priority" => 0
  				),
  				CURLOPT_RETURNTRANSFER => true,));
			curl_exec($ch);
			curl_close($ch);

			$alert = '<section class="alert">Pergunta <b>#'.$_GET['idreq'].'</b> enviada via Pushover</section>';

		}

	} else if($_GET['acao'] == "email") {


		$dbsqlite = new SQLite3('../'.SQLITEDB);
		$query = "select * FROM perguntas WHERE id = ".$_GET['idreq'];

		$result = $dbsqlite->query($query);

		while ($row = $result->fetchArray()) {


			$mailpara = MAILNOTIFY;
			$mailassunto = 'Pergunta de '.$row['nome'].' - '.NOMEEVENTO;
			$mailmensagem = $row['nome'].'('.$row['email'].') enviou uma pergunta: "'.$row['pergunta'].'"';
			$mailheaders = 'From: '.FROMNOTIFY. "\r\n" .
	    		'Reply-To: '.$row['email']. "\r\n" .
    			'X-Mailer: PHP/' . phpversion();
			mail($mailpara, $mailassunto, $mailmensagem, $mailheaders);


			$alert = '<section class="alert">Pergunta <b>#'.$_GET['idreq'].'</b> enviada via Email</section>';

		}

	} else {

		$alert = "";

	}

} else {

	$alert = "";

}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo FULLURL ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo FULLURL ?>/css/normalize.css">
    <link href="http://mozorg.cdn.mozilla.net/media/css/tabzilla-min.css" rel="stylesheet" />
    <title>Gerenciamento - <?php echo NOMEEVENTO ?></title>
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

      <?php echo $alert ?>

      <div style="width:100%;padding:20px;"></div>

      <div class="tablecontentupdate"><?php include 'table.php' ?></div>

    </div>
    <script src="<?php echo FULLURL ?>/js/jquery.min.js"></script>
    <script src="http://mozorg.cdn.mozilla.net/tabzilla/tabzilla.js"></script>
  </body>
</html>
<?php else : ?>
<?php echo '<H1>O painel de gerenciamento não está ativo, habilite o SQLite no config.php</H1>'; ?>
<?php endif; ?>