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
	$SQL = "SELECT ID_UTIL FROM UTILISATEUR WHERE NOM_UTIL='$login' AND MOT_DE_PASSE='$passe'";
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
function get_BooksByUser($idUser)
{
	// Récupère la liste des livres de l'utilisateur dont l'id est passé en paramètre
	$SQL = "SELECT * FROM LIVRES WHERE PROPRIETAIRE_ID = $idUser";
	return parcoursRs(SQLSelect($SQL));
}
function get_author_name($id_book)
{
	// Récupère le nom de l'auteur du livre dont l'id est passé en paramètre
	$SQL = "SELECT NOM_UTIL FROM UTILISATEUR WHERE ID_UTIL = $id_book";
	return SQLGetChamp($SQL);
}

function get_book($id_book)
{
	// Récupère les détails du livre dont l'id est passé en paramètre
	$SQL = "SELECT * FROM LIVRES WHERE ID_LIVRE = $id_book";
	return parcoursRS(SQLSelect($SQL))[0];
}

function get_messages($idUser, $idreceiver, $idbook)
{
    // Récupère les messages entre $idUser et $idreceiver pour le livre $idbook
    $SQL = "SELECT * FROM MESSAGES 
            WHERE 
                ((ID_SENDER = $idUser AND ID_RECEIVER = $idreceiver) 
                OR (ID_SENDER = $idreceiver AND ID_RECEIVER = $idUser))
            AND ID_BOOK = $idbook
			ORDER BY DATE_ENVOI ASC";
			// l'o
    return parcoursRs(SQLSelect($SQL));
}
function send_message($idSender, $idReceiver, $idBook, $content)
{
	// Ajoute un message à la base de données
	$SQL = "INSERT INTO MESSAGES (ID_SENDER, ID_RECEIVER, ID_BOOK, CONTENT, DATE_ENVOI) 
			VALUES ($idSender, $idReceiver, $idBook, '$content', NOW())";
	return SQLInsert($SQL);
}
function Search($content)
{
	// Recherche des livres dont le nom contient le contenu passé en paramètre
	$SQL = "SELECT * FROM LIVRES WHERE NOM_LIVRE LIKE '%$content%'";
	return parcoursRs(SQLSelect($SQL));
}

?>

