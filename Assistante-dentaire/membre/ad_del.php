
<?


// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
//$type_dr=$_POST['type_dr'];
$inc=$_REQUEST['inc'];






if ($type_ad=="4") {   $titre_page = $txt_DelCV;
                       $texte_page = $txt_AttEffCV;
                       $texte2_page = $txt_DesactCV.'>><a href="index.php?cat=compte&incl=modif_ad">'.$txt_ICI.'</a><<';
                       $texte_efface = $txt_CV_del;
                     }



elseif ($type_ad=="1" || $type_ad=="2" || $type_ad=="5" || $type_ad=="6" || $type_ad=="8" || $type_ad=="9")

                  {   $titre_page = $txt_effacer_fiche;
                      $texte_page = $txt_AttEffFiche;
                      $texte2_page= $txt_EffAnn.'>><a href="index.php?cat=compte&incl=mod_ann_ad">'.$txt_ICI.'</a><<';
                      $texte_efface = $txt_fiche_del;
                   };



echo ' <br /><font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$titre_page.'</font><br />';

echo '<table><tr><td valign="top"><img src="images/warning_64.png" border="1" width="64" height="64" /></td>
<td><div class="important"><strong>'.$texte_page.'</strong></div><br /></td></tr>
</table><br />
<font class="XLdr">'.$texte2_page.'<br /><br />';



// RECUPERATION DES DONNES
$_SESSION['email']=$email;

$res=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row=mysql_fetch_array($res);
  $id_membre=$row['id_membre'];


$res2=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_membre'");
$row2=mysql_fetch_array($res2);
$nbr = mysql_num_rows($res2);



// SI PROFIL DE ad NON RENSEIGNE
if ($nbr == 0) {echo '<div class="important">Votre profil n\'est pas renseign&eacute;. Vous ne pouvez donc rien effacer !</div><br /><br />'; }


// PROFIL DE ad RENSEIGNE
else {   $id_ad=$row2['id_ad'];
         $type_ad=$row2['type_ad'];





if ($Effacer) {


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

// Efface images des annonces
$res=mysql_query("SELECT id_annonce from $table_annonce3 WHERE id_mbre='$id_membre'");
    while ($row=mysql_fetch_array($res)) {
          $id_annonce =  $row['id_annonce'];
          if (file_exists("$dest_dossier_ad_ann/$id_annonce.jpg"))
           {    $imagette = "$dest_dossier_ad_ann/$id_annonce.jpg";
            $delete_result = unlink ($imagette);
            };
                                         };


// Efface annonces
$req="DELETE from $table_annonce3 WHERE id_mbre='$id_membre'";
$res=mysql_query($req);




// Efface compte
$req="DELETE from $table_ad WHERE id_ad='$id_membre'";
$res=mysql_query($req);

if (file_exists("$dest_dossier_ad/$id_membre.jpg"))
       {    $imagette = "$dest_dossier_ad/$id_membre.jpg";
            $delete_result = unlink ($imagette);
        };



echo '<span class="important">'.$texte_efface.'</span><br />';


} // fin de l'action 'continuer'





else {


echo '

<FORM action="index.php?cat=compte&amp;incl=del_ad" method="post">   ';


// INSTALLE INDUSTRIE OU ASSOCIATION
if ($type_ad=="1" || $type_ad=="2" || $type_ad=="5" || $type_ad=="6" || $type_ad=="8" || $type_ad=="9")
        { echo '<input type="submit" name="Effacer" value=" '.$txt_effacer_fiAn.'">';   };

// NON INSTALLE
if ($type_ad=="4")    { echo '<input type="submit" name="Effacer" value=" '.$txt_DelCV.'">';      };






echo '</FORM> ';

     };
};

?>
