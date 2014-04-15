//ocultar os inputs email e nome se o Jquery for carregado
$( ".email" ).hide();$( ".nome" ).hide();

//Se a caixa da pergunta receber foco, descer os campos nome e email
$( ".pergunta" ).focusin(function() {
	$( ".email" ).show( "slow", function() {});$( ".nome" ).show( "slow", function() {});
});
