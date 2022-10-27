 <?php
 // inclusion du modèle
 require_once "modele/modeleClubs.php";

 // inclusion des contrôleurs
 require_once "controleur/controleurs.php";


 // lancement du bon contrôleur
 if ( !isset($_GET["action"]) )
 chargementFormConnexion();
 else
 if ($_GET["action"] == 'RU')
	rechercheUtilisateur();
 else
	 if ($_GET["action"] == 'D')
		deconnexion();
else
 if ($_GET["action"] == 'FA')
 // cas du formulaire d'ajout
 chargementFormAjoutClub();
 else
 if ($_GET["action"] == 'A')
 // cas de l'ajout
 ajoutClub();
 else
 if ($_GET["action"] == 'MS')
 // cas de l'aiguillage entre mise à jour et suppression
 aiguillageClub();
 else
 if ($_GET["action"] == 'M')
 // cas de la mise à jour
 modifClub();
 else
 if ($_GET["action"] == 'S')
 // cas de la suppression
 supprClub();
 else
 if ($_GET["action"] == 'FR')
 chargementRechercheClub();
 else
 if ($_GET["action"] == 'R')
 chargementClubs();
/*
 else
 if ($_GET["action"] == 'E')
	 insLog();
 */
?>
