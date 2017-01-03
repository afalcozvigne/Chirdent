<?PHP   // identique tous les sites



 // VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_Nous_Contact.'</font></td></tr>
<tr><td valign="top">
<br />
<br />';

// envoi du formulaire d email
if (isset ($_POST['post'])) {
	$nom=stripslashes(htmlentities(trim($_POST['nom_du_mec'])));
	$mail=stripslashes(htmlentities(trim($_POST['mail'])));
	$titre=stripslashes(htmlentities(trim($_POST['titre'])));
	$text=stripslashes(htmlentities(trim($_POST['text'])));

/* on vérifie que la code est toujours mémorisé en session et qu'il fait 6 caractères */
if(!isset($_SESSION['code']) || strlen($_SESSION['code']) != 6) $err_controle=1;

// on vérifie que la code entré est valide
if($_SESSION['code'] != $_POST['txtverif']) $err_controle=1;




	if ($mail==="") $err_mail1=1;
	if ($nom==="") $err_nom=1;
	if ($titre==="") $err_titre=1;
	if ($text==="") $err_texte=1;

  if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $mail)==0) $err_mail2=1;;

	if ($err_mail1=="" && $err_mail2=="" && $err_nom=="" && $err_texte=="" && $err_controle=="") {
		$text_brut=html_entity_decode($text);
		$nom_brut=html_entity_decode($nom);
		$titre_brut=html_entity_decode($titre);
		$mailadmin=implode(",",$email_admin);
		
	        $headers = "From: robot@$titre_site2\r\n";
                $headers .= "Reply-To: robot@nepasrepondre.com\r\n";



		if (mail($mailadmin, "[$titre_site3] - Message par formulaire" ,"$titre_brut\n\n\n$text_brut\n\nenvoyé par $nom_brut\nemail: $mail", $headers))
                {

// MISE EN PLACE DANS LA BDD


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

$datein=date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];
// on remet les slashes avant de mettre dans la BDD
$nom=addslashes($nom);
$mail=addslashes($mail);
$titre=addslashes($titre);
$text=addslashes($text);

$req="INSERT INTO formulaire (id_formulaire, site, nom, titre, email, texte, datein, ip, repondu)
  VALUES ('', '$siteweb', '$nom', '$titre', '$mail', '$text', '$datein', '$ip', '0')";

$res=mysql_query($req);
$connect=0;

		  echo " <br /><span class='important'>".$txt_MsgPoste."</span><br /><br />";

		  $text="";
		  $titre="";
		  $nom="";
		  $mail="";   
		  unset($_SESSION['code']);
		  


		}
	}


}




echo '

<form action="index.php?cat=contact" method="post">

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_form.' :</strong></font></legend>

<i>'.$txt_ChampsObl.'</i><br /><br />';

    if ($err_nom!="") echo "<span class='important'>Votre nom ?</span><br />";
    if ($err_mail1!="") echo "<span class='important'>Votre adresse email ?</span><br />";
    if ($err_mail2!="") echo "<span class='important'>Erreur sur votre adresse email ?</span><br />";
    if ($err_titre!="") echo "<span class='important'>Titre de votre message ?</span><br />";
    if ($err_texte!="") echo "<span class='important'>Texte de votre message ?</span><br />";
    if ($err_controle!="") echo "<span class='important'>Code anti-SPAM</span><br />";


echo '
    	<p><label>'.$txt_Vnom.' :</label><input type="text" id="nom_du_mec" name="nom_du_mec" size="25" value="'.$nom.'"/></p>
    	<p><label>'.$txt_Vemail.' :</label><input type="text" id="mail" name="mail" size="30" value="'.$mail.'" /></p>
    	<p><label>'.$txt_SujetMsg.' :</label><input type="text" name="titre" id="titre" size="30" value="'.$titre.'" /></p>
    	<p><label>'.$txt_TexteMsg.':</label><textarea name="text" id="text" class="shallow" rows="15" cols="40">'.$text.'</textarea></p>
        <p><label>'.$txt_ImgVerif.' <img src="imagesecu.php" style="position:relative; top: 6px;" />:</label><input type="text" id="txtverif" name="txtverif" size="8" value=""/></p>


<br />
<p><input type="submit" class="submit" name="post" value="'.$txt_TexteEnv.'" /></p>
</fieldset>
</form>';

?>


</div>



<br />
<fieldset style="width:95%; align:left; border: 1px solid #<?PHP echo $C_titre; ?>; padding: 10px;">
<legend style="color: #FFFFFF; background: #<?PHP echo $C_titre; ?>; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong><?PHP echo $txt_PCourrier ?> :</strong></legend>
CHIRDENT SARL - Dental NetWorks<br />
7, rue Jules Michelet - 33140 Villenave d'Ornon (FRANCE)<br />
<br />
Siret : 480-565-969-00015 - Ape 6311-Z
<br />
</fieldset>
<br />

<br />
<fieldset style="width:95%; align:left; border: 1px solid #<?PHP echo $C_titre; ?>; padding: 10px;">
<legend style="color: #FFFFFF; background: #<?PHP echo $C_titre; ?>; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong><?PHP echo $txt_tel ?> :</strong></legend>
<span class="menu3"><strong><?PHP echo $txt_tel ?>:</strong></span><br />
06.12.29.45.02
<br /><br />
<span class="menu3"><strong><?PHP echo $txt_fax ?> :</strong></span><br />
05 56 84 98 18
<br />
</fieldset>
</td></tr></table>


<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

