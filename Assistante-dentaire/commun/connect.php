<?php         // Commun aux sites

$adresse_site1 = "http://www.dentiste-remplacant.com";    // Dentiste-remplacant
$adresse_site2 = "http://www.cabinet-dentaire.com";   // Cabinet-dentaire
$adresse_site3 = "http://www.assistante-dentaire.com";   // Assistante-dentaire
$adresse_site4 = "http://prothesiste-dentaire.net";   // Assistante-dentaire

$dest_dossier_dr       = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_dr/';
$dest_dossier_dr_ann   = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_dr/';

$dest_dossier_cd       = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_cd/';
$dest_dossier_cd_ann   = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_cd/';

$dest_dossier_ad       = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ad/';
$dest_dossier_ad_ann   = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_ad/';




$var_siteweb  = $_SERVER["HTTP_HOST"].$_SERVER["PHP_SELF"];                 // affiche : www.dentiste-remplacant.com/index.php
$var_sitewebb = $_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']);        // affiche : www.dentiste-remplacant.com/



function encryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB89AD3efyCp';
    $qEncoded      = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), $q, MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ) );
    return( $qEncoded );
}

function decryptIt( $q ) {
    $cryptKey  = 'qJB0rGtIn5UB89AD3efyCp';
    $qDecoded      = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $cryptKey ), base64_decode( $q ), MCRYPT_MODE_CBC, md5( md5( $cryptKey ) ) ), "\0");
    return( $qDecoded );
}




//paramètres de connection à la base de données ---------------------------------------------------------------

$DBserveur = "sql";
$DBuser = "9531_chirdentdr";
$DBpassword = "ezZHZTTj";
$dbase = "9531_chirdentdr";
$table_membre = "membres";
$table_dr = "dr";
$table_annonce  = "dr_annonces";
$table_cd = "cd";
$table_annonce2 = "cd_annonces";
$table_ad = "ad";
$table_annonce3 = "ad_annonces";
$table_pd = "pd";
$table_annonce4 = "pd_annonces";

$table_article = "lesnews";
$email_admin=array("laurent.dussarps@laposte.net", "laurent.dussarps@gmail.com", "robert.dussarps@gmail.com" );

$link = @mysql_connect ("$DBserveur","$DBuser","$DBpassword");
mysql_SELECT_db($dbase);
mysql_query("SET NAMES UTF8");

if (!$link) {    echo '<div class="important"><br />
                 Bienvenue sur '.$titre_site.', '.$description_site.'<br /><br />
                 <strong>- Nous sommes en maintenance, merci de revenir plus tard - </strong></div>';
           exit;
            };




// Titre du Site ----------------------------------------------------------------------------------------------
if (ereg ("cabinet",$var_siteweb)|| ereg ("test2",$var_siteweb)) {$siteweb = "CD";}
elseif (ereg ("assistante",$var_siteweb)) {$siteweb = "AD";}
elseif (ereg ("prothesiste",$var_siteweb)) {$siteweb = "PD";}
else {$siteweb = "DR";};

if (isset($actusite)) {$siteweb = $actusite;};
global $siteweb;


if ($siteweb == "DR") {
  $titre_site = "Dentiste-Remplacant.com";
  $titre_site2 = "dentiste-remplacant.com";   // pour adresse email
  $titre_site3 = "DENTISTE-REMPLACANT";
  $adresse_site = $adresse_site1;
  $description_site = "le site des offres et demandes de remplacement, collaboration et d'association pour chirurgiens dentistes en France et a l'international.";
  $motscles_site = "recherche dentiste remplacant rempla&ccedil;ant dentaire dentistes remplacements remplacant chirurgien annonces medical offres cabinet association remplacement orthodontie paris liens hopital garde annonces email dentaire remplacement collaboration association rempla, cabinet CSCT salariat";
  $autres_sites  = "Cabinet-Dentaire.com et Assistante-Dentaire.com";
  $logo_site = "logo_DR.jpg";
  $prefixe_img = "DR_";
  $res = mysql_query("SELECT * FROM $table_annonce");
  $nbr_annonce = mysql_num_rows($res);
  $res = mysql_query("SELECT * FROM $table_dr where type_dr=2 or 5 or 6");
  $nbr_installe = mysql_num_rows($res);
  $res = mysql_query("SELECT * FROM $table_dr where type_dr=1 or 3");
  $nbr_remplacant = mysql_num_rows($res);
  $num_cnil = "747813";

// pour purge dans index.php
  $tbl_ann_purge = "dr_annonces";
  $doss_img_purge = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_dr/';

                        };

                        
                        
                        


