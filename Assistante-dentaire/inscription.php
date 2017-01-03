<?PHP

// formulaire d'inscription et modification commun avec verif et insert BDD
// ce script est appelé à l'inscription d'un site, d'un évènement ou lors d'une modif section membres


// VERIF DES CHAMPS
$queltype=$_REQUEST['queltype'];
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];
$inc=$_REQUEST['inc'];
$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';


                                   
                                   
                                   
                                   
echo '
<br />
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">

<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_inscription.'</font></td></tr>
<tr><td valign="top"><font class="XLdr">'.$txt_inscr_01.'</font></td></tr>
</table><br /><br />
<br />';
                                   

if (isset($_SESSION['email']))  {   $_SESSION['email']=$email;
                                    $res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
                                    $row2=mysql_fetch_array($res2);

                                    echo '<table><tr><td valign="top"><img src="images/warning_64.png" border="1" width="64" height="64" /></td>
                                    <td><div class="important"><strong>'.$txt_DejaInsc.'</strong></div><br /></td></tr>
                                    </table><br />
                                    ';
                                    

                                 } else {



if ($post=="") {

echo '

<FORM action="index.php?cat=inscript&amp;post=insc" method=post>
'.$txt_inscr_03.' : <select name="type" onchange=this.form.submit()>
          <option value="">-- '.$txt_inscr_04.' --</option> ';
          
if ($queltype == "NInst") { echo '
          <option value=1>'.$txt_Mbre_01.'</option>
          <option value=3>'.$txt_Mbre_03.'</option>                                    ';
                             }

elseif ($queltype == "Inst") { echo '
          <option value=2>'.$txt_Mbre_02.'</option>
          <option value=9>'.$txt_Mbre_09.'</option>
                                    ';
                             }

elseif ($queltype == "Centre") { echo '
          <option value=5>'.$txt_Mbre_05.'</option>
          <option value=6>'.$txt_Mbre_06.'</option>
          <option value=7>'.$txt_Mbre_07.'</option>
          <option value=8>'.$txt_Mbre_08.'</option>
                                    ';
                             }
          
          
else {
          echo '
          <option value=1>'.$txt_Mbre_01.'</option>
          <option value=2>'.$txt_Mbre_02.'</option>
          <option value=9>'.$txt_Mbre_09.'</option>
          <option value=3>'.$txt_Mbre_03.'</option>
          <option value=4>'.$txt_Mbre_04.'</option>
          <option value=5>'.$txt_Mbre_05.'</option>
          <option value=6>'.$txt_Mbre_06.'</option>
          <option value=7>'.$txt_Mbre_07.'</option>
          <option value=8>'.$txt_Mbre_08.'</option>
                                     ';
};

echo '
        </select>
</FORM>

<br />

<fieldset style="width:90%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
<legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong>Info</strong></legend>
'.$txt_inscr_02.' '.$titre_site.', '.$autres_sites.'
<br />
</fieldset>
<br />

<img src="images/img_site.jpg" border="1" width="568" height="135" />

<strong>Pourquoi vous inscrire ?</strong>
<br />  <br />';

if ($queltype == "NInst") { echo $txt_Bla_01; }
elseif ($queltype == "Inst") { echo $txt_Bla_02; }
elseif ($queltype == "Centre") { echo $txt_Bla_03; }
else { echo $txt_Bla_01.$txt_Bla_02.$txt_Bla_03.$txt_Bla_04;};





};





if ($post=="continuer") {

  $nemail=protect($_POST['nemail']);
  $npass=protect($_POST['npass']);
  $type=protect($_POST['type']);  
  $ncivilite=$_POST['ncivilite'];
  $nsociete=protect(strtoupper($_POST['nsociete']));
  $nprenom=protect(ucfirst($_POST['nprenom']));
  $nnom=protect(strtoupper($_POST['nnom']));
  $nadresse=protect($_POST['nadresse']);
  $ncp=protect($_POST['ncp']);
  $nville=protect(ucfirst($_POST['nville']));
  $liste_pays=protect($_POST['liste_pays']);
  $pays=protect($_REQUEST['pays']);
  $indicatif=protect($_REQUEST['indicatif_tel']);
  $zone=protect($_REQUEST['zone']);
  $nactivite=protect($_POST['nactivite']);
  $ntel=protect($_POST['ntel']);
  $nmob=protect($_POST['nmob']);
  $nfax=protect($_POST['nfax']);
  $nan=protect($_POST['nan']);
  $nmois=$_POST['nmois'];
  $njour=protect($_POST['njour']);
  $noketudes=protect($_POST['noketudes']);
  $nokpapier=protect($_POST['nokpapier']);
  $nokmacsf=protect($_POST['nokmacsf']);
  $ncondition=protect($_POST['ncondition']);

# On verifie si le membre n'est pas déjà inscrit
if ($pays == "France"){ $req=mysql_query("SELECT * FROM $table_membre WHERE nom='$nnom' AND prenom='$nprenom' AND postal='$ncp'"); }
else { $req=mysql_query("SELECT * FROM $table_membre WHERE nom='$nnom' AND prenom='$nprenom' AND pays='$pays' AND ville='$nville'"); };
$nb = mysql_num_rows($req); 
if ($nb > 0){$err['dejainscrit']='<br /><span style="color: red">Vous &ecirc;tes d&eacute;j&agrave; inscrit sur notre site. <br />Cliquez <a href=" '.$adresse_site1.'/index.php?cat=oubli"><strong><u>ICI</u></strong></a> pour r&eacute;cup&eacute;rer votre mot de passe, sinon, contactez-nous.</span><br />';};

# On verifie si l'email n'existe pas déjà dans la BDD
$req2=mysql_query("SELECT * FROM $table_membre WHERE email='$nemail'");
$nb2 = mysql_num_rows($req2);
if ($nb2 > 0){$err['dejaemail']='<br /><span style="color: red">Cet email d&eacute;j&agrave; inscrit sur notre site. <br />Cliquez <a href=" '.$adresse_site1.'/index.php?cat=oubli"><strong><u>ICI</u></strong></a> pour r&eacute;cup&eacute;rer votre mot de passe, sinon, contactez-nous.</span><br />';};

  if (strlen($npass)<4) $err['pass']='<span style="color: red">3 caract&egrave;res minimum</span>';
  if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $nemail)==0) $err['email']='<span style="color: red">Email non valable</span>';



  if ($ncivilite=="") $err['ncivilite']='<span style="color: red">'.$txt_item_01.'?</span>';
  if ($nprenom=="") $err['nom']='<span style="color: red">'.$txt_item_02.'?</span>';
  if ($nnom=="") $err['prenom']='<span style="color: red">'.$txt_item_03.'?</span>';
  if ($nadresse=="") $err['adresse']='<span style="color: red">'.$txt_item_05.'?</span>';
  if ($nville=="" || $ncp=="") $err['ville']='<span style="color: red">'.$txt_item_06b.'?</span>';
  if ($liste_pays=="") $err['pays']='<span style="color: red">'.$txt_item_07.'?</span>';
  if ($ntel == "" && $nmob == "" ) $err['ntel']='<span style="color: red">'.$txt_item_08b.'</span>';
  if ($noketudes=="") $err['noketudes']='<span style="color: red">'.$txt_item_12b.'</span>';
  if ($nokpapier=="") $err['nokpapier']='<span style="color: red">'.$txt_item_12b.'</span>';
  if ($ncondition=="") $err['ncondition']='<span style="color: red">'.$txt_item_13b.'</span>';

