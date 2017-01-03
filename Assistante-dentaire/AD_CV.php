<?PHP


echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><a href="index.php?cat=ad_cv"><img src="images/cherchCV.png" border="1" width="64" height="64" />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_ChRemplTitre.'</font></a><br /><br /></td></tr>
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
$lien1 = 'index.php?cat=ad_cv&amp;cmd=liste&amp;zonegeo=1&amp;reg=';    // France
$lien3 = 'index.php?cat=ad_cv&amp;post=zone&amp;pays=';    // Ouvrir une autre zone géographique
$lien2 = 'index.php?cat=ad_cv&amp;cmd=liste&amp;pays=';    // tout le reste

  if (isset($_POST['zone'])) {$zone = $_POST['zone'];}
  else { if (isset($_GET['zonegeo'])) {$zone=$_GET['zonegeo'];};
  };


echo $txt_ChRemplTexte.'<br /><br />  ';





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

<FORM action="index.php?cat=ad_cv&amp;post=zone" method=post>
Consulter les CV : <select name="zone" onchange=this.form.submit()>
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

$pat_autre_dept=array('NORD-PAS-DE-CALAIS', '59 62', 'ILE-DE-FRANCE', "75 77 78 91 92 93 94 95", 'ALSACE', '67 68',
 'AQUITAINE', '24 33 40 47 64', 'AUVERGNE', '03 15 43 63', 'BASSE-NORMANDIE', '14 50 61', 'BOURGOGNE', '21 58 71 89',
 'BRETAGNE', '22 29 35 56', 'CENTRE', '18 28 36 37 41 45', 'CHAMPAGNE-ARDENNES', '08 10 51 52', 'CORSE', '20',
 'FRANCHE-COMTE', '25 39 70 90', 'HAUTE-NORMANDIE', '27 76', 'LORRAINE', '54 55 57 88', 'LIMOUSIN', '19 23 87',
 'MIDI-PYRENEES', '09 12 31 32 46 65 81 82', 'PAYS-DE-LA-LOIRE', '44 49 53 72 85', 'LANGUEDOC-ROUSSILLON', '11 30 34 48 66',
 'PACA', '04 05 06 13 83 84', 'PICARDIE', '02 60 80', 'POITOU-CHARENTES', '16 17 79 86', 'RHONE-ALPES', '01 07 26 38 42 69 73 74',
 'DOM-TOM', '99');

echo'
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_MFRANCE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="23" width="257" valign="top"><img src="images/cherche_rempla.jpg" border="0" width="257" height="385"></td><tr>';


