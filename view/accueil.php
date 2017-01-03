<?php
/**
 * Created by PhpStorm.
 * User: Alexandre
 * Date: 03/01/2017
 * Time: 10:27
 */
// identique tous les sites



echo '<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_accueil_01.'</font></td></tr>
<tr><td valign="top"><font class="XLcd">'.$txt_accueil_11.'</font></td></tr>
<tr><td valign="top"><font class="XLdr">'.$txt_accueil_02.'</font></td></tr>
</table><br /><br />
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top">
<a href="index.php?cat=inscript"><font class="ButtonRose">'.$txt_inscription.'</font></a>
<a href="index.php?cat=login"><font class="ButtonBleu">'.$txt_connexion.'</font></a>
<a href="index.php?cat=jinstall"><font class="ButtonBleu">'.$txt_apropos_JI.'</font></a>';

echo $img_accueil;
echo '
<br /><br />  <br /><br />
Am&eacute;liorations du site : <br />
12/7/2013 : Choisissez dans <strong>votre compte > Vos pr&eacute;f&eacute;rences</strong> la zone g&eacute;ographique &agrave; afficher par d&eacute;faut.
Quand vous cherchez une annonce, la zone choisie (votre pays par exemple) s\'affichera par d&eacute;faut ce qui &eacute;vite de passer par le menu.(gain de temps pour consulter les annonces).
NB : Cela ne fonctionne que si vous vous &ecirc;tes identifi&eacute; au pr&eacute;alable.


</td></tr>

</table>

<td width="40%" valign="top">

<fieldset style="width:400px; align:left; background-color: #'.$C_urg_font.'; border: thick solid #'.$C_urg_cadre.'">
  <legend style="color: #FFFFFF; background: #'.$C_urg_cadre.'; font-size: 8pt; padding: 3px; margin: 0 10px 10px 10px;"><strong>'.$txt_option_urg_xl.'</strong>
  <a href="index?cat=articles&cmd=lire&art=24">'.$txt_annonce_ici.'</a>
  </legend>
  <div style="margin: 0 10px 10px 10px;">';

if ($siteweb == "DR") {  $req3="SELECT * FROM $table_annonce WHERE urgent='2' ORDER BY id_annonce desc"; };
if ($siteweb == "CD") {  $req3="SELECT * FROM $table_annonce2 WHERE urgent='2' ORDER BY id_annonce desc"; };
if ($siteweb == "AD") {  $req3="SELECT * FROM $table_annonce3 WHERE urgent='2' ORDER BY id_annonce desc"; };


$res3=mysql_query("$req3");
$nbrannurg = mysql_num_rows($res3);

    while ($row3=mysql_fetch_array($res3)) {

        if ($siteweb == "DR") {
            if ($row3['type_ann']=="1") {$type_ann = "Remplacement";};
            if ($row3['type_ann']=="2") {$type_ann = "Collaboration";};
            if ($row3['type_ann']=="3") {$type_ann = "Collaboration en vue association";};
            if ($row3['type_ann']=="4") {$type_ann = "Association";};
            if ($row3['type_ann']=="5") {$type_ann = "Association en vue de cession";};
            if ($row3['type_ann']=="6") {$type_ann = "Garde";};
            if ($row3['type_ann']=="7") {$type_ann = "Poste d'&eacute;tudiant adjoint (salari&eacute;)";};
            if ($row3['type_ann']=="8") {$type_ann = "Louage de service (salari&eacute;)";};
            if ($row3['type_ann']=="9") {$type_ann = "CDD";};
            if ($row3['type_ann']=="10"){$type_ann = "CDI";};
            if ($row3['type_ann']=="11"){$type_ann = "B&eacute;n&eacute;volat";};
            $catlien = "dr_annonces";

        };



        if ($siteweb == "CD") {
            if ($row3['type_ann']=="1") {$type_ann = "Cession cabinet dentaire"; $catlien = "cd_vente";};
            if ($row3['type_ann']=="2") {$type_ann = "Association"; $catlien = "cd_asso";};
            if ($row3['type_ann']=="3") {$type_ann = "Association pour un achat group&eacute; de locaux en SCI"; $catlien = "cd_asso";};
            if ($row3['type_ann']=="4") {$type_ann = "Vente local professionnel"; $catlien = "cd_locat";};
            if ($row3['type_ann']=="5") {$type_ann = "Location local professionnel"; $catlien = "cd_locat";};

        };

        if ($siteweb == "AD") {
            if ($row3['type_ann']=="1") {$type_ann = "en CDD";};
            if ($row3['type_ann']=="2") {$type_ann = "en CDI";};
            if ($row3['type_ann']=="3") {$type_ann = "en contrat de qualification";};

            if ($row3['type_poste']=="1") {$type_poste = $txt_Ass_01;};
            if ($row3['type_poste']=="2") {$type_poste = $txt_Ass_02;};
            if ($row3['type_poste']=="3") {$type_poste = $txt_Ass_F;};
            if ($row3['type_poste']=="4") {$type_poste = $txt_Ass_03;};
            if ($row3['type_poste']=="5") {$type_poste = $txt_Ass_04;};
            if ($row3['type_poste']=="6") {$type_poste = $txt_Ass_F;};
            if ($row3['type_poste']=="7") {$type_poste = $txt_Aid_F;};
            if ($row3['type_poste']=="8") {$type_poste = $txt_AssDir;};

            $type_ann = ''.$type_poste.' '.$type_ann.'';
            $catlien = "ad_annonces";

        };

        if ($nbrannurg > 0) { echo '&#8226; <a href="index.php?cat='.$catlien.'&cmd=detail&numann='.$row3['id_annonce'].'"><font color="FF0000">['.$type_ann.'] - '.s($row3['txt_urgent']).'</font></a> <br /> ';}
        else { echo '<br /><font color="FF0000">Pas d\'annonce urgente en ce moment...</font><br />'; };

    };

