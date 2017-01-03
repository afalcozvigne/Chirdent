<?PHP

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$incl=$_REQUEST['incl'];
$post=$_REQUEST['post'];
$postMACSF = $_POST['postMACSF']; global $postMACSF;
$type=$_POST['type'];
$inc=$_REQUEST['inc'];
$new_connexion=$_REQUEST['new_connexion'];

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><a href="index.php?cat=compte"><img src="images/Log.png" border="1" width="64" height="64" /></a>
<a href="index.php?cat=compte"><font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_VoCompt.'</font></a><br /><br /></td></tr>
<tr><td valign="top">
';







// formulaire d'inscription et modification commun avec verif et insert BDD
// ce script est appelé à l'inscription d'un site, d'un évènement ou lors d'une modif section membres




$adresse_site1='http://www.dentiste-remplacant.com';
$adresse_site2='http://www.cabinet-dentaire.com';
$adresse_site3='http://www.assistante-dentaire.com';


if ($incl=="")           { $include2=("membre/accueil.php");}
if ($incl=="modif")      { $include2=("membre/modif_info.php");}
if ($incl=="pref")       { $include2=("membre/preferences.php");}
if ($incl=="del_compte") { $include2=("membre/del_compte.php");}
if ($incl=="modif_ad")   { $include2=("membre/ad.php");}
if ($incl=="del_ad")     { $include2=("membre/ad_del.php");}
if ($incl=="add_ann_ad") { $include2=("membre/ad_ann_add.php");}
if ($incl=="mod_ann_ad") { $include2=("membre/ad_ann_mod.php");}
if ($incl=="paiement")   { $include2=("membre/paiement.php");}
if ($incl=="reactiv")   { $include2=("membre/reactiv.php");}

if (isset($_SESSION['email']))  {

  
  $_SESSION['email']=$email;
  $res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
  $row2=mysql_fetch_array($res2);
            $type_cd = $row2['type'];

  $resad=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_membre'");
  $rowad=mysql_fetch_array($resad);


// Annulé... mais à la place : $type_dr = $rowi['type'];
// if (isset($_POST['type_dr'])) {$type_dr = $_POST['type_dr'];} else { if (isset($rowdr['type_dr'])) {$type_dr=$rowdr['type_dr'];} else  {$type_dr=$row2['type'];};};


  
$resi=mysql_query("SELECT actifm,type,date_paye,date_paye_fin FROM $table_membre WHERE email='".$_SESSION['email']."'");
$rowi=mysql_fetch_array($resi);

$type_ad = $rowi['type'];

// ********** STATS du MEMBRE ********** //

$resad = mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_membre'");
$rowad=mysql_fetch_array($resad);
$profil_ad = mysql_num_rows($resad);


if ($new_connexion=="1")   { header("location:index.php?cat=macsf");

   // echo '<iframe name="cadeau_macsf" height="450" width="600" frameborder="0" scrolling="no" align="middle" src="macsf_iframe.php"></iframe> ';

    };

?>

<br />


<?

include($include2);

 }  else    {

AccesReserve();  };

 ?>

 

 
</td></tr></table>




<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

 
 


