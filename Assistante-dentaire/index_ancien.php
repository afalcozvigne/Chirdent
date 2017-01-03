<?PHP

ob_start('ob_gzhandler');
session_start();

include("commun/connect.php");


$act           = $_REQUEST['act'];
$id            = $_REQUEST['id'];
$cat           = $_REQUEST['cat'];
$page_actuelle = $_SERVER['HTTP_REFERER'];

if (isset($_POST['langue'])) {$lang=$_POST['langue'];
                              $_SESSION['lang'] = $lang;

}
else {   if ((isset($_SESSION['lang'])) && (!empty($_SESSION['lang'])))
	   { $lang = $_SESSION['lang'];}
         else {$lang="fr";};

      };

include("langues/$lang.php");
include("commun/fonction.php");
include("commun/couleurs.php");

// Fonction de détermination du navigateur
$ua=getBrowser();
$yourbrowser= "<br />Votre navigateur est: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];



if ($cat=="")        { $include=("accueil.php");  $title="$titre_site, Remplacement, collaboration et associations pour chirurgiens dentistes.";}
if ($cat=="test")    { $include=("test.php");  $title="$titre_site, Remplacement, collaboration et associations pour chirurgiens dentistes.";}
if ($cat=="contact") { $include=("contact.php");  $title="$titre_site, contacter l'équipe de Dental Networks.";}
if ($cat=="contact2") { $include=("contact2.php");  $title="$titre_site, contacter l'équipe de Dental Networks.";}
if ($cat=="partenaire") { $include=("partenaire.php");  $title="$titre_site, les partenaires de Chirdent/Dental Networks.";}

if ($cat=="legal")   { $include=("legal.php");  $title="$titre_site, contacter l'équipe de Dental Networks.";}
if ($cat=="login")   { $include=("login.php");  $title="$titre_site, se connecter.";}
if ($cat=="emailvalidationno") { $include=("emailvalidationno.php"); $title="$titre_site, email de validation non re&ccedil;u;.";}

if ($cat=="inscript")  { $include=("inscription.php"); $title="$titre_site, inscription au site.";}
if ($cat=="inscript2") { $include=("inscription2.php");  $title="$titre_site, inscription au site.";}
if ($cat=="aide")      { $include=("articles.php");  $title="$titre_site, aide du site.";}
if ($cat=="macsf")     { $include=("macsf_frame.php");  $title="$titre_site, recevoir un cadeau de la MACSF.";}
if ($cat=="jinstall")  { $include=("journee_installation.php");  $title="$titre_site, recevoir un cadeau de la MACSF.";}
if ($cat=="articles")  { $include=("articles.php");  $title="$titre_site, les articles.";}
if ($cat=="desabo")    { $include=("desabo.php");  $title="$titre_site, désabonnement de votre adresse email.";}

if ($opt_pay == "1") {if ($cat=="paiement") { $include=("paiement.php");  $title="$titre_site, inscription au site.";}    }
else   {if ($cat=="paiement") { $include=("paiement2.php");  $title="$titre_site, inscription au site.";};};

if ($cat=="membre") { $include=("membre.php");  $title="$titre_site, inscription au site.";}
if ($cat=="compte") { $include=("compte.php");  $title="$titre_site, Compte de membre.";}
if ($cat=="rech")   { $include=("recherche.php");  $title="$titre_site, Moteur de recherche.";}
if ($cat=="mail_valid") { $include=("mail_valid.php");  $title="$titre_site, confirmation de l'adresse email.";}

if ($cat=="cd_annonces")  { $include=("CD_annonces.php");  $title="$titre_site, Cession cabinet.";}
if ($cat=="cd_souhaits")    { $include=("CD_souhaits.php"); $title="$titre_site, annuaire des souhaits.";}
if ($cat=="MotRempla") { $include=("DR_MoteurRempla.php"); $title="$titre_site, annuaire des remplacants et collaborateurs.";}
if ($cat=="MotAnn") { $include=("DR_MoteurAnnonces.php"); $title="$titre_site, annuaire des remplacants et collaborateurs.";}

if ($cat=="cd_vente")    { $include=("CD_ventes.php");  $title="$titre_site, annonces de vente, cession de cabinets dentaires.";}
if ($cat=="cd_asso")     { $include=("CD_asso.php"); $title="$titre_site, offre d\'associations.";}
if ($cat=="cd_locat")    { $include=("CD_locat.php");  $title="$titre_site, annonces de vente ou location de locaux.";}
if ($cat=="cd_souhait")  { $include=("CD_souhait.php"); $title="$titre_site, souhaits d\'installation.";}

