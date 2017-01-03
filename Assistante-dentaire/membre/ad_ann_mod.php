

<script language="javascript">

		function confir (id_annonce) {
			if (confirm("Etes vous sur de vouloir effacer cette annonce " + id_annonce +" ?")) {
				document.location.href = 'index.php?cat=compte&incl=mod_ann_ad&id_del=' + id_annonce + '&delete=1' ;

			}
		}

</script>






<?

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type_ann=$_POST['type_ann'];
$num_ann=$_REQUEST['num_ann'];
$num_annonce=$_POST['num_annonce'];

if (isset($_POST['num_annonce'])) {$num_ann = $_POST['num_annonce'];};



echo '
<br />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_edit_ann.'</font>
<br />
';



// RECUPERATION DES DONNES
$_SESSION['email']=$email;

$res=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row=mysql_fetch_array($res);
  $id_membre=$row['id_membre'];
  $pays=$row['pays'];
  $departement=$row['departement'];
  $region=$row['region'];


// EFFACER ANNONCE ///////////////////////////////////////////////////////////
if (isset($_GET["delete"]) AND isset($_GET["id_del"]))
{

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

// on verifie que l'annonce ‡ effacer appartient bien au membre
$verif=mysql_query("SELECT id_annonce from $table_annonce3 WHERE id_annonce='$id_del' AND id_mbre='$id_membre'");
$nbr_verif = mysql_num_rows($verif);
if ($nbr_verif == 1) {
$req="DELETE from $table_annonce3 WHERE id_annonce='$id_del'";
$res=mysql_query($req);

if (file_exists("$dest_dossier_ad_ann/$id_del.jpg"))
       {    $imagette = "$dest_dossier_ad_ann/$id_del.jpg";
            $delete_result = unlink ($imagette);

        };

echo '<br /><br /><span class="important"> L\'annonce n&deg; '.$_GET["id_del"].' a bien &eacute;t&eacute; effac&eacute;e.</span><br /><br />';
}
}
// EFFACER ANNONCE ///////////////////////////////////////////////////////////






$q2  = "SELECT * FROM $table_ad WHERE id_ad='$id_membre'";
$res2=mysql_query($q2);
$row2=mysql_fetch_array($res2);
$nbr = mysql_num_rows($res2);
  $type_ad=$row2['type_ad'];

$q3  = "SELECT * FROM $table_annonce3 WHERE id_mbre='$id_membre' ORDER BY id_annonce desc"  ;
$res3=mysql_query($q3);
$nbrann = mysql_num_rows($res3);



// VEUT MODIFIER MAIS PAS D'ANNONCES
if ($nbrann == 0) {$err2['no_ann']=$txt_No_Ad;   };


/*
echo "Debug ";
echo "id_membre "; echo $id_membre; echo "<BR />";
echo "type_dr "; echo $type_dr; echo "<BR />";
echo "nbrann "; echo $nbrann; echo "<BR />";
echo "q2 " ; echo $q2; echo "<BR />";
echo "q3 "; echo $q3; echo "<BR />";
*/



if (is_array($err2)) {echo '<span class="important"> '.$err2['no_ann'].' </span><br />';      }




