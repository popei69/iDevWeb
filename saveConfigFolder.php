<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1
// sauvegarde la liste les dossiers à ignorer du projet

require('config.php');
$arrayFolder= array();
$arrayToIgnore = array();

// on recupere les noms des variables à ignorer
foreach($_POST as $key => $row){
	$arrayToIgnore[str_replace("%", "_", str_replace("$", ".", str_replace("_", " ", $key)))] = "1";
}

// on verifie que ces dossiers existent
$root_folder = opendir(PATH_FOLDER);
while ($folder = readdir($root_folder)) {
	
	if ( !isset($dontList[$folder])  && is_dir(PATH_FOLDER.'/'.$folder) && isset($arrayToIgnore[$folder])) {
		$arrayFolder[] = $folder;
	}
}


$folders = array();

foreach($arrayFolder as $row){
	$folders[] = array(
		'title' => $row
	);
}

$doc = new DOMDocument();
$doc->formatOutput = true;
  
$r = $doc->createElement( "folders" );
$doc->appendChild( $r );
  
foreach( $folders as $folder )
{
	$b = $doc->createElement( "folder" );
	$title = $doc->createElement( "title" );
	$title->appendChild($doc->createTextNode( $folder['title'] ));
	$b->appendChild( $title );
	$r->appendChild( $b );
}
  
$doc->saveXML();

$doc->save('ignore.xml');

header('Location: '.PATH_URL);
?>