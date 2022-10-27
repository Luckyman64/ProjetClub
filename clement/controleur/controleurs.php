<?php
	function supprClub($idC)
	{
	 // inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // suppression de l'employé : appel de la fonction delEmploye du modèle
	delClub($idC);
	 
	// recherche des employés : appel de la fonction getEmployes du modèle
	 $clubs = getClubs();
	 
	 // inclusion du fichier d'affichage des employés de la vue
	 require_once "vue/listeClubs.php";
	}
	function modifClub()
	{
	 // inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // récupération des données du formulaire
	 $codeC = htmlspecialchars($_POST["code"]);
	 $nomC = htmlspecialchars($_POST["nom"]);
	 $departC = htmlspecialchars($_POST["dep"]);
	 $nbchampC = htmlspecialchars($_POST["nbvict"]);
	 // mise à jour de l'employé : appel de la fonction updEmploye
	 // du modèle
	updClub($codeC, $nomC, $departC, $nbchampC);
	 
	// recherche des employés : appel de la fonction getEmployes du modèle
	 $clubs = getClubs();
	 
	 // inclusion du fichier d'affichage des employés de la vue
	 require_once "vue/listeClubs.php";
	}
	function consultClubs()
	{
		// inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // recherche des employés : appel de la fonction getEmployes du modèle
	 $clubs = getClubs(); 
	 // inclusion du fichier d'affichage des employés de la vue
	 require_once "vue/listeClubs.php";
	}
	function chargementRechercheClub()
	{ // inclusion du formulaire d'ajout d'un employé
	 require_once "modele/modeleClubs.php";
	 
	 $departements = getDepartements();
	// echo $departements;
	 require_once "vue/RechercheClub.php";
	}
	function chargementFormAjoutClub()
	{
		// inclusion du formulaire d'ajout d'un employé
	require_once "vue/formAjoutClub.html";
	}
	function chargementFormConnexion()
{
require_once "vue/formConnexion.php";
}
	function chargementClubs()
	{
		 // inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // récupération du code employé
	 $departementC = htmlspecialchars($_POST["departement"]);

	 $departements = getRechercheDepartements($departementC);
	 // inclusion du contrôleur de suppression
	 require_once "vue/affichageClub.php";
	 
	 //require_once "vue/essai.php";
	}
	function ajoutClub()
	{
		 // inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // récupération des données (champs) du formulaire
	 $nomC = htmlspecialchars($_POST["nom"]);
	 $departC = htmlspecialchars($_POST["dep"]);
	 $nbchampC = htmlspecialchars($_POST["nbvict"]);
	 // ajout de l'employé : appel de la fonction insEmploye du modèle
	 insClub($nomC, $departC, $nbchampC);
	 
	// recherche des employés : appel de la fonction getEmployes du modèle
	 $clubs = getClubs();
	 
	 // inclusion du fichier d'affichage des employés de la vue
	 require_once "vue/listeClubs.php";
	}
	function aiguillageClub()
	{
		// inclusion du modèle
	 require_once "modele/modeleClubs.php";
	 // récupération du code employé
	 $idC = htmlspecialchars($_POST["codeclubAction"]);
	 
	 // aiguillage
	 if (isset($_POST["modif"]))
	 {
	 // recherche de l'employé correspondant à ce code via la fonction getEmploye
	 // du modèle
	 $club = getClub($idC);
	 // inclusion du formulaire de modification (vue)
	 require_once "vue/formModifClub.php";
	 }
	 else
	 // inclusion du contrôleur de suppression
	 supprClub($idC);
	}
	function rechercheUtilisateur()
{
// démarrage d'une nouvelle session
// doit être la première instruction de la page
session_start();
// récupération des données de la fenêtre de connexion avec sécurisation
// A MODIFIER
$nomU = htmlspecialchars($_POST["nomU"]);
$motDePasseU = htmlspecialchars($_POST["motDePasseU"]);

// création d'une variable de session pour le nom utilisateur
$_SESSION["nomUtil"] = $nomU;
// recherche de l'utilisateur : appel de la fonction getUtilisateur du modèle
// A COMPLETER
$utilisateur = getUtilisateur($nomU, $motDePasseU);
if (!$utilisateur ) // A COMPLETER
 {
 // utilisateur inexistant : retour à la page de connexion : A COMPLETER
 require_once "vue/formConnexion.php";
 }
else
 {
	 insLog();
 // utilisateur existant
 // création de 3 variables de session pour le nom et le prénom complet
 // (données personnelles), et le type d'utilisateur
 $_SESSION["nomComp"] = $utilisateur['nomComplet'];
 $_SESSION["prenomComp"] = $utilisateur['prenomComplet'];
 $_SESSION["typeUtil"] = $utilisateur['Type'];
 // recherche des employés : appel de la fonction getEmployes du modèle
 $clubs = getClubs();
 // inclusion du fichier d'affichage des employés de la vue
 require_once "vue/listeClubs.php";
 }
}
?>
