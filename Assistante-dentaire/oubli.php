<?      // identique tous les sites

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];
$mail=$_POST['mail'];

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_mdp_perdu.'</font></td></tr>
<tr><td valign="top">
<br />
<br />';







// envoi du formulaire d email
if ($_POST['post']=="$txt_TexteEnv") {
	$mail=stripslashes(htmlentities(trim($mail)));

if ($mail==="") $err_mail1=1;
if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $mail)==0) $err_mail2=1;;
 
// Vérif si existe bien dans la base
$verif=mysql_query("SELECT pass1 FROM $table_membre WHERE email='$mail'");
$row=mysql_fetch_array($verif);
$pass=$row['pass1'] ;
if (mysql_num_rows($verif)==0) { $err_mail3=1;}



	if ($err_mail1=="" && $err_mail2=="" && $err_mail3=="" ) {

	        $headers = "From: robot@$titre_site2\r\n";
                $headers .= "Reply-To: robot@nepasrepondre.com\r\n";



		if (mail($mail, "[$titre_site3] - $txt_oubmail01" ,"$txt_oubmail02 :\n----------------------------\n\n- $txt_identif : $mail\n- $txt_pass : $pass\n
                $txt_oubmail03 CHIRDENT / Dental NetWorks: $adresse_site1, $adresse_site2, $adresse_site3. \n\n$txt_oubmail05,\nCHIRDENT/Dental Networks", $headers))
                {
		  echo " <br /><span class='important'>$txt_oubmail04 : $mail</span><br /><br />";
		  $mail="";
		}
	}


}






echo '
<br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_form.' :</strong></font></legend>
   <center>
'.$txt_oubli01.'<br /><br />';




    if ($err_mail1!="") echo "<span class='important'>$txt_Vemail ?</span><br />";
    if ($err_mail2!="") echo "<span class='important'>$txt_ouberr01</span><br />";
    if ($err_mail3!="") echo "<span class='important'>$txt_ouberr02</span><br />";

    

    echo' 
        <br />
    	<form method="post" action="#">

    	'.$txt_identif.' : <input type="text" name="mail" size="30" value="'.$mail.'">
        <input type="submit" name="post" value="'.$txt_TexteEnv.'">
    	</form>

 
     

</center>
</fieldset>';



?>




<br />

</td></tr></table>




<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

