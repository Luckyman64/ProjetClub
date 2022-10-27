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
 <a href="index.php?action=D">Se déconnecter</a>
 <h1>Liste des clubs</h1><br />
 <a href="index.php?action=FR"> Rechercher un club</a>
 <!-- mise en place du tableau -->
 <table class="table table-bordered table-striped">
 <!-- mise en place de la ligne de titre -->
 <tr>
 <th>Id</th>
 <th>Nom</th>
 <th>Département</th>
 <th>nombre de victoire championnat français</th>
  <?php if($_SESSION["typeUtil"] == "A"){?>
 <th>Action 1</th>
 <th>Action 2</th>
  <?php }?>
 </tr>
 <!-- affichage de chacune des lignes du tableau -->
 <?php foreach ($clubs as $club): ?>
 <!-- mise en place d'un formulaire -->
 <form method="post"
 action="index.php?action=MS">
 <!-- champ caché pour le code de l'employé de la ligne -->
 <input type="hidden" 
 name="codeclubAction" 
value="<?php echo
 $club["id"]; ?>" />
 <!-- affichage de la ligne courante -->
 <tr>
 <td><?php echo $club["id"]; ?></td>
 <td><?php echo $club["nomclub"]; ?></td>
 <td><?php echo $club["departement"];?></td>
 <td><?php 
 echo $club["nbChampionsFrance"];?></td>
 <?php if($_SESSION["typeUtil"] == "A"){?>
 <td><input type="submit" name="modif" 
 value="Modifier" /></td>
 <td><input type="button" value="Supprimer"
 onClick="confirmSuppr(form);" />
 </td>
 <?php }?>
 </tr>
 </form>
 <?php endforeach; ?>
 <!-- fin du tableau -->
 </table>
 <br /><br />
  <?php if($_SESSION["typeUtil"] == "A"){?>
 <a href="index.php?action=FA">
 Ajouter un club</a></br>
  <?php }?>
 </div>
 </body>
 
</html>