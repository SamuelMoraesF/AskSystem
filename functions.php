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
		$saidasubmit = true;
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