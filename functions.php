<?php

//Inclui o arquivo de configuração
include 'config.php';

//Verifica se foi submetida alguma pergunta
if (isset($_GET['pergunta']) && isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['acao']) ){

	//verifica se a pergunta deve ser enviada por email
	if($_GET['acao'] == "envia" && SENDMETHOD == "email"){
		$mailpara = SENDMETHODMAIL;
		$mailassunto = 'Pergunta de '.$_GET['nome'].' - '.NOMEEVENTO;
		$mailmensagem = $_GET['nome'].'('.$_GET['email'].') enviou uma pergunta: "'.$_GET['pergunta'].'"';
		$mailheaders = 'From: '.SENDMETHODFROM. "\r\n" .
    		'Reply-To: '.$_GET['email']. "\r\n" .
    		'X-Mailer: PHP/' . phpversion();
		mail($mailpara, $mailassunto, $mailmensagem, $mailheaders);
	} else if($_GET['acao'] == "envia" && SENDMETHOD == "pushover") {
		$PUSHOVERTITLE = "Pergunta de ".$_GET['nome'];
		$PUSHOVERTOKEN = PUSHOVERTOKEN;
		$PUSHOVERUSER = PUSHOVERUSER;
		$PUSHOVERMESSAGE = $_GET['pergunta'];
		$PUSHOVERURL = "mailto:".$_GET['email'];
		curl_setopt_array($ch = curl_init(), array(
  			CURLOPT_URL => "https://api.pushover.net/1/messages.json",
  			CURLOPT_POSTFIELDS => array(
    			"token" => $PUSHOVERTOKEN,
    			"user" => $PUSHOVERUSER,
    			"message" => $PUSHOVERMESSAGE,
    			"title" => $PUSHOVERTITLE,
    			"url" => $PUSHOVERURL,
    			"url_title" => $_GET['email'],
    			"priority" => 0
  			),
  			CURLOPT_RETURNTRANSFER => true,));
		curl_exec($ch);
		curl_close($ch);
	}
}

function askalert(){
	if (isset($_GET['pergunta']) && isset($_GET['nome']) && isset($_GET['email']) && isset($_GET['acao'])){
		if ($_GET['acao'] == "envia") {
			echo '<section class="alert">Sua pergunta foi enviada com sucesso, aguarde que já vamos responder</section>';
		}
	}
	else if(isset($_GET['acao'])) {
		if($_GET['acao'] == "envia") {
			echo '<section class="alert">Por favor, complete todos os campos para poder efetuar sua pergunta</section>';
		}
	}
}

?>