if ($cat=="ad_annonces") { $include=("AD_annonces.php");  $title="$titre_site, annonces et offres d\'emploi.";}
if ($cat=="ad_cv")       { $include=("AD_CV.php");  $title="$titre_site, CV d\'assistantes dentaires.";}

if ($cat=="oubli")       { $include=("oubli.php"); $title="$titre_site, mot de passe oubli&eacute;.";}
if ($cat=="tarif")       { $include=("tarifs.php"); $title="$titre_site, Tarification des services de Dental NetWorks, Dentiste-remplacant, Cabinet-dentaire et Assistante-dentaire.";}
if ($cat=="tarif2")      { $include=("tarifs2.php"); $title="$titre_site, Tarification des services de Dental NetWorks, Dentiste-remplacant, Cabinet-dentaire et Assistante-dentaire.";}
if ($cat=="activ")       { $include=("paiement.php"); $title="$titre_site, R&eacute;activation de votre compte.";}




// ================ PURGE DE LA BBD : ANNONCES PERIMEES =====================

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

// Efface images des annonces

$rbbd=mysql_query("SELECT id_annonce,expiration from $tbl_ann_purge WHERE expiration < CURDATE() order by expiration");

    while ($rowbbd=mysql_fetch_array($rbbd)) {
          // echo 'Id annonce : '.$row['id_annonce'].' - Expiration :  '.$row['expiration'].' <br /> ';

         $id_annonce =  $rowbbd['id_annonce'];
         if (file_exists("$doss_img_purge/$id_annonce.jpg"))
            {  $imagette = "$doss_img_purge/$id_annonce.jpg";
               // echo $imagette;

                $delete_result = unlink ($imagette);

               }
          
        // Efface annonces
      $rbbdi="DELETE from $tbl_ann_purge WHERE id_annonce='$id_annonce'";
      $resbbd=mysql_query($rbbdi);
  
          
        };
// ================ PURGE DE LA BBD : ANNONCES PERIMEES =====================

                                                    











// tiens compte des préférences choisies dans le menu

if (isset($_SESSION['email'])) {   $email_session = $_SESSION['email'];
                                    $resgeo=mysql_query("SELECT geo,pays FROM $table_membre WHERE email='$email_session'");
                                    $rowgeo=mysql_fetch_array($resgeo);
                                       $geo = $rowgeo['geo'];
                                       $pays = $rowgeo['pays'];
                     $lien_zgeo = "&amp;zone_preference=$geo";
                     if ($geo == "9") { $lien_zgeo = $lien_zgeo.'&amp;pays_preference='.$pays.'';};


                            };


?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="<?php echo $description_site ?> " />
<meta name="keywords" content="<?php echo $motscles_site ?> " />
<meta name="Author" content="Laurent Dussarps" />
<meta name="Identifier-URL" content="<?echo $adresse_site1 ?>" />
<meta name="Copyright" content="Copyright <?=date("Y")?> <?echo $titre_site ?>" />
<meta name="robots" content="all" />
<link rel="icon" href="http://www.cabinet-dentaire.com/images/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="http://www.cabinet-dentaire.com/images/favicon.ico" type="image/x-icon">

<link rel="stylesheet" href="css/style.css" />

<title><?php echo $titre_site ?></title>
<link href="css/dcmegamenu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://www.chirdent.net/ressources/jquery-min.js"></script>
<script type='text/javascript' src='js/jquery.hoverIntent.minified.js'></script>
<script type='text/javascript' src='js/jquery.dcmegamenu.1.3.3.js'></script>  
<script type='text/javascript' src='js/livevalidation_standalone_<?PHP echo $lang ?>.js'></script>
<script type='text/javascript' src='js/javascript.js'></script>
<script type="text/javascript">

$(document).ready(function($){

	$('#mega-menu-4').dcMegaMenu({
		rowItems: '2',
		speed: 'fast',
		effect: 'fade'
	});

});
</script>

<link href="css/skins/blue.css" rel="stylesheet" type="text/css" />

</head>
<body bgcolor="#<?PHP echo $C_fond; ?>">
<br /> 
<table width="1026" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="ffffff">
  <tr>
    <td height="130" colspan="3" background="images/logo.jpg">

