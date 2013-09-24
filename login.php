<?php
// auteur: Benoit PASQUIER
// version: IDevWeb 1.1

session_start();
$_SESSION['USER'] = null;
require('config.php');

if (!AUTHENTICATION){
	header('Location: '.PATH_URL);
}

if (isset($_POST['login'])) {
	
	$login = (isset($_POST['login']) ? $_POST['login'] : '');
	$password = (isset($_POST['password']) ? $_POST['password'] : '');
	
	if ($login === LOGIN && $password === PASSWORD) {
		$_SESSION['USER'] = $login;
		header('Location: '.PATH_URL);
	} else {
		header('Location: '.PATH_URL.'login.php');
	}
}

?>
<!DOCTYPE HTML>  
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<title>Local</title>
		<meta http-equiv="Content-Language" content="fr" />
		<meta charset="utf-8">
		<link rel="shortcut icon" href="pictures/monstre_icone.png" type="image/vnd.microsoft.icon" /> 
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap-modal.js"></script>
		<link rel="stylesheet" media="screen" type="text/css" title="Design" href="bootstrap/bootstrap.css" />
		
		<style type="text/css">
      		/* Override some defaults */
      		html, body {
      		  background-color: #eee;
      		}
      		body {
      		  padding-top: 40px; /* 40px to make the container go all the way to the bottom of the topbar */
      		}
      		.container > footer p {
      		  text-align: center; /* center align it with the container */
      		}
      		.container {
      		  width: 820px; /* downsize our container to make the content feel a bit tighter and more cohesive. NOTE: this removes two full columns from the grid,
      		  meaning you only go to 14 columns and not 16. */
      		}
	  		
      		/* The white background content wrapper */
      		.content {
      		  background-color: #fff;
      		  padding: 20px;
      		  margin: 0 -20px; /* negative indent the amount of the padding to maintain the grid system */
      		  -webkit-border-radius: 0 0 6px 6px;
      		     -moz-border-radius: 0 0 6px 6px;
      		          border-radius: 0 0 6px 6px;
      		  -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
      		     -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
      		          box-shadow: 0 1px 2px rgba(0,0,0,.15);
      		}
	  		
      		/* Page header tweaks */
      		.page-header {
      		  background-color: #f5f5f5;
      		  padding: 20px 20px 10px;
      		  margin: -20px -20px 20px;
      		}
	  		
      		/* Styles you shouldn't keep as they are for displaying this base example only */
      		.content .span10,
      		.content .span4 {
      		  min-height: 500px;
      		}
      		/* Give a quick and non-cross-browser friendly divider */
      		.content .span4 {
      		  margin-left: 0;
      		  padding-left: 19px;
      		  border-left: 1px solid #eee;
      		}
	  		
      		.topbar .btn {
      		  border: 0;
      		}
      		
      		footer {
      			text-align: center;
      		}
	  		
    	</style>
	</head>
	<body>
	
		<div class="topbar">
			<div class="fill">
				<div class="container">
					<a class="brand" href="">iDevWeb</a>
				</div>
			</div>
		</div>
	
		<div class="container">
	
					
					<div id="modal-from" class="modal ">
						<div class="modal-header">
							<a href="#" class="close">&times;</a>
							<h3>Login</h3>
						</div>
						<div class="modal-body">
							<form action="login.php" method="post">

								<label for="login">Login:</label> <input type="text" name="login" id="login">
								<span class="help-inline"></span>
								<br /><br />
								<label for="password">Password:</label> <input type="password" name="password" id="password">
								<span class="help-inline"></span>
						</div>		
							<div class="modal-footer">
								<input type="submit" class="btn primary" id="submit"
									value="Connexion">
							</div>
						</form>
		</div>
	</body>
</html> 

