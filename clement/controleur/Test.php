<?php
$motDePasseEnClair = "Picsou1";
$mdp1 = password_hash($motDePasseEnClair, PASSWORD_DEFAULT);
$mdp2 = password_hash($motDePasseEnClair, PASSWORD_DEFAULT);
$mdp3 = password_hash("Pacsou1", PASSWORD_DEFAULT);
 echo $mdp1 . '<br>';
 echo $mdp2 . '<br>';
 if (password_verify("Picsou1", $mdp3))
 {
 echo "Le mot de passe est valide." . "<br />";
 }
else
 {
 echo "Le mot de passe est invalide." . "<br />";
 }
 ?>