if ($siteweb == "CD") {
  $titre_site = "Cabinet-Dentaire.com";
  $titre_site2 = "cabinet-dentaire.com";   // pour adresse email
  $titre_site3 = "CABINET-DENTAIRE";
  $adresse_site = $adresse_site2;
  $description_site = "le site des offres et demandes d'achat ou de vente de cabinets dentaires, d'association en vue de cession pour chirurgiens dentistes en France et a l'international.";
  $motscles_site = "recherche dentiste achat vente cession cabinet dentaire chiffre affaire dentistes association  chirurgien annonces medical offres cabinet  orthodontie paris liens hopital annonces dentaire association cabinet CSCT";
  $autres_sites  = "Dentiste-Remplacant.com et Assistante-Dentaire.com";
  $logo_site = "logo_CD.jpg";
  $prefixe_img = "CD_";
  $res = mysql_query("SELECT * FROM $table_annonce2");
  $nbr_annonce = mysql_num_rows($res);
  $res_asso = mysql_query("SELECT * FROM $table_annonce2 WHERE (type_ann=2 OR type_ann=3)");
  $nbr_annonce_asso = mysql_num_rows($res_asso);
  $res_vente = mysql_query("SELECT * FROM $table_annonce2 WHERE type_ann=1");
  $nbr_annonce_vente = mysql_num_rows($res_vente);
  $res_immo = mysql_query("SELECT * FROM $table_annonce2 WHERE (type_ann=4 OR type_ann=5)");
  $nbr_annonce_immo = mysql_num_rows($res_immo);
  $res_souhaits = mysql_query("SELECT * FROM $table_cd WHERE (type_cd='1' OR type_cd='3')");
  $nbr_souhaits = mysql_num_rows($res_souhaits);
  $num_cnil = "790273";

// pour purge dans index.php
  $tbl_ann_purge = "cd_annonces";
  $doss_img_purge = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_cd/';

                      };




if ($siteweb == "AD") {
  $titre_site = "Assistante-Dentaire.com";
  $titre_site2 = "assistante-dentaire.com";   // pour adresse email
  $titre_site3 = "ASSISTANTE-DENTAIRE";
  $adresse_site = $adresse_site3;
  $description_site = "le site des offres et demandes d'emploi pour assistantes dentaire, secr&eacute;taire m&eacute;dicale ou aide dentaire pour cabinets dentaires en France et a l'international.";
  $motscles_site = "recherche dentiste assistante offre emploi CDD CDI cabinet dentaire chirurgien annonces medical demandes cabinet orthodontie paris liens hopital annonces dentaire";
  $autres_sites  = "Dentiste-Remplacant.com et Cabinet-Dentaire.com";
  $logo_site = "logo_AD.jpg";
  $prefixe_img = "AD_";
  $res = mysql_query("SELECT * FROM $table_annonce3");
  $nbr_annonce = mysql_num_rows($res);
  $res_ass = mysql_query("SELECT * FROM $table_ad WHERE type_ad='4' ");
  $nbr_ass = mysql_num_rows($res_ass);
  $num_cnil = "849404";

// pour purge dans index.php
   $tbl_ann_purge = "ad_annonces";
   $doss_img_purge = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_ad/';

                        };



if ($siteweb == "PD") {
  $titre_site = "Prothesiste-Dentaire.net";
  $titre_site2 = "prothesiste-dentaire.net";   // pour adresse email
  $titre_site3 = "PROTHESISTE-DENTAIRE";
  $adresse_site = $adresse_site4;
  $description_site = "le site des offres et demandes de remplacement, collaboration et d\'association pour prothesistes dentaire en France et a l\'international.";
  $motscles_site = "recherche prothesiste remplacant remplaçant prothese dentaire remplacements remplacant annonces  offres laboratoire association stage contrat CDI CDD orthodontie paris liens hopital annonces email salariat";
  $logo_site = "logo_DR.jpg";
  $prefixe_img = "PD_";
  $res = mysql_query("SELECT * FROM $table_annonce4");
  $nbr_annonce = mysql_num_rows($res);
  $res = mysql_query("SELECT * FROM $table_pd where type_pd=2 or 5 or 6");
  $nbr_installe = mysql_num_rows($res);
  $res = mysql_query("SELECT * FROM $table_pd where type_pd=1 or 3");
  $nbr_remplacant = mysql_num_rows($res);
  $num_cnil = "747813";

// pour purge dans index.php
  $tbl_ann_purge = "pd_annonces";
  $doss_img_purge = '/var/www/html/virtualdomains/15240/dentiste-remplacant.com/www/photos/photos_ann_pd/';

                        };





$total_annonces =  $nbr_annonce ;

$res = mysql_query("SELECT * FROM $table_membre");
$nbr_membre = mysql_num_rows($res);

$res = mysql_query("SELECT * FROM $table_article");
$nbr_article = mysql_num_rows($res);

$res = mysql_query("SELECT * FROM $table_article where sponsor='Macsf'");
$nbr_article_macsf = mysql_num_rows($res);




// variables programmes
$ipqry = $REMOTE_ADDR;




// Suppression des enregegistrements périmés (+5mm)   ----------------------------------------------------------
$heuredlt =  mktime(date("H") , date("i") , date("s"));

# Compte des internautes en ligne
$resultb = mysql_query("SELECT * FROM compteur");
$numberb = mysql_num_rows($resultb);

