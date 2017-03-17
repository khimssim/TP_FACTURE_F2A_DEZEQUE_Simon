<?php
session_start(); // on démarre la session 

$bdd = new PDO ('mysql:host=127.0.0.1;dbname=facture','root',''); // connexion à la base de donnée

			$produits = htmlspecialchars($_POST['produits']);
			$prix = ($_POST['prix']);
		
			//verification si les données produits et prix sont remplies 
			if (!empty($_POST['produits'] AND !empty ($_POST['prix'] )))
			{
					// insertions dans la base de données 
				$insertmbr = $bdd-> prepare ("INSERT INTO produits (produits, prix) VALUES (?, ?) ");
				$insertmbr ->execute (array($produits,$prix));
				$erreur ="Vous avez ajouter un produits !";
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

        <h1>  ici on peut gerer les produits</h1>
		<ul id="menu">

			<li><a href="clients.php">gestion clients</a></li>

			<li><a href="">gestion produits</a></li>	

			<li><a href="affiche.php">afficher la facture</a></li>


		</ul>
	
	<div id="add">
        <form action="" method="post" class="prod">
	<!--formulaire d'ajout d'un produits -->
            <h1> Ajouter un produit</h1>
			<input type="text" name="produits" placeholder="Ajouter un produit" class="produit"/> 
			</br>
			</br>

            <input type="text" name="prix" placeholder="prix" class="produit"/>
			</br>
			</br>
			<input type="submit" name ="add" value="ajouter" class="ajouter" /> 
	
            </p>
		</form>
		
	</div>
	
	<div id="add">
        <form action="" method="post" class="Dprod">

            <h1> Supprimer un produit</h1>
				<! --formulaire de suppression d'un produits -->
			<input type="text" name="Dproduit" placeholder="Supprimer un produit" class="Dproduit"/> 
			</br>
			</br>
			<input type="text" name="ConfirmationProduit" placeholder="Confirmer le produit" class="Dproduit"/> 
			</br>
			</br>

			<input type="submit" name ="delete" value="Supprimer" class="Delete" /> 
	
            </p>
		</form>
	</div>

	
    </body>
</html>
