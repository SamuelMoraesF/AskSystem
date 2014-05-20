<?php

define('NOMEEVENTO', 'II Fórum Tchelinux de SM'); //Nome da palestra/evento a ser exibido no titulo da página

define('FULLURL','http://localhost/AskSystem'); //Endereço completo da raiz do sistema de perguntas sem / no final

define('PALESTRANTE','Fulano de Tales'); //Nome do palestrante

define('SENDMETHOD','sqlite'); //Método de envio da pergunta, as opções podem ser 'email', 'pushover' ou 'sqlite'


	// SE SENDMETHOD FOR EMAIL

	define('SENDMETHODMAIL','samuelmoraesf@gmail.com'); //Defina aqui o endereço para o qual deverá ser enviado

	define('SENDMETHODFROM','asksystem@samuelmoraesf.tk'); //Endereço de email que o PHP usará para enviar as mensagens



	//SE SENDMETHOD FOR PUSHOVERUSER

	define('PUSHOVERUSER','uLubKkACvqvM2nY38xd4SpBfQ3XEma'); //Seu usuário do Pushover

	define('PUSHOVERTOKEN','aNyt8hP7fsJ4dQMUofrxSx9QKeiKdx'); //Seu token do Pushover



	//SE SENDMETHOD FOR SQLITE - ISTO HABILITA O PAINEL DE GERENCIAMENTO

	define('SQLITEDB','perguntas.db'); //Banco de dados SQLite

	define('TIMEZONE','America/Sao_Paulo'); //Timezone http://www.php.net/manual/pt_BR/timezones.php

	define('ENABLEPUSHOVERNOTIFY', true); //Habilita o envio de perguntas através do pushover para o palestrante


		define('PUSHOVERUSERNOTIFY','uLubKkACvqvM2nY38xd4SpBfQ3XEma'); //Seu usuário do Pushover

		define('PUSHOVERTOKENNOTIFY','aNyt8hP7fsJ4dQMUofrxSx9QKeiKdx'); //Seu token do Pushover


	define('ENABLEEMAILNOTIFY', true); //Habilita o envio de perguntas através de emails para o palestrante 

		define('MAILNOTIFY','samuelmoraesf@gmail.com'); //Email a receber a mensagem

		define('FROMNOTIFY','asksystem@samuelmoraesf.tk'); //Email a enviar a mensagem

$shownotas = true;

$notas = "Aqui vai umas notas interessantes que podem ser úteis para enrolar os visitantes quando tem tempo de sobra. Posso pedir para enviarem alguns dados para a NSA com um link para o http://google.com.
          -> Item1
          -> Item2"

?>
