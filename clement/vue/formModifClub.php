 <!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" 
 href="vue/bootstrap.min.css" />
 <title>Modification d'un club</title>
 </head>
 <body>
 <div class="container">
 
 <h1>Modification d'un club</h1> <br />
 <form method="post"
 action="index.php?action=M">
 <p>
 <label>Code</label><br />
 <input type="text" name="code" 
 value="<?php
 echo $club["id"];
 ?>"
 readonly="readonly"
 />
 </p>
 
 <p>
 <label for="nom">Nom</label><br /> 
 <input type="text" name="nom" id="inom"
 value="<?php
 echo $club["nomclub"];
 ?>"
 />
 </p>
 <p>
 <label for="departement">departement</label><br />
 <input type="text" name="dep" id="iprenom"
 value="<?php
 echo $club["departement"];
 ?>"
 /> 
 </p>
 <p>
 <label for="nbvictchamp">nombre victoire championnat français</label><br />
 <input type="text" name="nbvict" id="iannee"
 value="<?php
 echo $club["nbChampionsFrance"];
 ?>"
 /> 
 </p>
 <br />
 <p>
 <input type="submit" 
 value="Valider les modifications" />
 </p>
 <br />
 
 </form>
 <p>
<a href="index.php">
 Annuler : Retour au menu des clubs</a>
 </p>
 </div>
 </body> 
</html>
