<?php

define('NOMEEVENTO', 'Nome do evento'); //Nome da palestra/evento a ser exibido no titulo da página

define('FULLURL','http://localhost/AskSystem'); //Endereço completo da raiz do sistema de perguntas sem / no final

define('PALESTRANTE','Fulano de Tal'); //Nome do palestrante

define('SENDMETHOD','pushover'); //Método de envio da pergunta, as opções podem ser 'email', 'pushover'


	// SE SENDMETHOD FOR EMAIL

	define('SENDMETHODMAIL','samuelmoraesf@gmail.com'); //Defina aqui o endereço para o qual deverá ser enviado

	define('SENDMETHODFROM','asksystem@samuelmoraesf.tk'); //Endereço de email que o PHP usará para enviar as mensagens



	//SE SENDMETHOD FOR PUSHOVER

	define('PUSHOVERUSER','uLubKkACvqvM2nY38xd4SpBfQ3XEma');

	define('PUSHOVERTOKEN','aNyt8hP7fsJ4dQMUofrxSx9QKeiKdx')

?>
