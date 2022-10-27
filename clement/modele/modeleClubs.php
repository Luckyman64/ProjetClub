<?php
 // fonction de connexion au serveur de base de données et à la base de données
 function connexionBd()
 {
 
 // remplissage de variables qui serviront de paramètres de connexion
 $utilisateur = "root";
 $mot_de_passe = "";
 $serveur_et_base = "mysql:host=localhost;dbname=clement";
 // connexion à la base de données
 try
 {
 // création d'un objet de la classe (composant logiciel) PDO : instanciation
$bd = new PDO($serveur_et_base, $utilisateur,
 $mot_de_passe);
}
catch(Exception $e)
 {
 // affichage d'un message d'erreur et arrêt du script
 die("Erreur : ".$e->getMessage());
 }
 
 // retour de la référence à la base de données
 return $bd;
 
 }
 
 // fonction renvoyant le tableau des employés
 function getClubs()
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 
 // constitution de la requête de sélection dans la table employes
 $requete = "SELECT * FROM clubs";
 
 // exécution de la requête et renvoi du résultat
 $bd->query("SET NAMES utf8");
 $resultat = $bd->query($requete);
 // initialisation du tableau à vide
 $tabClubs = array();
 // boucle de balayage du résultat de la requêteArchitecture MVC
 // et constitution du tableau PHP $empls
 while ( $ligne = $resultat->fetch() )
 {
 $tabClubs[] = $ligne;
 }
 // fermeture du curseur relatif au résultat
 $resultat->closeCursor();
 return $tabClubs;
 
 } 
 
 
