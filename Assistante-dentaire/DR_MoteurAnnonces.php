<?PHP

$Rrecher = $_REQUEST['Rrecher'];
$Rniv    = $_REQUEST['Rniv'];
$RPays   = $_REQUEST['RPays'];
$RDep    = $_REQUEST['RDep'];



// requete permettant d'avoir le nombre total de remplacants
$requette2= "SELECT * FROM $table_dr,membres WHERE id_membre=id_dr AND actif='2' ";

$requette2.=" AND ";

//On ajoute le type d'offre

if (ereg ("1",$Rrecher )) {$requette2.=" recherche LIKE '%1%' AND ";};
if (ereg ("2",$Rrecher )) {$requette2.=" recherche LIKE '%2%' AND ";};
if (ereg ("3",$Rrecher )) {$requette2.=" recherche LIKE '%3%' AND ";};
if (ereg ("4",$Rrecher )) {$requette2.=" recherche LIKE '%4%' AND ";};


// On ajoute le niveau

    if ($Rniv=="0") {$requette2.=" niveau LIKE '%%' AND ";}
elseif ($Rniv=="1") {$requette2.=" niveau LIKE 'Docteur en chirdent' AND ";}
elseif ($Rniv=="2") {$requette2.=" niveau LIKE '%ODF%' AND ";}
elseif ($Rniv=="3") {$requette2.=" (niveau LIKE '%5%' OR niveau LIKE '%6%') AND ";}
elseif ($Rniv=="4") {$requette2.=" niveau LIKE '%CECSMO%' AND ";}
else {};


//On ajoute le département ou le pays                          -
if ($RPays=='France') {$requette2.=" (departement='$RDep' OR autre_dept LIKE '$RDep' OR UE LIKE '%ue08%')";}
else {
  
   $resp=mysql_query("SELECT * FROM ListePays WHERE nom_lien='".protect($RPays)."' ");
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
  
       $requette2.=" (pays='".$nom_lien."' OR ".$zonep." LIKE '%$raccourci%')";
  
};







echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><a href="index.php?cat=dr_rempla"><img src="images/cherchCV.png" border="1" width="64" height="64" />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">Moteur de recherche d\'annonces</font></a><br /><br /></td></tr>
<tr><td valign="top">
';





 if (isset($_SESSION['email']))  {      // CONNECTE

// RECUPERATION DES DONNES
$_SESSION['email']=$email;
$res2=mysql_query("SELECT * FROM $table_membre,$table_dr WHERE email='$email' AND id_membre=id_dr");
$row2=mysql_fetch_array($res2);
  $liste_pays=htmlentities($row2['pays']);
  $pays=htmlentities($row2['pays']);
  $zone=$row2['zone'];
  $departement=$row2['departement'];
  $niveau=$row2['niveau'];

if ($pays=='France') {$RLieu = 'D&eacute;partement :'.$departement;}
else {$RLieu = 'Pays :'.$pays;};

echo '
<FORM action="index.php?cat=MotAnn&amp;cmd=liste" method=post>
<fieldset style="width:95%; align:left; border: 1px solid #44526b; padding: 10px; background: #E6EBEE;">
    <legend style="color: #FFFFFF; background: #44526b; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>Crit&egrave;res de recherche</strong></font></legend>
<table width="100%" border="0" cellspacing="0">
<tr bgcolor="#E6EBEE">

      <td colspan="5" bgcolor="#E6EBEE">Rentrez les caract&eacute;ristiques des annonces recherch&eacute;es.
</td>
    </tr>
<tr bgcolor="#E6EBEE"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#E6EBEE">
    <td width="36%"><div align="left">&nbsp; '.$txt_recherche.' </div></td>
    <td colspan="3">
    
	 <input type="checkbox" value="1" name="nrecherche1" '; if (ereg ("1",$Rrecher )) echo 'checked'; echo '> '.$txt_Rempla.' <br>
         <input type="checkbox" value="2" name="nrecherche2" '; if (ereg ("2",$Rrecher )) echo 'checked'; echo '> '.$txt_Collab.' <br>
	 <input type="checkbox" value="3" name="nrecherche3" '; if (ereg ("3",$Rrecher )) echo 'checked'; echo '> '.$txt_Association.' <br>
	 <input type="checkbox" value="4" name="nrecherche4" '; if (ereg ("4",$Rrecher )) echo 'checked'; echo '> '.$txt_PosteSalarie.'<br>


</td></tr>


<tr bgcolor="#E6EBEE"><td colspan="4">&nbsp;</td></tr>

';


echo '

<tr bgcolor="#E6EBEE"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#E6EBEE">
    <td width="36%" valign="top"><div align="left">&nbsp; Dans quel secteur ?</div></td>
    <td colspan="3"><input type="checkbox" value="1" name="Lieu1" '; if (ereg ("1",$Rrecher )) echo 'checked'; echo '> Votre d&eacute;partement : '.$RLieu.' <br />
                    <input type="checkbox" value="1" name="Lieu2" '; if (ereg ("1",$Rrecher )) echo 'checked'; echo '> Autre(s) d&eacute;partement(s) : <input type="texte" name="nautre_dept" value='.$nautre_dept.' > <br /><br />
                    Autres pays : <br />
                    <input type="checkbox" name="UE" value="1" onclick="javascript:afficherjs(\'pays_ue\')" '; if (ereg ("1",$nzones )) echo 'checked'; echo '/> '.$txt_UE.' <br />
                    <input type="checkbox" name="EUROP" value="2" onclick="javascript:afficherjs(\'pays_europe\')" '; if (ereg ("2",$nzones )) echo 'checked'; echo '/> '.$txt_EUROP.' <br />
                    <input type="checkbox" name="AMERIN" value="3" onclick="javascript:afficherjs(\'pays_amerin\')" '; if (ereg ("3",$nzones )) echo 'checked'; echo '/> '.$txt_AMERIN.' <br />
                    <input type="checkbox" name="CARAIB" value="4" onclick="javascript:afficherjs(\'pays_caraib\')" '; if (ereg ("4",$nzones )) echo 'checked'; echo '/> '.$txt_CARAIB.' <br />
                    <input type="checkbox" name="MAGHREB" value="5" onclick="javascript:afficherjs(\'pays_maghreb\')" '; if (ereg ("5",$nzones )) echo 'checked'; echo '/> '.$txt_MAGHREB.' <br />
                    <input type="checkbox" name="AFRIQ" value="6" onclick="javascript:afficherjs(\'pays_afriq\')" '; if (ereg ("6",$nzones )) echo 'checked'; echo '/> '.$txt_AFRIQ.' <br />
                    <input type="checkbox" name="ASIE" value="7" onclick="javascript:afficherjs(\'pays_asie\')" '; if (ereg ("7",$nzones )) echo 'checked'; echo '/> '.$txt_ASIE.' <br />
                    <input type="checkbox" name="AMERIS" value="8" onclick="javascript:afficherjs(\'pays_ameris\')" '; if (ereg ("8",$nzones )) echo 'checked'; echo '/> '.$txt_AMERIS.' <br />
                    <input type="checkbox" name="OCEANIE" value="9" onclick="javascript:afficherjs(\'pays_oceanie\')" '; if (ereg ("9",$nzones )) echo 'checked'; echo '/> '.$txt_OCEANIE.' <br />



    <input type="hidden" name="RPays" value="'.$pays.'" maxlength="50" />
    <input type="hidden" name="RDep" value="'.$departement.'" maxlength="50" />
    </td></tr>
<tr bgcolor="#E6EBEE"><td colspan="4">&nbsp;</td></tr>
	<tr bgcolor="#E6EBEE"><td colspan="4">
        <input type="submit" name="post" value="CHERCHER"></td></tr>

</table>
</fieldset></form>
<br />  ';




if ($cmd=="liste") {



if ($_REQUEST['Rrecher']=='') { echo '<span class="important">Que recherchez-vous?</span>';}

else {





if ($pays=='France') {      // France

// Affiche 10 par 10
if(isset($_GET['deb'])) $deb=$_GET['deb'];
else $deb=0; $limite=10;
$page="index.php?cat=MotAnn&amp;cmd=liste&amp;Rrecher=$Rrecher&amp;Rniv=$Rniv&amp;RPays=$RPays&amp;RDep=$RDep";

$Rrecher = $_REQUEST['Rrecher'];
$Rniv    = $_REQUEST['Rniv'];
$RPays   = $_REQUEST['RPays'];
$RDep    = $_REQUEST['RDep'];

/*
echo $requette2     ;
echo $Rrecher = $_REQUEST['Rrecher'];
echo $Rniv    = $_REQUEST['Rniv'];
echo $RPays   = $_REQUEST['RPays'];
echo $RDep    = $_REQUEST['RDep'];
*/






// requete permettant d'avoir le nombre total de remplacants
$req2=mysql_query($requette2);
$nbrann = mysql_num_rows($req2);


// requete permettant d'avoir les remplacants de 10 en 10
$requette= $requette2."order by date_reactivation desc LIMIT $deb, $limite";
$req=mysql_query($requette);



echo '<hr style="border: 1px solid #ccccdd"/>';

echo' <b> R&eacute;sultat de votre recherche :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'inscrit';}
else { echo 'Il y a '.$nbrann.' inscrit'; if ($nbrann>1) echo 's'; };

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {

$id_dr      =  $row['id_dr'];
$recherche  =  $row['recherche'];
if (($row['civilite']=="Mlle") || ($row['civilite']=="Mme")) {$pasdephoto = "pasdephoto2";}
else {$pasdephoto = "pasdephoto";};


if (ereg("1",$recherche)) {$recherche1 = "Un Remplacement";};
if (ereg("2",$recherche)) {$recherche2 = "<br />Une Collaboration";};
if (ereg("3",$recherche)) {$recherche3 = "<br />Association";};
if (ereg("4",$recherche)) {$recherche4 = "<br />Un poste salari&eacute;";};

echo'  <br /><br />
<table width="610" style="border: 1px solid #20507A; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #4984B7;"><td><div class="txtanng"><strong> (D&eacute;p. : '.$row['departement'].') - '.$row['niveau'].'
</strong></div></td>
<td><div class="txtannd">Activation du CV le '.date_naturelle_s($row['date_reactivation']).'</div></td></tr></table>



<table width="610" style="border: 1px solid #20507A; border-collapse:collapse; margin:auto; text-align:left;width:610; ">

<tr style="background-color: #D4EAFD;"><td width="120" rowspan="3">';

if (file_exists("$dest_dossier_dr/$id_dr.jpg"))  {  $imagette = "$adresse_site1/photos/photos_dr/$id_dr.jpg";   imagette ($imagette,80) ; }

else  {  {  $imagette = "$adresse_site1/images/$pasdephoto.jpg"; imagette ($imagette,80) ; };  };


echo '</td><td width="110"></td><td>';

if ($row['confidentialite'] == "1") { echo '<strong>'.s($row['prenom']).' '.s($row['nom']).'</strong>';} else {};
echo '</td></tr>
<tr style="background-color: #D4EAFD;"><td width="120">Niveau :<br /><br /></td><td>'.$row['niveau'].'<br /><br /></td></tr>
<tr style="background-color: #D4EAFD;"><td width="120">Recherche : </td><td>'.$recherche1.$recherche2.$recherche3.$recherche4.'</td></tr>
</table>';


echo ' <div style="background-color: #20507A; position:relative; left:';       if ($navigateur=="IE") { echo '518px;'; } else { echo '522px;'; };
echo ' top:-8px; width: 85px;"><a href="index.php?cat=dr_rempla&amp;cmd=detail&amp;id_dr='.$id_dr.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail du CV</strong></font></a></div>';

 } // fin du while

echo'<br /><br />';

nav($nbrann,$limite,$page);


}







else {  // zone geographique différente de 1

// Affiche 10 par 10
if(isset($_GET['deb'])) $deb=$_GET['deb'];
else $deb=0; $limite=10;
$page="index.php?cat=MotAnn&amp;cmd=liste&amp;Rrecher=$Rrecher&amp;Rniv=$Rniv&amp;RPays=$RPays";

/*
echo $requette2     ;
echo $Rrecher = $_REQUEST['Rrecher'];
echo $Rniv    = $_REQUEST['Rniv'];
echo $RPays   = $_REQUEST['RPays'];
echo $RDep    = $_REQUEST['RDep'];
 */

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
                                   


// requete permettant d'avoir le nombre total de remplacants
$req2=mysql_query($requette2);
$nbrann = mysql_num_rows($req2);


// requete permettant d'avoir les remplacants de 10 en 10
$requette= $requette2."order by date_reactivation desc LIMIT $deb, $limite";
$req=mysql_query($requette);



echo '<hr style="border: 1px solid #ccccdd"/>';

echo' <b> R&eacute;sultat de votre recherche :</b> ';

if ($nbrann == "0") { echo 'Il n\'y a pas d\'inscrit dans ce pays.';}
else { echo 'Il y a '.$nbrann.' inscrit'; if ($nbrann>1) echo 's'; echo ' dans ce pays.';};

echo '  <hr style="border: 1px solid #ccccdd"/>    ';

    while ($row=mysql_fetch_array($req)) {

$id_dr      =  $row['id_dr'];
$recherche  =  $row['recherche'];
if (($row['civilite']=="Mlle") || ($row['civilite']=="Mme")) {$pasdephoto = "pasdephoto2";}
else {$pasdephoto = "pasdephoto";};

if (ereg("1",$recherche)) {$recherche1 = "Un Remplacement";};
if (ereg("2",$recherche)) {$recherche2 = "<br />Une Collaboration";};
if (ereg("3",$recherche)) {$recherche3 = "<br />Association";};
if (ereg("4",$recherche)) {$recherche4 = "<br />Un poste salari&eacute;";};

echo'  <br /><br />
<table width="610" style="border: 1px solid #20507A; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #4984B7;"><td><div class="txtanng"><strong> (Pays : '.$row['pays'].') - '.$row['niveau'].'
</strong></div></td>
<td><div class="txtannd">Activation du CV le '.date_naturelle_s($row['date_reactivation']).'</div></td></tr></table>



<table width="610" style="border: 1px solid #20507A; border-collapse:collapse; margin:auto; text-align:left;width:610; ">
<tr style="background-color: #D4EAFD;"><td width="120" rowspan="2">';

if (file_exists("$dest_dossier_dr/$id_dr.jpg"))  {  $imagette = "$adresse_site1/photos/photos_dr/$id_dr.jpg";   imagette ($imagette,80) ; }

else  {  {  $imagette = "$adresse_site1/images/$pasdephoto.jpg"; imagette ($imagette,80) ; };  };


echo '
</td>
<td width="110">Niveau :</td><td>'.$row['niveau'].'<br /><br /></td></tr>
<tr style="background-color: #D4EAFD;"><td width="120">Recherche : </td><td>'.$recherche1.$recherche2.$recherche3.$recherche4.'</td></tr>
</table>';


echo ' <div style="background-color: #20507A; position:relative; left:';       if ($navigateur=="IE") { echo '518px;'; } else { echo '522px;'; };
echo ' top:-8px; width: 85px;"><a href="index.php?cat=dr_rempla&amp;cmd=detail&amp;id_dr='.$id_dr.'"><font color="FFFFFF"><strong>&nbsp;D&eacute;tail du CV</strong></font></a></div>';

 } // fin du while

echo'<br /><br />';

nav($nbrann,$limite,$page);

}






} // fin de CHERCHER



}

}


else { AccesReserve(); };




 

?>

</td></tr></table>


<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>
