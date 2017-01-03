<?PHP



echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><a href="index.php?cat=ad_annonces"><img src="images/cherchAnn64.png" border="1" width="64" height="64" />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_ChAnnTitre.'</font></a><br /><br /></td></tr>
<tr><td valign="top">
';


// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$zone=$_POST['zone'];
$reg=$_GET['reg'];
$pays=$_GET['pays'];
$zonegeo=$_GET['zonegeo'];
$liste=$_GET['liste'];
$inc=$_REQUEST['inc'];
$numann=$_REQUEST['numann'];
$cmd = $_GET['cmd'];
$SendEmail=$_GET['SendEmail'];

$zone_preference = $_GET['zone_preference'];
$pays_preference = $_GET['pays_preference'];


$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';
$lien1 = 'index.php?cat=ad_annonces&amp;cmd=liste&amp;zonegeo=1&amp;reg=';    // France
$lien3 = 'index.php?cat=ad_annonces&amp;post=zone&amp;pays=';    // Ouvrir une autre zone géographique
$lien2 = 'index.php?cat=ad_annonces&amp;cmd=liste&amp;pays=';    // tout le reste

  if (isset($_POST['zone'])) {$zone = $_POST['zone'];}
  else { if (isset($_GET['zonegeo'])) {$zone=$_GET['zonegeo'];};
  };





echo $txt_ChAnnTexte.'<br />  <br />    ';





 if (isset($_SESSION['email'])) {

 echo '<font class="XLdr">Vous avez choisi comme zone g&eacute;oraphique par d&eacute;faut : <strong>';
            if ($zone_preference=="1") echo $txt_eFRANCE;
            if ($zone_preference=="2") echo $txt_eEUROP;
            if ($zone_preference=="3") echo $txt_eAMERIN;
            if ($zone_preference=="4") echo $txt_eAMERIS;
            if ($zone_preference=="5") echo $txt_eCARAIB;
            if ($zone_preference=="6") echo $txt_eAFRIQ;
            if ($zone_preference=="7") echo $txt_eOCEANIE;
            if ($zone_preference=="8") echo $txt_eASIE;
            if ($zone_preference=="9") echo 'Votre pays ('.$pays_preference.')';
                                       
                                       
echo ' [<a href="index.php?cat=compte&incl=pref">Modifier</a>]</strong></font> <br />  <br />';

                                };





 echo '

<FORM action="index.php?cat=ad_annonces&amp;post=zone" method=post>
'.$txt_voirAnn.' <select name="zone" onchange=this.form.submit()>
          <option value="">-- s&eacute;lectionnez --</option>
          <option value="1"'; if ($zone=="1") echo 'selected'; echo '>'.$txt_eFRANCE.'</option>
          <option value="2"'; if ($zone=="2") echo 'selected'; echo '>'.$txt_eEUROP.'</option>
          <option value="3"'; if ($zone=="3") echo 'selected'; echo '>'.$txt_eAMERIN.'</option>
          <option value="4"'; if ($zone=="4") echo 'selected'; echo '>'.$txt_eAMERIS.'</option>
          <option value="5"'; if ($zone=="5") echo 'selected'; echo '>'.$txt_eCARAIB.'</option>
          <option value="6"'; if ($zone=="6") echo 'selected'; echo '>'.$txt_eAFRIQ.'</option>
          <option value="7"'; if ($zone=="7") echo 'selected'; echo '>'.$txt_eOCEANIE.'</option>
          <option value="8"'; if ($zone=="8") echo 'selected'; echo '>'.$txt_eASIE.'</option>
        </select>

</FORM>
<br />
';





if (($zone_preference=="1") || ($post=="zone" && $zone=="1") || ($post=="zone" && $pays=="France")) {
  
echo'
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_MFRANCE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="23" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';










$res=mysql_query("SELECT * FROM ListePays WHERE zone='France'");
while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "1") {$lien = $lien1;};
                                               if ($row['type_lien'] == "2") {$lien = $lien2;};
                                            //   $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ORDER BY 'urgent' desc, 'date_in' desc");
                                            //   $nbrann = mysql_num_rows($req);

                                                $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ");
                                                $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.'  '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';


     }
      

echo '
</td></tr>
</table>
</fieldset>

<br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>DOM - TOM :</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td colspan="2"><strong>D.O.M </strong></td></tr>';

$res=mysql_query("SELECT * FROM ListePays WHERE DomTom='1'");
while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "1") {$lien = $lien1;};
                                               if ($row['type_lien'] == "2") {$lien = $lien2;};
                                            //   $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ORDER BY 'urgent' desc, 'date_in' desc");
                                            //   $nbrann = mysql_num_rows($req);

                                                $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';


     }


