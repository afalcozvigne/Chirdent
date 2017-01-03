<?

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type_ad=$_POST['type_ad'];
$inc=$_REQUEST['inc'];
$post_activ = $_POST['post_activ'];

// RECUPERATION DES DONNES
$_SESSION['email']=$email;





$sql = "SELECT * FROM $table_membre,$table_ad WHERE id_membre=id_ad AND email='$email'";
     $result = mysql_query ($sql);
     $row = mysql_fetch_array($result);
     $nbr = mysql_num_rows($result);
     
$id_membre       = $row['id_membre'];
$actif_i         = $row['actif'];


echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top" colspan="2"><img src="images/reactivation2.jpg" border="1" width="64" height="64" />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">Mettre votre CV en d&eacute;but de liste</font></a><br /><br />

Afin que les praticiens dont le CV est inscrit depuis longtemps sur ce site ne soient pas d&eacute;savantag&eacute;s, nous offrons la possibilit&eacute;
de r&eacute;activer son compte afin d\'apparaitre en t&ecirc;te de la CVth&egrave;que. Il suffit de cliquer sur le bouton &laquo; r&eacute;activer &raquo; ci dessous.</td></tr>
<tr><td colspan="2">';









if (isset($post_activ)) {


    // preparation des données



  $datetime=date("Y-m-d H:i:s");



$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);


$req="UPDATE $table_ad SET date_reactivation='$datetime', actif='2' WHERE id_ad='$id_membre'";

$res=mysql_query($req);


     echo' <br /><span class="important">Votre CV a &eacute;t&eacute; remont&eacute;</span>';
     
    if ($actif_i == "1") {echo '<br /><span class="important">De plus, votre CV &eacute;tait inactiv&eacute; ; nous l\'avons rendu &agrave; nouveau visible</span>';};



    echo '<br />';



    }


$sql2 = "SELECT * FROM $table_membre,$table_ad WHERE id_membre=id_ad AND email='$email'";
     $result2 = mysql_query ($sql2);
     $row2 = mysql_fetch_array($result2);

$id_membre           = $row2['id_membre'];
$date_reactivation   = date_naturelle_s($row2['date_reactivation']);
$actif               = $row2['actif'];



if ($nbr=="0") {

echo '
</td></tr>
<tr><td valign="top"><br /><font class="XLdr">
<li style="text-align: left;">Situation actuelle de votre CV :</li> </font><br />
</td>
<td valign="top"><br />Votre CV n\'a pas &eacute;t&eacute; renseign&eacute;. <a href="index.php?cat=compte&incl=modif_ad">Remplir votre CV</a>
</td></tr>
<tr><td colspan="2"><img src="images/reactivation.jpg" border="1" width="560" height="443" />

</table>';

}



else {      // Un CV existe, on peut donc le réactiver

echo '
</td></tr>
<tr><td valign="top"><br /><font class="XLdr">
<li style="text-align: left;">Situation actuelle de votre CV :</li> </font><br />
</td>
<td valign="top"><br />';

if ($actif == "1") echo '<span class="important">CV inactif (non visible)</span> <a href="index.php?cat=compte&incl=modif_ad">Modifier</a>';
if ($actif == "2") echo '<span class="vert">CV actif (visible)</span> <a href="index.php?cat=compte&incl=modif_ad">Modifier</a>';

echo '<br />Derni&egrave;re activation : Le '.$date_reactivation.'</td></tr>
<tr><td valign="top">
<br />
<font class="XLdr"><li style="text-align: left;">R&eacute;activation de votre CV :</li></font><br />
</td>
<td valign="top"><br />
<FORM action="index.php?cat=compte&amp;incl=reactiv" method="post" />
<input type="submit" name="post_activ" value="R&eacute;activer" />
<input type="hidden" value="'.$row2['id_membre'].'" id="annonceur" name="annonceur"  /> </td></tr>
<tr><td colspan="2"><img src="images/reactivation.jpg" border="1" width="560" height="443" />

</table>';

};









?>




