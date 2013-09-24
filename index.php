<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1

session_start();
require('config.php');

if (AUTHENTICATION && (!isset($_SESSION['USER']) || empty($_SESSION['USER'])))
{
	header('Location: '.PATH_URL.'login.php');
}

// tableau avec les valeurs qu'on ne veut pas afficher
$dontList = getFolderToShow();

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
									<th>Acces</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$root_folder = opendir(PATH_FOLDER);
							while ($folder = readdir($root_folder)) {
							  	if ( !isset($dontList[$folder])  && is_dir(PATH_FOLDER.'/'.$folder)) {
							  		$date = date("d/m/Y - H:i:s", filemtime(PATH_FOLDER.'/'.$folder));
									echo '
									<tr>
										<td>'.$folder.'</td>
										<td>'.$date.'</td>
										<td><a href="'.PATH_URL.$folder.'"><button class="btn info">Acces</button></a></td>
									</tr>';
									
							  	}
								
							}
							closedir($root_folder);
							
							?>
							</tbody>
						</table>
						<button data-controls-modal="modal-from" data-backdrop="true" data-keyboard="true" class="btn success">Ajouter un projet</button>


					</div>
					<div id="modal-from" class="modal hide fade">
						<div class="modal-header">
							<a href="#" class="close">&times;</a>
							<h3>Ajouter un projet / dossier</h3>
						</div>
						<div class="modal-body">
							<div>
								Limitez vous aux espaces et underscore.
							</div>
							<form action="<?php echo PATH_URL?>addFolder.php" method="post">

								<label for="name">Nom du dossier:</label> <input type="text" name="name" id="name">
								<span class="help-inline"></span>
						</div>		
							<div class="modal-footer">
								<input type="submit" class="btn primary" id="submit"
									value="Ajouter">
							</div>
						</form>
					</div>
			</div>
		</div>
	</body>
	<footer>
		<p>&copy; Benoit PASQUIER - 2012</p>
	</footer>
	<script>
		$(function() {
		    $('#modal-from').modal({
		    	keyboard : true
		    });
		    
			$("#modal-subview").click(function(){
				console.log("click");
  				$("#container").animate({"left": "-=50px"}, "slow");
			});
		});
	</script>
</html> 