// QUE POUR LES MEMBRES HUMAINS Dentiste, étudiant, assistante, stomato
if ($type == "1" || $type=="2" || $type == "3" || $type=="4" || $type=="9") {  
  if (($nan == "" || $nmois == "" || $njour == "") || (!is_numeric($nan) || !is_numeric($njour) || !is_numeric($nmois)) || $nmois > 12 || $njour > 31 || $nan < 1900 || $nan > date("Y"))  $err['anniv']='<span style="color: red">Date incorrecte</span>';
  if ($nokmacsf=="") $err['nokmacsf']='<span style="color: red">'.$txt_item_12b.'</span>';
                                                              };
// QUE POUR LES SOCIETES : Centre de soins, industrie, agence immobilière, association
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {
  if ($nsociete=="") $err['nsociete']='<span style="color: red">'.$txt_item_17.'?</span>';
                                                              };






  if (is_array($err)) {
    $post="insc"; echo '<span class="important">'.$txt_item_15.'</span><br />';
  } else {

    // preparation des données

    $nemail=a($nemail);
    $pass=a($npass);
    $type=a($type);
    $civilite=a($ncivilite);
    $prenom=a($nprenom);
    $nom=a($nnom);
    $adresse=a($nadresse);
    $cp=a($ncp);
    $ville=a($nville);
    $liste_pays=a($liste_pays);
    $pays=a($pays);
    $indicatif=a($indicatif);
    $zone=a($zone);
    $tel=a($ntel);
    $mob=a($nmob);
    $fax=a($nfax);
    $an=a($nan);
    $mois=a($nmois);
    $jour=a($njour);
    $oketudes=a($noketudes);
    $okpapier=a($nokpapier);
    $okmacsf=a($nokmacsf);
    $ip=$_SERVER['REMOTE_ADDR'];
    $date_creation=date("Y-m-d H:i:s");

 if ($pays == "France") {

    $departement=substr($cp,0,2);
    $region_dept=array('NORD-PAS-DE-CALAIS', '59 62', 'ILE-DE-FRANCE', '75 77 78 91 92 93 94 95', 'ALSACE', '67 68', 'AQUITAINE', '24 33 40 47 64', 'AUVERGNE', '03 15 43 63', 'BASSE-NORMANDIE', '14 50 61', 'BOURGOGNE', '21 58 71 89', 'BRETAGNE', '22 29 35 56', 'CENTRE', '18 28 36 37 41 45', 'CHAMPAGNE-ARDENNES', '08 10 51 52', 'CORSE', '20', 'FRANCHE-COMTE', '25 39 70 90', 'HAUTE-NORMANDIE', '27 76', 'LORRAINE', '54 55 57 88', 'LIMOUSIN', '19 23 87', 'MIDI-PYRENEES', '09 12 31 32 46 65 81 82', 'PAYS-DE-LA-LOIRE', '44 49 53 72 85', 'LANGUEDOC-ROUSSILLON', '11 30 34 48 66', 'PACA', '04 05 06 13 83 84', 'PICARDIE', '02 60 80', 'POITOU-CHARENTES', '16 17 79 86', 'RHONE-ALPES', '01 07 26 38 42 69 73 74', 'DOM-TOM', '99');
    for($i=1;$i<count($region_dept);$i=$i+2) { if (substr_count($region_dept[$i], $departement)==1) $region=$region_dept[($i-1)]; }

                         };

    // verif si pseudo existe ou email existe

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

    $verif=mysql_query("SELECT * FROM $table_membre WHERE email='$nemail'");
    if (mysql_num_rows($verif)>0) { echo'<span class="important">Attention, cet email existe déjà dans la base.</span><br />'; $err['exist']="-"; $post="insc";}
    $verif2=mysql_query("SELECT * FROM $table_membre WHERE nom='$nom' and prenom='$prenom' and postal='$cp'");
    if (mysql_num_rows($verif2)>0) { echo'<span class="important">Vous &egrave;tes d&eacute;j&agrave; inscrit sur notre site<br /><br />Contactez-nous si vous avez perdu votre identifiant et mot de passe.</span><br />'; $err['exist']="-"; $post="insc";}

    // Enregistrement dans la BDD . (le champs validation: 1=attente email, 0=ok RAS)

    if (!is_array($err)) { // pas d erreur, on y go


       $req="INSERT INTO $table_membre (id_membre, type, actifm, email, pass1, societe, civilite, nom, prenom, anniv, adresse, postal, ville, departement, region, pays, zone, indicatif, telephone, mobile, fax, oketudes, okpapier, macsf, mailing, attente, ip, date_creation, dern_connexion, site_origine, validation)
  VALUES ('', '$type', '0', '$nemail', '$pass', '$nsociete', '$ncivilite', '$nom', '$prenom', '$an-$mois-$jour', '$adresse', '$cp', '$ville', '$departement', '$region', '$liste_pays', '$zone', '$indicatif', '$tel', '$mob', '$fax', '$oketudes', '$okpapier', '$okmacsf', '$mailing', '$attente', '$ip', '$date_creation', '$dern_connexion', '$siteweb', '0')";








// email de confirm

$idm=md5("$nemail$pass");
$message="-- Message automatique --\n
Bonjour,\n\nVotre inscription aux sites de CHIRENT-Dental Networks est prise en compte.\n
Pour valider votre adresse email et finaliser votre inscription, veuillez cliquer sur le lien suivant ou recopiez-le dans votre navigateur :\n
".$var_sitewebb."index.php?cat=mail_valid&idm=$idm \n\n
Vos identifiants sont:
      Email : $nemail
      Mot de passe : $pass\n\n
L'Equipe de $titre_site vous remercie.\n- www.dentiste-remplacant.com\n- www.cabinet-dentaire.com\n- www.assistante-dentaire.com\n
-- Merci de ne pas repondre --\nPour toute question, merci d'utiliser le formulaire de Contact.
";

$headers =  "From: robot@$titre_site2\r\n";
$headers .= "Reply-To: robot@nepasrepondre.com\r\n";


@mail($nemail, "[$titre_site3] - Vérification de votre adresse email", $message, $headers);

$mu=2;
echo'<br />';
include("inscriptionbd.php");
echo '<br /><div class="important">'.$txt_emailConf.'</div>';

$res=mysql_query($req);
$connect=0;
        

# on maile a webmestre si volontee de cadeau
if ($okmacsf == 2) {
  
if ($type == "1") {$inscrit = "Chirurgien dentiste non installé";};
if ($type == "2") {$inscrit = "Chirurgien dentiste installé (seul ou en association)";};
if ($type == "3") {$inscrit = "Etudiant en chirurgie dentaire";};
if ($type == "4") {$inscrit = "Assistante Dentaire";};
if ($type == "9") {$inscrit = "Stomatologue, chir.maxillo-facial";};

$prenom_macsf = unhtmlentities($prenom);
$nom_macsf  = unhtmlentities($nom);
$adresse_macsf  = unhtmlentities($adresse);


@mail ("laurent.dussarps@gmail.com,marie-laure.mollis@macsf.fr,jean-louis.raudier@macsf.fr","$prenom_macsf $nom_macsf veut un
cadeau MACSF","
INSCRIPTION SUR $titre_site3\n
--Données confidentielles, ne diffuser qu'en interne --\n
$prenom_macsf $nom_macsf\n$adresse_macsf\n$cp $ville\n($pays)
($indicatif)$tel\n$mob\n
Date de naissance : $jour-$mois-$an\n
$inscrit.   \n\n

Bonne réception,\nLaurent Dussarps\nDental Networks
");

};














    } // fin enregistrement bdd

  } // fin du traitement et de l'insertion

} // fin de l'action 'continuer'




