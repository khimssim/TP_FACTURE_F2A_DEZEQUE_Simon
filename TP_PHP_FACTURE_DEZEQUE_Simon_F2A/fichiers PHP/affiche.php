<?php
session_start(); // on démarre la session 

$bdd = new PDO ('mysql:host=127.0.0.1;dbname=facture','root',''); // connexion à la base de donnée
	
	// selection des données dans la base, puis on execute la requetes avec les différentes affectations de chaque variables 
	$requser = $bdd-> prepare ('SELECT * FROM membres ORDER BY clientville ASC');
	$requser = $bdd-> prepare ('SELECT * FROM produits ');
	$requser-> execute (array($userinfo));
	$requser-> execute (array($userinfo));
	$userinfo = $requser-> fetch();

	$_SESSION['clientnom'] = $userinfo['clientnom'];
	$_SESSION['clientprenom'] = $userinfo['clientprenom'];
	$_SESSION['clientville'] = $userinfo['clientville'];
	$_SESSION['clientpays'] = $userinfo['clientpays'];
	$_SESSION['produits'] = $userinfo ['produits'];
	$_SESSION['prix'] = $userinfo ['prix'];
	
	

?> 
 <!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" href="styleFacture.css"/>

        <title>Tp facture</title>

    </head>
<header>
	<a href="connexion.php"> Se deconnecter? </a>
</header>
    <body>

        <h1>  ici on peut gerer les produits</h1>
		
		<ul id="menu">

			<li><a href="clients.php">gestion clients</a></li>

			<li><a href="produits.php">gestion produits</a></li>	

			<li><a href="">afficher la facture</a></li>


		</ul>
	
	<h1> Voici la facture elle peut etre imprimer</h1> 
	<!--affichage de la facture -->
	<p>NomClient: <?php echo $_SESSION ['clientnom']; ?>  </p>
	<br/>
	<br/>
	<p>PrenomClient:  <?php echo $_SESSION ['clientprenom']; ?>  </p>
	<br/>
	<br/>
	<p>VilleClient:  <?php echo $_SESSION ['clientville']; ?> </p>
	<br/>
	<br/>
	<p>PaysClient: <?php echo $_SESSION ['clientpays']; ?>  </p>
	<br/>
	<br/>
	<p>Produits: <?php echo $_SESSION ['produits']; ?></p>
	<br/>
	<br/>
	<p>PrixProduits <?php echo $_SESSION ['prix']; ?></p>
	<br/>
	<br/>
	<p>Prix de la facture:<?php echo $_SESSION['somme']; ?> </p>
	
	

	
    </body>
</html>