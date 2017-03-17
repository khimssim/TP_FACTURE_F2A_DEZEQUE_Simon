<?php
session_start(); // on démarre la session 

$bdd = new PDO ('mysql:host=127.0.0.1;dbname=facture','root',''); // connexion à la base de donnée

if (isset($_GET['id']) AND $_GET['id']> 0 ) // verification si l'ID est supérieur à 0
{
	// récupération des données de l'ID du client 
	$getid = intval($_GET['id']);
	$requser = $bdd-> prepare ('SELECT * FROM client WHERE id =?');
	$requser-> execute (array($getid));
	$userinfo = $requser-> fetch();

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
		<!--menu principal l'utilisateur choisi ce qu'il souhaite faire -->
        <h1> Salut Bienvenue <?php echo $userinfo['pseudo']; ?>, c'est ta page perso !</h1>
		<ul id="menu">

			<li><a href="clients.php">gestion clients</a></li>

			<li><a href="produits.php">gestion produits</a></li>	

			<li><a href="">afficher la facture</a></li>


		</ul>
    </body>
</html>
<?php
}
?>