<div style="position: relative; top :-15px; left : 942px;">
<FORM action="#" method=post>
<SELECT name="langue" onchange=this.form.submit()>
		<OPTION VALUE="fr" <?PHP if ($lang=="fr") echo 'selected'; ?> >Fran&ccedil;ais</OPTION>
		<OPTION VALUE="en" <?PHP if ($lang=="en") echo 'selected'; ?> >English</OPTION>
	</SELECT>
</FORM>
</div>

<div style="position: relative; top :21px; left : 550px;">
<script type="text/javascript"><!--
google_ad_client = "pub-2818113231250945";
/* 468x60, date de création 05/04/10 */
google_ad_slot = "7848757430";
google_ad_width = 464;
google_ad_height = 56;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
</td>
  </tr>
  <tr height="20" bgcolor="#<?PHP echo $C_bas; ?>">
    <td>&nbsp; &nbsp;<?PHP echo $txt_connexion;?></td><td colspan="2"><?PHP formulaire(1);?></td></tr>
    <td colspan="3">
<!-- MENU DEBUT -------------------------------->




<div class="blue" style="position: relative; top :0px; left : -2px;">
<ul id="mega-menu-4" class="mega-menu">
	<li><a href="index.php"><?PHP echo $txt_accueil;?></a>
		<ul>
			<li><a href="index.php?cat=inscript"><?PHP echo $txt_NvCompteMut;?></a></li>
                        <li><a href="index.php?cat=cd_annonces<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_CherchAnn; ?></a></li>
			<li><a href="index.php?cat=cd_souhaits<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_trouv_souhait;?></a></li>
                        <li><a href="index.php?cat=jinstall">Les journ&eacute;es de l'installation 2012</a></li>
		</ul>
</li>
	<li><a href="#"><?PHP echo $txt_AVCabDent;?></a>
		<ul>
			<li><a href="index.php?cat=compte"><?PHP echo $txt_Vendeur;?></a>
				<ul>
					<li><a href="index.php?cat=inscript"><?PHP echo $txt_NvCompteVend;?></a></li>
                                        <li><a href="index.php?cat=compte"><?PHP echo $txt_VoCompt;?></a></li>
					<li><a href="index.php?cat=compte&incl=add_ann_cd"><?PHP echo $txt_ajout_ann;?></a></li>
					<li><a href="#"><?PHP echo $txt_option_urgent;?></a></li>
					<li><a href="index.php?cat=cd_souhaits<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_trouv_souhait;?></a></li>
				</ul>
			</li>
			<li><a href="index.php?cat=login"><?PHP echo $txt_Acheteur;?></a>
			  <ul>
					<li><a href="index.php?cat=inscript"><?PHP echo $txt_NvCompteAch;?></a></li>
                                        <li><a href="index.php?cat=compte"><?PHP echo $txt_VoCompt;?></a></li>
					<li><a href="index.php?cat=compte&incl=modif_cd"><?PHP echo $txt_ajout_souhait;?></a></li>
					<li><a href="index.php?cat=cd_annonces&amp;annonces=VentesCab<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_CherchAnn;?></a></li>
			  </ul>
			</li>

                        <li><a href="#"><?PHP echo $txt_services;?></a>
			        <ul>
					<li><a href="index.php?cat=login"><?PHP echo $txt_connexion;?></a></li>
					<li><a href="index.php?cat=oubli"><?PHP echo $txt_mdp_perdu;?></a></li>
					<li><a href="index.php?cat=emailvalidationno"><?PHP echo $txt_Nv_email_act;?></a></li>
					<li><a href="index.php?co=null"><?PHP echo $txt_deconnexion;?></a></li>
				</ul>
			</li>
		</ul>
	</li>
	<li><a href="#"><?PHP echo $txt_AVImmob;?></a>
		<ul>
			<li><a href="index.php?cat=compte"><?PHP echo $txt_Vendeur2;?></a>
				<ul>
					<li><a href="index.php?cat=inscript"><?PHP echo $txt_NvCompteVend;?></a></li>
                                        <li><a href="index.php?cat=compte"><?PHP echo $txt_VoCompt;?></a></li>
					<li><a href="index.php?cat=compte&incl=add_ann_cd"><?PHP echo $txt_ajout_ann;?></a></li>
					<li><a href="#"><?PHP echo $txt_option_urgent;?></a></li>
					<li><a href="index.php?cat=cd_souhaits<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_trouv_souhait;?></a></li>
				</ul>
			</li>
			<li><a href="index.php?cat=login"><?PHP echo $txt_Acheteur2;?></a>
			  <ul>
					<li><a href="index.php?cat=inscript"><?PHP echo $txt_NvCompteAch;?></a></li>
                                        <li><a href="index.php?cat=compte"><?PHP echo $txt_VoCompt;?></a></li>
					<li><a href="index.php?cat=compte&incl=modif_cd"><?PHP echo $txt_ajout_souhait;?></a></li>
					<li><a href="index.php?cat=cd_annonces&amp;annonces=VentesLocImmob<?PHP echo $lien_zgeo; ?>"><?PHP echo $txt_CherchAnn;?></a></li>
			  </ul>
			</li>

                        <li><a href="#"><?PHP echo $txt_services;?></a>
			        <ul>
					<li><a href="index.php?cat=login"><?PHP echo $txt_connexion;?></a></li>
					<li><a href="index.php?cat=oubli"><?PHP echo $txt_mdp_perdu;?></a></li>
					<li><a href="index.php?cat=emailvalidationno"><?PHP echo $txt_Nv_email_act;?></a></li>
					<li><a href="index.php?co=null"><?PHP echo $txt_deconnexion;?></a></li>
				</ul>
			</li>
