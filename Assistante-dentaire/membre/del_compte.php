
<?


// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$inc=$_REQUEST['inc'];



echo '

<table><tr><td valign="top"><img src="images/warning_64.png" border="1" width="64" height="64" /></td>
<td><div class="important"><strong>'.$txt_AttEff.': '.$titre_site.', '.$autres_sites.'</strong></div><br /></td></tr>
</table><br />
<font class="XLdr"> ';



if ($type_dr=="1" || $type_dr=="3") {    /* non installé et édudiant */

echo $txt_EffacePas.'<br />'.$txt_DesactCV.'>><a href="index.php?cat=compte&incl=modif_dr">'.$txt_ICI.'</a><<';
                                    }


elseif ($type_dr=="2" || $type_dr=="5" || $type_dr=="6" || $type_dr=="8" || $type_dr=="9")   

{  // installé, stomato, centre de soins, industrie, association

echo $txt_EffacePas.'<br />'.$txt_EffAnn.'>><a href="index.php?cat=compte&incl=mod_ann_dr">'.$txt_ICI.'</a><<';
 };





// RECUPERATION DES DONNES
$_SESSION['email']=$email;

$res=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row=mysql_fetch_array($res);
  $id_membre=$row['id_membre'];




if ($Effacer) {


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

// Efface images des annonces DR
$res=mysql_query("SELECT id_annonce from $table_annonce WHERE id_mbre='$id_membre'");
    while ($row=mysql_fetch_array($res)) {
          $id_annonce =  $row['id_annonce'];
          if (file_exists("$dest_dossier_dr_ann/$id_annonce.jpg"))
           {    $imagette = "$dest_dossier_dr_ann/$id_annonce.jpg";
            $delete_result = unlink ($imagette);
            };
                                         };
// Efface images des annonces CD
$res=mysql_query("SELECT id_annonce from $table_annonce2 WHERE id_mbre='$id_membre'");
    while ($row=mysql_fetch_array($res)) {
          $id_annonce =  $row['id_annonce'];
          if (file_exists("$dest_dossier_cd_ann/$id_annonce.jpg"))
           {    $imagette = "$dest_dossier_cd_ann/$id_annonce.jpg";
            $delete_result = unlink ($imagette);
            };
                                         };

// Efface images des annonces AD
$res=mysql_query("SELECT id_annonce from $table_annonce3 WHERE id_mbre='$id_membre'");
    while ($row=mysql_fetch_array($res)) {
          $id_annonce =  $row['id_annonce'];
          if (file_exists("$dest_dossier_ad_ann/$id_annonce.jpg"))
           {    $imagette = "$dest_dossier_ad_ann/$id_annonce.jpg";
            $delete_result = unlink ($imagette);
            };
                                         };

// Efface annonces DR
$req="DELETE from $table_annonce WHERE id_mbre='$id_membre'";
$res=mysql_query($req);

// Efface annonces CD
$req="DELETE from $table_annonce2 WHERE id_mbre='$id_membre'";
$res=mysql_query($req);

// Efface annonces AD
$req="DELETE from $table_annonce3 WHERE id_mbre='$id_membre'";
$res=mysql_query($req);

// Efface compte DR
$req="DELETE from $table_dr WHERE id_dr='$id_membre'";
$res=mysql_query($req);

if (file_exists("$dest_dossier_dr/$id_membre.jpg"))
       {    $imagette = "$dest_dossier_dr/$id_membre.jpg";
            $delete_result = unlink ($imagette);
        };

// Efface compte CD
$req="DELETE from $table_cd WHERE id_cd='$id_membre'";
$res=mysql_query($req);

if (file_exists("$dest_dossier_cd/$id_membre.jpg"))
       {    $imagette = "$dest_dossier_cd/$id_membre.jpg";
            $delete_result = unlink ($imagette);
        };

// Efface compte AD
$req="DELETE from $table_ad WHERE id_ad='$id_membre'";
$res=mysql_query($req);

if (file_exists("$dest_dossier_ad/$id_membre.jpg"))
       {    $imagette = "$dest_dossier_ad/$id_membre.jpg";
            $delete_result = unlink ($imagette);
        };

// Efface compte général
$req="DELETE from $table_membre WHERE id_membre='$id_membre'";
$res=mysql_query($req);

        


echo '<br /><span class="important">'.$txt_ConfirmEf.'</span><br />';

$connect=0;
session_destroy();
session_start();
setcookie("DentalNetworks","" ,0 );

} // fin de l'action 'continuer'





else {


echo '
<br /> <br />
<FORM action="index.php?cat=compte&amp;incl=del_compte" method="post">
'.$txt_del_compte.'<br /><input type="submit" name="Effacer" value="'.$txt_EffCompte.'">
</FORM> ';

 };


?>
