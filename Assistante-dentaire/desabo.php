<?php
/*
lien de désobonnement de la mailing liste
*/


$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$emailing=$_GET['emailing'];

$from_adress='mailling@sites-chirdent.com';


echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">Confirmation de d&eacute;sabonnement</font></td></tr>
<tr><td valign="top">
<br />
<br />';




if ($submit)
{

$res2=mysql_query("UPDATE $table_membre SET OK_emailing=0 where email='$emailing'");

echo "Modification effectu&eacute;e";

}


else {


echo "

Voulez vous vraiment vous d&eacute;sinscrire de la newsletter : 
<br /><br />
Newsletter des sites Dentiste-Remplacant.com, Cabinet-Dentaire.com, Assistante-Dentaire.com
<br /><br />
avec l'adresse suivante :  $emailing

<form method='post' action='index.php?cat=desabo&amp;emailing=$emailing'>
<input type='submit' value='D&eacute;sabonnement' name='submit' style='font-size: 8pt; font-family: Verdana'>

</form>

<br /> 
Il sera possible de vous r&eacute;abonner dans VOTRE COMPTE : onglet \"Votre compte\"  > \"Modifier vos pr&eacute;f&eacute;rences\"
";


};


?>
