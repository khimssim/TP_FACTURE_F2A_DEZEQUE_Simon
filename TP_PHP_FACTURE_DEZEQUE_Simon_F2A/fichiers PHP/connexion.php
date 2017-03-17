<?php
session_start();


	$bdd = new PDO ('mysql:host=127.0.0.1;dbname=facture','root','');
	
	if(isset($_POST['connexion']))
	{		 
			$pseudo = htmlspecialchars($_POST['pseudo']); // Convertit les caractères spéciaux en entités HTML
			$mdp = sha1($_POST['mot_de_passe']); //hachage du mot de passe 
		
			if(!empty ($pseudo) AND !empty ($mdp)) // si les champs pseudos et mot de passes sont rempli alors on fais la requetes 
			{
				$requser = $bdd ->prepare ("SELECT * FROM client WHERE pseudo = ? AND mdp = ?");
				$requser ->execute (array($pseudo,$mdp));
				$userexist = $requser ->rowCount();
				
				if ($userexist == 1) // si l'user est egal à 1 alors on est connecté
				{
					$userinfo = $requser->fetch();
					$_SESSION['id'] = $userinfo['id'];
					$_SESSION['pseudo'] = $userinfo['pseudo'];
					header("Location: facture.php?id=".$_SESSION['id']);
				} else{
					
					$erreur = "Mauvais pseudo ou mot de passe";
				}
			
			
			} else 
			{
				$erreur="Il manque une information";
			
			}
		
	}

?>

<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
		<link rel="stylesheet"  href="style.css"/>

        <title>Tp facture</title>

    </head>

    <body>
		<!--formulaire de connection -->
        <h1> Veuillez vous connecter pour accéder aux factures</h1>
	<div id="connexion">
        <form action="" method="post" class="login">

            <p>
			<input type="text" name="pseudo" placeholder="pseudo" class="user"/> 
			</br>
			</br>

            <input type="password" name="mot_de_passe" placeholder="mot de passe" class="user"/>
			</br>
			</br>
			<input type="submit" name ="connexion" value="Se connecter" class="connect" />
			</br>
			</br>
			 <a href="inscription.php">pas encore inscrit?</a> 
	
            </p>
	
	</div>
        </form>
<?php
		if (isset($erreur))
		{
			echo '<font color="white">'.$erreur."</font>"; // le message d'erreur sera affiché en blanc
		}
	?>
    </body>

</html>