


<script type="text/javascript" language="javascript" charset="iso-8859-1">

function afficher_liste () {
     if (document.getElementById('ChampTexte').style.display == 'none') {
                document.getElementById('ChampTexte').style.display = 'block';
     }
}

function cache_liste () {
     if (document.getElementById('ChampTexte').style.display == 'block') {
                document.getElementById('ChampTexte').style.display = 'none';
     }
}
</script>

<?

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type_ann=$_POST['type_ann'];

  $err = null;
  $err2 = null;


//DEBUG
// ini_set('display_errors', 1);
// foreach($_POST as $key => $val) echo '$_POST["'.$key.'"]='.$val.' <br>'; 
// foreach($_GET as $key => $val) echo '$_GET["'.$key.'"]='.$val.' <br>'; 
// foreach($_SESSION as $key => $val) echo '$_SESSION["'.$key.'"]='.$val.' <br>'; 
//DEBUG




echo '

<br />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_ajout_ann.'</font><br/>
';



// RECUPERATION DES DONNES
$_SESSION['email']=$email;

$res=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row=mysql_fetch_array($res);
  $id_membre=$row['id_membre'];
  $pays=$row['pays'];
  $departement=$row['departement'];
  $region=$row['region'];

$res2=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_membre'");
$row2=mysql_fetch_array($res2);
$nbr = mysql_num_rows($res2);
  $type_ad=$row2['type_ad'];
  $confidentialite=$row2['confidentialite'];



// **************** LISTE DES ERREURS BLOQUANT L'ACCES A l'AJOUT DES ANNONCES ***************************************


// PAS D'ANNONCES POUR ASSISANTES ET AGENCE IMMOBILIERE
if (($type_ad=="4") || ($type_ad=="7"))
                { $err2['profil_pas_ok']=$txt_AnnImposs.'<br /> <a href="index.php?cat=compte&incl=modif_ad">Postez votre CV</a> ou <a href="index.php?cat=ad_annonces">Consultez les offres d\'emploi</a> ';
                      };

// SI PROFIL DE ad NON RENSEIGNE : PAS D'ANNONCE POSSIBLE
if ($nbr == 0) {$err2['profil_abs']=$txt_FicheAvant.'<br />'; };



