<?php
session_start(); // on démarre la session 

$bdd = new PDO ('mysql:host=127.0.0.1;dbname=facture','root',''); // connexion à la base de donnée

		   //affectation des données aux variables qui correspondent
			$clientnom = htmlspecialchars($_POST['clientnom']);
			$clientprenom = htmlspecialchars ($_POST['clientprenom']);
			$clientville = htmlspecialchars ($_POST['clientville']);
			$clientpays = htmlspecialchars ($_POST['clientpays']);
			
			// verification si les entrée ne sont pas vides 
			if (!empty($_POST['clientnom'] AND !empty ($_POST['clientprenom'] AND !empty ($_POST['clientville'] AND !empty ($_POST['clientpays'])))))
			{
				// insertion des données dans la base de données 
				$insertmbr = $bdd-> prepare ("INSERT INTO membres (clientnom,clientprenom,clientville,clientpays) VALUES (?, ?, ?, ?) ");
				$insertmbr ->execute (array($clientnom,$clientprenom,$clientville,$clientpays));
				$erreur ="Vous avez ajouter un client !";
			} else {
				$erreur ="il faut remplir tout les champs";
			}
			
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

        <h1>  ici on peut gerer les clients</h1>
		<ul id="menu">

			<li><a href="">gestion clients</a></li>

			<li><a href="produits.php">gestion produits</a></li>	

			<li><a href="affiche.php">afficher la facture</a></li>


		</ul>
		
	
<div id="add">
        <form action="" method="post" class="client">
	<!--formulaire d'ajout d'un client -->
            <h1> Ajouter un client</h1>
			<input type="text" name="clientnom" placeholder="Nom du client" class="Aclient"/> 
			</br>
			</br>
			<input type="text" name="clientprenom" placeholder="Prenom du client" class="Aclient"/>
			</br>
			</br>
			<input type="text" name="clientville" placeholder="Ville du client" class="Aclient"/>
			</br>
			</br>
			<input type="text" name="clientpays" placeholder="Pays du client " class="Aclient"/>
			</br>
			</br>
			<input type="submit" name ="add" value="ajouter" class="ajouter" /> 
	
        
		</form>
		
	</div>
	
	<div id="delete">
        <form action="" method="post" class="client">
	<!--formulaire de suppression d'un client -->
	
	<!-- pour les formulaires de suppressions j'aurais pensé faire une verification: si les champs entrée par l'utilisateur correspondent au données dans la base 
		Alors on supprime sinon on affiche un message d'erreur -->
            <h1> Supprimer un client</h1>
			<input type="text" name="Dproduit" placeholder="Supprimer un client" class="Sclient"/> 
			</br>
			</br>
			<input type="text" name="Confirmation client" placeholder="Confirmer le produit" class="Sclient"/> 
			</br>
			</br>

			<input type="submit" name ="delete" value="Supprimer" class="Delete" /> 
	
            </p>
		</form>
	</div>
	
    </body>
</html>
