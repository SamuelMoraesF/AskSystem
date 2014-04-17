<?php include '../config.php' ?>
<?php if(SENDMETHOD == "sqlite") : ?>
<?php

	$dbsqlite = new SQLite3('../'.SQLITEDB);
	$query = "select * FROM perguntas";

	$result = $dbsqlite->query($query);



	while ($row = $result->fetchArray()) {
		echo '<div class="pergunta">';
	    echo '<h2 class="apergunta"><b>#'.$row["id"].'</b> - '.$row["pergunta"].'</h2>';
	    ?>por <a href="mailto:<?php echo $row["email"] ?>" title="Enviar email para <?php echo $row["nome"] ?>"><?php echo $row["nome"] ?></a> - <?php echo $row["hora"] ?> - <a href="#" onclick='if(confirm("Você tem certeza de que deseja excluir a pergunta #<?php echo $row["id"] ?>?")){location.href="<?php echo FULLURL ?>/gerenciamento/?acao=del&idreq=<?php echo $row["id"] ?>"}else {}' title="Excluir esta pergunta">[Excluir]</a><?php if(ENABLEPUSHOVERNOTIFY == true){echo ' - <a href="'.FULLURL.'/gerenciamento/?acao=pushover&idreq='.$row["id"].'" title="Enviar para o palestrante via Pushover">[Pushover]</a>';} ?><?php if(ENABLEEMAILNOTIFY == true){echo ' - <a href="'.FULLURL.'/gerenciamento/?acao=email&idreq='.$row["id"].'" title="Enviar para o palestrante via Email">[Email]</a>';} ?><?php
	    echo '</div>';
	}


?>
<?php else : ?>
<?php echo '<H1>O painel de gerenciamento não está ativo, habilite o SQLite no config.php</H1>'; ?>
<?php endif; ?>