if (is_array($err2)) {echo '<br /><br /><span class="important"> '.$err2['profil_abs'].'
                                                                   '.$err2['profil_pas_ok'].'

  </span><br />';      }








else {   // SOIT C'EST POUR AJOUTER DES ANNONCES
         // SOIT IL Y A DES ANNONCES A MODIFIER





  $id_ad=$row2['id_ad'];
  $type_ad=$row2['type_ad'];
  $nconfidentialite=$row2['confidentialite'];
  $nspecialite =$row2['specialite'];
  $nmodeexercice =$row2['modeexercice'];
  $nzoneexercice =$row2['zoneexercice'];
  $nsecretaire =$row2['secretaire'];
  $nassistante =$row2['assistante'];
  $nlogiciel =$row2['logiciel'];
  $ninfo =$row2['info'];
  $nrvg=$row2['rvg'];
  $npanoramique =$row2['panoramique'];
  $nremarques =$row2['remarques'];

   if ($nspecialite=="1") {$tspecialite="omnipratique";}
   if ($nspecialite=="2") {$tspecialite="ODF";}
   if ($nspecialite=="3") {$tspecialite="parodontologie";}
   if ($nspecialite=="4") {$tspecialite="implantologie";}
   if ($nspecialite=="5") {$tspecialite="proth&egrave;se";}
   if ($nspecialite=="6") {$tspecialite="p&eacute;dodontie";}
   if ($nspecialite=="7") {$tspecialite="endodontie";}
   if ($nspecialite=="8") {$tspecialite="chirurgie buccale";}
  




if ($post_ad=="$txt_Sauver") {

  $type_ann=protect($_POST['type_ann']);
  $type_poste =protect($_POST['type_poste']);
  $urgent = protect($_POST['urgent']);
  $txt_urgent = protect($_POST['txt_urgent']);
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
  if ($type_poste=="") $err['ntype_poste']='Quel poste &agrave; pourvoir ?<br />';
  if ($type_ann=="") $err['ntype_ann']='Quel offre d\'emploi proposer ?<br />';
  if ($urgent=="") $err['urgent']='Choisissez-vous l\'option payante &laquo; Annonce Urgente &raquo; ?<br />';
  if (($urgent=="1")&&($txt_urgent=="")) $err['txt_urgent']='Merci de remplir le titre de votre annonce urgente<br />';
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
                        '.$err['ntype_poste'].'
                        '.$err['ntype_ann'].'
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




  $type_ann=a($_POST['type_ann']);
  $type_poste=a($_POST['type_poste']);
  $txt_urgent =a($_POST['txt_urgent']);
  $txt_urgent =protect($txt_urgent);
  $djour=a($_POST['djour']);
  $dmois =a($_POST['dmois']);
  $dan =a($_POST['dan']);  
  $fjour =a($_POST['fjour']);
  $fmois =a($_POST['fmois']);
  $fan =a($_POST['fan']);
  $nheures =a($_POST['nheures']);
  $emploidutemps=a($emploidutemps);
  $ntexte =a(protect($_POST['ntexte']));
  $nremarque =a(protect($_POST['nremarque']));
  $expjour =a($_POST['expjour']);
  $expmois =a($_POST['expmois']);
  $expan =a($_POST['expan']);

  $ip=$_SERVER['REMOTE_ADDR'];
  $datetime=date("Y-m-d H:i:s");

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);


$req_id="SELECT max(id_annonce) as id_annonce FROM $table_annonce3";
$res_id=mysql_query($req_id);
$row_id=mysql_fetch_array($res_id);
$new_id_val=$row_id['id_annonce']+1;

// Validation immÈdiate des annonces pour les dentiste (pas de paiement)
if (($type_ad=="1") || ($type_ad=="2")|| ($type_ad=="9")) {$valid = 2;}

// Pas de validation pour mutuelles,
if (($type_ad=="5") || ($type_ad=="6") || ($type_ad=="8")) {$valid = 0;}


echo "<br><br>";

echo "INSERT INTO $table_annonce3 (id_annonce, id_mbre, type_ann, type_poste, date_debut, date_fin, emploidutemps, heures,
texte_annonce, remarque, expiration, ip, date_in, txt_urgent, urgent, valid)
 VALUES ('$new_id_val', '$id_membre', '$type_ann', '$type_poste', '$dan-$dmois-$djour', '$fan-$fmois-$fjour', '$emploidutemps','$nheures',
'$ntexte', '$nremarque', '$date_exp', '$ip', '$datetime','$txt_urgent','$urgent','$valid')";


echo "<br><br>";



$req="INSERT INTO $table_annonce3 (id_annonce, id_mbre, type_ann, type_poste, date_debut, date_fin, emploidutemps, heures,
texte_annonce, remarque, expiration, ip, date_in, txt_urgent, urgent, valid)
 VALUES ('$new_id_val', '$id_membre', '$type_ann', '$type_poste', '$dan-$dmois-$djour', '$fan-$fmois-$fjour', '$emploidutemps','$nheures',
'$ntexte', '$nremarque', '$date_exp', '$ip', '$datetime','$txt_urgent','$urgent','$valid')";


echo'<br /><br /><span class="important">Votre annonce a &eacute;t&eacute; enregistr&eacute;e.</span>';

echo '
<br />
<a href="index.php?cat=compte&amp;incl=add_ann_ad"><u>Poster une nouvelle annonce</u></a> <br />
<a href="index.php?cat=ad_annonces&amp;cmd=detail&amp;numann='.$new_id_val.'" target="_blank"><u>Voir cette annonce</u></a> <br />
';



