<?php

/*
Dans ce fichier, on définit diverses fonctions permettant de récupérer des données utiles pour notre TP d'identification. Deux parties sont à compléter, en suivant les indications données dans le support de TP
*/

// inclure ici la librairie faciliant les requêtes SQL (en veillant à interdire les inclusions multiples)
include_once("maLibSQL.pdo.php");

function isAdmin($idUser)
{
	// vérifie si l'utilisateur est un administrateur
}
function verifUserBdd($login,$passe)
{
	// Vérifie l'identité d'un utilisateur 
	// dont les identifiants sont passes en paramètre
	// renvoie faux si user inconnu
	// renvoie l'id de l'utilisateur si succès
	$SQL = "SELECT ID_MEMBRE FROM MEMBRE WHERE LOGIN='$login' AND MDP='$passe'";
	//die($SQL);
	return SQLGetChamp($SQL);

	// On utilise SQLGetCHamp
	// si on avait besoin de plus d'un champ
	// on aurait du utiliser SQLSelect
}
/*
function listerEchanges($mode="tout",$idUser)
{
	// Liste tous les échanges prévus à compter de la date courante
	// dans l'ordre anti-chrono
	// On se limite à 10 échanges maximum
	// mode = tout ==> tous les échanges en base
	if ($mode == "tout")
	{
		$SQL = "SELECT * FROM ECHANGE  ORDER BY DATE_ECHANGE DESC LIMIT 10";
		return parcoursRs(SQLSelect($SQL));
	}
	// mode = fournisseur ==> Tous les échanges prévus pour lesquels l'utilisateur courant est fournisseur
	if ($mode == "fournisseur")
	{
		$SQL = "SELECT * FROM ECHANGE JOIN V_ECHANGES ON ECHANGE.ID_ECHANGE=V_ECHANGES.ID_ECHANGE WHERE ID_FOURNISSEUR = $idUser ORDER BY ECHANGE.DATE_ECHANGE DESC LIMIT 10";
		return parcoursRs(SQLSelect($SQL));
	}
	// mode = consommateur ==> tous les échnages prévus pour elsquels l'utilisateur courant est consommateur
	if ($mode == "consommateur")
	{
		$SQL = "SELECT * FROM ECHANGE JOIN V_ECHANGES ON ECHANGE.ID_ECHANGE=V_ECHANGES.ID_ECHANGE WHERE  ID_CONSOMMATEUR = $idUser ORDER BY ECHANGE.DATE_ECHANGE DESC LIMIT 10";
		return parcoursRs(SQLSelect($SQL));
	}
	// Cette fonction peut exploiter la vue mise à disposition dans le modèle relationnel
	// fourni avec l'exercice V_ECHANGES
}*/

function get_Books()
{
	// Récupère la liste des livres de l'utilisateur
	// dont l'id est passé en paramètre
	// On utilise la vue V_LIVRES pour cela
	$SQL = "SELECT * FROM LIVRES ";
	return parcoursRs(SQLSelect($SQL));
}

?>
