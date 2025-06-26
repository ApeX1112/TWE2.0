<?php
session_start();

	include_once "libs/maLibUtils.php";
	include_once "libs/maLibSQL.pdo.php";
	include_once "libs/maLibSecurisation.php"; 
	include_once "libs/modele.php"; 

	$qs = "";

	if ($action = valider("action"))
	{
		ob_start ();

		echo "Action = '$action' <br />";

		switch($action)
		{

			case 'Connexion' :
				// On verifie la presence des champs login et passe
				if ($login = valider("login"))
				if ($passe = valider("passe"))
				{
					session_destroy();
					session_start(); 
					// On verifie l'utilisateur, et on crée des variables de session si tout est OK
					// Cf. maLibSecurisation
					verifUser($login,$passe); 	
				}

				// On redirigera vers la page index automatiquement
				if (isset($_SESSION["connecte"]) && $_SESSION["connecte"] == true)
				{
					// On redirige vers la page d'accueil
					$qs = "?view=accueil";
				}
				else
				{
					// On redirige vers la page de connexion avec un message d'erreur
					$qs = "?view=login&msg=" . urlencode("Identifiant ou mot de passe incorrect");
				}
				
			break;

			case 'Logout' :
				session_destroy();
				$qs = "?view=login&msg=" . urlencode("A bientôt !");
				break;
			case 'Send' :
				// on envoie le message
				if ($idreceiver = valider("idreceiver"))
				if ($idbook = valider("idbook"))
				if ($content = valider("content"))
				{
					// On envoie le message
					$ok = send_message($_SESSION['idUser'], $idreceiver, $idbook, $content);
					if ($ok)
					{
						// On redirige vers la page de messages
						$qs = "?view=messages&idreceiver=" . $idreceiver . "&idbook=" . $idbook;
					}
					else
					{
						// On redirige vers la page de messages avec un message d'erreur
						$qs = "?view=messages&idreceiver=" . $idreceiver . "&idbook=" . $idbook . "&msg=" . urlencode("Erreur lors de l'envoi du message");
					}
				}
				break;
			case 'Search' :
				// On effectue une recherche de livres
				if ($content = valider("content"))
				{
					// On effectue la recherche
					$books = Search($content);
					if ($books)
					{
						// On redirige vers la page d'accueil avec les résultats de la recherche
						$qs = "?view=accueil&search=" . urlencode($content);
					}
					else
					{
						// On redirige vers la page d'accueil avec un message d'erreur
						$qs = "?view=accueil&msg=" . urlencode("Aucun livre trouvé pour '$content'");
					}
				}
				break;
		}

	}

	// On redirige toujours vers la page index, mais on ne connait pas le répertoire de base
	// On l'extrait donc du chemin du script courant : $_SERVER["PHP_SELF"]
	// Par exemple, si $_SERVER["PHP_SELF"] vaut /chat/data.php, dirname($_SERVER["PHP_SELF"]) contient /chat

	$urlBase = dirname($_SERVER["PHP_SELF"]) . "/index.php";
	// On redirige vers la page index avec les bons arguments

	header("Location:" . $urlBase . $qs);
	//qs doit contenir le symbole '?'

	// On écrit seulement après cette entête
	ob_end_flush();
	
?>