if (($type_ad=="1")||($type_ad=="2")||($type_ad=="9")) { echo ' Elle est imm&eacute;diatement visible sur le site';};

if (((($type_ad=="1")||($type_ad=="2")||($type_ad=="9")) and ($urgent=="1")) || (($type_ad=="5")||($type_ad=="6")||($type_ad=="8"))) {



// citelis


if (($type_ad=="1")||($type_ad=="2")||($type_ad=="9")) {echo ' <span class="important">Elle sera promue en OPTION URGENTE d&egrave;s votre r&egrave;glement</span>'; $MONTANT_site = 5000; $urg=1;};
if (($type_ad=="5") || ($type_ad=="6") || ($type_ad=="8"))  {      if ($urgent=="0") {$MONTANT_site = 3900; $urg=0;};
                                                                   if ($urgent=="1") {$MONTANT_site = 10500; $urg=1;};
                                                                   echo '<span class="important">Elle sera visible sur le site d&egrave;s votre r&egrave;glement</span>';
                                                                                };


include ("paiement_cb.php");

// echo  $req;


};





$res=mysql_query($req);



  } // fin du traitement et de l'insertion

} // fin de l'action 'continuer'







if ((($type_ad!="4") || ($type_ad!="7")) && ((!$post_ad) || (is_array($err))))     // Si pas de POST  ou si POST avec erreur


echo $txt_ann_distincts;
echo '<br /><br />';



echo '
<FORM action="index.php?cat=compte&amp;incl=add_ann_ad" method="post">
'.$txt_prop_contrat.'  : <select name="type_ann" onchange=this.form.submit()>
          <option value="" >'.$txt_choix_contrat.'</option>
          <option value="1" ';if ($type_ann=="1") echo 'selected'; echo' >'.$txt_CDD.'</option>
          <option value="2" ';if ($type_ann=="2") echo 'selected'; echo' >'.$txt_CDI.'</option>
          <option value="3" ';if ($type_ann=="3") echo 'selected'; echo' >'.$txt_CQualif.'</option>
        </select>
</FORM>
<br /><br />
NB :  Le postage des annonces est illimit&eacute; et gratuit (tant que votre inscription est valide, hors options)';