// AFFICHAGE FORMULAIRE
if ($post=="insc" or $compte=="modif") {


if ($npays=='') $npays="France";
if ($_REQUEST['post']!="") $inscrip="&amp;post=".$_REQUEST['post'];


echo'

<br />

<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top">
<br /> ';

$mu=1;
include("inscriptionbd.php");


echo'
<form method="post" action="index.php?cat='.$cat.$inscrip.'" name="insc"> ';


echo '<table cellspacing="0" cellpadding="2" style="text-align: left" />';






echo '
<tr><td colspan="2"><br />'.$err['dejaemail'].''.$err['dejainscrit'].'
</td></tr>
<tr><td colspan="2">

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_tt_ins1.' :</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" />
<tr><td>'.$txt_identif.'

 <img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'info1\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'info1\').style.visibility=\'hidden\'"/>

<div id="info1" style="visibility: hidden; width: 350px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>Attention !</b></div>
Votre email doit &ecirc;tre valide, car pour terminer l\'inscription, vous devrez consulter imm&eacute;diatement votre messagerie et cliquer sur le lien d\'activation
</div>


</td><td><input type="text" name="nemail" id="nemail" value="'.$nemail.'" size="35" /> '.$err['email'].'</td></tr>
<tr><td>'.$txt_pass.'</td><td ><input type="password" name="npass" id="npass" value="'.$npass.'" /> '.$err['pass'].'</td></tr>
</table>
</fieldset> 
<br />
<script type="text/javascript">
    			var nemail = new LiveValidation( \'nemail\', {onlyOnSubmit: false } ); nemail.add( Validate.Presence ); nemail.add( Validate.Email );
    			var npass = new LiveValidation( \'npass\', {onlyOnSubmit: false } ); npass.add( Validate.Presence ); npass.add( Validate.Length, { minimum: 4 } );

</script>


';


echo'


<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_tt_ins2.' :</strong></font></legend>

<table cellpadding="3" cellspacing="3" border="0" /> ';


if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {
  echo'<tr><td>Raison sociale</td><td><input type="text" size="35" name="nsociete" value="'.$nsociete.'" /> '.$err['nsociete'].'</td></tr> ';};

echo '<tr><td align="right">'.$txt_item_01.' </td><td>
<input type="radio" name="ncivilite" value="Mlle" '; if ($ncivilite=="Mlle") echo 'checked="checked"'; echo' />'.$txt_item_01a.'
<input type="radio" name="ncivilite" value="Mme" '; if ($ncivilite=="Mme") echo 'checked="checked"'; echo' />'.$txt_item_01b.'
<input type="radio" name="ncivilite" value="M." '; if ($ncivilite=="M.") echo 'checked="checked"'; echo' />'.$txt_item_01c.'
 '.$err['ncivilite'].'</td></tr>';

echo '<tr><td align="right">'.$txt_item_02.' ';
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {echo' du contact';};
echo '</td><td><input type="text" name="nnom" value="'.$nnom.'" /> '.$err['nom'].'</td></tr>';

echo '<tr><td align="right">'.$txt_item_03.' ';
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {echo' du contact';};
echo '</td><td><input type="text" name="nprenom" value="'.$nprenom.'" size="12" /> '.$err['prenom'].' </td></tr>';

if ($type == "1" || $type=="2" || $type == "3" || $type=="4" || $type=="9") {  // Dentiste, étudiant, assistante, stomato
echo '<tr><td align="right">'.$txt_item_04.' </td><td>
<input type="text" name="njour" value="'.$njour.'"  size="1" maxlength="2"/ '.$numeric.' >
<input type="text" name="nmois" value="'.$nmois.'"  size="1" maxlength="2"/ '.$numeric.' >
<input type="text" name="nan" value="'.$nan.'"  size="3" maxlength="4"/ '.$numeric.' >
 '.$err['anniv'].'</td></tr>';};
 
 echo ' <tr><td align="right">'.$txt_item_05.' </td><td><input type="text" name="nadresse" value="'.$nadresse.'" size="35" maxlength="120" /> '.$err['adresse'].'</td></tr>
<tr><td align="right">'.$txt_item_06.' </td><td><input type="text" name="ncp" value="'.$ncp.'" size="5" maxlength="5" '.$numeric.' />&nbsp;
<input type="text" name="nville" value="'.$nville.'" size="27" /> '.$err['ville'].'</td></tr>
<tr><td align="right">'.$txt_item_07.'<br /></td><td>'; ?>



  <select name="liste_pays" id="liste_pays" onchange="this.options[this.selectedIndex].onclick();" style="border: 1px solid #c0c5dd">

   <option value=""><?PHP echo $txt_item_07b ?> ...</option>


<?PHP


$reqPays=mysql_query("SELECT * FROM ListePays WHERE (type_lien=2 OR type_lien=3) ORDER BY ordre_affiche DESC,nom_lien");

    while ($rowPays=mysql_fetch_array($reqPays)) {

$nom_lien    =  $rowPays['nom_lien'];
$nom_affiche =  $rowPays['nom_affiche'];
$id_tel      =  $rowPays['id_tel'];
$zone2       =  $rowPays['zone2'];

echo  ' <option value="'.$nom_lien.'" onclick="select_country(\''.$nom_lien.'\',\''.$id_tel.'\', \''.$zone2.'\');">'.$nom_affiche.'</option> ';


                                                    }


?>




</select> <?=$err['pays'] ?>

<?

if ($compte=="modif") {} else {

// FONCTION RAJOUTEE POUR MODIFICATION PAYS -------- debut 2eme partie -----------
//  Pour que le pays sélectionné soit choisi par défaut dans le sélect s'il est réaffiché

echo' <script type="text/javascript">document.getElementById(\'liste_pays\').value = \''.$liste_pays.'\'</script>';

// FONCTION RAJOUTEE POUR MODIFICATION PAYS -------- fin 2eme partie -----------
   };  ?>


</td></tr>


<tr><td><?PHP echo $txt_item_08 ?></td><td><input id="ind_fixe" name="ind_fixe" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($ind_fixe)) { echo $ind_fixe;  }?>" type="text" readonly >&nbsp;
<input type="text" name="ntel" value="<?=$ntel ?>" <?=$numeric ?> /> <?=$err['ntel'] ?></td></tr>

<tr><td><?PHP echo $txt_item_09 ?></td><td><input id="ind_mobile" name="ind_mobile" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($ind_mobile)) { echo $ind_mobile;  }?>" type="text" readonly >&nbsp;
<input type="text" name="nmob" value="<?=$nmob ?>" <?=$numeric ?> /> </td></tr>

<tr><td><?PHP echo $txt_item_10 ?></td><td><input id="ind_fax" name="ind_fax" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($ind_fax)) { echo $ind_fax;  }?>" type="text" readonly >&nbsp;
<input type="text" name="nfax" value="<?=$nfax ?>" <?=$numeric ?> /> </td></tr>

<?PHP    echo'

<tr><td>'.$txt_item_11.'</td><td>
          <input type="radio" name="noketudes" value="1" '; if ($noketudes =="1") echo 'checked="checked"'; echo' />'.$txt_non.'
          <input type="radio" name="noketudes" value="2" '; if ($noketudes =="2") echo 'checked="checked"'; echo' />'.$txt_oui.'
 '.$err['noketudes'].'
</td></tr>

<tr><td>'.$txt_item_12.'</td><td>
          <input type="radio" name="nokpapier" value="1" '; if ($nokpapier =="1") echo 'checked="checked"'; echo' />'.$txt_non.'
          <input type="radio" name="nokpapier" value="2" '; if ($nokpapier =="2") echo 'checked="checked"'; echo' />'.$txt_oui.'
 '.$err['nokpapier'].'
</td></tr>';

// MACSF  1/2
echo '</fieldset>
</table><input type="hidden" name="nokmacsf" value="1" /> ';
/*
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {} else {
echo '<tr><td><font color="FF0000">Recevoir un cadeau offert par la MACSF*<br />
(France uniquement) </font></td><td>
          <input type="radio" name="nokmacsf" value="1" '; if ($nokmacsf =="1") echo 'checked="checked"'; echo' />Non
          <input type="radio" name="nokmacsf" value="2" '; if ($nokmacsf =="2") echo 'checked="checked"'; echo' />Oui
 '.$err['nokpapier'].'
</td></tr>';                                                            };
*/

echo '
<tr><td colspan="2"><br />

<input type="hidden" value="'; if (isset($zone)) { echo $zone;  }; echo '" id="zone" name="zone"  />
<input type="hidden" value="'; if (isset($pays)) { echo $pays;  }; echo '" id="pays" name="pays"  />
<input type="hidden" value="'; if (isset($indicatif_tel)) { echo $indicatif_tel;  }; echo '" id="indicatif_tel" name="indicatif_tel" />
<input type="hidden" value="'; if (isset($type)) { echo $type;  }; echo '" id="type" name="type"  />


</td></tr>

<tr><td colspan="2">
<input type="checkbox" name="ncondition" /> '.$txt_item_13.' '.$err['ncondition'] .'<br />
'.$txt_item_14.'<br />';


// MACSF  2/2
/*
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {}
else {echo 'Si vous avez coch&eacute; le cadeau MACSF, vous acceptez qu\'un conseiller prennent contact avec vous pour vous le remettre.
<br />&gt;<a href="conditions.php" target="_blank"> Lire les conditions d\'utilisation</a> <br />';};
 */
 

echo '</td></tr><tr><td colspan="2"><br />';

echo $txt_item_16.'
<input type="submit" name="post" value="continuer" /></td></tr>
</form>
</table>
</td></tr></table>';


}

};
echo '

</td><td width="40%" valign="top">
     ';



Pub() ;




echo '

</td></tr></table>
';



?>
