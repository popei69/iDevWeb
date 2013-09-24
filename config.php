<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1

// on définie des variables globales

define('PATH_URL', 'http://localhost:8888/iDevWeb/');
define('MAMP_URL','http://localhost:8888/MAMP/?language=French');
define('PATH_FOLDER', '/Users/Ez3kiel/Sites/Developpement/iDevWeb/');

// on définie la variable pour le module de connexion
define('AUTHENTICATION', false);

// on définie le couple login / mot de passe pour le module de connexion
define('LOGIN', 'username');
define('PASSWORD', 'password');


// on récupère le noms des dossiers à ignorer du 'ignore.xml'
function getFolderToShow() {
	$arrayFolder= array();


	$doc = new DOMDocument();
  	$doc->load( 'ignore.xml' );
  
  	$books = $doc->getElementsByTagName( "folder" );
  	foreach( $books as $book )
  	{
  
  		$titles = $book->getElementsByTagName( "title" );
  		$title = $titles->item(0)->nodeValue;
  		$arrayFolder[$title] = true;
  
  	}
  	
  	return $arrayFolder;
}

error_reporting (E_ALL);

?>