else {    //  IL Y A DES ANNONCES A MODIFIER

  $id_ad=$row2['id_ad'];
  $type_ad=$row2['type_ad'];



// Affichage de la liste des annonces ‡ modifier

if ($post_ad=="Sauver") {

  $urgent = protect($_POST['urgent']);
  $ntxt_urgent = protect($_POST['ntxt_urgent']);
  $djour=protect($_POST['djour']);
  $dmois =protect($_POST['dmois']);
  $dan =protect($_POST['dan']);
  $fjour =protect($_POST['fjour']);
  $fmois =protect($_POST['fmois']);
  $fan =protect($_POST['fan']);
  $nheures =protect($_POST['nheures']);

  $lundiam=protect($_POST['lundiam']);
  $lundipm =protect($_POST['lundipm']);
  $mardiam =protect($_POST['mardiam']);
  $mardipm =protect($_POST['mardipm']);
  $mercrediam =protect($_POST['mercrediam']);
  $mercredipm =protect($_POST['mercredipm']);
  $jeudiam=protect($_POST['jeudiam']);
  $jeudipm =protect($_POST['jeudipm']);
  $vendrediam =protect($_POST['vendrediam']);
  $vendredipm =protect($_POST['vendredipm']);
  $samediam =protect($_POST['samediam']);
  $samedipm =protect($_POST['samedipm']);

  $ntexte =protect($_POST['ntexte']);
  $nremarque  = protect($_POST['nremarque']);
  $expjour    = protect($_POST['expjour']);
  $expmois    = protect($_POST['expmois']);
  $expan      = protect($_POST['expan']);


   # traitement de l emploi du temps

if ($lundiam=="1" && $lundipm=="1"){$emploidutempslun="Lun_tt";};
if ($lundiam=="1" && $lundipm==""){$emploidutempslun="Lun_ma";};
if ($lundipm=="1" && $lundiam==""){$emploidutempslun="Lun_ap";};
if ($mardiam=="1" && $mardipm=="1"){$emploidutempsmar="Mar_tt";};
if ($mardiam=="1" && $mardipm==""){$emploidutempsmar="Mar_ma";};
if ($mardipm=="1" && $mardiam==""){$emploidutempsmar="Mar_ap";};
if ($mercrediam=="1" && $mercredipm=="1"){$emploidutempsmer="Mer_tt";};
if ($mercrediam=="1" && $mercredipm==""){$emploidutempsmer="Mer_ma";};
if ($mercredipm=="1" && $mercrediam==""){$emploidutempsmer="Mer_ap";};
if ($jeudiam=="1" && $jeudipm=="1"){$emploidutempsjeu="Jeu_tt";};
if ($jeudiam=="1" && $jeudipm==""){$emploidutempsjeu="Jeu_ma";};
if ($jeudipm=="1" && $jeudiam==""){$emploidutempsjeu="Jeu_ap";};
if ($vendrediam=="1" && $vendredipm=="1"){$emploidutempsven="Ven_tt";};
if ($vendrediam=="1" && $vendredipm==""){$emploidutempsven="Ven_ma";};
if ($vendredipm=="1" && $vendrediam==""){$emploidutempsven="Ven_ap";};
if ($samediam=="1" && $samedipm=="1"){$emploidutempssam="Sam_tt";};
if ($samediam=="1" && $samedipm==""){$emploidutempssam="Sam_ma";};
if ($samedipm=="1" && $samediam==""){$emploidutempssam="Sam_ap ";};

$emploidutemps= $emploidutempslun.','.$emploidutempsmar.','.$emploidutempsmer.','.$emploidutempsjeu.','.$emploidutempsven.','.$emploidutempssam ;



// Dans tous les cas :

  if ($urgent=="") $err['urgent']='Choisissez-vous l\'option payante &laquo; Annonce Urgente &raquo; ?<br />';
  if (($urgent=="1")&&($ntxt_urgent=="")) $err['txt_urgent']='Merci de remplir le titre de votre annonce urgente<br />';
  if ($nheures=="") $err['nheures']='Combien d\'heures par semaine ?<br />';  
  if ($ntexte=="") $err['ntexte']='Texte de votre annonce ?<br />';


// CDD
if ($type_ann=="1")
        {
          if (($djour=="") || ($dmois=="") || ($dan=="")) { $err['date_debut']='La date du d&eacute;but du CDD ?<br />';}
          else  {
          if (valid_date_1($djour,$dmois,$dan)== FALSE) $err['ddate']='La date du d&eacute;but du CDD est incorrecte !<br />';
          if (valid_date_2($djour,$dmois,$dan)== FALSE) $err['date_debut_actuelle']= 'La date de d&eacute;but du CDD est pass&eacute;e !<br />';
                 };

          if (($fjour=="") || ($fmois=="") || ($fan=="")) {$err['date_fin']='La date de fin du CDD ?<br />';}
          else {
          if (valid_date_1($fjour,$fmois,$fan)== FALSE) $err['fdate']='La date de fin du CDD est incorrecte !<br />';
          if (valid_date_2($fjour,$fmois,$fan)== FALSE) $err['date_fin_actuelle']= 'La date de fin du CDD est pass&eacute;e !<br />';
                 };

          if (valid_compare_date($djour,$dmois,$dan,$fjour,$fmois,$fan)== FALSE) $err['date_debut_fin']= 'La date de fin du CDD doit &ecirc;tre post&eacute;rieure &agrave; la date de d&eacute;but !<br />';

          $date_exp= "$fan-$fmois-$fjour";

        };



// CDI ou QUALIF
if (($type_ann=="2") || ($type_ann=="3"))

        {

          if (($djour=="") || ($dmois=="") || ($dan=="")) { $err['date_debut']='La date de d&eacute;but de contrat ?<br />';}
          else  {
          if (valid_date_1($djour,$dmois,$dan)== FALSE) $err['ddate']='Date de d&eacute;but de contrat incorrecte!<br />';
          if (valid_date_2($djour,$dmois,$dan)== FALSE) $err['date_debut_actuelle']= 'La date de d&eacute;but de contrat est pass&eacute; !<br />';
                 };


 if (($expjour=="") || ($expmois=="") || ($expan=="")) { $err['date_exp']='Date d\'expiration de votre annonce ?<br />';}
          else  {
          if (valid_date_1($expjour,$expmois,$expan)== FALSE) $err['expdate']='Date d\'expiration incorrecte!<br />';
          if (valid_date_2($expjour,$expmois,$expan)== FALSE) $err['date_exp_actuelle']= 'La date d\'expiration est pass&eacute;e !<br />';
          if(date_6mois_maxi($expjour,$expmois,$expan)== FALSE) $err['date_exp_6max']= 'La date d\'expiration ne peut exc&eacute;der 10 mois !<br />';
                 };
          
          $date_exp= "$expan-$expmois-$expjour";

        };





// CCentre de soins et mairies  = Date d'expiration = DATE + 3 MOIS
if (($type_ad=="5")||($type_ad=="8")) {
  
$maintenant=date("Y-m-d");
$date_exp =date('Y-m-d',strtotime('+3 month',strtotime($maintenant)));

           };



// #### IMAGE ###

if(isset($_FILES['photo']))
{

// vÈrifications
if ( !in_array( substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok ) )
{
$err['photo'] = 'Veuillez sÈlectionner un fichier de type jpg !';
}
if ( $_FILES['photo']['size'] > $taille_max)
        {    $err['photo'] = 'Votre fichier doit faire moins de 200Ko !';  }
        
// copie du fichier
if(!isset($err['photo']))
{

/*  SupprimÈ car on donne nom fichier = id_membre ****
$dest_fichier = basename($_FILES['photo']['name']);
// formatage nom fichier    
// enlever les accents
$dest_fichier = strtr($dest_fichier,     '¿¡¬√ƒ≈«»… ÀÃÕŒœ“”‘’÷Ÿ⁄€‹›‡·‚„‰ÂÁËÈÍÎÏÌÓÔÚÛÙıˆ˘˙˚¸˝ˇ',     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
// remplacer les caracteres autres que lettres, chiffres et point par _
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);  
*/
$type_file = substr($_FILES['photo']['type'],-4,4);  // donne jpeg
$type_file = eregi_replace("jpeg",'jpg',$type_file);

$dest_fichier = "$new_id_val.$type_file";

// copie du fichier
move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier_ad_ann . $dest_fichier);  }

}



// #### IMAGE ###




  if (is_array($err)) {
    $post="insc"; echo '<br /><br /><span class="important">Attention, vous n\'avez pas rempli tous les champs.</span><br />
                        <span style="color: red">
                        '.$err['urgent'].'
                        '.$err['txt_urgent'].'
                        '.$err['date_debut'].'
                        '.$err['ddate'].'
                        '.$err['date_fin'].'
                        '.$err['date_debut_fin'].'
                        '.$err['date_debut_actuelle'].'
                        '.$err['date_fin_actuelle'].'
                        '.$err['fdate'].'
                        '.$err['ntexte'].'
                        '.$err['nheures'].'
                        '.$err['date_exp'].'
                        '.$err['expdate'].'
                        '.$err['date_exp_actuelle'].'
                        '.$err['date_exp_6max'].'
                        '.$err['photo'].'
                        </span> ';

  } else {


    // preparation des donnÈes



  $ntxt_urgent =a($_POST['ntxt_urgent']);
  $ntxt_urgent =protect($ntxt_urgent);
  $djour=a($_POST['djour']);
  $dmois =a($_POST['dmois']);
  $dan =a($_POST['dan']);  
  $fjour =a($_POST['fjour']);
  $fmois =a($_POST['fmois']);
  $fan =a($_POST['fan']);
  $nheures =a($_POST['nheures']);
  $emploidutemps=a($emploidutemps);
  $ntexte =a($_POST['ntexte']);
  $ntexte =protect($ntexte);
  $nremarque =a($_POST['nremarque']);
  $nremarque =protect($nremarque);
  $expjour =a($_POST['expjour']);
  $expmois =a($_POST['expmois']);
  $expan =a($_POST['expan']);

  $ip=$_SERVER['REMOTE_ADDR'];
  $datetime=date("Y-m-d H:i:s");

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

   // Enregistrement dans la BDD . (le champs validation: 1=attente email, 0=ok RAS)

    if (!is_array($err)) { // pas d erreur, on y go






     $req="UPDATE $table_annonce3 SET date_debut='$dan-$dmois-$djour', date_fin='$fan-$fmois-$fjour', emploidutemps='$emploidutemps', heures='$nheures',
     texte_annonce='$ntexte', remarque='$nremarque', expiration='$date_exp', ip='$ip', date_in='$datetime', txt_urgent='$ntxt_urgent' WHERE id_annonce='$num_annonce'";

     echo' <span class="important">Votre annonce vient d\'&ecirc;tre modifi&eacute;e.</span><br /><br /> ';


     
     

     




     


$res=mysql_query($req);


  } // fin enregistrement bdd

  } // fin du traitement et de l'insertion

} // fin de l'action 'continuer'





    if ($nbrann>1) {$pluriel = "s";} else  {$pluriel = "";};

    echo formatString($txt_nb_ann, array("$nbrann","$pluriel") );

    echo '<br />
    <table cellpadding="4" cellspacing="0" width="100%">
    <tr><td colspan="7"><hr style="border: 1px solid #ccccdd"/></td></tr>
    ';


    while ($row3=mysql_fetch_array($res3)) {

if ($row3['type_poste']=="1") {$type_poste = $txt_Ass_01;};
if ($row3['type_poste']=="2") {$type_poste = $txt_Ass_02;};
if ($row3['type_poste']=="3") {$type_poste = $txt_Ass_F;};
if ($row3['type_poste']=="4") {$type_poste = $txt_Ass_03;};
if ($row3['type_poste']=="5") {$type_poste = $txt_Ass_04;};
if ($row3['type_poste']=="6") {$type_poste = $txt_Ass_F;};
if ($row3['type_poste']=="7") {$type_poste = $txt_Aid_F;};
if ($row3['type_poste']=="8") {$type_poste = $txt_AssDir;};

if ($row3['type_ann']=="1") {$type_ann = $txt_en.' '.$txt_CDDC;};
if ($row3['type_ann']=="2") {$type_ann = $txt_en.' '.$txt_CDIC;};
if ($row3['type_ann']=="3") {$type_ann = $txt_en.' '.$txt_CProf;};

echo'<tr>
         <td>&nbsp;</td>
         <td>&gt; <strong>'.$type_poste.' '.$type_ann.'</strong><br /> &nbsp; &nbsp; <i style="color: #003993; font-size: 7pt;">'.$txt_posteLe.' '.date_naturelle($row3['date_in']).'<br />
          &nbsp; &nbsp;&nbsp; '.$txt_expireLe.' '.date_naturelle($row3['expiration']).'</i>
          
<br />';

echo '</td><td>';

if ($row3['valid']=="0") echo '<span class="important">'.$txt_AnnNonVisible.'</span>';
if ($row3['valid']=="2") echo '<span class="vert">'.$txt_AnnVisible.'</span>';

echo'<br />';
if ($row3['urgent']=="2") echo '<span class="vert">'.$txt_AnnUrgActiv.'</span>';
echo '</td>
         <td><a href="index.php?cat=ad_annonces&amp;cmd=detail&amp;numann='.$row3['id_annonce'].'">'.$txt_voir.'</a></td>
         <td><a href="index.php?cat=compte&amp;incl=mod_ann_ad&amp;num_ann='.$row3['id_annonce'].'">'.$txt_editer.'</a></td>
         <td><a href="#" onclick="javascript:confir(\''.$row3['id_annonce'].'\');">'.$txt_effacer.'</a></td>
         <td>&nbsp;</td>
     </tr>
     <tr>
         <td colspan="6">';

if ((($type_ad=="1")||($type_ad=="2")||($type_ad=="9"))&&($row3['urgent']=="1")) {
                                              echo ' <span class="important">L\'option &laquo;Annonce Urgente&raquo; que vous aviez coch&eacute;e n\'est pas activ&eacute;e.</span>
                                              <a href="index.php?cat=compte&amp;incl=paiement&amp;pay=1&amp;num_ann='.$row3['id_annonce'].'">Cliquez ici pour activer</a>'; $MONTANT_site = 5000; $urg=1;};

if ((($type_ad=="5") || ($type_ad=="6") || ($type_ad=="8"))&& ($row3['valid']=="0"))
                     {  echo'<span class="important">Annonce non visible</span>
                        <a href="index.php?cat=compte&amp;incl=paiement&amp;pay=1&amp;num_ann='.$row3['id_annonce'].'">Cliquez ici pour activer</a>';
                     };
if ((($type_ad=="5") || ($type_ad=="6") || ($type_ad=="8"))&& ($row3['urgent']=="1"))
                     {  echo'<span class="important">L\'option &laquo;Annonce Urgente&raquo; que vous aviez coch&eacute;e n\'est pas activ&eacute;e.</span>
                        <a href="index.php?cat=compte&amp;incl=paiement&amp;pay=1&amp;num_ann='.$row3['id_annonce'].'">Cliquez ici pour activer</a>';
    };
echo '</td>
     </tr>
     <tr><td colspan="6"><hr style="border: 1px dotted #ccccdd"/></td></tr>

     '; }

echo'</table><br /><br />';




if ((!$post_ad) || (is_array($err))) {  // Si pas de POST  ou si POST avec erreur







if ($num_ann) {


$res4=mysql_query("SELECT * FROM $table_annonce3 WHERE id_mbre='$id_membre' and id_annonce='$num_ann'");
$row4=mysql_fetch_array($res4);

  $type_ann=$row4['type_ann'];
  $type_poste=$row4['type_poste'];
  $ntxt_urgent = s($row4['txt_urgent']);
  $urgent = $row4['urgent'];
  $djour = substr($row4['date_debut'],8,2);
  $dmois = substr($row4['date_debut'],5,2);
  $dan = substr($row4['date_debut'],0,4);
  $fjour = substr($row4['date_fin'],8,2);
  $fmois = substr($row4['date_fin'],5,2);
  $fan = substr($row4['date_fin'],0,4);
  $nheures =$row4['heures'];
  $ntexte =s($row4['texte_annonce']);
  $emploidutemps =$row4['emploidutemps'];
  $nremarque= s($row4['remarque']);
  $expjour = substr($row4["expiration"],8,2);
  $expmois = substr($row4["expiration"],5,2);
  $expan = substr($row4["expiration"],0,4);

if (ereg("Lun_tt",$emploidutemps)) {$lundiam=1; $lundipm=1;};
if (ereg("Lun_ma",$emploidutemps)) {$lundiam=1;};
if (ereg("Lun_ap",$emploidutemps)) {$lundipm=1;};

if (ereg("Mar_tt",$emploidutemps)) {$mardiam=1; $mardipm=1;};
if (ereg("Mar_ma",$emploidutemps)) {$mardiam=1;};
if (ereg("Mar_ap",$emploidutemps)) {$mardipm=1;};

if (ereg("Mer_tt",$emploidutemps)) {$mercrediam=1; $mercredipm=1;};
if (ereg("Mer_ma",$emploidutemps)) {$mercrediam=1;};
if (ereg("Mer_ap",$emploidutemps)) {$mercredipm=1;};

if (ereg("Jeu_tt",$emploidutemps)) {$jeudiam=1; $jeudipm=1;};
if (ereg("Jeu_ma",$emploidutemps)) {$jeudiam=1;};
if (ereg("Jeu_ap",$emploidutemps)) {$jeudipm=1;};

if (ereg("Ven_tt",$emploidutemps)) {$vendrediam=1; $vendredipm=1;};
if (ereg("Ven_ma",$emploidutemps)) {$vendrediam=1;};
if (ereg("Ven_ap",$emploidutemps)) {$vendredipm=1;};

if (ereg("Sam_tt",$emploidutemps)) {$samediam=1; $samedipm=1;};
if (ereg("Sam_ma",$emploidutemps)) {$samediam=1;};
if (ereg("Sam_ap",$emploidutemps)) {$samedipm=1;};

}

};



if ((!$num_ann)&& (!is_array($err)))  {} else {        // Si on a postÈ une annonce, on ne rÈaffiche pas le formulaire
                                 // Èvite d'avoir un formulaire vide si modif et aucun numÈro d'annonce n'a ÈtÈ choisi






if (($type_ad!="3") || ($type_ad!="4") || ($type_ad!="7")) {

if ((!$post_ad) || (is_array($err))) {  // Si pas de POST  ou si POST avec erreur

 echo '  <br /><br /> ';



if ($type_ann) {

echo '
<br /><br />
<FORM action="index.php?cat=compte&amp;incl=mod_ann_ad" method="post" enctype="multipart/form-data">   ';




if (($type_ad=="1")||($type_ad=="2")||($type_ad=="6")||($type_ad=="9"))  {

echo '

<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_votre_ann.' :</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" />

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="5" bgcolor="#'.$C_fond_Tclair.'">'.$txt_explicAnn.'</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">    <td width="36%"><div align="left">&nbsp; '.$txt_TypeAnn.' : </div></td>
    <td colspan="3">  <strong>';
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


echo '</strong></td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td width="36%"><div align="left">&nbsp; '.$txt_opt_AnUrg.' </div></td>
<td colspan="3">'; if ($urgent=="1") { echo 'Vous avez coch&eacute; cette option, mais elle n\'est pas active.';}
                   elseif ($urgent=="2") { echo 'Vous avez coch&eacute; et activ&eacute; cette option.';}
                   else { echo 'Vous n\'avez pas choisi cette option.';};
echo '<input type="hidden" name="urgent" value="'.$urgent.'"></td></tr>';

if (($urgent=="1")||($urgent=="2")) { echo '

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">    <td width="36%"><div align="left">&nbsp; '.$txt_titre_urgAnn.' <br /> &nbsp; </div></td>
    <td colspan="3">
    
<input type="text" name="ntxt_urgent" value="'.$ntxt_urgent.'" size="50" maxlength="100" > </td></tr>
	<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
';};



if ($type_ann=="1") {
echo' 

<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_debRempla.' :</div></td>
<td colspan="3">
<input type="text" name="djour" value="'.$djour.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dmois" value="'.$dmois.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dan" value="'.$dan.'"  size="3" maxlength="4"/ '.$numeric.' >
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_finRempla.'</div></td>
<td colspan="3">
<input type="text" name="fjour" value="'.$fjour.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="fmois" value="'.$fmois.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="fan" value="'.$fan.'"  size="3" maxlength="4"/ '.$numeric.' >
</td></tr>'; }


else {

echo'

<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_debContratSouh.' :</div></td>
<td colspan="3">
<input type="text" name="djour" value="'.$djour.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dmois" value="'.$dmois.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dan" value="'.$dan.'"  size="3" maxlength="4"/ '.$numeric.' >
</td></tr>
'; };


echo '

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">    <td width="36%"><div align="left">&nbsp; '.$txt_heuresSemaine.'
</div></td>
<td colspan="3"><input type="text" name="nheures" value="'.$nheures.'"  size="5" maxlength="20"/ >  h/'.$txt_semaine.'</td></tr>  ';

echo'
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
	<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_emploi_temps.'</div></td>
    <td colspan="3">

	
  <table width="90%" border="0" align="center" bgColor="#e9e9e9">
          <tbody>
            <tr>
              <td align="middle" width="14%"><div align="center">&nbsp;</div></td>
              <td align="middle">'.$txt_lundi.'</td>
              <td align="middle" width="14%">'.$txt_mardi.'</td>
              <td align="middle" width="14%">'.$txt_mercredi.'</td>
              <td align="middle" width="14%">'.$txt_jeudi.'</td>
              <td align="middle" width="15%">'.$txt_vendredi.'</td>
              <td align="middle" width="15%">'.$txt_samedi.'</td>
            </tr>
            <tr>
              <td align="middle" width="14%">'.$txt_matin.'</div></td>
              <td align="middle" width="14%"><input name="lundiam" type="checkbox" value="1"'; if ($lundiam=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="mardiam" type="checkbox" value="1"'; if ($mardiam=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="mercrediam" type="checkbox" value="1"'; if ($mercrediam=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="jeudiam" type="checkbox" value="1"'; if ($jeudiam=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="15%"><input name="vendrediam" type="checkbox" value="1"'; if ($vendrediam=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="15%"><input name="samediam" type="checkbox" value="1"'; if ($samediam=="1") echo 'checked'; echo'> </td>
            </tr>
            <tr>
              <td align="middle" width="14%">'.$txt_apresmidi.'</div></td>
              <td align="middle" width="14%"><input name="lundipm" type="checkbox" value="1"'; if ($lundipm=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="mardipm" type="checkbox" value="1"'; if ($mardipm=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="mercredipm" type="checkbox" value="1"'; if ($mercredipm=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="14%"><input name="jeudipm" type="checkbox" value="1"'; if ($jeudipm=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="15%"><input name="vendredipm" type="checkbox" value="1"'; if ($vendredipm=="1") echo 'checked'; echo'> </td>
              <td align="middle" width="15%"><input name="samedipm" type="checkbox" value="1"'; if ($samedipm=="1") echo 'checked'; echo'> </td>
            </tr>
          </tbody>
        </table>

</td></tr>  ';


echo '

		<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
	
	


<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; &nbsp; '.$txt_annonce.'</div></td>
    <td colspan="3"><textarea rows="9" name="ntexte" cols="35">'.$ntexte.'</textarea></td>
</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_remarques.' </div></td>
    <td colspan="3">
    <textarea rows="5" name="nremarque" cols="29">'.$nremarque.'</textarea>
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_expAnn.'</div></td>
<td colspan="3">';

if ($type_ann=="1") {echo 'La date d\'expiration correspond &agrave; la fin du CDD.';}

else { echo '
<input type="text" name="expjour" value="'.$expjour.'"  size="1" maxlength="2" '.$numeric.' > /
<input type="text" name="expmois" value="'.$expmois.'"  size="1" maxlength="2" '.$numeric.' > /
<input type="text" name="expan" value="'.$expan.'"  size="3" maxlength="4" '.$numeric.' >
';};

echo ' <img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'info1\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'info1\').style.visibility=\'hidden\'"/>

<div id="info1" style="visibility: hidden; width: 300px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>- Info -</b></div>
L\'annonce sera automatiquement effac&eacute;e du serveur &agrave; cette date</div>';

if (($type_ann=="2")||($type_ann=="3"))
{ echo $txt_10mMax;};

echo '</td></tr>
</td></tr>
</table>
</fieldset>
<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_AdPhotSuppl.'</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" />

<tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left">&nbsp; '.$txt_img_limit.'</td>
       <td colspan="3">';



if (file_exists("$dest_dossier_ad_ann/$num_ann.jpg"))

            {

              $imagette = "$adresse_site1/photos/photos_ann_ad/$num_ann.jpg";
              imagette ($imagette,150) ; echo '<br /><input type="checkbox" name="effaceimg" value="1"> Effacer l\'image
              <br /><br />PS: en ajoutant une image, vous allez Ècraser l\'ancienne.<br /><br /> ';
            };



echo '
<input type="hidden" name="MAX_FILE_SIZE" value="200000" /><p><input type="file" name="photo" /></p>

              </td>
    </tr>


</table>
</fieldset>
<input type="hidden" value="'; if (isset($type_ann)) { echo $type_ann;  }; echo '" id="type_ann" name="type_ann"  />
<input type="hidden" value="'; if (isset($num_ann)) { echo $num_ann;  }; echo '" id="num_annonce" name="num_annonce"  />
<br />Valider votre annonce pour '.$titre_site.' <input type="submit" name="post_ad" value="Sauver" />';


};








echo '</FORM> ';


}; };  };

};
};

?>
