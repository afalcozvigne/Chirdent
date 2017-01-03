
<?



echo '


<table border="0" cellspacing="5" cellpadding="5" align="center" bgcolor="ffffff">
<tr><td colspan=5 valign="top">
<font class="XLdr"><strong>'.$row2['prenom'].' '.$row2['nom'].'</strong>, '.$txt_bienvenue.'.
'.$txt_date_insc.' '.date_naturelle_s($row2['date_creation']).'. </font>
<br /><br />
<font class="XLdr">
'.$txt_enreg_com.' </font><span class="important">';
if ($row2['type']=="1") echo $txt_Mbre_01;
if ($row2['type']=="2") echo $txt_Mbre_02;
if ($row2['type']=="3") echo $txt_Mbre_03;
if ($row2['type']=="4") echo $txt_Mbre_04;
if ($row2['type']=="5") echo $txt_Mbre_05;
if ($row2['type']=="6") echo $txt_Mbre_06;
if ($row2['type']=="7") echo $txt_Mbre_07;
if ($row2['type']=="8") echo $txt_Mbre_08;
if ($row2['type']=="9") echo $txt_Mbre_09;
echo '</span> </font>
<br />
'.$txt_ChangStatu.' >> <a href="index.php?cat=compte&incl=modif"><strong><u>'.$txt_ICI.'</u></strong></a> << 
<br /><br /> <br /><br />
</td></tr>


<tr align="left"><td valign="top"><img src="images/Menu_1.png" border="1" width="96" height="96" /></td>
<td valign="top"><font class="XLdr"><strong>'.$txt_VoCompt.'</strong></font>
            <li><a href="index.php?cat=compte&amp;incl=modif">'.$txt_ModCompte.'</a></li>
            <li><a href="index.php?cat=compte&amp;incl=pref">'.$txt_ModPref.'</a></li>
	    <li><a href="index.php?cat=compte&amp;incl=del_compte">'.$txt_EffCompte.'</a></li>
	    <li><a href="#">'.$txt_Mailinglist.'</a></li>
</td>
<td>&nbsp;&nbsp;</td>
<td valign="top"><img src="images/Menu_2.png" border="1" width="96" height="96" /></td>
<td valign="top">';

if ($type_ad=="4") {    /* Assistante */

echo '       <font class="XLdr"><strong>'.$txt_CV.'</strong></font>
             <li><a href="index.php?cat=compte&amp;incl=modif_ad">'.$txt_NvCVt.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=del_ad">'.$txt_DelCV.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=reactiv">Remonter votre CV en d&eacute;but de liste</a><font class="new">Nouveau</font></li> ';
}


elseif ($type_ad=="1" || $type_ad=="2" || $type_ad=="5" || $type_ad=="8" || $type_ad=="9"){  // installé, stomato, centre de soins, industrie, association

echo '       <font class="XLdr"><strong>'.$txt_fiche_cab.'</strong></font>
             <li><a href="index.php?cat=compte&amp;incl=modif_ad">'.$txt_creer_fiche.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=modif_ad">'.$txt_editer_fiche.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=del_ad">'.$txt_effacer_fiche.'</a></li>';

}

elseif ($type_ad=="6"){  // installé, stomato, centre de soins, industrie, association

echo '       <font class="XLdr"><strong>'.$txt_fiche_soc.'</strong></font>
             <li><a href="index.php?cat=compte&amp;incl=modif_ad">'.$txt_creer_fiche.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=modif_ad">'.$txt_editer_fiche.'</a></li>
             <li><a href="index.php?cat=compte&amp;incl=del_ad">'.$txt_effacer_fiche.'</a></li>';

}

 else {  echo 'Rien &agrave; renseigner';};





echo '
<tr><td colspan="5"><br /></td></tr>
<tr align="left"><td valign="top"><img src="images/Menu_3.png" border="1" width="96" height="96"  /></td>
<td valign="top">';

if ($type_ad=="4") {    /* non installé et édudiant */

echo '       <font class="XLdr"><strong>'.$txt_services.'</strong></font>
             <li><a href="index.php?cat=ad_annonces">'.$txt_CherchAnn.'</a></li>
             <li><a href="">'.$txt_tracker_ann.'</a></li> ';
}

elseif ($type_ad=="1" || $type_ad=="2" || $type_ad=="5" || $type_ad=="6" || $type_ad=="8" || $type_ad=="9"){  // installé, stomato, centre de soins, industrie, association

echo '       <font class="XLdr"><strong>'.$txt_ann.'</strong></font>
             <li style="text-align: left;"><a href="index.php?cat=compte&amp;incl=add_ann_ad">'.$txt_ajout_ann.'</a></li>
             <li style="text-align: left;"><a href="index.php?cat=compte&amp;incl=mod_ann_ad">'.$txt_edit_ann.'</a></li>
             <li style="text-align: left;"><a href="index.php?cat=compte&amp;incl=mod_ann_ad">'.$txt_option_urgent.'</a></li>
             <li style="text-align: left;"><a href="">'.$txt_tracker_cv.'</a></li>';
}

 else {  echo 'Rien &agrave; renseigner';};



echo '
</td>
<td>&nbsp;&nbsp;</td>
<td valign="top"><img src="images/Menu_4.png" border="1" width="96" height="96" /></td>
<td valign="top">

';


// AD  *******************************************************************************************

if ($profil_ad == 0) { echo "Profil non renseign&eacute;";} else { echo "Profil renseign&eacute;";};

// dentiste, mutuelle, mairie
if (($rowad['type_ad']=="1")||($rowad['type_ad']=="2")||($row['type_ad']=="3")||($rowad['type_ad']=="5")||($rowad['type_ad']=="6")||($rowad['type_ad']=="8")||($rowad['type_ad']=="9"))
                          { $res = mysql_query("SELECT * FROM $table_annonce3 WHERE id_mbre='$id_membre'");
                            $row=mysql_fetch_array($res);
                            $nb_ann_ad = mysql_num_rows($res);

                            $res = mysql_query("SELECT sum(compt) FROM $table_annonce3 WHERE id_mbre='$id_membre'");
                            $row=mysql_fetch_array($res);
                            $number_hits = $row["sum(compt)"];

                            echo "<br />Vous avez $nb_ann_ad annonces actives.<br />Vos annonces ont &eacute;t&eacute; consult&eacute;es $number_hits fois.";

                          };

// Assistante
if ($rowad['type_ad']=="4")
                          { $res = mysql_query("SELECT sum(compt) FROM $table_ad WHERE id_ad='$id_membre'");
                            $row=mysql_fetch_array($res);
                            $number_hits = $row["sum(compt)"];
                            echo "<br />Votre CV a &eacute;t&eacute; consult&eacute; $number_hits fois.";

                          };
                          
if ($rowad['actif']=="1") { echo "<br />Votre CV est inactif.";}
elseif ($rowad['actif']=="2") { echo "<br />Votre CV est actif.";}
else {};


echo ' <br /><br />';




?>






</td></tr>
</table>
<br />