echo '<tr><td colspan="2"><br /><strong>T.O.M </strong></td></tr>';

$res=mysql_query("SELECT * FROM ListePays WHERE DomTom='2'");
while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "1") {$lien = $lien1;};
                                               if ($row['type_lien'] == "2") {$lien = $lien2;};
                                            //   $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ORDER BY 'urgent' desc, 'date_in' desc");
                                            //   $nbrann = mysql_num_rows($req);

                                                $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';


     }

echo '


</table>
</fieldset>





 ';
    
      };




if (($zone_preference=="2") || ($post=="zone" && $zone=="2") || ($post=="zone" && $pays=="Europe") || ($post=="zone" && $pays=="UE")) {


$res=mysql_query("SELECT * FROM ListePays WHERE zone='Europe' OR zone='UE' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_UE_EUROP.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="44" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};


                                               // $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                               // $nbrann = mysql_num_rows($req);

                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);
                                               

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';

                                          };
echo '</table></fieldset>';

};





if (($zone_preference=="3") || ($post=="zone" && $zone=="3") || ($post=="zone" && $pays=="Amerin")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Amerin' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AMERIN.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="6" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';


     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};


                                               if ($row['type_lien'] == "2") {
                                               // $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                               // $nbrann = mysql_num_rows($req);
                                               
                                                $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';

                                          };      };
echo '</table></fieldset>';

};




if (($zone_preference=="4") || ($post=="zone" && $zone=="4") || ($post=="zone" && $pays=="Ameris")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Ameris' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AMERIS.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="22" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};

                                               if ($row['type_lien'] == "2") {
                                                 
                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';
                                                                              };
                                          };
echo '</table></fieldset>';

};




if (($zone_preference=="5") || ($post=="zone" && $zone=="5") || ($post=="zone" && $pays=="Caraibes")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Caraibes' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_CARAIB.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};

                                               if ($row['type_lien'] == "2") {
                                                 
                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';
                                                                              };
                                          };
echo '</table></fieldset>';

};





if (($zone_preference=="6") || ($post=="zone" && $zone=="6") || ($post=="zone" && $pays=="Afrique")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Afrique' OR zone='Maghreb' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AFRIQMAG.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};

                                               if ($row['type_lien'] == "2") {

                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';
                                                                              };
                                          };
echo '</table></fieldset>';

};




if (($zone_preference=="7") || ($post=="zone" && $zone=="7") || ($post=="zone" && $pays=="Oceanie")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Oceanie' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_OCEANIE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};

                                               if ($row['type_lien'] == "2") {

                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';
                                                                              };
                                          };
echo '</table></fieldset>';

};






if (($zone_preference=="8") || ($post=="zone" && $zone=="8") || ($post=="zone" && $pays=="Asie")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Asie' order by nom_lien");

echo '
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_ASIE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbAnnonces.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};

                                               if ($row['type_lien'] == "2") {

                                                 $req = mysql_query("SELECT id_annonce FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".a($row['nom_lien'])."' ");
                                                 $nbrann =  mysql_num_rows($req);

     echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrann.' '.$txt_ad;if ($nbrann>1){echo 's';}; echo'</a></td></tr> ';
                                                                              };
                                          };
echo '</table></fieldset>';

};