if (isset($number) && ($number != 0))
$cpt = 0;
$ind = 0;
{
while ( $ind<$numberb)
{
$heureCon = mysql_result($resultb, $ind, "heureCon");
$ipCon = mysql_result($resultb, $ind, "ipCon");
$dateCon = mysql_result($resultb, $ind, "dateCon");
$ipdlt = $ipCon;

if ($heureCon < $heuredlt) { $queryc = "DELETE FROM compteur WHERE ipCon = '$ipdlt'  ";
                             $resultc =  mysql_query($queryc); 
                            }
$ind++;}
}
// FIN Suppression des enregegistrements périmés (+5mm)



// Ecriture enregistrement nouveau connecté  --------------------------------------------------------------------

$result =  mysql_query("SELECT * FROM compteur where ipCon = '$ipqry' ");
$number = mysql_num_rows($result);

if ($number == 0)
{
$ipCon = $ipqry;
$heureCon = mktime(date("H"),date("i")+5,date("s"));
$dateCon = Date ("Ymd");
$lheure = Date ("His");

 $resultat_sql=  mysql_query("INSERT INTO compteur VALUES(\"$heureCon\",\"$ipCon\",\"$dateCon\",\"$lheure\")", $link);
}

//comptage final ...
  $queryd = "SELECT * FROM compteur";
  $resultd =  mysql_query($queryd);
  $cpt = mysql_num_rows($resultd);




// Session - cookie -----------------------------------------------------------------------------------------


// ECRITURE COOKIE
if (isset($_POST['memoriser']) && ($_POST['memoriser']=="on")) setcookie("DentalNetworks", $_POST['email']."|".md5($_POST['pass']), date("U")+3600*24*100);




// SESSION

 $connect=0;
if (isset($_COOKIE['DentalNetworks'])) { $email=strtok($_COOKIE['DentalNetworks'],"|"); $pass=strtok('|'); }
if (isset($_SESSION['email'])) $email=$_SESSION['email'];
if (isset($_SESSION['pass'])) $pass=$_SESSION['pass'];


if (isset($_POST['email']) && isset($_POST['pass'])) {

  $pass = $_POST['pass'];

  $res=mysql_query("SELECT * FROM $table_membre WHERE email = '".$_POST['email']."'");

  if (mysql_num_rows($res)>0) {
    $row=mysql_fetch_array($res);

      if (($row['validation']!=1)||($row['verif_email'])!=2) {           // si Email non validé
         setcookie("DentalNetworks","" ,0 );
         $alert="ADRESSE EMAIL NON VERIFIEE : Regardez dans vos emails (et les SPAM) pour cliquer sur le lien qui activera votre compte ; sinon allez sur le menu pour vous renvoyer un email de validation";
         session_destroy();
         session_start();
  }
    else {


      // Nouvelle version2 : après codage "mcrypt_encrypt" des mots de passe et non codés 

      if (($row['pass1'])==encryptIt($pass) or ($row['pass1'])==$pass) { //accès OK
       $_SESSION['email']=$email; $_SESSION['pass']=encryptIt($row['pass1']); $connect=1; global $connect;
       $alert="Acces OK";



/*

    if (md5($row['pass1'])==md5($pass) or md5($row['pass1'])==$pass) { // access OK
      $_SESSION['email']=$email; $_SESSION['pass']=md5($row['pass1']); $connect=1;
*/



    } else {
      setcookie("DentalNetworks","" ,0 );
      $alert="Erreur de mot de passe";
      session_destroy();
      session_start();
    }
    }
    

  } else {
    setcookie("DentalNetworks","" ,0 );       
      $alert="Erreur d'adresse email";
    session_destroy();
    session_start();
  }

}




// EFFACER COOKIE
if (isset($_REQUEST['co']) && ($_REQUEST['co']=="null")) {
  setcookie("DentalNetworks","" ,0 );
  session_destroy();
  session_start();
  $_POST['email']="redirection_ghduzyjxvcy";
}


// redirection
if (isset($alert)) { global $alert;
} else {
  if (isset($_POST['email']) && $cat!="mail_valid" ) header("location:".$_SERVER['HTTP_REFERER']);
}

// DEBUG *********************************************
//echo "<b>DEBUG</b>".$var_siteweb." -chemin absolu : ".$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF'])." -  Préfixe : ".$prefixe_img." - Site en cours : ".$siteweb." - session: ".$_SESSION['email']." ".$_SESSION['pass']."connection= $connect , POST=".$_REQUEST['post'];
//echo " | $HTTP_USER_AGENT | ";
//if (isset($_COOKIE['DentalNetworks'])) {echo "Cookie DentalNetworks posté";} else {echo "pas de cookie";};
// DEBUG *********************************************




// params upload images membre/dr.php

if (isset($err['photo'])) unset($err['photo']);
$extensions_ok = array('jpg', 'jpeg', 'JPG', '');  // il faut laisser '' sinon, s'il n'y a pas d'image dans l'annonce cela fait une erreur
$taille_max = 200000;

// utiliser également des slashes sous windows : $dest_dossier  = 'd:/damien/photos/';



?> 