// fonction renvoyant l'employé correspondant à un certain code
 function getClub($idC)
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 
 // préparation de la requête de sélection dans la table employes
 $requete = $bd->prepare("SELECT * FROM clubs 
 WHERE id = :idCl");
 // exécution de la requête
 $bd->query("SET NOMCLUB utf8");
 $requete->execute(['idCl' => $idC]);
 
 // récupération de la ligne du résultat
 $tabClub = $requete->fetch();
 
 return $tabClub;
 
 }
 
 
 // fonction ajoutant un employé
 function insClub($nomC, $departC, $nbchampC)
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 /*$id_connexion = new mysqli("localhost", "root", "", "clement");*/

 // préparation de la requête d'insertion dans la table employes
 $requete = $bd->prepare("INSERT INTO clubs 
 (nomclub, departement, nbChampionsFrance) 
VALUES 
(:nomCl, :departCl, :nbchampCl)"); 
 // exécution de la requête
 $bd->query("SET NOMCLUB utf8");
 $requete->execute(['nomCl' => $nomC,
 'departCl' => $departC,
 'nbchampCl' => $nbchampC]); 
/*$nomC = mysqli_real_escape_string($id_connexion, $nomC);
 $requete =
"INSERT INTO clubs (nomclub, departement, nbChampionsFrance)
 VALUES ('$nomC', $departC, $nbchampC)";
// exécution de la requête
$bd->query("SET NAMES utf8");
$bd->query($requete);*/

 
 }
 
 
 // fonction mettant à jour un employé
 function updClub($idC, $nomC, $departC, $nbchampC)
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 
 // préparation de la requête de mise à jour dans la table employes
 $requete = $bd->prepare("UPDATE clubs 
 SET nomclub = :nomCl, departement = :departCl,
 nbChampionsFrance = :nbchampCl
 WHERE id = :idCl");
 
 // exécution de la requête 
 $bd->query("SET NOMCLUB utf8");
 $requete->execute(['nomCl' => $nomC,
 'departCl' => $departC,
 'nbchampCl' => $nbchampC,
 'idCl' => $idC]);
 
 }
 
 
 // fonction supprimant un employé
 function delClub($idC)
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 
 // préparation de la requête de suppression dans la table employes
 $requete = $bd->prepare("DELETE FROM clubs 
 WHERE id = :idCl");
 // exécution de la requête
 $bd->query("SET NOMCLUB utf8");
 $requete->execute(['idCl' => $idC]);
 }
 
 function getDepartements()
 {
	 $bd = connexionBd();
	 
	 $requeteRech = "SELECT DISTINCT departement FROM clubs ORDER BY departement";
	 $bd->query("SET NAMES utf8");
	 $resultat = $bd->query($requeteRech);
	 $tabRechClubs = array();
	 while ( $ligne = $resultat->fetch() )
	 {
	 $tabRechClubs[] = $ligne;
	 }
	 $resultat->closeCursor();
	 return $tabRechClubs;
 }
 function getRechercheDepartements($departementC)
 {
	 $bd = connexionBd();
	 
	 $requeteRech = "SELECT * FROM clubs WHERE departement = '$departementC' ORDER BY nomclub ";
	 $bd->query("SET NAMES utf8");
	 $resultat = $bd->query($requeteRech);
	 $tabRechClubs = array();
	 while ( $ligne = $resultat->fetch() )
	 {
	 $tabRechClubs[] = $ligne;
	 }
	 $resultat->closeCursor();
	 return $tabRechClubs;
 }
  function fillUtilisateurs()
{
// appel de la fonction de connexion à la base de données
// renvoyant une référence à la base de données
$bd = connexionBd();

// requête d'insertion APRES CHIFFRAGE DU MOT DE PASSE
$mdpChiffre = password_hash("Picsou1", PASSWORD_DEFAULT);
$requete = "INSERT INTO utilisateurs
 VALUES
 ('ptronc', '$mdpChiffre', 'TRONC', 'Paul', 'U')";
// exécution de la requête
$bd->query("SET NAMES utf8");
$bd->query($requete);

// requête d'insertion APRES CHIFFRAGE DU MOT DE PASSE
$mdpChiffre = password_hash("Donald2", PASSWORD_DEFAULT);
$requete = "INSERT INTO utilisateurs
 VALUES 
 ('jnastic', '$mdpChiffre', 'NASTIC', 'Jim', 'A')";
// exécution de la requête
$bd->query("SET NAMES utf8");
$bd->query($requete);

// requête d'insertion APRES CHIFFRAGE DU MOT DE PASSE
$mdpChiffre = password_hash("Mickey3", PASSWORD_DEFAULT);
$requete = "INSERT INTO utilisateurs
 VALUES
 ('phibulaire', '$mdpChiffre', 'HIBULAIRE', 'Pat', 'U')";
// exécution de la requête
$bd->query("SET NAMES utf8");
$bd->query($requete);

}
function getUtilisateur($nomU, $motDePasseU)
{

// appel de la fonction de connexion à la base de données
// renvoyant une référence à la base de données
$bd = connexionBd();

$requete = $bd->prepare("SELECT * FROM utilisateurs
 WHERE nomUtilisateur = :nomUt");
 $bd->query("SET NAMES utf8");
$requete->execute(['nomUt' => $nomU]);
$util = $requete->fetch();
if(!$util){
	return false;
}
else{
	$mdphs = $util["motDePasse"];
if (password_verify($motDePasseU, $mdphs))
 {
	 return $util;
 }
else
	return false;
}

}
function deconnexion()
{
// démarrage d'une nouvelle session ou reprise d'une session existante :
// doit être la première instruction de la page
session_start();
// suppression des variables de session
$_SESSION = array();
// destruction de la session
session_destroy();
// retour à la page de connexion
require_once "vue/formConnexion.php";
}

 function insLog()
 {
 
 // appel de la fonction de connexion à la base de données
 // renvoyant une référence à la base de données
 $bd = connexionBd();
 /*$id_connexion = new mysqli("localhost", "root", "", "clement");*/

 // préparation de la requête d'insertion dans la table employes
 $requete = $bd->prepare("INSERT INTO logs 
 (nomUtilisateur, dateConnexion, heureConnexion) 
VALUES 
(:nomU, CURDATE(), CURTIME())"); 
 // exécution de la requête
 $bd->query("SET NOMCLUB utf8");
 $requete->execute(['nomU' => $_SESSION["nomUtil"]]); 

 }
?>