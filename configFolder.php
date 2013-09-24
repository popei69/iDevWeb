<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1
// liste les dossiers à ignorer du projet

require('config.php');

$dontList = getFolderToShow();

session_start();

if (AUTHENTICATION && (!isset($_SESSION['USER']) || empty($_SESSION['USER'])))
{
	header('Location: '.PATH_URL.'login.php');
}


?>
<!DOCTYPE HTML>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>iDevWeb</title>
		<meta http-equiv="Content-Language" content="fr" />
		<meta charset="utf-8">
		<link rel="shortcut icon" href="pictures/monstre_icone.png" type="image/vnd.microsoft.icon" /> 
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="bootstrap/bootstrap.css" />
		
		<!-- override style with our.-->
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="design.css" />
		
	</head>
	<body>
	
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="<?php echo PATH_URL?>">iDevWeb</a>
					<ul class="nav">
						<li><a href="<?php echo MAMP_URL?>">Mamp</a></li>
						<li><a href="configFolder.php">Configuration</a></li>
						<?php echo ((isset($_SESSION['USER']) && AUTHENTICATION) ? '<li><a href="login.php">Déconnexion</a></li>' : '') ?>
					</ul>
				</div>
			</div>
		</div>
	
		<div class="container">
	
			<div class="content">
				<div class="row">
					<div class="span14">
					
						<table class="zebra-striped">
							<thead>
								<tr>
									<th>Nom</th>
									<th>Derniere modification</th>
									<th>Ignoré</th>
								</tr>
							</thead>
							<tbody>
								<form method="post" action="saveConfigFolder.php">
								<?php
								$root_folder = opendir(PATH_FOLDER);
								while ($folder = readdir($root_folder)) {
								  	if (is_dir(PATH_FOLDER.'/'.$folder)) {
								  		$date = date("d/m/Y - H:i:s", filemtime(PATH_FOLDER.'/'.$folder));
								  		
								  		$showFolder = '';
								  		if (isset($dontList[$folder])){
								  			$showFolder = '<input type="checkbox" name="'.str_replace(".", "$", str_replace("_", "%", $folder)).'" checked="checked" />';
								  		} else {
								  			$showFolder = '<input type="checkbox" name="'.str_replace(".", "$", str_replace("_", "%", $folder)).'" />';
								  		}
								  		
										echo '
										<tr >
											<td>'.$folder.'</td>
											<td>'.$date.'</td>
											<td>'.$showFolder.'</td>
										</tr>';
								  	}
								}
								closedir($root_folder);
								
								?>
									<input type="submit" class="btn primary" id="submit" value="Enregistrer la configuration" />
								</form>
							</tbody>
						</table>

					</div>
			</div>
		</div>
	</body>
	<footer>
		<p>&copy; Benoit PASQUIER - 2012</p>
	</footer>

</html> 

