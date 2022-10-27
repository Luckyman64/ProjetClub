<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" 
 href="vue/bootstrap.min.css" />
 <title>
 Recherche d'un club par département.
 </title>
 
 </head>
 <body>
 
 <div class="container">
 <h1>Recherche d'un club</h1><br />
 <form method="post" action="index.php?action=R">
 <select name="departement" id="choix-dep">
 <?php foreach ($departements as $departement): ?>
 
 <option value="<?php echo $departement["departement"];?>"><?php echo $departement["departement"];?></option>
 
 <?php endforeach; ?>
</select>
<p>
<input name="submit" type="submit" value="Rechercher"/>
 </p>
<form>
 <p>
 <a href="index.php">
 Annuler : Retour au menu des clubs</a>
 </p> 
 
 </div>
 

 </body>
</html> 