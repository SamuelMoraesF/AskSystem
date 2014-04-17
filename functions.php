<?php

//Inclui o arquivo de configuração
include 'config.php';

//Verifica se foi submetida alguma pergunta
if (isset($_POST['pergunta']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['acao']) ){

	//verifica se a pergunta deve ser enviada por email
	if($_POST['acao'] == "envia" && SENDMETHOD == "email"){
		$mailpara = SENDMETHODMAIL;
		$mailassunto = 'Pergunta de '.$_POST['nome'].' - '.NOMEEVENTO;
		$mailmensagem = $_POST['nome'].'('.$_POST['email'].') enviou uma pergunta: "'.$_POST['pergunta'].'"';
		$mailheaders = 'From: '.SENDMETHODFROM. "\r\n" .
    		'Reply-To: '.$_POST['email']. "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
		mail($mailpara, $mailassunto, $mailmensagem, $mailheaders);
	} else if($_POST['acao'] == "envia" && SENDMETHOD == "pushover") {
		$PUSHOVERTITLE = "Pergunta de ".$_POST['nome'];
		$PUSHOVERTOKEN = PUSHOVERTOKEN;
		$PUSHOVERUSER = PUSHOVERUSER;
		$PUSHOVERMESSAGE = $_POST['pergunta'];
		$PUSHOVERURL = "mailto:".$_POST['email'];
		curl_setopt_array($ch = curl_init(), array(
  			CURLOPT_URL => "https://api.pushover.net/1/messages.json",
  			CURLOPT_POSTFIELDS => array(
    			"token" => $PUSHOVERTOKEN,
    			"user" => $PUSHOVERUSER,
    			"message" => $PUSHOVERMESSAGE,
    			"title" => $PUSHOVERTITLE,
    			"url" => $PUSHOVERURL,
    			"url_title" => $_POST['email'],
    			"priority" => 0
  			),
  			CURLOPT_RETURNTRANSFER => true,));
		curl_exec($ch);
		curl_close($ch);
	} else if($_POST['acao'] == "envia" && SENDMETHOD == "sqlite") {
		date_default_timezone_set(TIMEZONE);
		$SQLITEDATE = date('G:i:s');
		$dbsqlite = new SQLite3(SQLITEDB);
		$dbsqlite->exec('INSERT INTO perguntas (id, hora, pergunta, nome, email) VALUES (NULL,"'.$SQLITEDATE.'","'.$_POST['pergunta'].'","'.$_POST['nome'].'","'.$_POST['email'].'")');
	}
}

function askalert(){
	if (isset($_POST['pergunta']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['acao'])){
		if ($_POST['acao'] == "envia") {
			echo '<section class="alert">Sua pergunta foi enviada com sucesso, aguarde que já vamos responder</section>';
		}
	}
	else if(isset($_POST['acao'])) {
		if($_POST['acao'] == "envia") {
			echo '<section class="alert">Por favor, complete todos os campos para poder efetuar sua pergunta</section>';
		}
	}
}

?>