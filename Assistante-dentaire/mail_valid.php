<?php
/*
confirm_mail
Script de verif de validité d'adresse email.
Le nouveau membre en suivant le lien de confirm dans son email envoie $idm
qui correspond au mail+pseudo cryptés.
Si ok, on passe le champs validation de 1 à 0.
*/

if ($_REQUEST['idm']=="") header("location: index.php");


$ok=0;

$res=mysql_query("SELECT nom,prenom,email,pass1 FROM membres");
while($row=mysql_fetch_array($res)) if ($_REQUEST['idm']== md5($row['email'].$row['pass1'])) {
  $email = $row['email'];
  $res2=mysql_query("UPDATE $table_membre SET validation=1, verif_email=2 where email='$email'");
  if (mysql_error()=="") {

  };
  

  $post="inscription"; $connect=1;
  $_POST['email']=$row['email'];
  $_POST['pass']=$row['pass1'];
  @include("commun/connect.php");  // Permet la connexion du membre





//header("location: $adresse_site1/index.php?cat=paiement");
header("location: index.php?cat=compte&new_connexion=1");
}


// new_connexion : affiche une pop up dans le compte pour proposer le cadeau MACSF













?>