if ($type_ann) {

echo '

<FORM action="index.php?cat=compte&amp;incl=add_ann_ad" method="post" enctype="multipart/form-data">   ';



 // Fiche cabinet Dentiste, centre de soin, mairie asso, stomatologue
if (($type_ad=="1")||($type_ad=="2")||($type_ad=="5")||($type_ad=="8")||($type_ad=="9"))  {

echo '
<br /><br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_fiche_cab.' :</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" />

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">'.$txt_incluFiche.'<br /><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left" style="padding: 10px;">';

if (file_exists("$dest_dossier_ad/$id_membre.jpg"))   {    $imagette = "$adresse_site1/photos/photos_ad/$id_membre.jpg";
                                                        imagette ($imagette,150) ;
                                                   } else {echo 'Aucune photo de votre cabinet';};

echo ' </td>
       <td colspan="3" style="padding: 10px;"><div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
- Cabinet '; if ($nmodeexercice=="1") {echo 'individuel';};
             if ($nmodeexercice=="2") {echo 'de groupe';};
echo' exer&ccedil;ant en '; if ($nzoneexercice=="1") {echo 'milieu citadin';};
                            if ($nzoneexercice=="2") {echo 'milieu rural';};
                            if ($nzoneexercice=="3") {echo 'milieu semi-rural';};
                            if ($nzoneexercice=="4") {echo 'banlieue';};
echo ' et ayant une orientation '.$tspecialite.'.<br />';

if ($nsecretaire=="1") {echo '- Pas de secr&eacute;taire.<br />';};
if ($nsecretaire=="2") {echo '- Secr&eacute;taire pr&eacute;sente.<br />';};

if ($nassistante=="1") {echo '- Pas d\'assistante.<br />';};
if ($nassistante=="2") {echo '- Assistante au fauteuil.<br />';};

if ($ninfo=="1") {echo '- Le cabinet n\'est informatis&eacute;. ';};
if ($ninfo=="2") {echo '- Le cabinet est informatis&eacute; (logiciel '.$nlogiciel.'). ';};

if ($nrvg=="1") {echo 'Pas de RVG. ';};
if ($nrvg=="2") {echo 'RVG pr&eacute;sent. ';};

if ($npanoramique=="1") {echo 'Pas de panoramique dentaire. ';};
if ($npanoramique=="2") {echo 'Panoramique dentaire pr&eacute;sent au cabinet. ';};
if ($npanoramique=="3") {echo 'Cone beam pr&eacute;sent au cabinet.';};

echo '</div><br />';
if ($nconfidentialite=='1') {echo '<strong>Vous avez choisi l\'absence d\'anonymat</strong>: Votre nom et vos coordonn&eacute;es t&eacute;l&eacute;phoniques sont visibles';}
elseif ($nconfidentialite=='2') {echo '<strong>Vous avez choisi la protection de votre nom</strong>: Nom masqu&eacute; ; vos coordonn&eacute;es t&eacute;l&eacute;phoniques sont visibles';}
elseif ($nconfidentialite=='3') {echo '<strong>Vous avez choisi l\'anonymat total </strong>: Nom  et coordonn&eacute;es t&eacute;l&eacute;phoniques masqu&eacute;s';};

echo ' <br />
Dans tous cas vous &ecirc;tes joignable par courriel gr&acirc;ce au formulaire qui g&eacute;n&egrave;re un email sans afficher votre adresse email.
</td></tr>
</table>
</fieldset>';

} elseif ($type_ad=="6") {
  
  
echo '
<br /><br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_fiche_cab.' :</strong></font></legend>

<table id="Formulaire_ad2" width="100%" border="0" cellspacing="0">
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">
Co&ucirc;t par annonce : 39 &euro; TTC. <br />
Mode de paiement accept&eacute;s : ch&egrave;que, carte bancaire, virement</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4"><strong>Rappel de votre profil</strong><br />
&nbsp; (Sera inclu ‡ votre annonce)<br /><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left" style="padding: 10px;">';
       
if (file_exists("$dest_dossier_ad/$id_membre.jpg"))   {    $imagette = "$adresse_site1/photos/photos_ad/$id_membre.jpg";
                                                        imagette ($imagette,150) ;
                                                   } else {echo 'Aucune photo';};

echo ' </td>
       <td colspan="3" style="padding: 10px;"><div style="border: 1px dotted #aaaaaa; background: #ffffff; padding: 4px; color: #000000">
'.$nremarques.'</div>
</td></tr>



<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
</table>
</fieldset>
';
  
 };



echo '<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_votre_ann.' :</strong></font></legend>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" />

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4" bgcolor="#'.$C_fond_Tclair.'">'.$txt_explicAnn.'</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">    <td width="36%"><div align="left">&nbsp; '.$txt_prop.'
</div></td>
<td colspan="3">
          <select name="type_poste">';

          if (($type_ann=="1")||($type_ann=="2")) {       // CDI ou CDD

echo '     <option value="1" '; if ($type_poste=="1") echo 'selected'; echo '>'.$txt_Ass_01.'</option>
           <option value="2" '; if ($type_poste=="2") echo 'selected'; echo' >'.$txt_Ass_02.'</option>
           <option value="3" '; if ($type_poste=="3") echo 'selected'; echo' >'.$txt_Ass_F.'</option>
           <option value="4" '; if ($type_poste=="4") echo 'selected'; echo '>'.$txt_Ass_03.'</option>
           <option value="5" '; if ($type_poste=="5") echo 'selected'; echo '>'.$txt_Ass_04.'</option>
           <option value="8" '; if ($type_poste=="8") echo 'selected'; echo' >'.$txt_AssDir.'</option>
           ';
};

if ($type_ann=="3") {       // Contrat de qualif

echo '     <option value="6" '; if ($ntype_poste=="6") echo 'selected'; echo' >'.$txt_Ass_F.'</option>
           <option value="7" '; if ($ntype_poste=="7") echo 'selected'; echo '>'.$txt_Aid_F.'</option>';
};


echo '          </select></td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
    <td align="right" width="36%"><div align="left" style="color: #ff0000">&nbsp; '.$txt_opt_AnUrg.' <br /></div></td>
    <td colspan="3">
    <input type="radio" value="0" name="urgent" onClick="cache_liste();" '; if ($urgent=="0") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
    <input type="radio" value="1" name="urgent" onClick="afficher_liste();" '; if ($urgent=="1") echo 'checked="checked"'; echo ' />'.$txt_oui.'
    <img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'infou\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'infou\').style.visibility=\'hidden\'"/>

<div id="infou" style="visibility: hidden; width: 300px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>- Info -</b></div>
Cette option permet d\'afficher un lien vers votre annonce en 1&egrave;re page du site dans le cadre rouge pour une meilleure visibilit&eacute;; de plus votre annonce apparait en premier (ou parmi les premi&egrave;res si plusieurs annonces urgentes existent dans la m&ecirc;me cat&eacute;gorie) et en rouge dans sa cat&eacute;gorie.
Cette option est payante (50 &euro; par annonce)</div>

</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr></table>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" id="ChampTexte" style="display:';

 if ($urgent=="0") {echo 'none';} elseif ($urgent=="1") {echo 'block';}
                                  else {echo 'none';};

echo ';"/>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td align="right"><div align="left" style="color: #ff0000">&nbsp; '.$txt_titre_urgAnn.' <br /></div></td>
    <td colspan="3">
    <input type="text" name="txt_urgent" '; if ($txt_urgent) {echo 'value="'.$txt_urgent.'"';}; echo 'size="50" maxlength="100"; /><br /> '.$txt_max100carac.'
</td></tr></table>

<table cellpadding="0" cellspacing="3" border="0" bgcolor="#'.$C_fond_Tclair.'" />
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
';

if ($type_ann=="1") {    // CDD

echo'
<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_debContrat.' :</div></td>
<td colspan="3">
<input type="text" name="djour" value="'.$djour.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dmois" value="'.$dmois.'"  size="1" maxlength="2"/ '.$numeric.' > /
<input type="text" name="dan" value="'.$dan.'"  size="3" maxlength="4"/ '.$numeric.' >
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
<td width="36%"><div align="left">&nbsp; '.$txt_finContrat.' :</div></td>
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
</td></tr>';
};


echo '

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">    <td width="36%"><div align="left">&nbsp; '.$txt_heuresSemaine.'
</div></td>
<td colspan="3"><input type="text" name="nheures" value="'.$nheures.'"  size="5" maxlength="20"/ >  h/'.$txt_semaine.'</td></tr>

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
</td></tr>
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
L\'annonce sera automatiquement effac&eacute;e du serveur &agrave; cette date.</div>';

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



if (file_exists("$dest_dossier_ad_ann/$id_annonce.jpg"))

            {

              $imagette = "$adresse_site1/photos/photos_ann_ad/$id_annonce.jpg";
              imagette ($imagette,150) ; echo '<br /><input type="checkbox" name="effaceimg" value="1"> Effacer l\'image
              <br /><br />PS: en ajoutant une image, vous allez Ècraser l\'ancienne.<br /><br /> ';
            };



echo '
<input type="hidden" name="MAX_FILE_SIZE" value="200000" /><p><input type="file" name="photo" /></p>

</td></tr>
</table>
</fieldset>

<input type="hidden" value="'; if (isset($type_ann)) { echo $type_ann;  }; echo '" id="type_ann" name="type_ann"  />

<br />'.$txt_ValidAnn.' <input type="submit" name="post_ad" value="'.$txt_Sauver.'" />';

};





echo '</FORM> ';


};




?>