</ul>
</li>

<li><a href="index.php?cat=articles">Articles</a>
<ul>
	<li>
	<ul>
		<li><a href="index.php?cat=articles">Articles</a></li>
	</ul>
</li>

</ul>
</li>

<li><a href="index.php?cat=contact">Contact</a>
<ul>
	<li>
	<ul>
		<li><a href="index.php?cat=contact"><?PHP echo $txt_Nous_Contact;?></a></li>
		<li><a href="index.php?cat=legal"><?PHP echo $txt_legal;?></a></li>
		<li><a href="#"><?PHP echo $txt_Pub;?></a></li>
	</ul>
</li>

</ul>
</li>

<li><a href="index.php?cat=aide&amp;cmd2=aide">Aide</a>
<ul>
	<li>
	<ul>
		<li><a href="#">Contact</a></li>
		<li><a href="#">Mentions l&eacute;gales</a></li>
		<li><a href="#">Publicitaires</a></li>
	</ul>
</li>

</ul>
</li>





</ul>

</div>
</div>

<!-- MENU FIN -------------------------------->

 </td>
  </tr>

<tr>
    <td colspan="3"> &nbsp;&nbsp;    <? echo "$activite";?>



     </td></tr>

  <tr>


    <td colspan="3"> <br />


<?    include($include); // include des pages         ?>


<br />
<hr style="border: 1px dotted #ccccdd"/>
<br />

<?
 include("commun/liens.php");
?>






  </td></tr>
  
<tr><td height="1" colspan="3" bgcolor="#<?PHP echo $C_bande_bas; ?>"></td></tr>

<tr>
    <td height="11" colspan="3" bgcolor="#<?PHP echo $C_bas; ?>">
    
<div class="bas"><?PHP echo $txt_bas; ?></div>
<div class="bas_rouge"><?PHP echo $txt_bas_rouge; ?></div>
<center>

<!-- XITI début -->
  
<a href="http://www.xiti.com/xiti.asp?s=531772" title="WebAnalytics" target="_top">
<script type="text/javascript">
<!--
Xt_param = 's=531772&p=';
try {Xt_r = top.document.referrer;}
catch(e) {Xt_r = document.referrer; }
Xt_h = new Date();
Xt_i = '<img width="80" height="15" border="0" alt="" ';
Xt_i += 'src="http://logv4.xiti.com/bcg.xiti?'+Xt_param;
Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
if(parseFloat(navigator.appVersion)>=4)
{Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;}
document.write(Xt_i+'&ref='+Xt_r.replace(/[<>"]/g, '').replace(/&/g, '$')+'" title="Internet Audience">');
//-->
</script>
<noscript>
Mesure d'audience ROI statistique webanalytics par <img width="80" height="15" src="http://logv4.xiti.com/bcg.xiti?s=531772&p=" alt="WebAnalytics" />
</noscript></a>


<!-- XITI fin -->


<?PHP

 $ua=getBrowser();
 $yourbrowser= "<br />Votre navigateur est: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
 print_r($yourbrowser);

?>











</center>
    
    
    
    
    

  </td></tr>

<tr>
    <td height="11" colspan="3" background="images/bas.jpg">
  </td></tr>
  </table>


  


</td></tr>
</table>

<br /><br />









</body>
</html>