if (($cmd == "liste")||($zone_preference=="9"))   {


 if (isset($_SESSION['email']))  {      // CONNECTE

 // Vérifie si Membre activé (a payé)

// $resi=mysql_query("SELECT actifm FROM $table_membre WHERE email='".$_SESSION['email']."'");
// $rowi=mysql_fetch_array($resi);
// if ($rowi['actifm']!=2) { echo '
//                          <table><tr>
//                          <td width=140><img src="'.$adresse_site1.'/images/clavier_bleu.jpg" width="130" height="98"></td>
//                          <td><div class="important"><center>Votre inscription est arriv&eacute;e &agrave; terme </center></div>
//                          Votre inscription doit &ecirc;tre r&eacute;activ&eacute;e si vous souhaitez uiliser le site. <br />
//                          Tant que votre compte est d&eacute;sacvtiv&eacute;, vos CV ou annonces sont inactives.<br />
//                          cliquez ici pour r&eacute;activer votre compte <a href="'.$adresse_site1.'/index.php?cat=activ"><u><strong>ICI</strong></u></a>.
//                          Merci de votre compr&eacute;hension.
//                          </td></tr></table>
//                          <br />';
//                         }
//
// else {

if ($zonegeo=="1") {

// Affiche 10 par 10
if(isset($_GET['deb'])) $deb=$_GET['deb'];
else $deb=0; $limite=10;
$page="index.php?cat=ad_annonces&amp;cmd=liste&amp;zonegeo=1&amp;reg=$reg";

echo '<a href="index.php?cat=ad_annonces"><u>Monde</u></a> / <a href="'.$lien3.'Europe"><u>Europe</u></a> / <a href="'.$lien3.'France"><u>France</u></a> / <u>'.$reg.'</u> ';
echo '<hr style="border: 1px solid #ccccdd"/>';

$req2=mysql_query("SELECT * FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND region='$reg' ORDER BY id_annonce");
$nbrann = mysql_num_rows($req2);

$req=mysql_query("SELECT * FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND region='$reg' ORDER BY id_annonce desc LIMIT $deb, $limite");

echo' <b> Liste des annonces dans la r&eacute;gion '.$reg.' :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'annonce dans cette r&eacute;gion.';}
else { echo 'Il y a '.$nbrann.' '.$txt_ad; if ($nbrann>1) echo 's'; echo ' dans cette r&eacute;gion.';};

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {

$id_mbre =  $row['id_mbre'];
$id_annonce =  $row['id_annonce'];
$type_ann =  $row['type_ann'];
$type_poste =  $row['type_poste'];

if ($type_ann=="1") {$type_ann = $txt_en.' '.$txt_CDDC;};
if ($type_ann=="2") {$type_ann = $txt_en.' '.$txt_CDIC;};
if ($type_ann=="3") {$type_ann = $txt_en.' '.$txt_CProf;};

if ($type_poste=="1") {$type_poste = $txt_Ass_01;};
if ($type_poste=="2") {$type_poste = $txt_Ass_02;};
if ($type_poste=="3") {$type_poste = $txt_Ass_F;};
if ($type_poste=="4") {$type_poste = $txt_Ass_03;};
if ($type_poste=="5") {$type_poste = $txt_Ass_04;};
if ($type_poste=="6") {$type_poste = $txt_Ass_F;};
if ($type_poste=="7") {$type_poste = $txt_Aid_F;};
if ($type_poste=="8") {$type_poste = $txt_AssDir;};


  $djour = substr($row['date_debut'],8,2);
  $dmois = substr($row['date_debut'],5,2);
  $dan = substr($row['date_debut'],0,4);
  $fjour = substr($row['date_fin'],8,2);
  $fmois = substr($row['date_fin'],5,2);
  $fan = substr($row['date_fin'],0,4);

if ($row['urgent']=="2") { $couleur1 = "#$C_urg_Fonce;";
                           $couleur2 = "#$C_urg_cadre;";
                           $couleur3 = "#$C_urg_font;";
                           }


else {$couleur1 = "#$C_noir;";
      $couleur2 = "#$C_titre;";
      $couleur3 = "#$C_fond_clair;";
      };




echo'  <br /><br />
<table width="610" style="border: 1px solid '.$couleur1.' border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: '.$couleur2.'"><td><div class="txtanng"><strong> (D&eacute;p. : '.$row['departement'].') - '.$type_ann.'
</strong></div></td>
<td><div class="txtannd">Post&eacute; le '.date_naturelle_s($row['date_in']).'</div></td></tr></table>

<table width="610" style="border: 1px solid '.$couleur1.' border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: '.$couleur3.'"><td width="120">';


if (file_exists("$dest_dossier_ad/$id_mbre.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ad/$id_mbre.jpg";   imagette ($imagette,80) ; }

else  {if (file_exists("$dest_dossier_ad_ann/$id_annonce.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ann_ad/$id_annonce.jpg"; imagette ($imagette,80) ; };  };


echo '

</td>
<td><div class="normal" align="left"> ';
echo '<strong>'.$type_poste.'</strong><br />';
if ($row['type_ann']=="1") { echo' Contrat du '.$djour.'/'.$dmois.'/'.$dan.' au   '.$fjour.'/'.$fmois.'/'.$fan.' '; }
else { echo' D&eacute;but de contrat souhait&eacute; au '.$djour.'/'.$dmois.'/'.$dan.' '; };

echo '
<br />Temps de travail hebdomadaire : '.$row['heures'].' H
<br />Ville : '.$row['ville'].'
<br /><br />
Expire le '.date_naturelle($row['expiration']).'</i>
</div></td></tr></table>';

echo ' <div style="background-color: '.$couleur2.' position:relative; left:';       if ($navigateur=="IE") { echo '470px;'; } else { echo '474px;'; };
echo ' top:-8px; width: 135px;"><a href="index.php?cat=ad_annonces&amp;cmd=detail&amp;numann='.$id_annonce.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail de l\'annonce</strong></font></a></div>';

 } // fin du while

echo'<br /><br />';

nav($nbrann,$limite,$page);

}







else {  // zone geographique différente de 1



  if (isset($pays_preference)) {  $pays = $pays_preference; };







// Affiche 10 par 10
if(isset($_GET['deb'])) $deb=$_GET['deb'];
else $deb=0; $limite=10;

$resp=mysql_query("SELECT * FROM ListePays WHERE nom_lien='".protect($pays)."' ");
$rowp=mysql_fetch_array($resp);

$page='index.php?cat=ad_annonces&amp;cmd=liste&amp;pays='.$rowp['nom_lien'].' ';

echo '<a href="index.php?cat=ad_annonces"><u>Monde</u></a> / <a href="'.$lien3.$rowp['zone'].'"><u>';

if ($rowp['zone']== "Amerin") {echo 'Am&eacute;rique du Nord';}
else { if ($rowp['zone']== "Ameris") {echo 'Am&eacute;rique du Sud';} else {echo $rowp['zone'];} };

echo'
</u></a> / <u>'.s(s($pays)).'</u> ';

$req2=mysql_query("SELECT * FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".protect($pays)."' ");
$nbrann = mysql_num_rows($req2);

$req=mysql_query("SELECT * FROM $table_annonce3,membres WHERE valid=2 AND id_membre=id_mbre AND pays='".protect($pays)."' ORDER BY id_annonce DESC LIMIT $deb, $limite");


echo '<hr style="border: 1px solid #ccccdd"/>';
echo' <b> Liste des annonces dans le pays :  '.s(s($pays)).' :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'annonce dans ce pays.';}
else { echo 'Il y a '.$nbrann.' '.$txt_ad; if ($nbrann>1) echo 's'; };

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {

$id_mbre =  $row['id_mbre'];
$id_annonce =  $row['id_annonce'];
$type_ann =  $row['type_ann'];
$type_poste =  $row['type_poste'];

if ($type_ann=="1") {$type_ann = $txt_en.' '.$txt_CDDC;};
if ($type_ann=="2") {$type_ann = $txt_en.' '.$txt_CDIC;};
if ($type_ann=="3") {$type_ann = $txt_en.' '.$txt_CProf;};

if ($type_poste=="1") {$type_poste = $txt_Ass_01;};
if ($type_poste=="2") {$type_poste = $txt_Ass_02;};
if ($type_poste=="3") {$type_poste = $txt_Ass_F;};
if ($type_poste=="4") {$type_poste = $txt_Ass_03;};
if ($type_poste=="5") {$type_poste = $txt_Ass_04;};
if ($type_poste=="6") {$type_poste = $txt_Ass_F;};
if ($type_poste=="7") {$type_poste = $txt_Aid_F;};
if ($type_poste=="8") {$type_poste = $txt_AssDir;};


  $djour = substr($row['date_debut'],8,2);
  $dmois = substr($row['date_debut'],5,2);
  $dan = substr($row['date_debut'],0,4);
  $fjour = substr($row['date_fin'],8,2);
  $fmois = substr($row['date_fin'],5,2);
  $fan = substr($row['date_fin'],0,4);


if ($row['urgent']=="2") { $couleur1 = "#$C_urg_Fonce;";
                           $couleur2 = "#$C_urg_cadre;";
                           $couleur3 = "#$C_urg_font;";
                           }


else {$couleur1 = "#$C_noir;";
      $couleur2 = "#$C_titre;";
      $couleur3 = "#$C_fond_clair;";
      };



echo'  <br /><br />
<table width="610" style="border: 1px solid '.$couleur1.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: '.$couleur2.'"><td><div class="txtanng"><strong>';
 if ($row['pays']== "France") { echo ' (D&eacute;p. : '.$row['departement'].')';} else { echo ' (Ville : '.$row['ville'].')';}; echo ' - '.$type_ann.'
</strong></div></td>
<td><div class="txtannd">Post&eacute; le '.date_naturelle_s($row['date_in']).'</div></td></tr></table>

<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: '.$couleur3.';"><td width="120">';


if (file_exists("$dest_dossier_ad/$id_mbre.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ad/$id_mbre.jpg";   imagette ($imagette,80) ; }

else  {if (file_exists("$dest_dossier_ad_ann/$id_annonce.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ann_ad/$id_annonce.jpg"; imagette ($imagette,80) ; };  };


echo '

</td>
<td><div class="normal" align="left"> ';

echo '<strong>'.$type_poste.'</strong><br />';
if ($row['type_ann']=="1") { echo' Contrat du '.$djour.'/'.$dmois.'/'.$dan.' au   '.$fjour.'/'.$fmois.'/'.$fan.' '; }
else { echo' D&eacute;but de contrat souhait&eacute; au '.$djour.'/'.$dmois.'/'.$dan.' '; };

echo '
<br />Temps de travail hebdomadaire : '.$row['heures'].' H
<br />Ville : '.$row['ville'].'
<br /><br />
Expire le '.date_naturelle($row['expiration']).'</i>
</div></td></tr></table>';

echo ' <div style="background-color: '.$couleur2.'; position:relative; left:';       if ($navigateur=="IE") { echo '470px;'; } else { echo '474px;'; };
echo ' top:-8px; width: 135px;"><a href="index.php?cat=ad_annonces&amp;cmd=detail&amp;numann='.$id_annonce.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail de l\'annonce</strong></font></a></div>';

 } // fin du while

echo'<br /><br />';
nav($nbrann,$limite,$page);

}

//  }



}


else { 

AccesReserve();

      };


};








if ($cmd == "detail") {


if (isset($_SESSION['email']))  {      // CONNECTE


 // Membre activé (a payé)

// $resi=mysql_query("SELECT actifm FROM $table_membre WHERE email='".$_SESSION['email']."'");
// $rowi=mysql_fetch_array($resi);
// if ($rowi['actifm']!=2) { echo '
//                          <table><tr>
//                          <td width=140><img src="'.$adresse_site1.'/images/clavier_bleu.jpg" width="130" height="98"></td>
//                          <td><div class="important"><center>Votre inscription est arriv&eacute;e &agrave; terme </center></div>
//                          Votre inscription doit &ecirc;tre r&eacute;activ&eacute;e si vous souhaitez uiliser le site. <br />
//                          Tant que votre compte est d&eacute;sacvtiv&eacute;, vos CV ou annonces sont inactives.<br />
//                          cliquez ici pour r&eacute;activer votre compte <a href="'.$adresse_site1.'/index.php?cat=activ"><u><strong>ICI</strong></u></a>.
//                          Merci de votre compr&eacute;hension.
//                          </td></tr></table>
//                          <br />';
//                         }
//
// else {


if ($SendEmail == "1") {

$q_nom = stripslashes(htmlentities(trim($_POST['q_nom'])));
$q_email = stripslashes(htmlentities(trim($_POST['q_email'])));
$q_titre = stripslashes(htmlentities(trim($_POST['q_titre'])));
$q_texte = stripslashes(htmlentities(trim($_POST['q_texte'])));
$annonceur = stripslashes(htmlentities(trim($_POST['annonceur'])));

$req=mysql_query("SELECT email FROM $table_membre WHERE id_membre='$annonceur'");
$row=mysql_fetch_array($req);
$email_annonceur = $row['email'];


if ($q_texte==="") $err_texte=1;

if ($err_texte=="") {
		$text_brut=html_entity_decode($q_texte);
		$nom_brut=html_entity_decode($q_nom);
		$titre_brut=html_entity_decode($q_titre);

	        $headers = "From: $q_email\r\n";
                $headers .= "Reply-To: $q_email\r\n";



		if (mail($email_annonceur, "$titre_brut" ,"Ref. annonce : $numann\n\n $text_brut\n\nEnvoi de $nom_brut\nemail: $q_email", $headers))
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




echo '<hr style="border: 1px solid #ccccdd"/>';

$req1=mysql_query("SELECT * FROM $table_annonce3 WHERE valid=2 AND id_annonce='$numann'");
$row1=mysql_fetch_array($req1);

  if($row1['valid']!=2) { echo 'L\'annonce a &eacute;t&eacute; retir&eacute;e ou n\'a pas &eacute;t&eacute; valid&eacute;e.';}

  else  { // l'annonce est valide

  $id_mbre=$row1['id_mbre'];
  $type_ann=$row1['type_ann'];
  $type_poste=$row1['type_poste'];
  $djour = substr($row1['date_debut'],8,2);
  $dmois = substr($row1['date_debut'],5,2);
  $dan = substr($row1['date_debut'],0,4);
  $fjour = substr($row1['date_fin'],8,2);
  $fmois = substr($row1['date_fin'],5,2);
  $fan = substr($row1['date_fin'],0,4);
  $emploidutemps =$row1['emploidutemps'];
  $compt = $row1['compt']+1;


if (ereg ("Lun_ma",$emploidutemps ))  {$lun=" Lundi (matin)";};
if (ereg ("Lun_ap",$emploidutemps ))  {$lun=" Lundi (apr&eacute;s midi)";};
if (ereg ("Lun_tt",$emploidutemps ))  {$lun=" Lundi (toute la journ&eacute;e)";};
if (ereg ("Mar_ma",$emploidutemps ))  {$mar=" Mardi (matin)";};
if (ereg ("Mar_ap",$emploidutemps ))  {$mar=" Mardi (apr&eacute;s midi)";};
if (ereg ("Mar_tt",$emploidutemps ))  {$mar=" Mardi (toute la journ&eacute;e)";};
if (ereg ("Mer_ma",$emploidutemps ))  {$mer=" Mercredi (matin)";};
if (ereg ("Mer_ap",$emploidutemps ))  {$mer=" Mercredi (apr&eacute;s midi)";};
if (ereg ("Mer_tt",$emploidutemps ))  {$mer=" Mercredi (toute la journ&eacute;e)";};
if (ereg ("Jeu_ma",$emploidutemps ))  {$jeu=" Jeudi (matin)";};
if (ereg ("Jeu_ap",$emploidutemps ))  {$jeu=" Jeudi (apr&eacute;s midi)";};
if (ereg ("Jeu_tt",$emploidutemps ))  {$jeu=" Jeudi (toute la journ&eacute;e)";};
if (ereg ("Ven_ma",$emploidutemps ))  {$ven=" Vendredi (matin)";};
if (ereg ("Ven_ap",$emploidutemps ))  {$ven=" Vendredi (apr&eacute;s midi)";};
if (ereg ("Ven_tt",$emploidutemps ))  {$ven=" Vendredi (toute la journ&eacute;e)";};
if (ereg ("Sam_ma",$emploidutemps ))  {$sam=" Samedi (matin)";};
if (ereg ("Sam_ap",$emploidutemps ))  {$sam=" Samedi (apr&eacute;s midi)";};
if (ereg ("Sam_tt",$emploidutemps ))  {$sam=" Samedi (toute la journ&eacute;e)";};

  $expjour = substr($row1["expiration"],8,2);
  $expmois = substr($row1["expiration"],5,2);
  $expan = substr($row1["expiration"],0,4);
  
  $texte_annonce=s($row1['texte_annonce']);
  $heures=$row1['heures'];
  $remarque=s($row1['remarque']);

$req2=mysql_query("SELECT * FROM $table_membre WHERE id_membre='$id_mbre'");
$row2=mysql_fetch_array($req2);

$req3=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_mbre'");
$row3=mysql_fetch_array($req3);

// Comptage des visites de cette annonce +1
$req="UPDATE $table_annonce3 SET compt='$compt' WHERE id_annonce='$numann'";
$res=mysql_query($req);




echo'
<br /><br />
<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #286f64;"><td><div class="txtanng">
<strong> D&eacute;tail de l\'annonce n&ordm;'.$numann.' :</strong></div></td>
<td><div class="txtannd">Post&eacute; le '.date_naturelle_s($row1['date_in']).'</div></td></tr></table>

<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>'; 
if (($row3['type_ad']=="1")||($row3['type_ad']=="2")||($row3['type_ad']=="9")) echo 'Descriptif du cabinet ';
if ($row3['type_ad']=="5") echo 'Descriptif du centre de soins ';
if ($row3['type_ad']=="6") echo 'Descriptif de la soci&eacute;t&eacute; ';
if ($row3['type_ad']=="8") echo 'Descriptif de l\'association, mairie, ... ';

echo ': </strong></td></tr>

<tr bgcolor="#'.$C_fond_clair.'">
<td width="155" align="left" style="padding: 5px;">';
       
if (file_exists("$dest_dossier_ad/$id_mbre.jpg"))   {    $imagette = "$adresse_site1/photos/photos_ad/$id_mbre.jpg";
                                                        imagette ($imagette,150) ;
                                                   } else {echo 'Aucune photo';};
       
echo ' </td>
       <td style="padding: 10px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000"> ';


if ($row3['type_ad']=="2") {echo '<strong>Cabinet dentaire</strong><br />';};
if ($row3['type_ad']=="5") {echo '<strong>Centre de soins (mutuelle,CPAM)</strong><br />';};
if ($row3['type_ad']=="9") {echo '<strong>Cabinet de stomatologie / maxillo-facial</strong><br />';};



if (($row3['type_ad']=="1")||($row3['type_ad']=="2")||($row3['type_ad']=="5")||($row3['type_ad']=="8")||($row3['type_ad']=="9")) { echo '

- Cabinet '; if ($row3['modeexercice']=="1") {echo 'individuel';};
             if ($row3['modeexercice']=="2") {echo 'de groupe';};
echo' exer&ccedil;ant en '; if ($row3['zoneexercice']=="1") {echo 'milieu citadin';};
                            if ($row3['zoneexercice']=="2") {echo 'milieu rural';};
                            if ($row3['zoneexercice']=="3") {echo 'milieu semi-rural';};
                            if ($row3['zoneexercice']=="4") {echo 'banlieue';};
echo ' et ayant une orientation ';


   if ($row3['specialite']=="1") {echo "omnipratique";}
   if ($row3['specialite']=="2") {echo "ODF";}
   if ($row3['specialite']=="3") {echo "parodontologie";}
   if ($row3['specialite']=="4") {echo "implantologie";}
   if ($row3['specialite']=="5") {echo "proth&egrave;se";}
   if ($row3['specialite']=="6") {echo "p&eacute;dodontie";}
   if ($row3['specialite']=="7") {echo "endodontie";}
   if ($row3['specialite']=="8") {echo "chirurgie buccale";}

echo '<br />';

if ($row3['secretaire']=="1") {echo '- Pas de secr&eacute;taire.<br />';};
if ($row3['secretaire']=="2") {echo '- Secr&eacute;taire pr&eacute;sente.<br />';};

if ($row3['assistante']=="1") {echo '- Pas d\'assistante.<br />';};
if ($row3['assistante']=="2") {echo '- Assistante au fauteuil.<br />';};

if ($row3['info']=="1") {echo '- Le cabinet n\'est informatis&eacute;. ';};
if ($row3['info']=="2") {echo '- Le cabinet est informatis&eacute; (logiciel '.$row3['logiciel'].'). ';};

if ($row3['rvg']=="1") {echo 'Pas de RVG. ';};
if ($row3['rvg']=="2") {echo 'RVG pr&eacute;sent. ';};

if ($row3['panoramique']=="1") {echo 'Pas de panoramique dentaire. ';};
if ($row3['panoramique']=="2") {echo 'Panoramique dentaire pr&eacute;sent au cabinet. ';};
if ($row3['panoramique']=="3") {echo 'Cone beam pr&eacute;sent au cabinet.';};

if ($row3['remarques']!="") {echo ' <br />- Remarque(s) :  '.s($row3['remarques']).' ';};

                                                       };

if (($row3['type_ad']=="6")||($row3['type_ad']=="8")) { echo ' '.s($row3['remarques']).' ';};






echo '</div></td></tr>';




echo '
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>D&eacute;tail de l\'annonce : </strong>
<br />Cette annonce a &eacute;t&eacute; consult&eacute;e <strong>'.$compt.' fois</strong></td></tr>

<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
<strong>';
if ($type_poste=="1") {echo $txt_Ass_01;};
if ($type_poste=="2") {echo $txt_Ass_02;};
if ($type_poste=="3") {echo $txt_Ass_F;};
if ($type_poste=="4") {echo $txt_Ass_03;};
if ($type_poste=="5") {echo $txt_Ass_04;};
if ($type_poste=="6") {echo $txt_Ass_F;};
if ($type_poste=="7") {echo $txt_Aid_F;};
if ($type_poste=="8") {echo $txt_AssDir;};

echo '&nbsp;';

if ($type_ann=="1") {echo $txt_en.' '.$txt_CDDC;};
if ($type_ann=="2") {echo $txt_en.' '.$txt_CDIC;};
if ($type_ann=="3") {echo $txt_en.' '.$txt_CProf;};

echo '</strong><br />';

if (($lun=="")&&($mar=="")&&($mer=="")&&($jeu=="")&&($ven=="")&&($sam=="")) {echo '<br />- Emploi du temps non pr&eacute;cis&eacute;';}
else { echo' <br />- Emploi du temps : '.$lun.' '.$mar.' '.$mer.' '.$jeu.' '.$ven.' '.$sam.' '; };

echo '<br /><br />- Annonce : '.$texte_annonce.' <br />';




 if ($row1['remarque']!="")    echo ' <br />- Remarque(s) :  '.s($row1['remarque']).' ';


echo '
<br /><br />Expire le '.date_naturelle($row1['expiration']).'
</div></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';

if (file_exists("$dest_dossier_ad_ann/$numann.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ann_ad/$numann.jpg";
                                                            imagette ($imagette,150) ;
                                                  };

echo '
</td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Contact : </strong></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';

if (($row3['confidentialite']=="2")||($row3['confidentialite']=="3"))  // Le nom n'apparait pas

                                       { echo '<strong>ANONYME (L\'annonceur a souhait&eacute; que son nom soit confidentiel) </strong><br />Ville :
                                         '.$row2['ville']; if ($row2['pays']== "France") { echo ' ('.$row2['region'].')';}; echo ' - '.s($row2['pays']).' <br /> ';  }

else {  if (($row3['type_ad']=="1")||($row3['type_ad']=="2")||($row3['type_ad']=="9")) {echo 'Docteur '.$row2['prenom'].' '.$row2['nom'].' <br />
                                        '.$row2['adresse'].'<br />
                                        '.$row2['postal'].' '.$row2['ville']; if ($row2['pays']== "France") { echo ' ('.$row2['region'].')';}; echo ' - '.s($row2['pays']).'<br />
                                           ';
                                  };

         if (($row3['type_ad']=="5")||($row3['type_ad']=="6")||($row3['type_ad']=="8")) { 
                                                                 if ($row3['type_ad']=="5") {echo $row2['societe'];};
                                                                 if ($row3['type_ad']=="6") {echo 'Soci&eacute;t&eacute; '.$row2['societe'].'';};
                                                                 if ($row3['type_ad']=="8") {echo 'Association '.$row2['societe'].'';};

                                                                 echo '<br />Repr&eacute;sent&eacute;e par '.$row2['civilite'].' '.$row2['prenom'].' '.$row2['nom'].' <br />
                                        '.$row2['adresse'].'<br />
                                        '.$row2['postal'].' '.$row2['ville']; if ($row2['pays']== "France") { echo ' ('.$row2['region'].')';}; echo ' - '.s($row2['pays']).'<br />
                                           ';                  };

};

if (($row3['confidentialite']=="1")||($row3['confidentialite']=="2")) {

echo '<br />';
 if ($row2['telephone']!="") echo '- T&eacute;l&eacute;phone fixe : ('.$row2['indicatif'].') '.$row2['telephone'].'<br />  ';
 if ($row2['mobile']!="")    echo '- T&eacute;l&eacute;phone mobile : ('.$row2['indicatif'].') '.$row2['mobile'].' <br />  ';
 if ($row2['fax']!="")       echo '- T&eacute;l&eacute;phone fax : ('.$row2['indicatif'].') '.$row2['fax'].' <br />';


};

echo '<br /><a href="javascript:afficherjs(\'formulaireContactEmail\')"><div class="bout" style="width:140;">Contacter par email</div></a>';

$req5=mysql_query("SELECT * FROM $table_membre WHERE email='".$_SESSION['email']."'");
$row5=mysql_fetch_array($req5);
$nomq = $row5['nom'];
$prenomq = $row5['prenom'];
$emailq = $row5['email'];

echo '
        <div id="formulaireContactEmail" style="display:none;">
    	<form method="post" action="index.php?cat=ad_annonces&amp;cmd=detail&amp;numann='.$numann.'&amp;SendEmail=1">

    	<input type="text" name="q_nom" size="30" value="'.$prenomq.' '.$nomq.'" readonly> Votre nom <br />
    	<input type="text" name="q_email" size="30" value="'.$emailq.'" readonly> Votre eMail <br />
    	<input type="text" name="q_titre" value="['.$titre_site.'] - Contact par formulaire" size="50" readonly> Sujet du message<br />
    	<br />
    	<textarea cols="50" style="width: 350" rows="15" name="q_texte">'.$texteq.'</textarea> Texte du message:<br />
    	 <br />
    	<input type="hidden" value="'.$row2['id_membre'].'" id="annonceur" name="annonceur"  />
    	<input type="submit" name="post" value="Poster">

    	</form>
        </div>    ';




echo '
</td></tr></table>';
echo ' <div style="background-color: #'.$C_titre.'; position:relative; left:';       if ($navigateur=="IE") { echo '470px;'; } else { echo '474px;'; };
echo ' top:-8px; width: 135px;"><font color="FFFFFF"><strong>&nbsp;Imprimer l\'annonce</strong></font></div>';



echo'<br /><br />';




// }

}
}   

else {  AccesReserve(); };
      
};



?>

</td></tr></table>


<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>







