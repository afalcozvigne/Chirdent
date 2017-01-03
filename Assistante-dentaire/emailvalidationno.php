<? // VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$mail=$_POST['mail'];


echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td colspan="2" valign="top"><font class="XXLdr">'.$txt_Nv_email_act.'</font><br /><br /></td></tr>
<tr><td valign="top"><img src="images/help_64.png" border="1" width="64" height="64" /></td>
<td>'.$txt_Activ01.'  
</td></tr>
<tr><td colspan="2" valign="top">
<br />
<br />';


// envoi du formulaire d email
if ($_POST['post']=="$txt_TexteEnv") {
	$mail=stripslashes(htmlentities(trim($mail)));
        $nom=stripslashes(htmlentities(trim($nom)));
       	$password=stripslashes(htmlentities(trim($password)));

if ($mail==="") $err_mail1=1;
if ($nom==="") $err_nom=1;
if ($password==="") $err_password=1;

if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $mail)==0) $err_mail2=1;;

// Vérif si existe bien dans la base
$verif=mysql_query("SELECT pass1 FROM $table_membre WHERE nom='$nom' AND pass1='$password'");
$row=mysql_fetch_array($verif);
if (mysql_num_rows($verif)==0) { $err_3=1;}



	if ($err_mail1=="" && $err_mail2=="" && $err_3=="" && $err_nom=="" && $err_password=="" ) {

// on change l'adresse email dans la BDD pour mettre le bon
$modif=mysql_query("UPDATE $table_membre SET email='$mail' WHERE nom='$nom' AND pass1='$password'");

$res2=mysql_query("SELECT email,pass1 FROM $table_membre WHERE nom='$nom' AND pass1='$password'");
$row2=mysql_fetch_array($res2);
  $nemail=$row2['email'];
  $npass=$row2['pass1'];

          // email de confirm

$idm=md5("$nemail$npass");
$message="-- Message automatique --\n
Bonjour,\n\nFélicitation, votre inscription aux sites de Dental Networks est prise en compte.\n
Pour valider votre adresse email et finaliser votre inscription, veuillez cliquer sur le lien suivant ou recopiez-le dans votre navigateur :\n
".$adresse_site1."/index.php?cat=mail_valid&idm=$idm \n\n
Vos identifiants sont:
      Email : $nemail
      Mot de passe : $npass\n\n
L'équipe de $titre_site vous remercie.\n- www.dentiste-remplacant.com\n- www.cabinet-dentaire.com\n- www.assistante-dentaire.com\n
-- Ne pas répondre à ce message --\nPour toute question, merci d'utiliser le formulaire de Contact.
";

$headers =  "From: robot@$titre_site2\r\n";
$headers .= "Reply-To: robot@nepasrepondre.com\r\n";


if (@mail($nemail, "[$titre_site3] - Vérification de votre adresse email", $message, $headers))

                {
		  echo ' <br /><div class="important">Un email vous a &eacute;t&eacute; post&eacute;. Pour poursuivre votre inscription, vous devez cliquer sur le lien d\'activation qui reste valide 48 heures. Pass&eacute; ce d&eacute;lai, votre compte sera supprim&eacute;.</div><br />
<br />
<strong>Important</strong> :<br />
- cet email peut mettre quelques minutes &agrave; arriver, si vous ne le recevez pas imm&eacute;diatement, actualisez votre logiciel de messagerie plusieurs fois.<br />
- si vous ne recevez pas l\'email de confirmation, il est possible que vous ayez mal tap&eacute; votre adresse email. Cliquez ici : <a href="index.php?cat=emailvalidationno" />Email de validation jamais re&ccedil;u</a><br />
';
		  $mail="";
		}
	}


}
?>


<br />



<center>

<?PHP echo $txt_Activ03 ?> : <br /><br />


    <?php

    if ($err_nom!="") echo "<span class='important'>$txt_Vnom ?</span><br />";
    if ($err_password!="") echo "<span class='important'>$txt_oubmail01 ?</span><br />";
    if ($err_mail1!="") echo "<span class='important'>$txt_identif ?</span><br />";
    if ($err_mail2!="") echo "<span class='important'>$txt_ouberr01</span><br />";
    if ($err_3!="") echo "<span class='important'>$txt_Activ02</span><br />";

    

    echo'
        <br />
    	<form method="post" action="index.php?cat=emailvalidationno">
            
       <table>
       <tr><td>'.$txt_Vnom.' :</td><td><input type="text" name="nom" size="30" value="'.$nom.'"> </td></tr>
       <tr><td>'.$txt_oubmail01.' : </td><td><input type="password" name="password" size="30" value="'.$password.'"></td></tr>
       <tr><td>'.$txt_identif.' : </td><td><input type="text" name="mail" size="30" value="'.$mail.'"></td></tr>
       <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
       <tr><td>&nbsp;</td><td><input type="submit" name="post" value="'.$txt_TexteEnv.'"></td></tr>
       </table>
   	</form>';
    ?>
 

     

</center>


<br />

</td></tr></table>




<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

