<?php
// nom d'utilisateur déjà saisi
if (isset($_SESSION["nomUtil"]))
 echo "<em>Nom d'utilisateur
 ou mot de passe incorrect</em>";
?>
<!DOCTYPE html>
<html lang="fr">
 <head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="vue/bootstrap.min.css" />
 <title>
 Fenêtre de connexion
 </title>
 </head>
 <body>
 <div class="container">
 <h1>Connexion</h1><br />
 <form method="post"
 action="index.php?action=RU">
 <p>
 <label for="inom">Votre nom
 d'utilisateur</label><br />
 <input type="text" name="nomU" id="inom"
 value="<?php
 if (isset($_SESSION["nomUtil"]))
 echo $_SESSION["nomUtil"];
 ?>"
 />
 </p>
 <p>
 <label for="imdp">Votre mot de passe</label><br />
 <input type="password" name="motDePasseU"
 id="imdp" />
 </p>
 <br /><br />
 <p>
 <input type="submit" value="Se connecter" />
 </p>
 <br />

 </form>


 </div>
 </body>
</html>
