<?php
session_start();
include_once("config.php");


//current URL of the Page. cart_update.php redirects back to this URL
$current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<title>Prodavnica svetala</title>

		<link href="style/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="style/style.css" rel="stylesheet" type="text/css">


		<script src="./js/jquery-1.12.0.min.js"></script>
		<script src="./js/bootstrap.min.js"></script>
	</head>
	<body>
		<header id="header-content">
			<nav class="navbar navbar-default">
				<div class="container">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				        <span class="sr-only">Toggle navigation</span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="index.php"><img src="./images/logo.png"></a>
				    </div>

				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				      <ul class="nav navbar-nav navbar-right">
				        <li><a href="index.php">Pocetna</a></li>
				        <li><a href="about.php">O nama</a></li>
				        <li><a href="contact.php">Kontakt</a></li>
				      </ul>
				    </div>
				  </div>
			  </div>
			</nav>
		</header>