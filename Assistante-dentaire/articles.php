<?PHP   // identique tous les sites



// VERIF DES CHAMPS
$cat       = $_REQUEST['cat'];
$post      = $_REQUEST['post'];
$sitedoc   = $_REQUEST['sitedoc'];
$art       = $_REQUEST['art'];
$SendEmail = $_GET['SendEmail'];

if (isset ($_POST['q_art']))  { $art = $_POST['q_art'];};


echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<br />
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">Articles</font></td></tr>
<tr><td valign="top"><font class="XLdr">Les articles ont pour objectif de vous aider dans votre exercice ; des erreurs peuvent exister,
et une v&eacute;rification aupr&egrave;s des textes de r&eacute;f&eacute;rence s\'impose.<br />
<br />  <br /></font>
</td></tr>
</table>';




if ($cmd==''){

if ($siteweb == "DR") {$lesite="01";};
if ($siteweb == "CD") {$lesite="02";};
if ($siteweb == "AD") {$lesite="03";};


if ($cmd2=='aide'){   $resultat = mysql_query("SELECT * FROM articles,categorie WHERE categorieart=idcat AND idcat='11' AND site LIKE '%$lesite%' ORDER BY categorieart,date ");
                      $num = mysql_num_rows($resultat);  } 

else {                $resultat = mysql_query("SELECT * FROM articles,categorie WHERE categorieart=idcat AND site LIKE '%$lesite%' ORDER BY categorieart,date ");
                      $num = mysql_num_rows($resultat);  };

echo'
  <table cellSpacing="0" cellPadding="0" width="100%" bgcolor="#'.$C_fond_clair.'">';
  
$lastcat='';

while ( $row=mysql_fetch_array($resultat)) {
$idart = $row['idart'];
$categorieart = $row['categorieart'];
$categorie = s($row['categorie']);
$titre = s($row['titre']);
$sponsor = $row['sponsor'];
$idcat = $row['idcat'];
$ncompteur = $row['compteur'];

# Si categorie differente

if ($lastcat!=$categorie) {
// if ($lastcat!="")  echo "</td></tr>";
echo"
<tr><td>&nbsp;</td></tr>
<tr><td bgColor='#$C_titre'><font color='#FFFFFF'><strong>".$categorie." </strong></font></td></tr>
 ";

$lastcat=$categorie;

} // fin du titre et img categorie

echo "<tr>
          <td>&#8226; <a href='index.php?cat=articles&amp;cmd=lire&art=$idart'>".$titre."</a>";
          if ($sponsor=='Macsf') echo "<img src='imginc/macsf_20.gif' width='20' height='15'>";
          echo "</td></tr>";




} // fin du while


echo "</table><br /><br /><br />";


};









if ($cmd=='lire'){

$resultat = mysql_query("SELECT * FROM articles,categorie WHERE categorieart=idcat AND idart=$art");
$row=mysql_fetch_array($resultat);

$titre = s($row['titre']);
$idart = $row['idart'];
$categorieart = $row['categorieart'];
$categorie = s($row['categorie']);
$titre = s($row['titre']);
$texte = s(html_entity_decode($row['texte']));
$auteur = s($row['auteur']);
$autmail = s($row['autmail']);
$date = date_naturelle_s($row['date']);
if ($row['date_mod'] == "0000-00-00 00:00:00") {$date_mod = "";} else {$date_mod = ' - Modifi&eacute; le '.date_naturelle_s($row['date_mod']).'';};
$ncompteur = $row['compteur']+1;
$sponsor = $row['sponsor'];
$cette_annee = date("Y");




 if ($SendEmail == "1") {

/* on vérifie que la code est toujours mémorisé en session et qu'il fait 6 caractères */
if(!isset($_SESSION['code']) || strlen($_SESSION['code']) != 6) $err_texte=1;

// on vérifie que la code entré est valide
if($_SESSION['code'] != $_POST['txtverif']) $err_texte=1;

$q_nom = stripslashes(htmlentities(trim($_POST['q_nom'])));
$q_email = stripslashes(htmlentities(trim($_POST['q_email'])));
$q_titre = stripslashes(htmlentities(trim($_POST['q_titre'])));
$q_texte = stripslashes(htmlentities(trim($_POST['q_texte'])));


if ($q_texte==="") $err_texte=1;

if ($err_texte=="") {
		$text_brut=html_entity_decode($q_texte);
		$nom_brut=html_entity_decode($q_nom);
		$titre_brut=html_entity_decode($q_titre);

	        $headers = "From: $q_email\r\n";
                $headers .= "Reply-To: $q_email\r\n";



		if (mail($autmail, "$titre_brut" ,"$text_brut\n\nEnvoi de $nom_brut\nemail: $q_email", $headers))
                {
		  echo " <br /><span class='important'>Votre message a &eacute;t&eacute; post&eacute;</span><br /><br />";
		  $text="";
		  $titre="";
		  $nom="";
		  $mail="";
		}
	}
	
	else {echo "  <br /><span class='important'>Votre message est incomplet. Veuillez remplir le texte du message que vous souhaitez adresser.</span><br /><br />";}

	};










echo '
<br />
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$titre.'</font></td></tr>
<br /><br />
<br />';



echo "
<tr><td><font color='#505050' size='2'>Rubrique: <strong>".$categorie."</strong></font><br /><br />
<i><u>Article Complet</u></i><br /><br />
".$texte."<br /><br /></font>
</td></tr>
<tr><td align='middle' bgColor='#$C_fond_clair'><font color='#999999' size='1'>
Post&eacute; par $auteur le $date $date_mod <br />
(c)2001-$cette_annee CHIRDENT/Dental NetWorks Droits r&eacute;serv&eacute;s</font><br />
<font color='#505050' size='1'>Cet article a &eacute;t&eacute; lu $ncompteur fois</font></td>
</tr></table> ";

echo '<br /><a href="javascript:afficherjs(\'formulaireContactEmail\')"><div class="bout" style="width:120;">Contacter l\'auteur par email</div></a>';

$req5=mysql_query("SELECT * FROM $table_membre WHERE email='".$_SESSION['email']."'");
$row5=mysql_fetch_array($req5);
$nomq = $row5['nom'];
$prenomq = $row5['prenom'];
$emailq = $row5['email'];

echo '
        <div id="formulaireContactEmail" style="display:none;">
    	<form method="post" action="index.php?cat=articles&amp;cmd=lire&amp;idart='.$art.'&amp;SendEmail=1">

    	<input type="text" name="q_nom" size="30" value="'.$prenomq.' '.$nomq.'"> Votre nom <br />
    	<input type="text" name="q_email" size="30" value="'.$emailq.'"> Votre eMail <br />
    	<input type="text" name="q_titre" value="[Article de '.$titre_site3.'] - Contact par formulaire - article '.$art.'" size="50" readonly> Sujet du message<br />
    	<br />
    	<textarea cols="50" style="width: 350" rows="15" name="q_texte">'.$texteq.'</textarea> Texte du message:<br />
    	 <br />
    	<img src="imagesecu.php"> <input type="text" id="txtverif" name="txtverif" size="8" value="" >
    	<input type="hidden" value="'.$art.'" id="q_art" name="q_art"  />
    	<input type="submit" name="post" value="Poster">

    	</form>
        </div>    


<br>
<br>  ';

 $resc=mysql_query("UPDATE articles SET compteur='$ncompteur' WHERE idart='$idart'");







}

?>

<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>



