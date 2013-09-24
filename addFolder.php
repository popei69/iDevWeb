<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1

require('config.php');

if (isset($_POST['name']) && !empty($_POST['name'])) {
	
	if (!mkdir('./'.$_POST['name'], 0744)) {
		die('Echec lors de la creation du dosier');
	}
	
}

header('Location: '.PATH_URL);
?>