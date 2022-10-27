<!-- définition de l'en-tête de la page HTML -->
<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" 
 href="vue/bootstrap.min.css" />
 <title>Liste des clubs</title>
 <script>
 function confirmSuppr(form)
 {
 if (confirm("Supprimer ce club de code " +
 form.codeclubAction.value))
 // suppression confirmée
 form.submit();
 }
 </script>
</head>
<body>
 <div class="container">
 <h1>Liste des clubs</h1><br />
 <!-- mise en place du tableau -->
 <table class="table table-bordered table-striped">
 <!-- mise en place de la ligne de titre -->
 <tr>
 <th>Id</th>
 <th>Nom</th>
 <th>Département</th>
 <th>nombre de victoire championnat français</th>
 <th>Action 1</th>
 <th>Action 2</th>
 </tr>
 <!-- affichage de chacune des lignes du tableau -->
 <?php foreach ($departements as $departement): ?>
 <!-- mise en place d'un formulaire -->
 <form method="post" 
 action="index.php?action=R">
 <!-- champ caché pour le code de l'employé de la ligne -->
 <input type="hidden" 
 name="codeclubAction" 
value="<?php echo
 $departement["id"]; ?>" />
 <!-- affichage de la ligne courante -->
 <tr>
 <td><?php echo $departement["id"]; ?></td>
 <td><?php echo $departement["nomclub"]; ?></td>
 <td><?php echo $departement["departement"];?></td>
 <td><?php 
 echo $departement["nbChampionsFrance"];?></td>
 <td><input type="submit" name="modif" 
 value="Modifier" /></td>
 <td><input type="button" value="Supprimer"
 onClick="confirmSuppr(form);" />
 </td>
 </tr>
 </form>
 <?php endforeach; ?>
 <!-- fin du tableau -->
 </table>
 <br /><br />
 <p>
 <a href="controleur/controleurs.php">
 Annuler : Retour au menu des clubs</a>
 </p>
 </div>
 </body>
 
</html>