echo '</div></fieldset>';


echo '

<br />
<fieldset style="width:400px; align:left; background-color: #'.$C_fond_clair.'; border: solid #'.$C_titre.'">
  <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 0 10px 10px 10px;">
  <strong>'.$txt_info_serv.'</strong>

  </legend>

<table cellspacing="5" cellpadding="0">
<tr><td valign="top">
<div class="titre"><strong>'.$txt_DernArt.' : </strong></div>
  <div class="normal">
	<a href="http://www.cabinet-dentaire.com/" target="_new">Vendre son cabinet</a><br />
	<a href="http://www.cabinet-dentaire.com/" target="_new">Acheter un cabinet</a><br />
	<a href="http://www.assistante-dentaire.com/" target="_new">Trouver son assistante dentaire</a><br />
	<a href="http://www.occasion-dentaire.com/" target="_new"> Acheter ou vendre du mat&eacute;riel d\'occasion</a><br />
	<a href="http://www.web-dentaire.com/" target="_new">Illustrez vos plans de traitement</a><br /><br />
  </div></div>


</td>
<td valign="top">

<div class="titre"><strong>'.$txt_InternServ.':</strong></div>
  <div class="normal">
	<a href="http://www.cabinet-dentaire.com/" target="_new">Vendre son cabinet</a><br />
	<a href="http://www.cabinet-dentaire.com/" target="_new">Acheter un cabinet</a><br />
	<a href="http://www.assistante-dentaire.com/" target="_new">Trouver son assistante dentaire</a><br />
	<a href="http://www.occasion-dentaire.com/" target="_new"> Acheter ou vendre du mat&eacute;riel d\'occasion</a><br />
	<a href="http://www.web-dentaire.com/" target="_new">Illustrez vos plans de traitement</a><br /><br />
  </div></div>
</table></fieldset>

<br />

<font class="XXLdr" style:"align:left;">'.$txt_partenai.' :</font><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th scope="col"><img src="images/agakam.jpg" width="77" height="77" /></th>
     <th scope="col"><img src="images/hsbc.gif" width="150" height="54" /></th>
   </tr>
 </table><br>
<br>
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th scope="col"><a href="'.$adresse_site.'/index.php?cat=partenaire&amp;Pid=5"><img src="images/alg_credits.gif" width="200" height="73" /></a></th>
   </tr>
 </table><br />
<br /><br />


</td></tr>


</td></tr>

<tr><td colspan="2">&nbsp;</td></tr>
</table>

<table cellpadding="0" cellspacing="0" border="0" width="100%" height="auto">

<tr><td colspan="2">';

  ?>
</td></tr>









</td></tr></table>