$res=mysql_query("SELECT * FROM ListePays WHERE zone='France'");
     while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "1") {$lien = $lien1;};
                                               if ($row['type_lien'] == "2") {$lien = $lien2;};


                                               $tout_depts=array_search($row['nom_lien'], $pat_autre_dept)+1;
                                               $autre_dept_tab=explode(" ",$pat_autre_dept[$tout_depts]);

                                               // requete permettant d'avoir le nombre total de remplacants
                                                $req= "SELECT id_ad FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND type_ad='4'
                                                AND ((pays='France' AND (region='".$row['nom_lien']."' ";
                                               if (is_array($autre_dept_tab)) {foreach ($autre_dept_tab as $recherche) $req.=" OR autre_dept LIKE '%$recherche%' ";}
                                               $req.=") OR UE LIKE '%ue08%'))  ";
                                               $res2=mysql_query($req);
                                               $nbrCV = mysql_num_rows($res2);

                                               echo '<tr><td><a href="'. $lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'. $lien . $row['nom_lien'].'"> '.$nbrCV.' CV</a></td></tr>';
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
while ($rowp=mysql_fetch_array($res)) {    if ($rowp['type_lien'] == "1") {$lien = $lien1;};
                                               if ($rowp['type_lien'] == "2") {$lien = $lien2;};
                                            //   $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ORDER BY 'urgent' desc, 'date_in' desc");
                                            //   $nbrann = mysql_num_rows($req);

         $raccourci = $rowp['raccourci'];
         $nom_lien = $rowp['nom_lien'];
         $zone = $rowp['zone'];
             if ($zone == "UE")       { $zonep = "UE"; }
             if ($zone == "Europe")   { $zonep = "EUROP"; }
             if ($zone == "Amerin")   { $zonep = "AMERIN"; }
             if ($zone == "Ameris")   { $zonep = "AMERIS"; }
             if ($zone == "Caraibes") { $zonep = "CARAIB"; }
             if ($zone == "Afrique")  { $zonep = "AFRIQ"; }
             if ($zone == "Asie")     { $zonep = "ASIE"; }
             if ($zone == "Oceanie")  { $zonep = "OCEANIE"; }
             if ($zone == "Maghreb")  { $zonep = "MAGHREB"; }

$requette2= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND (pays='".$nom_lien."' OR ".$zonep." LIKE '%$raccourci%') ";
$req2=mysql_query($requette2);
$nbrCV = mysql_num_rows($req2);
                                                
     echo '<tr><td><a href="'. $lien . $rowp['nom_lien'].'">'.$rowp['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $rowp['nom_lien'].'"> '.$nbrCV.' CV </a></td></tr> ';


     }


echo '<tr><td colspan="2"><br /><strong>T.O.M </strong></td></tr>';

$res=mysql_query("SELECT * FROM ListePays WHERE DomTom='2'");
while ($rowp=mysql_fetch_array($res)) {    if ($rowp['type_lien'] == "1") {$lien = $lien1;};
                                               if ($rowp['type_lien'] == "2") {$lien = $lien2;};
                                            //   $req=mysql_query("SELECT * FROM $table_annonce,membres WHERE valid=2 AND id_membre=id_mbre AND region='".a($row['nom_lien'])."' ORDER BY 'urgent' desc, 'date_in' desc");
                                            //   $nbrann = mysql_num_rows($req);

         $raccourci = $rowp['raccourci'];
         $nom_lien = $rowp['nom_lien'];
         $zone = $rowp['zone'];
             if ($zone == "UE")       { $zonep = "UE"; }
             if ($zone == "Europe")   { $zonep = "EUROP"; }
             if ($zone == "Amerin")   { $zonep = "AMERIN"; }
             if ($zone == "Ameris")   { $zonep = "AMERIS"; }
             if ($zone == "Caraibes") { $zonep = "CARAIB"; }
             if ($zone == "Afrique")  { $zonep = "AFRIQ"; }
             if ($zone == "Asie")     { $zonep = "ASIE"; }
             if ($zone == "Oceanie")  { $zonep = "OCEANIE"; }
             if ($zone == "Maghreb")  { $zonep = "MAGHREB"; }

$requette2= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND (pays='".$nom_lien."' OR ".$zonep." LIKE '%$raccourci%') ";
$req2=mysql_query($requette2);
$nbrCV = mysql_num_rows($req2);
                                                
     echo '<tr><td><a href="'. $lien . $rowp['nom_lien'].'">'.$rowp['nom_affiche'].'</a></td>
           <td><a href="'. $lien . $rowp['nom_lien'].'"> '.$nbrCV.' CV </a></td></tr> ';


     }

echo '


</table>
</fieldset> ';
    
      };





if (($zone_preference=="2") || ($post=="zone" && $zone=="2") || ($post=="zone" && $pays=="Europe") || ($post=="zone" && $pays=="UE")) {

$res=mysql_query("SELECT * FROM ListePays WHERE (zone='europe' OR zone='UE') order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_UE_EUROP.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="44" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR UE LIKE '%".$row['raccourci']."%' OR EUROP LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


      };




if (($zone_preference=="3") || ($post=="zone" && $zone=="3") || ($post=="zone" && $pays=="Amerin")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Amerin' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AMERIN.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="6" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                                 if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR AMERIN LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };






if (($zone_preference=="4") || ($post=="zone" && $zone=="4") || ($post=="zone" && $pays=="Ameris")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Ameris' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AMERIS.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="22" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';
  
       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR AMERIS LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };



if (($zone_preference=="5") || ($post=="zone" && $zone=="5") || ($post=="zone" && $pays=="Caraibes")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Caraibes' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_CARAIB.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';
  
       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR CARAIB LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };



if (($zone_preference=="6") || ($post=="zone" && $zone=="6") || ($post=="zone" && $pays=="Afrique")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Afrique' OR zone='Maghreb' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AFRIQMAG.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';

       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR AFRIQ LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };



if (($zone_preference=="7") || ($post=="zone" && $zone=="7") || ($post=="zone" && $pays=="Oceanie")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Oceanie' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_OCEANIE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';
  
       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR OCEANIE LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };





if (($zone_preference=="8") || ($post=="zone" && $zone=="8") || ($post=="zone" && $pays=="Asie")) {

$res=mysql_query("SELECT * FROM ListePays WHERE zone='Asie' order by nom_lien");

echo '<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_ASIE.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" width="100%" />
<tr><td>'.$txt_MZone_01.'</td><td>'.$txt_NbCV.'</td><td rowspan="26" width="257" valign="top"><img src="images/cherche.jpg" border="0" width="257" height="385"></td><tr>
  ';
  
       while ($row=mysql_fetch_array($res)) {    if ($row['type_lien'] == "2") {$lien = $lien2;};
                                               if ($row['type_lien'] == "3") {$lien = $lien3;};
                                               $req=mysql_query("SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
                                               AND (pays='".$row['nom_lien']."' OR ASIE LIKE '%".$row['raccourci']."%')");
                                               $nbrCV = mysql_num_rows($req);
                                               echo '<tr><td><a href="'.$lien . $row['nom_lien'].'">'.$row['nom_affiche'].'</a></td>
                                                <td><a href="'.$lien . $row['nom_lien'].'">'.$nbrCV.' CV </a></td></tr> ';

                                          };

echo '


</table>
</fieldset> ';


              };





if (($cmd == "liste")||($zone_preference=="9")) {

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


if ($zonegeo=="1") {      // France

// Affiche 10 par 10
if(isset($_GET['deb'])) $deb=$_GET['deb'];
else $deb=0; $limite=10;
$page="index.php?cat=ad_cv&amp;cmd=liste&amp;zonegeo=1&amp;reg=$reg";

$pat_autre_dept=array('NORD-PAS-DE-CALAIS', '59 62', 'ILE-DE-FRANCE', "75 77 78 91 92 93 94 95", 'ALSACE', '67 68',
 'AQUITAINE', '24 33 40 47 64', 'AUVERGNE', '03 15 43 63', 'BASSE-NORMANDIE', '14 50 61', 'BOURGOGNE', '21 58 71 89',
 'BRETAGNE', '22 29 35 56', 'CENTRE', '18 28 36 37 41 45', 'CHAMPAGNE-ARDENNES', '08 10 51 52', 'CORSE', '20',
 'FRANCHE-COMTE', '25 39 70 90', 'HAUTE-NORMANDIE', '27 76', 'LORRAINE', '54 55 57 88', 'LIMOUSIN', '19 23 87',
 'MIDI-PYRENEES', '09 12 31 32 46 65 81 82', 'PAYS-DE-LA-LOIRE', '44 49 53 72 85', 'LANGUEDOC-ROUSSILLON', '11 30 34 48 66',
 'PACA', '04 05 06 13 83 84', 'PICARDIE', '02 60 80', 'POITOU-CHARENTES', '16 17 79 86', 'RHONE-ALPES', '01 07 26 38 42 69 73 74',
 'DOM-TOM', '99');

$tout_depts=array_search($reg, $pat_autre_dept)+1; // numero de case dans le tableau + 1
                                                   // ex : Aquitaine : 7
                                                   // on fait +1 pour sélectionner la case avec les départements

$autre_dept_tab=explode(" ",$pat_autre_dept[$tout_depts]);

// requete permettant d'avoir le nombre total de remplacants
$requette2= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND ((pays='France' AND (region='$reg' ";




if (is_array($autre_dept_tab)) {foreach ($autre_dept_tab as $recherche) $requette2.=" OR autre_dept LIKE '%$recherche%' ";}
$requette2.=") OR UE LIKE '%ue08%'))  ";
$req2=mysql_query($requette2);
$nbrann = mysql_num_rows($req2);


// requete permettant d'avoir les remplacants de 10 en 10
$requette= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND ((pays='France' AND (region='$reg' ";
if (is_array($autre_dept_tab)) {foreach ($autre_dept_tab as $recherche) $requette.=" OR autre_dept LIKE '%$recherche%' ";}
$requette.=") OR UE LIKE '%ue08%')) order by date_reactivation desc LIMIT $deb, $limite";
$req=mysql_query($requette);

echo '<a href="index.php?cat=ad_cv"><u>Monde</u></a> / <a href="'.$lien3.'Europe"><u>Europe</u></a> / <a href="'.$lien3.'France"><u>France</u></a> / <u>'.$reg.'</u> ';
echo '<hr style="border: 1px solid #ccccdd"/>';

echo' <b> Liste des inscrits dans la r&eacute;gion '.$reg.' :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'inscrit dans cette r&eacute;gion.';}
else { echo 'Il y a '.$nbrann.' inscrit'; if ($nbrann>1) echo 's'; echo ' dans cette r&eacute;gion.';};

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {

$id_ad      =  $row['id_ad'];
$type_ad2 = $row['type_ad2'];
if ($type_ad2=="1") {$type_ass = $txt_Ass_01;};
if ($type_ad2=="2") {$type_ass = $txt_Ass_02;};
if ($type_ad2=="3") {$type_ass = $txt_Ass_03;};
if ($type_ad2=="4") {$type_ass = $txt_Ass_04;};
if ($type_ad2=="5") {$type_ass = $txt_Ass_05;};

if (($row['civilite']=="Mlle") || ($row['civilite']=="Mme")) {$pasdephoto = "pasdephoto2";}
else {$pasdephoto = "pasdephoto";};

echo'  <br /><br />
<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #'.$C_titre.';"><td><div class="txtanng"><strong> (D&eacute;p. : '.$row['departement'].') - '.$type_ass.'
</strong></div></td>
<td><div class="txtannd">Activation du CV le '.date_naturelle_s($row['date_reactivation']).'</div></td></tr></table>



<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #'.$C_fond_clair.';"><td width="120">';

if (file_exists("$dest_dossier_ad/$id_ad.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ad/$id_ad.jpg";   imagette ($imagette,80) ; }

else  {  {  $imagette = "$adresse_site1/images/pasdephoto2.jpg"; imagette ($imagette,80) ; };  };


echo '</td><td>';

          if ($row['confidentialite'] == "1") {  echo  ''.$row['civilite'].' '.$row['prenom'].' '.$row['nom'].' ';}
          else {echo '<strong>ANONYME</strong><br /> ';  };

if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3")) { echo '<br />Dipl&ocirc;m&eacute;(e) en '.$row['nanneediplome'].'';};

echo '
<br /><a href="'.$adresse_site3.'/index.php?cat=ad_cv&amp;cmd=detail&amp;id_ad='.$id_ad.'">[En savoir plus...]</a> </td></tr>
</table>';


echo ' <div style="background-color: #'.$C_titre.'; position:relative; left:';       if ($navigateur=="IE") { echo '518px;'; } else { echo '522px;'; };
echo ' top:-8px; width: 85px;"><a href="index.php?cat=ad_cv&amp;cmd=detail&amp;id_ad='.$id_ad.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail du CV</strong></font></a></div>';

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
         $raccourci = $rowp['raccourci'];
         $zone = $rowp['zone'];    if ($zone == "UE")       { $zonep = "UE"; }
                                   if ($zone == "Europe")   { $zonep = "EUROP"; }
                                   if ($zone == "Amerin")   { $zonep = "AMERIN"; }
                                   if ($zone == "Ameris")   { $zonep = "AMERIS"; }
                                   if ($zone == "Caraibes") { $zonep = "CARAIB"; }
                                   if ($zone == "Afrique")  { $zonep = "AFRIQ"; }
                                   if ($zone == "Asie")     { $zonep = "ASIE"; }
                                   if ($zone == "Oceanie")  { $zonep = "OCEANIE"; }
                                   if ($zone == "Maghreb")  { $zonep = "MAGHREB"; }
          $nom_lien = $rowp['nom_lien'];
                                   
$page='index.php?cat=ad_cv&amp;cmd=liste&amp;pays='.$rowp['nom_lien'].' ';

$requette2= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND (pays='".$nom_lien."' OR ".$zonep." LIKE '%$raccourci%') ";
$req2=mysql_query($requette2);
$nbrann = mysql_num_rows($req2);

$requette= "SELECT * FROM $table_ad,membres WHERE id_membre=id_ad AND actif='2' AND  type_ad='4'
AND (pays='".$nom_lien."' OR ".$zonep." LIKE '%$raccourci%') order by date_reactivation DESC LIMIT $deb, $limite";
$req=mysql_query($requette);


echo '<a href="index.php?cat=ad_cv"><u>Monde</u></a> / <a href="'.$lien3.$zone.'"><u>';

if ($zone == "Amerin") {echo 'Am&eacute;rique du Nord';}
else { if ($zone == "Ameris") {echo 'Am&eacute;rique du Sud';} else {echo $zone;} };

echo'
</u></a> / <u>'.s(s($pays)).'</u> ';

echo '<hr style="border: 1px solid #ccccdd"/>';

echo' <b> Liste des inscrits dans ce pays : '.s(s($pays)).' :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'inscrit dans ce pays.';}
else { echo 'Il y a '.$nbrann.' inscrit'; if ($nbrann>1) echo 's'; echo ' dans ce pays.';};

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {


$id_ad      =  $row['id_ad'];
$type_ad2 = $row['type_ad2'];
if ($type_ad2=="1") {$type_ass = $txt_Ass_01;};
if ($type_ad2=="2") {$type_ass = $txt_Ass_02;};
if ($type_ad2=="3") {$type_ass = $txt_Ass_03;};
if ($type_ad2=="4") {$type_ass = $txt_Ass_04;};
if ($type_ad2=="5") {$type_ass = $txt_Ass_05;};

if (($row['civilite']=="Mlle") || ($row['civilite']=="Mme")) {$pasdephoto = "pasdephoto2";}
else {$pasdephoto = "pasdephoto";};

echo'  <br /><br />
<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #'.$C_titre.';"><td><div class="txtanng"><strong> (Pays : '.$row['pays'].') - '.$type_ass.'
</strong></div></td>
<td><div class="txtannd">Activation du CV le '.date_naturelle_s($row['date_reactivation']).'</div></td></tr></table>



<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #'.$C_fond_clair.';"><td width="120">';

if (file_exists("$dest_dossier_ad/$id_ad.jpg"))  {  $imagette = "$adresse_site1/photos/photos_ad/$id_ad.jpg";   imagette ($imagette,80) ; }

else  {  {  $imagette = "$adresse_site1/images/pasdephoto2.jpg"; imagette ($imagette,80) ; };  };


echo '</td><td>';

          if ($row['confidentialite'] == "1") {  echo  ''.$row['civilite'].' '.$row['prenom'].' '.$row['nom'].' ';}
          else {echo '<strong>ANONYME</strong><br /> ';  };

if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3")) { echo '<br />Dipl&ocirc;m&eacute;(e) en '.$row['nanneediplome'].'';};

echo '
<br /><a href="'.$adresse_site3.'/index.php?cat=ad_cv&amp;cmd=detail&amp;id_ad='.$id_ad.'">[En savoir plus...]</a> </td></tr>
</table>';


echo ' <div style="background-color: #'.$C_titre.'; position:relative; left:';       if ($navigateur=="IE") { echo '518px;'; } else { echo '522px;'; };
echo ' top:-8px; width: 85px;"><a href="index.php?cat=ad_cv&amp;cmd=detail&amp;id_ad='.$id_ad.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail du CV</strong></font></a></div>';


 } // fin du while

echo'<br /><br />';

nav($nbrann,$limite,$page);

}



// }

}

else {  AccesReserve(); };









};








if ($cmd == "detail") {


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

if ($SendEmail == "1") {

$q_nom = stripslashes(htmlentities(trim($_POST['q_nom'])));
$q_email = stripslashes(htmlentities(trim($_POST['q_email'])));
$q_titre = stripslashes(htmlentities(trim($_POST['q_titre'])));
$q_texte = stripslashes(htmlentities(trim($_POST['q_texte'])));
$annonceur = stripslashes(htmlentities(trim($_POST['annonceur'])));

$req=mysql_query("SELECT email FROM $table_membre WHERE id_membre='$id_ad'");
$row=mysql_fetch_array($req);
$email_annonceur = $row['email'];


if ($q_texte==="") $err_texte=1;

if ($err_texte=="") {
		$text_brut=html_entity_decode($q_texte);
		$nom_brut=html_entity_decode($q_nom);
		$titre_brut=html_entity_decode($q_titre);

	        $headers = "From: $q_email\r\n";
                $headers .= "Reply-To: $q_email\r\n";



		if (mail($email_annonceur, "$titre_brut" ,"Ref. fiche : $id_ad\n\n $text_brut\n\nEnvoi de $nom_brut\nemail: $q_email", $headers))
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

$req=mysql_query("SELECT * FROM $table_membre WHERE id_membre='$id_ad'");
$row=mysql_fetch_array($req);

$req2=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_ad'");
$row2=mysql_fetch_array($req2);

$compt = $row2['compt']+1;

// Comptage des visites de ce CV +1
$req3="UPDATE $table_ad SET compt='$compt' WHERE id_ad='$id_ad'";
$res3=mysql_query($req3);

if (($row2['civilite']=="Mlle") || ($row2['civilite']=="Mme")) {$pasdephoto = "pasdephoto2";}
else {$pasdephoto = "pasdephoto";};

echo'
<br /><br />
<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #'.$C_titre.';"><td><div class="txtanng">
<strong> D&eacute;tail de la fiche n&deg;'.$id_ad.' :</strong></div></td>
<td><div class="txtannd">Activation du CV le '.date_naturelle_s($row2['date_reactivation']).'</div></td></tr></table>

<table width="610" style="border: 1px solid #'.$C_titre.'; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Pr&eacute;sentation : </strong></td></tr>

<tr bgcolor="#'.$C_fond_clair.'">
<td width="155" align="left" style="padding: 5px;">';

if (file_exists("$dest_dossier_ad/$id_ad.jpg"))   {    $imagette = "$adresse_site1/photos/photos_ad/$id_ad.jpg";
                                                        imagette ($imagette,150) ;
                                                   } else {$imagette = "$adresse_site1/images/pasdephoto2.jpg";
                                                        imagette ($imagette,150) ;};
       
echo ' </td>
       <td style="padding: 10px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000"> ';


// On découpe la date en Année (YYYY), Mois (MM) et Jour (JJ)
$yyyy=substr($row['anniv'],0,4);
$mm=substr($row['anniv'],5,2);
$dd=substr($row['anniv'],8,2);

// Si nécessaire, on vérifie que la date est correcte 
if (checkdate($mm,$dd,$yyyy)) { 
// Date du jour 
$yyyy2=date("Y"); 
$mm2=date("m"); 
$dd2=date("d"); 

$age=$yyyy2-$yyyy; 
if ($mm2<$mm) { $age--; } 
else if ($mm2==$mm && $dd2<$dd) { $age--; } 

}



if (($row2['confidentialite']=="2")||($row2['confidentialite']=="3"))

                                       { echo '<strong>ANONYME (N\'a pas souhait&eacute; que son nom apparaisse) </strong><br />('.$age.' ans)<br />Ville :
                                         '.$row['ville']; if ($row['pays']== "France") { echo ' ('.$row['region'].')';}; echo ' - '.s($row['pays']).' <br /> ';  }

else {  echo $row['civilite'].' '.$row['prenom'].' '.$row['nom'].' <br />('.$age.' ans) <br />
             '.$row['adresse'].'<br />'.$row['postal'].' '.$row['ville']; if ($row['pays']== "France") { echo ' ('.$row['region'].')';}; echo ' - '.s($row['pays']).'<br />';

};

if (($row2['confidentialite']=="1")||($row2['confidentialite']=="2")) {

echo '<br />';
 if ($row['telephone']!="") echo '- T&eacute;l&eacute;phone fixe : ('.$row['indicatif'].') '.$row['telephone'].'<br />  ';
 if ($row['mobile']!="")    echo '- T&eacute;l&eacute;phone mobile : ('.$row['indicatif'].') '.$row['mobile'].' <br />  ';
 if ($row['fax']!="")       echo '- T&eacute;l&eacute;phone fax : ('.$row['indicatif'].') '.$row['fax'].' <br />';

};


echo '</div> <br />
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">';

$type_ad2 = $row2['type_ad2'];
if ($type_ad2=="1") {$type_ass = $txt_Ass_01;};
if ($type_ad2=="2") {$type_ass = $txt_Ass_02;};
if ($type_ad2=="3") {$type_ass = $txt_Ass_03;};
if ($type_ad2=="4") {$type_ass = $txt_Ass_04;};
if ($type_ad2=="5") {$type_ass = $txt_Ass_05;};

echo 'Recherche un emploi de : <br /><u>'.$type_ass.'</u> ';
if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3")) {echo '(Dipl&ocirc;me de '.$row2['nanneediplome'].')';}

echo '</div><br />Ce CV a &eacute;t&eacute; consult&eacute; '.$compt.' fois.</td></tr>';




echo '
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>

<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Informations personnelles et professionnelles : </strong></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
';

echo '- Dipl&ocirc;mes : '.$row2['ndiplomes'].'<br /> ';
if ($row2['qualifications']!="") {echo '- comp&eacute;tences particuli&egrave;res : '.$row2['qualifications'].'<br /> ';};
echo '- Activit&eacute;s des 12 derniers mois : '.$row2['nactivite'].' <br /> ';
echo '- Principaux centres d\'int&eacute;r&ecirc;ts : '.$row2['ninterets'].' <br /><br /> ';

if (($row['pays']=="France") && ($row2['autre_dept']!="")) { echo '- Le membre a inscrit sa fiche dans d\'autres d&eacute;partements fran&ccedil;ais : '.$row2['autre_dept'].' <br /> ';};

if (($row2['UE']!="")||($row2['EUROP']!="")||($row2['AMERIN']!="")||($row2['CARAIB']!="")||($row2['MAGHREB']!="")||($row2['AFRIQ']!="")||($row2['ASIE']!="")||($row2['AMERIS']!="")||($row2['OCEANIE']!="")) { echo '- Le membre a inscrit sa fiche dans d\'autres continents : ';

if ($row2['UE']!="") {echo 'Union Europ&eacute;enne - ';}
if ($row2['EUROP']!="") {echo 'Europe (hors UE) - ';}
if ($row2['AMERIN']!="") {echo 'Am&eacute;rique du Nord - ';}
if ($row2['CARAIB']!="")  {echo 'Cara&iuml;bes - ';}
if ($row2['MAGHREB']!="")  {echo 'Maghreb - ';}
if ($row2['AFRIQ']!="") {echo 'Afrique (hors Maghreb) - ';}
if ($row2['ASIE']!="")  {echo 'Asie - ';}
if ($row2['AMERIS']!="")  {echo 'Am&eacute;rique du Sud - ';}
if ($row2['OCEANIE']!="")   {echo 'Oc&eacute;anie - ';}

};


echo '
</div></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';


echo '
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>

<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Apptitudes professionnelles d&eacute;j&agrave; poss&eacute;d&eacute;es : </strong></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
';

$nass = $row2['nass'];
if (ereg ("01",$nass )) echo '- Travailler &agrave; &quot; quatre mains &quot; <br />';
if (ereg ("02",$nass )) echo '- Aider &agrave; la mise en place d\'un champ op&eacute;ratoire (digue) <br />';
if (ereg ("03",$nass )) echo '- Assister lors de chirurgie en parodontologie <br /> ';
if (ereg ("04",$nass )) echo '- Assister lors de chirurgie en implantologie <br /> ';
if (ereg ("05",$nass )) echo '- Assister lors de chirurgie de dents de sagesse <br /> ';
if (ereg ("06",$nass )) echo '- Assister lors des prises d\'empreinte <br /> ';
if (ereg ("07",$nass )) echo '- Assurer la liaison avec un laboratoire de proth&egrave;se <br /> ';
if (ereg ("08",$nass )) echo '- Organiser la st&eacute;rilisation <br />';
if (ereg ("09",$nass )) echo '- Assurer la tra&ccedil;abilit&eacute; des instruments et des produits <br /> ';
if (ereg ("10",$nass )) echo '- G&eacute;rer un planning de rendez vous <br />';
if (ereg ("11",$nass )) echo '- R&eacute;aliser la motivation &agrave; l\'hygi&egrave;ne des patients <br /> ';
if (ereg ("12",$nass )) echo '- Utiliser l\'outil informatique <br /> ';
if (ereg ("13",$nass )) echo '- G&eacute;rer les commandes, g&eacute;rer un stock de produits <br />';
if (ereg ("14",$nass )) echo '- Remplir les feuilles de s&eacute;curit&eacute; sociale <br /> ';
if (ereg ("15",$nass )) echo '- Utiliser les lecteurs de carte s&eacute;same vital <br /> ';
if (ereg ("16",$nass )) echo '- G&eacute;rer avec efficacit&eacute; le standard t&eacute;l&eacute;phonique <br />';


echo '
</div></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';


if ($row2['remarques']!='') {
echo '
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>

<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Lettre de motivation, remarques : </strong></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
'.$row2['remarques'].'
</div></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';

};

echo '
</td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">
<strong>Contact : </strong></td></tr>
<tr bgcolor="#'.$C_fond_clair.'"><td colspan="2" style="padding: 5px;">';


echo '<br /><a href="javascript:afficherjs(\'formulaireContactEmail\')"><div class="bout" style="width:140;">Contacter par email</div></a>';

$req5=mysql_query("SELECT * FROM $table_membre WHERE email='".$_SESSION['email']."'");
$row5=mysql_fetch_array($req5);
$nomq = $row5['nom'];
$prenomq = $row5['prenom'];
$emailq = $row5['email'];

echo '
        <div id="formulaireContactEmail" style="display:none;">
    	<form method="post" action="index.php?cat=ad_cv&amp;cmd=detail&amp;numann='.$numann.'&amp;SendEmail=1">

    	<input type="text" name="q_nom" size="30" value="'.$prenomq.' '.$nomq.'" readonly> Votre nom <br />
    	<input type="text" name="q_email" size="30" value="'.$emailq.'" readonly> Votre eMail <br />
    	<input type="text" name="q_titre" value="['.$titre_site.'] - Contact par formulaire" size="50" readonly> Sujet du message<br />
    	<br />
    	<textarea cols="50" style="width: 350" rows="15" name="q_texte">'.$texteq.'</textarea> Texte du message:<br />
    	 <br />
    	<input type="hidden" value="'.$id_ad.'" id="id_ad" name="id_ad"  />
    	<input type="submit" name="post" value="Poster">

    	</form>
        </div>    ';




echo '
</td></tr></table>';
echo ' <div style="background-color: #'.$C_titre.'; position:relative; left:';       if ($navigateur=="IE") { echo '489px;'; } else { echo '493px;'; };
echo ' top:-8px; width: 110px;"><font color="FFFFFF"><strong>&nbsp;Imprimer le CV</strong></font></div>';



echo'<br /><br />';


// }

}


else { AccesReserve(); };



};

 

?>

</td></tr></table>


<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>
