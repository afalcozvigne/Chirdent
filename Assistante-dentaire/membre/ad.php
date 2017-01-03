<?

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type_ad=$_POST['type_ad'];
$type_ad2=$_POST['type_ad2'];
$inc=$_REQUEST['inc'];


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





// SI PROFIL DE ad NON RENSEIGNE
if ($nbr == 0) { }


// PROFIL DE ad RENSEIGNE
else {

  $id_ad=$row2['id_ad'];
  $type_ad=$row2['type_ad'];
  $type_ad2=$row2['type_ad2'];
  $nactif=$row2['actif'];
  $nconfidentialite=$row2['confidentialite'];
  $nspecialite =$row2['specialite'];
  $nmodeexercice =$row2['modeexercice'];
  $nzoneexercice =$row2['zoneexercice'];
  $ninfo =$row2['info'];
  $nlogiciel =$row2['logiciel'];
  $nsecretaire =$row2['secretaire'];
  $nassistante =$row2['assistante'];
  $npanoramique =$row2['panoramique'];
  $nrvg=$row2['rvg'];

  $ndiplomes =s($row2['ndiplomes']);
  $nanneediplome =$row2['nanneediplome'];
  $qualifications =s($row2['qualifications']);
  $paysdiplome =s($row2['paysdiplome']);
  $nactivite =s($row2['nactivite']);
  $ninterets =s($row2['ninterets']);
  $nass =$row2['nass'];
  $nzones =$row2['zones'];
  $nautre_dept =$row2['autre_dept'];
  $nremarques =s($row2['remarques']);




// si pas de POST, on récupère la variable de la BDD (sinon, on récupère le POST)

  if (!isset($_POST["liste_ue"]))       $lue = $row2['UE'];
  if (!isset($_POST["liste_europe"]))   $leurope = $row2['EUROP'];
  if (!isset($_POST["liste_amerin"]))   $lamerin = $row2['AMERIN'];
  if (!isset($_POST["liste_caraib"]))   $lcaraib = $row2['CARAIB'];
  if (!isset($_POST["liste_maghreb"]))  $lmaghreb = $row2['MAGHREB'];
  if (!isset($_POST["liste_afriq"]))    $lafriq = $row2['AFRIQ'];
  if (!isset($_POST["liste_asie"]))     $lasie = $row2['ASIE'];
  if (!isset($_POST["liste_ameris"]))   $lameris = $row2['AMERIS'];
  if (!isset($_POST["liste_oceanie"]))  $loceanie = $row2['OCEANIE'];

if ($type_ad=="4")  { $fiche_renseignee = '<img src="images/checkmark_32.png" border="1" width="32" height="32" />'.$txt_CV_renseig;}

if (($type_ad=="1")||($type_ad=="2")||($type_ad=="5")||($type_ad=="8")||($type_ad=="9")) { $fiche_renseignee = '<img src="images/checkmark_32.png" border="1" width="32" height="32" /> '.$txt_fiche_ok.'<br />'.$txt_fiche_ok2.' : <a href="index.php?cat=compte&incl=add_ann_ad"><u>'.$txt_ajout_ann.'</u></a>';}

if (($type_ad=="6")) { $fiche_renseignee =  '<img src="images/checkmark_32.png" border="1" width="32" height="32" /> '.$txt_fiche_ok;}




};

// si profil renseigné : priorité au type_ad quand posté par validation formulaire sinon au profil de ad /  puis type de info_membre
  if (isset($_POST['type_ad'])) {$type_ad = $_POST['type_ad'];}
  else { if (isset($row2['type_ad'])) {$type_ad=$row2['type_ad'];}
         else  {$type_ad=$row['type'];};};






echo '
<br />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">';




if ($type_ad=="4") { echo $txt_NvCVt; }    // assistante

elseif  (($type_ad!="3")||($type_ad!="7")) { echo $txt_cred_fiche;};          // autres sauf agence immobilière et étudiant
 

echo '</font><br />';













if ($post_ad=="$txt_Sauver") {


  $id_ad=protect($_POST['id_ad']);
  $nactif=protect($_POST['nactif']);
  $nconfidentialite=protect($_POST['nconfidentialite']);
  $nmodeexercice =protect($_POST['nmodeexercice']);
  $nzoneexercice =protect($_POST['nzoneexercice']);
  $nspecialite =protect($_POST['nspecialite']);
  $nsecretaire =protect($_POST['nsecretaire']);
  $nassistante =protect($_POST['nassistante']);
  $ninfo =protect($_POST['ninfo']);
  $nlogiciel =protect($_POST['nlogiciel']);
  $nrvg=protect($_POST['nrvg']);
  $npanoramique =protect($_POST['npanoramique']);

  $ndiplomes =protect($_POST['ndiplomes']);
  $nanneediplome =protect($_POST['nanneediplome']);
  $qualifications =protect($_POST['qualifications']);
  $paysdiplome =protect($_POST['paysdiplome']);
  $nactivite =protect($_POST['nactivite']);
  $ninterets =protect($_POST['ninterets']);
  $nautre_dept =protect($_POST['nautre_dept']);
  $nremarques =protect($_POST['nremarques']);


  $nautre_dept =protect($_POST['nautre_dept']);
  $iuserfile =protect($_POST['iuserfile']);

  $nass01 =protect($_POST['nass01']);
  $nass02 =protect($_POST['nass02']);
  $nass03 =protect($_POST['nass03']);
  $nass04 =protect($_POST['nass04']);
  $nass05 =protect($_POST['nass05']);
  $nass06 =protect($_POST['nass06']);
  $nass07 =protect($_POST['nass07']);
  $nass08 =protect($_POST['nass08']);
  $nass09 =protect($_POST['nass09']);
  $nass10 =protect($_POST['nass10']);
  $nass11 =protect($_POST['nass11']);
  $nass12 =protect($_POST['nass12']);
  $nass13 =protect($_POST['nass13']);
  $nass14 =protect($_POST['nass14']);
  $nass15 =protect($_POST['nass15']);
  $nass16 =protect($_POST['nass16']);
  
$nass  = $nass01.'-'.$nass02.'-'.$nass03.'-'.$nass04.'-'.$nass05.'-'.$nass06.'-'.$nass07.'-'.$nass08.'-'.$nass09.'-'.$nass10.'-'.$nass11.'-'.$nass12.'-'.$nass13.'-'.$nass14.'-'.$nass15.'-'.$nass16 ;


  $UE =protect($_POST['UE']);
  $EUROP =protect($_POST['EUROP']);
  $AMERIN =protect($_POST['AMERIN']);
  $CARAIB =protect($_POST['CARAIB']);
  $MAGHREB =protect($_POST['MAGHREB']);
  $AFRIQ =protect($_POST['AFRIQ']);
  $ASIE =protect($_POST['ASIE']);
  $AMERIS =protect($_POST['AMERIS']);
  $OCEANIE =protect($_POST['OCEANIE']);

  $nzones = $UE.$EUROP.$AMERIN.$CARAIB.$MAGHREB.$AFRIQ.$ASIE.$AMERIS.$OCEANIE ;

  $effaceimg=protect($_POST['effaceimg']);

// ai rajouté .',' pour avoir une virgule entre chaque pays
// ai rajouté if $UE==1   pour ne selectionner de pays que si la case 'UNION EUROPENNE' est cochée

if ($UE == 1)      {$i = 0; while ($_POST["liste_ue"][$i])       {  $lue     .= $_POST["liste_ue"][$i]     .' ';  $i++;    }; } else $lue = '';
if ($EUROP == 2)   {$i = 0; while ($_POST["liste_europe"][$i])   {  $leurope .= $_POST["liste_europe"][$i] .' ';  $i++;    }; } else $leurope = '';
if ($AMERIN == 3)  {$i = 0; while ($_POST["liste_amerin"][$i])   {  $lamerin .= $_POST["liste_amerin"][$i] .' ';  $i++;    }; } else $lamerin = '';
if ($CARAIB == 4)  {$i = 0; while ($_POST["liste_caraib"][$i])   {  $lcaraib .= $_POST["liste_caraib"][$i] .' ';  $i++;    }; } else $lcaraib = '';
if ($MAGHREB == 5) {$i = 0; while ($_POST["liste_maghreb"][$i])  {  $lmaghreb.= $_POST["liste_maghreb"][$i].' ';  $i++;    }; } else $lmaghreb = '';
if ($AFRIQ == 6)   {$i = 0; while ($_POST["liste_afriq"][$i])    {  $lafriq  .= $_POST["liste_afriq"][$i]  .' ';  $i++;    }; } else $lafriq = '';
if ($ASIE == 7)    {$i = 0; while ($_POST["liste_asie"][$i])     {  $lasie   .= $_POST["liste_asie"][$i]   .' ';  $i++;    }; } else $lasie = '';
if ($AMERIS == 8)  {$i = 0; while ($_POST["liste_ameris"][$i])   {  $lameris .= $_POST["liste_ameris"][$i] .' ';  $i++;    }; } else $lameris = '';
if ($OCEANIE == 9) {$i = 0; while ($_POST["liste_oceanie"][$i])  {  $loceanie.= $_POST["liste_oceanie"][$i].' ';  $i++;    }; } else $loceanie = '';


// SI CASE COCHEE : EFFACE IMAGE
if ($effaceimg=="1")
        {

        $imagette = "$dest_dossier_ad/$id_membre.jpg";
        $delete_result = unlink ($imagette);
        };








// DENTISTE ou CENTRE DE SOINS
if (($type_ad=="1")||($type_ad=="2")||($type_ad=="5")||($type_ad=="8")||($type_ad=="9"))
        { 
          if ($nconfidentialite=="")  $err['nconfidentialite']=$txt_Q_anonym01.'<br />';
          if ($nspecialite=="") $err['nspecialite']=$txt_Q_Pratique.'<br />';
          if ($ninfo=="") $err['ninfo']=$txt_Q_informatiq.'<br />';
          if ($nsecretaire=="") $err['nsecretaire']=$txt_Q_secretaire.'<br />';
          if ($nassistante=="") $err['nassistante']=$txt_Q_assistante.'<br />';
          if ($npanoramique=="") $err['npanoramique']=$txt_Q_panoramiq.'<br />';
          if ($nrvg=="") $err['nrvg']=$txt_Q_rvg.'<br />';
          if (($ninfo=="2") && ($nlogiciel=="")) $err['nlogiciel']=$txt_Q_logiciel.'<br />';


  };

// ASSISTANTE
if ($type_ad=="4")
        {
          if ($nconfidentialite=="")  $err['nconfidentialite']=$txt_Q_anonym01.'<br />';
          if ($nactif=="") $err['nactif']=$txt_Q_CVVisible.'<br />';
          if ($ndiplomes=="") $err['ndiplomes']= $txt_Diplomes.'?<br />';
          if ($nactivite=="") $err['nactivite']=$txt_Q_Activite.'<br />';
          if ($ninterets=="") $err['ninterets']=$txt_Interets.' ?<br />';
          if ($nremarques=="") $err['nremarques']=$txt_lettreMotiv.'?<br />';


   if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3"))
        {
          if (($nanneediplome=="") || ($nanneediplome>date("Y")) || ($nanneediplome<date("Y")-70)) $err['nanneediplome']=$txt_DateDiplome.' ?<br />';
           if ($paysdiplome=="") $err['paysdiplome']=$txt_PaysDiplome.' ?<br />';

          };





$verif_dept=array();
$nautre_dept=$_POST['nautre_dept'];
$nautre_dept=htmlentities($nautre_dept);
$verif_dept=explode(",", $nautre_dept);
foreach($verif_dept as $dept_test) {
	if (abs($dept_test>100)) {$err['nautre_dept']=$txt_Q_Zone_07.'<br /><br />';};
}
          

          };
          
          

// INDUSTRIE
if ($type_ad=="6") { if ($nremarques=="") $err['nremarques']='Votre descriptif ?<br />';};






// #### IMAGE ###

if(isset($_FILES['photo']))
{

// vérifications
if( !in_array( substr(strrchr($_FILES['photo']['name'], '.'), 1), $extensions_ok ) )
{
$err['photo'] = 'Veuillez s&eacute;lectionner un fichier de type jpg !';
}
elseif( file_exists($_FILES['photo']['tmp_name']) and filesize($_FILES['photo']['tmp_name']) > $taille_max)
{    
$err['photo'] = 'Votre fichier doit faire moins de 200Ko !';
}

// copie du fichier
if(!isset($err['photo']))
{

/*  Supprimé car on donne nom fichier = id_membre ****
$dest_fichier = basename($_FILES['photo']['name']);
// formatage nom fichier    
// enlever les accents    
$dest_fichier = strtr($dest_fichier,     'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',     'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
// remplacer les caracteres autres que lettres, chiffres et point par _    
$dest_fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $dest_fichier);  
*/
$type_file = substr($_FILES['photo']['type'],-4,4);  // donne jpeg
$type_file = eregi_replace("jpeg",'jpg',$type_file);

$dest_fichier = "$id_membre.$type_file";

// copie du fichier
move_uploaded_file($_FILES['photo']['tmp_name'], $dest_dossier_ad . $dest_fichier);  }

}



// #### IMAGE ###





  if (is_array($err)) {
    $post="insc"; echo '<span class="important">'.$txt_error.'</span><br />
                        <span style="color: red">
                        '.$err['nconfidentialite'].'
                        '.$err['nactif'].'                        
                        '.$err['nspecialite'].'
                        '.$err['nzoneexercice'].'
                        '.$err['ninfo'].'
                        '.$err['nlogiciel'].'
                        '.$err['nsecretaire'].'
                        '.$err['nassistante'].'
                        '.$err['nmodeexercice'].'
                        '.$err['nrvg'].'
                        '.$err['npanoramique'].'
                        '.$err['ndiplomes'].'
                        '.$err['nanneediplome'].'
                        '.$err['paysdiplome'].'
                        '.$err['nactivite'].'
                        '.$err['ninterets'].'
                        '.$err['nremarques'].'
                        '.$err['photo'].'
                        </span> ';
  }

  elseif (is_array($err2)) {
     $post="insc"; echo '<br /><br /><span class="important">Changement de cat&eacute;gorie impossible.</span><br />
                        <span style="color: red">
                        '.$err2['nannonces'].'
                        </span> ';
                            }

  else {

    // preparation des données

  $nactif=a($nactif);
  $nconfidentialite=a($nconfidentialite);
  $nmodeexercice =a($nmodeexercice);  
  $nzoneexercice =a($nzoneexercice);
  $nspecialite =a($nspecialite);
  $nsecretaire =a($nsecretaire);
  $nassistante =a($nassistante);  
  $ninfo =a($ninfo);
  $nlogiciel =a($nlogiciel);  
  $nrvg=a($nrvg);
  $npanoramique =a($npanoramique);

  $ndiplomes=a($ndiplomes);
  $nanneediplome =a($nanneediplome);
  $qualifications =a($qualifications);
  $paysdiplome =a($paysdiplome);
  $nactivite =a($nactivite);
  $ninterets =a($ninterets);
  $nass = a($nass);
  $nzones = a($nzones);
  $nautre_dept = a($nautre_dept);
  $nremarques = a($nremarques);


  $ip=$_SERVER['REMOTE_ADDR'];
  $datetime=date("Y-m-d H:i:s");

if (is_array($verif_dept)){
	$nautre_dept='';
	foreach($verif_dept as $dept){
		$dept=trim($dept);
		if(!empty($dept) && !is_nan($dept))
			$nautre_dept.=abs(trim($dept)).",";
	}
	$nautre_dept=substr($nautre_dept,0,-1);
}

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

   // Enregistrement dans la BDD . (le champs validation: 1=attente email, 0=ok RAS)

    if ((!is_array($err))&&(!is_array($err2))) { // pas d erreur, on y go

if ($nbr == 0)   // Création du profil de ad

{
$req="INSERT INTO $table_ad (id_ad, type_ad, type_ad2, actif, date_reactivation, specialite, zoneexercice, info, logiciel, secretaire, assistante, modeexercice,
ndiplomes, qualifications, nanneediplome, paysdiplome, nactivite, ninterets, nass, zones, UE, EUROP, AMERIN, CARAIB, MAGHREB, AFRIQ, ASIE, AMERIS, OCEANIE, remarques, panoramique, rvg, autre_dept,
ip, datetime, confidentialite)
 VALUES ('$id_membre', '$type_ad', '$type_ad2', '$nactif', '$datetime', '$nspecialite', '$nzoneexercice', '$ninfo', '$nlogiciel', '$nsecretaire', '$nassistante', '$nmodeexercice',
'$ndiplomes', '$qualifications', '$nanneediplome', '$paysdiplome', '$nactivite', '$ninterets', '$nass', '$nzones', '$lue', '$leurope', '$lamerin', '$lcaraib', '$lmaghreb', '$lafriq', '$lasie', '$lameris',
'$loceanie', '$nremarques', '$npanoramique', '$nrvg', '$nautre_dept', '$ip', '$datetime', '$nconfidentialite')";

echo'<span class="important">Votre profil a &eacute;t&eacute; enregistr&eacute;.</span><br />';

}

else {
 $req="UPDATE $table_ad SET type_ad='$type_ad', type_ad2='$type_ad2', actif='$nactif', date_reactivation='$datetime', specialite='$nspecialite', zoneexercice='$nzoneexercice', info='$ninfo',
     logiciel='$nlogiciel', secretaire='$nsecretaire', assistante='$nassistante', modeexercice='$nmodeexercice',
     ndiplomes='$ndiplomes', qualifications='$qualifications', nanneediplome='$nanneediplome', paysdiplome='$paysdiplome', nactivite='$nactivite', ninterets='$ninterets', nass='$nass', zones='$nzones', UE='$lue', EUROP='$leurope',
     AMERIN='$lamerin', CARAIB='$lcaraib', MAGHREB='$lmaghreb', AFRIQ='$lafriq', ASIE='$lasie',
     AMERIS='$lameris', OCEANIE='$loceanie', remarques='$nremarques', panoramique='$npanoramique', rvg='$nrvg',
     autre_dept='$nautre_dept', ip='$ip', datetime='$datetime', confidentialite='$nconfidentialite' WHERE id_ad='$id_membre'";

     echo' <span class="important">'.$txt_ok_modif.'</span><br />';

     };





      $res=mysql_query($req);

         $connect=1;



        $post="inscription";


    } // fin enregistrement bdd

  } // fin du traitement et de l'insertion

} // fin de l'action 'continuer'


















$res3=mysql_query("SELECT * FROM $table_ad WHERE id_ad='$id_membre'");
$row3=mysql_fetch_array($res3);
$nbr3 = mysql_num_rows($res3);

// SI PROFIL DE ad NON RENSEIGNE

if ($type_ad=="4") { $texte_profil_Non_Renseigne = $txt_CVNonRens;}
elseif ($type_ad=="1" || $type_ad=="2" || $type_ad=="5" || $type_ad=="8" || $type_ad=="9"){  $texte_profil_Non_Renseigne = $txt_FCNonRens;}
 else {};


if ($nbr3 == 0) {echo '

<table><tr><td valign="top"><img src="images/error_32.png" border="1" width="32" height="32" /></td>
<td><div class="important"><strong>'.$texte_profil_Non_Renseigne.'</strong></div><br /></td></tr>
</fieldset>
</td></tr>
</table><br /> ';

}


 if (($row['type']=="1")||($row['type']=="2")||($row['type']=="3")) { echo '
 
          <font class="XLdr">'.$txt_inscr_03.'</font>
          <select name="type_ad">
          <option value="1" ';if ($type_ad=="1") echo 'selected'; echo' >'.$txt_Mbre_01.'</option>
          <option value="2" ';if ($type_ad=="2") echo 'selected'; echo' >'.$txt_Mbre_02.'</option>
          <option value="3" ';if ($type_ad=="3") echo 'selected'; echo' >'.$txt_Mbre_03.'</option>
          </select>';
                                                                      }


elseif ($row['type']=="4")

     {  echo '<br />
<FORM action="index.php?cat=compte&amp;incl=modif_ad" method="post" style="position: relative; top :-15px;" />
<font class="XLdr">'.$txt_NivEtude.'</font>   
       <select name="type_ad2" onchange=this.form.submit() >
          <option value="">... Faites un choix svp...</option>
          <option value="1" ';if ($type_ad2=="1") echo 'selected'; echo' >'.$txt_Ass_01.'</option>
          <option value="2" ';if ($type_ad2=="2") echo 'selected'; echo' >'.$txt_Ass_02.'</option>
          <option value="3" ';if ($type_ad2=="3") echo 'selected'; echo' >'.$txt_Ass_03.'</option>
          <option value="4" ';if ($type_ad2=="4") echo 'selected'; echo' >'.$txt_Ass_04.'</option>
          <option value="5" ';if ($type_ad2=="5") echo 'selected'; echo' >'.$txt_Ass_05.'</option>
        </select>
<input type="hidden" name="type_ad" value="'.$type_ad.'" />
</FORM>';
     
   }

   
   else {  echo ' <font class="XLdr">'.$txt_inscr_03.'</font>
                  <select name="type_ad">';
     
          if ($row['type']=="5") echo '<option value="5" selected>'.$txt_Mbre_05.'</option>';
          if ($row['type']=="6") echo '<option value="6" selected>'.$txt_Mbre_06.'</option>';
          if ($row['type']=="7") echo '<option value="7" selected>'.$txt_Mbre_07.'</option>';
          if ($row['type']=="8") echo '<option value="8" selected>'.$txt_Mbre_08.'</option>';
          if ($row['type']=="9") echo '<option value="9" selected>'.$txt_Mbre_09.'</option>';
      
      echo '</select>';

        };

echo '

<FORM action="index.php?cat=compte&amp;incl=modif_ad" method="post" enctype="multipart/form-data">   ';

if (($type_ad=="4")&&(isset($type_ad2)))  {         // ASSISTANTE + type d'assistante renseigné

echo '<font class="XLdr">'.$fiche_renseignee.'<br /><br />
<strong>'.$txt_CV.'</strong><br />
'.$txt_CV_01.'</font><br />
<br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>Activation / desactivation du compte ?</strong></font></legend>
<table width="100%" border="0" cellspacing="0">'.$txt_CVexplic.'<br /><br />
<table id="Formulaire_ad2" width="100%" border="0" cellspacing="0">


        <tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4"><strong>'.$txt_CVVisible.'</strong><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left">
<font color=FF0000>'.$txt_CVActDesac.'</font></td>
       <td colspan="3">
              <input type="radio" value="2" name="nactif" '; if ($nactif=="2") echo 'checked="checked"'; echo ' />'.$txt_actif.'
              <input type="radio" value="1" name="nactif" '; if ($nactif=="1") echo 'checked="checked"'; echo ' />'.$txt_inactif.'&nbsp;

<img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'info3\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'info3\').style.visibility=\'hidden\'"/>

<div id="info3" style="visibility: hidden; width: 250px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>- IMPORTANT -</b></div>
Vous d&eacute;sactivez votre profil : vous n\'apparaissez plus sur le site, mais
vous concervez cependant votre compte sur Dentiste-Remplacant.com<br>
et vous pouvez r&eacute;activer votre profil &agrave; tout moment.Ceci peut &ecirc;tre
utile si vous avez d&eacute;j&agrave; un contrat de collaboration et que vous
ne souhaitez pas &ecirc;tre harcel&eacute; au t&eacute;l&eacute;phone par d\'autres
propositions<br>
d\'emploi.
 </div>
</td></tr>
</table>
</fieldset>
<br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_anonym01.'</strong></font></legend>
<table width="100%" border="0" cellspacing="0">

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">'.$txt_anonym02.'<br/><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left"><strong>'.$txt_anonym03.'</strong></td>
       <td colspan="3">
              <input type="radio" value="1" name="nconfidentialite" '; if ($nconfidentialite =="1") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt1.' &nbsp;<br />
              <input type="radio" value="2" name="nconfidentialite" '; if ($nconfidentialite =="2") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt2.' &nbsp;<br />
              <input type="radio" value="3" name="nconfidentialite" '; if ($nconfidentialite =="3") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt3.'
</td></tr>
</table>
</fieldset>
<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_insPhotoId.'</strong></font></legend>

<table width="100%" border="0" cellspacing="0">
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">'.$txt_img_limit.'</td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left">
&nbsp; </td>
       <td colspan="3">';



if (file_exists("$dest_dossier_ad/$id_membre.jpg"))

            {

              $imagette = "$adresse_site1/photos/photos_ad/$id_membre.jpg";
              imagette ($imagette,150) ; echo '<br /><input type="checkbox" name="effaceimg" value="1"> '.$txt_eff_Img.'
              <br /><br />'.$txt_eff_Img2.'<br /><br /> ';
            };



echo '
<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
                      <p><label for="photo">'.$txt_photo.' :</label><input type="file" name="photo" /></p>
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
</table>
</fieldset>

<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_CV_02.'</strong></font></legend>
<table width="100%" border="0" cellspacing="0">
<tr bgcolor="#'.$C_fond_Tclair.'">
       <td colspan="5" bgcolor="#'.$C_fond_Tclair.'">'.$txt_CV_03.'
</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_Diplomes.' </div></td>
    <td colspan="3"><textarea rows="4" name="ndiplomes" cols="30" maxlength="255";>'.$ndiplomes.'</textarea>
</td></tr>';

 if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3")) {

echo'
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_DateDiplome.'</div></td>
    <td colspan="3"><input type="text" name="nanneediplome" value="'.$nanneediplome.'" maxlength="4" '.$numeric.' /></td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_PaysDiplome.'</div></td>
    <td colspan="3"><input type="text" name="paysdiplome" value="'.$paysdiplome.'" maxlength="50" /></td></tr>
    <tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>';
  };    


 if (($type_ad2=="1")||($type_ad2=="2")) {

echo '
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_QualifSpec.'</div></td>
    <td colspan="3"><textarea rows="2" name="qualifications" cols="30" maxlength="255";>'.$qualifications.'</textarea></td></tr> ';

  };


echo '

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_Activite.' </div></td>
    <td colspan="3"><textarea rows="2" name="nactivite" cols="30" maxlength="255";>'.$nactivite.'</textarea>
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%"><div align="left">&nbsp; '.$txt_Interets.' </div></td>
    <td colspan="3"><textarea rows="2" name="ninterets" cols="30" maxlength="255";>'.$ninterets.'</textarea>
</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_lettreMotiv.'</div></td>
    <td colspan="3"><textarea rows="6" name="nremarques" rows="15" cols="40">'.$nremarques.'</textarea>
</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>

<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_competences .'</div></td>
    <td colspan="3">';


 if (($type_ad2=="1")||($type_ad2=="2")) {

echo '
<input type="checkbox" value="01" name="nass01" '; if (ereg ("01",$nass )) echo 'checked'; echo '>'.$txt_compet01.'<br />
<input type="checkbox" value="02" name="nass02" '; if (ereg ("02",$nass )) echo 'checked'; echo '>'.$txt_compet02.'<br />
<input type="checkbox" value="03" name="nass03" '; if (ereg ("03",$nass )) echo 'checked'; echo '>'.$txt_compet03.'<br />
<input type="checkbox" value="04" name="nass04" '; if (ereg ("04",$nass )) echo 'checked'; echo '>'.$txt_compet04.'<br />
<input type="checkbox" value="05" name="nass05" '; if (ereg ("05",$nass )) echo 'checked'; echo '>'.$txt_compet05.'<br />
<input type="checkbox" value="06" name="nass06" '; if (ereg ("06",$nass )) echo 'checked'; echo '>'.$txt_compet06.'<br />
';
 };


 if (($type_ad2=="1")||($type_ad2=="2")||($type_ad2=="3")) {

echo '
<input type="checkbox" value="07" name="nass07" '; if (ereg ("07",$nass )) echo 'checked'; echo '>'.$txt_compet07.'<br />
<input type="checkbox" value="08" name="nass08" '; if (ereg ("08",$nass )) echo 'checked'; echo '>'.$txt_compet08.'<br />
<input type="checkbox" value="09" name="nass09" '; if (ereg ("09",$nass )) echo 'checked'; echo '>'.$txt_compet09.'<br />
<input type="checkbox" value="10" name="nass10" '; if (ereg ("10",$nass )) echo 'checked'; echo '>'.$txt_compet10.'<br />
<input type="checkbox" value="11" name="nass11" '; if (ereg ("11",$nass )) echo 'checked'; echo '>'.$txt_compet11.'<br />
<input type="checkbox" value="12" name="nass12" '; if (ereg ("12",$nass )) echo 'checked'; echo '>'.$txt_compet12.'<br />
<input type="checkbox" value="13" name="nass13" '; if (ereg ("13",$nass )) echo 'checked'; echo '>'.$txt_compet13.'<br />
<input type="checkbox" value="14" name="nass14" '; if (ereg ("14",$nass )) echo 'checked'; echo '>'.$txt_compet14.'<br />
<input type="checkbox" value="15" name="nass15" '; if (ereg ("15",$nass )) echo 'checked'; echo '>'.$txt_compet15.'<br />
<input type="checkbox" value="16" name="nass16" '; if (ereg ("16",$nass )) echo 'checked'; echo '>'.$txt_compet16.'<br />
';
 };



 if ($type_ad2=="4") {

echo '

<input type="checkbox" value="10" name="nass10" '; if (ereg ("10",$nass )) echo 'checked'; echo '>'.$txt_compet10.'<br />
<input type="checkbox" value="12" name="nass12" '; if (ereg ("12",$nass )) echo 'checked'; echo '>'.$txt_compet12.'<br />
<input type="checkbox" value="13" name="nass13" '; if (ereg ("13",$nass )) echo 'checked'; echo '>'.$txt_compet13.'<br />
<input type="checkbox" value="14" name="nass14" '; if (ereg ("14",$nass )) echo 'checked'; echo '>'.$txt_compet14.'<br />
<input type="checkbox" value="15" name="nass15" '; if (ereg ("15",$nass )) echo 'checked'; echo '>'.$txt_compet15.'<br />
<input type="checkbox" value="16" name="nass16" '; if (ereg ("16",$nass )) echo 'checked'; echo '>'.$txt_compet16.'<br />
';
 };


echo '
</td></tr>
</table>
</fieldset>
<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_Zones_titre.'</strong></font></legend>
<table width="100%" border="0" cellspacing="0">

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'">
       <td colspan="5" bgcolor="#'.$C_fond_Tclair.'">'.$txt_Zone_00;

if ($pays == "France") { echo ' '.$txt_Zone_01.' ('.$region.'), '.$txt_Zone_02.' ('.$departement.')';   }
else { echo ' pays ('.$pays.')'; };





echo ' . '.$txt_Zone_03; if ($pays == "France") { echo $txt_Zone_04;};

 echo ' '.$txt_Zone_05.' </td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
';



if ($pays == "France") { echo '   <tr bgcolor="#'.$C_fond_Tclair.'">
                                  <td width="36%" align="left" height="22">&nbsp; '.$txt_Zone_06 .'
                                  </td>
                                  <td colspan="3" height="22" bgcolor="#'.$C_fond_Tclair.'">
       	                          <input type="texte" name="nautre_dept" value='.$nautre_dept.' ><br />
       	                         '.$txt_Zone_07.' <br />
                                  </td>
                                  </tr>
                                  <tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>   ';
                           };

echo $txt_Zone_DOMTOM.'
<tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left" height="22">&nbsp; '.$txt_Zone_08.'</td> <td colspan="3" height="22" bgcolor="#'.$C_fond_Tclair.'">

<input type="checkbox" name="UE" value="1" onclick="javascript:afficherjs(\'pays_ue\')" '; if (ereg ("1",$nzones )) echo 'checked'; echo '/> '.$txt_UE.' <br />
<input type="checkbox" name="EUROP" value="2" onclick="javascript:afficherjs(\'pays_europe\')" '; if (ereg ("2",$nzones )) echo 'checked'; echo '/> '.$txt_EUROP.' <br />
<input type="checkbox" name="AMERIN" value="3" onclick="javascript:afficherjs(\'pays_amerin\')" '; if (ereg ("3",$nzones )) echo 'checked'; echo '/> '.$txt_AMERIN.' <br />
<input type="checkbox" name="CARAIB" value="4" onclick="javascript:afficherjs(\'pays_caraib\')" '; if (ereg ("4",$nzones )) echo 'checked'; echo '/> '.$txt_CARAIB.' <br />
<input type="checkbox" name="MAGHREB" value="5" onclick="javascript:afficherjs(\'pays_maghreb\')" '; if (ereg ("5",$nzones )) echo 'checked'; echo '/> '.$txt_MAGHREB.' <br />
<input type="checkbox" name="AFRIQ" value="6" onclick="javascript:afficherjs(\'pays_afriq\')" '; if (ereg ("6",$nzones )) echo 'checked'; echo '/> '.$txt_AFRIQ.' <br />
<input type="checkbox" name="ASIE" value="7" onclick="javascript:afficherjs(\'pays_asie\')" '; if (ereg ("7",$nzones )) echo 'checked'; echo '/> '.$txt_ASIE.' <br />
<input type="checkbox" name="AMERIS" value="8" onclick="javascript:afficherjs(\'pays_ameris\')" '; if (ereg ("8",$nzones )) echo 'checked'; echo '/> '.$txt_AMERIS.' <br />
<input type="checkbox" name="OCEANIE" value="9" onclick="javascript:afficherjs(\'pays_oceanie\')" '; if (ereg ("9",$nzones )) echo 'checked'; echo '/> '.$txt_OCEANIE.' <br />




       </td>
    </tr>

<tr bgcolor="#'.$C_fond_Tclair.'" ><td colspan=4>
<table width=100%><tr><td colspan=3>'.$txt_Zone_09.'</td></tr>
<tr>
<td width=33% id="pays_ue" name="pays_ue" style="display:'; if (ereg ("1",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_UE.' : </br>
<select multiple size=4 name="liste_ue[]">
          <option value="ue01"'; if (ereg ("01",$lue)) echo 'selected'; echo '>Allemagne</option>
          <option value="ue02"'; if (ereg ("02",$lue)) echo 'selected'; echo '>Autriche</option>
          <option value="ue03"'; if (ereg ("03",$lue)) echo 'selected'; echo '>Belgique</option>
          <option value="ue04"'; if (ereg ("04",$lue)) echo 'selected'; echo '>Chypre</option>
          <option value="ue05"'; if (ereg ("05",$lue)) echo 'selected'; echo '>Danemark</option>
          <option value="ue06"'; if (ereg ("06",$lue)) echo 'selected'; echo '>Espagne</option>
          <option value="ue07"'; if (ereg ("07",$lue)) echo 'selected'; echo '>Estonie</option>
          <option value="ue08"'; if (ereg ("08",$lue)) echo 'selected'; echo '>France</option>
          <option value="ue09"'; if (ereg ("09",$lue)) echo 'selected'; echo '>Finlande</option>
          <option value="ue10"'; if (ereg ("10",$lue)) echo 'selected'; echo '>Grece</option>
          <option value="ue11"'; if (ereg ("11",$lue)) echo 'selected'; echo '>Hongrie</option>
          <option value="ue12"'; if (ereg ("12",$lue)) echo 'selected'; echo '>Irlande</option>
          <option value="ue13"'; if (ereg ("13",$lue)) echo 'selected'; echo '>Italie</option>
          <option value="ue14"'; if (ereg ("14",$lue)) echo 'selected'; echo '>L&eacute;thonie</option>
          <option value="ue15"'; if (ereg ("15",$lue)) echo 'selected'; echo '>Lithuanie</option>
          <option value="ue16"'; if (ereg ("16",$lue)) echo 'selected'; echo '>Luxembourg</option>
          <option value="ue17"'; if (ereg ("17",$lue)) echo 'selected'; echo '>Malte</option>
          <option value="ue18"'; if (ereg ("18",$lue)) echo 'selected'; echo '>Pays Bas</option>
          <option value="ue19"'; if (ereg ("19",$lue)) echo 'selected'; echo '>Pologne</option>
          <option value="ue20"'; if (ereg ("20",$lue)) echo 'selected'; echo '>Portugal</option>
          <option value="ue21"'; if (ereg ("21",$lue)) echo 'selected'; echo '>R&eacute;p. Tcheque</option>
          <option value="ue22"'; if (ereg ("22",$lue)) echo 'selected'; echo '>Royaume Uni</option>
          <option value="ue23"'; if (ereg ("23",$lue)) echo 'selected'; echo '>Slovaquie</option>
          <option value="ue24"'; if (ereg ("24",$lue)) echo 'selected'; echo '>Slovenie</option>
          <option value="ue25"'; if (ereg ("25",$lue)) echo 'selected'; echo '>Suede</option>
</select>
 &nbsp; </td>
 
<td width=33% id="pays_europe" name="pays_europe" style="display:'; if (ereg ("2",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_EUROP.' : <br />
<select multiple size=4 name="liste_europe[]">
          <option value="eu01"'; if (ereg ("01",$leurope)) echo 'selected'; echo '>Albanie</option>
          <option value="eu02"'; if (ereg ("02",$leurope)) echo 'selected'; echo '>Andore</option>
          <option value="eu03"'; if (ereg ("03",$leurope)) echo 'selected'; echo '>Bi&eacute;lorussie</option>
          <option value="eu04"'; if (ereg ("04",$leurope)) echo 'selected'; echo '>Bosnie-Herz&eacute;govine</option>
          <option value="eu05"'; if (ereg ("05",$leurope)) echo 'selected'; echo '>Bulgarie</option>
          <option value="eu06"'; if (ereg ("06",$leurope)) echo 'selected'; echo '>Croatie</option>
          <option value="eu07"'; if (ereg ("07",$leurope)) echo 'selected'; echo '>Gibraltar</option>
          <option value="eu08"'; if (ereg ("08",$leurope)) echo 'selected'; echo '>Groenland</option>
          <option value="eu09"'; if (ereg ("09",$leurope)) echo 'selected'; echo '>Islande</option>
          <option value="eu10"'; if (ereg ("10",$leurope)) echo 'selected'; echo '>Iles Faro&eacute;</option>
          <option value="eu11"'; if (ereg ("11",$leurope)) echo 'selected'; echo '>Liechtenstein</option>
          <option value="eu12"'; if (ereg ("12",$leurope)) echo 'selected'; echo '>Mac&eacute;doine</option>
          <option value="eu13"'; if (ereg ("13",$leurope)) echo 'selected'; echo '>Moldavie</option>
          <option value="eu14"'; if (ereg ("14",$leurope)) echo 'selected'; echo '>Monaco</option>
          <option value="eu15"'; if (ereg ("15",$leurope)) echo 'selected'; echo '>Norvège</option>
          <option value="eu16"'; if (ereg ("16",$leurope)) echo 'selected'; echo '>Roumanie</option>
          <option value="eu17"'; if (ereg ("17",$leurope)) echo 'selected'; echo '>Russie</option>
          <option value="eu18"'; if (ereg ("18",$leurope)) echo 'selected'; echo '>Saint Marin</option>
          <option value="eu19"'; if (ereg ("19",$leurope)) echo 'selected'; echo '>Serbie et Mont&eacute;n&eacute;gro</option>
          <option value="eu20"'; if (ereg ("20",$leurope)) echo 'selected'; echo '>Suisse</option>
          <option value="eu21"'; if (ereg ("21",$leurope)) echo 'selected'; echo '>Ukraine</option>
</select>
 &nbsp; </td>

<td width=34% id="pays_amerin" name="pays_amerin" style="display:'; if (ereg ("3",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_AMERIN.'  : <br />
<select multiple size=4 name="liste_amerin[]">
        <option value="an01"'; if (ereg ("01",$lamerin)) echo 'selected'; echo '>Canada</option>
        <option value="an02"'; if (ereg ("02",$lamerin)) echo 'selected'; echo '>Etats-Unis d\'Am&eacute;rique</option>
        <option value="an03"'; if (ereg ("03",$lamerin)) echo 'selected'; echo '>Mexique</option>
        <option value="an04"'; if (ereg ("04",$lamerin)) echo 'selected'; echo '>Saint-Pierre-et-Miquelon</option>
</select>
 &nbsp; </td>

</tr>

<tr>

<td width=33% id="pays_caraib" name="pays_caraib" style="display:'; if (ereg ("4",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_CARAIB.' : <br />
<select multiple size=4 name="liste_caraib[]">
          <option value="ca01"'; if (ereg ("01",$lcaraib)) echo 'selected'; echo '>Anguilla</option>
          <option value="ca02"'; if (ereg ("02",$lcaraib)) echo 'selected'; echo '>Antigua et Barbuda</option>
          <option value="ca03"'; if (ereg ("03",$lcaraib)) echo 'selected'; echo '>Antilles</option>
          <option value="ca04"'; if (ereg ("04",$lcaraib)) echo 'selected'; echo '>Aruba</option>
          <option value="ca05"'; if (ereg ("05",$lcaraib)) echo 'selected'; echo '>Bahamas</option>
          <option value="ca06"'; if (ereg ("06",$lcaraib)) echo 'selected'; echo '>Barbade</option>
          <option value="ca07"'; if (ereg ("07",$lcaraib)) echo 'selected'; echo '>Bermudes</option>
          <option value="ca08"'; if (ereg ("08",$lcaraib)) echo 'selected'; echo '>Cuba</option>
          <option value="ca09"'; if (ereg ("09",$lcaraib)) echo 'selected'; echo '>Dominique</option>
          <option value="ca10"'; if (ereg ("10",$lcaraib)) echo 'selected'; echo '>Grenade</option>
          <option value="ca11"'; if (ereg ("11",$lcaraib)) echo 'selected'; echo '>Guadeloupe</option>
          <option value="ca12"'; if (ereg ("12",$lcaraib)) echo 'selected'; echo '>Haiti</option>
          <option value="ca13"'; if (ereg ("13",$lcaraib)) echo 'selected'; echo '>Iles Caïman</option>
          <option value="ca14"'; if (ereg ("14",$lcaraib)) echo 'selected'; echo '>Iles Turks and Caiques</option>
          <option value="ca15"'; if (ereg ("15",$lcaraib)) echo 'selected'; echo '>Iles Vierges Britaniques</option>
          <option value="ca16"'; if (ereg ("16",$lcaraib)) echo 'selected'; echo '>Iles Vierges US</option>
          <option value="ca17"'; if (ereg ("17",$lcaraib)) echo 'selected'; echo '>Jamaïque</option>
          <option value="ca18"'; if (ereg ("18",$lcaraib)) echo 'selected'; echo '>Martinique</option>
          <option value="ca19"'; if (ereg ("19",$lcaraib)) echo 'selected'; echo '>Montserrat</option>
          <option value="ca20"'; if (ereg ("20",$lcaraib)) echo 'selected'; echo '>Porto Rico</option>
          <option value="ca22"'; if (ereg ("22",$lcaraib)) echo 'selected'; echo '>R&eacute;p. Dominicaine</option>
          <option value="ca24"'; if (ereg ("24",$lcaraib)) echo 'selected'; echo '>Saint-Christophe-et-Ni&eacute;vès</option>
          <option value="ca25"'; if (ereg ("25",$lcaraib)) echo 'selected'; echo '>St. Lucie</option>
          <option value="ca26"'; if (ereg ("26",$lcaraib)) echo 'selected'; echo '>St. Vincent et Les Grenadines</option>
          <option value="ca27"'; if (ereg ("27",$lcaraib)) echo 'selected'; echo '>Trinit&eacute; et Tobago</option>

</select>
 &nbsp; </td>

<td width=33% id="pays_maghreb" name="pays_maghreb" style="display:'; if (ereg ("5",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_MAGHREB.' : <br />
<select multiple size=4 name="liste_maghreb[]">
  <option value="ma01"'; if (ereg ("01",$lmaghreb)) echo 'selected'; echo '>Alg&eacute;rie</option>
  <option value="ma02"'; if (ereg ("02",$lmaghreb)) echo 'selected'; echo '>Maroc</option>
  <option value="ma03"'; if (ereg ("03",$lmaghreb)) echo 'selected'; echo '>Tunisie</option>
</select>
 &nbsp; </td>

<td width=34% id="pays_afriq" name="pays_afriq" style="display:'; if (ereg ("6",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_AFRIQ.' : <br />
<select multiple size=4 name="liste_afriq[]">
          <option value="af01"'; if (ereg ("01",$lafriq)) echo 'selected'; echo '>Afrique du Sud</option>
          <option value="af02"'; if (ereg ("02",$lafriq)) echo 'selected'; echo '>Angola</option>
          <option value="af03"'; if (ereg ("03",$lafriq)) echo 'selected'; echo '>B&eacute;nin</option>
          <option value="af04"'; if (ereg ("04",$lafriq)) echo 'selected'; echo '>Botswana</option>
          <option value="af05"'; if (ereg ("05",$lafriq)) echo 'selected'; echo '>Burkina Faso</option>
          <option value="af06"'; if (ereg ("06",$lafriq)) echo 'selected'; echo '>Burundi</option>
          <option value="af07"'; if (ereg ("07",$lafriq)) echo 'selected'; echo '>Cameroun</option>
          <option value="af08"'; if (ereg ("08",$lafriq)) echo 'selected'; echo '>Congo (RD)</option>
          <option value="af09"'; if (ereg ("09",$lafriq)) echo 'selected'; echo '>Congo</option>
          <option value="af10"'; if (ereg ("10",$lafriq)) echo 'selected'; echo '>Côte d\'Ivoire</option>
          <option value="af11"'; if (ereg ("11",$lafriq)) echo 'selected'; echo '>Djibouti</option>
          <option value="af12"'; if (ereg ("12",$lafriq)) echo 'selected'; echo '>Egypte</option>
          <option value="af13"'; if (ereg ("13",$lafriq)) echo 'selected'; echo '>Erythr&eacute;e</option>
          <option value="af14"'; if (ereg ("14",$lafriq)) echo 'selected'; echo '>Ethiopie</option>
          <option value="af15"'; if (ereg ("15",$lafriq)) echo 'selected'; echo '>Gabon</option>
          <option value="af16"'; if (ereg ("16",$lafriq)) echo 'selected'; echo '>Gambie</option>
          <option value="af17"'; if (ereg ("17",$lafriq)) echo 'selected'; echo '>Ghana</option>
          <option value="af18"'; if (ereg ("18",$lafriq)) echo 'selected'; echo '>Guin&eacute;e</option>
          <option value="af19"'; if (ereg ("19",$lafriq)) echo 'selected'; echo '>Guin&eacute;e Equatoriale</option>
          <option value="af20"'; if (ereg ("20",$lafriq)) echo 'selected'; echo '>Guin&eacute;e-Bissau</option>
          <option value="af21"'; if (ereg ("21",$lafriq)) echo 'selected'; echo '>Ile de la R&eacute;union</option>
          <option value="af22"'; if (ereg ("22",$lafriq)) echo 'selected'; echo '>Iles du Cap Vert</option>
          <option value="af23"'; if (ereg ("23",$lafriq)) echo 'selected'; echo '>Kenya</option>
          <option value="af24"'; if (ereg ("24",$lafriq)) echo 'selected'; echo '>Lesotho</option>
          <option value="af25"'; if (ereg ("25",$lafriq)) echo 'selected'; echo '>Liberia</option>
          <option value="af26"'; if (ereg ("26",$lafriq)) echo 'selected'; echo '>Libye</option>
          <option value="af27"'; if (ereg ("27",$lafriq)) echo 'selected'; echo '>Madagascar</option>
          <option value="af28"'; if (ereg ("28",$lafriq)) echo 'selected'; echo '>Malawi</option>
          <option value="af29"'; if (ereg ("29",$lafriq)) echo 'selected'; echo '>Mali</option>
          <option value="af30"'; if (ereg ("30",$lafriq)) echo 'selected'; echo '>Maurice</option>
          <option value="af31"'; if (ereg ("31",$lafriq)) echo 'selected'; echo '>Mauritanie</option>
          <option value="af32"'; if (ereg ("32",$lafriq)) echo 'selected'; echo '>Mozambique</option>
          <option value="af33"'; if (ereg ("33",$lafriq)) echo 'selected'; echo '>Namibie</option>
          <option value="af34"'; if (ereg ("34",$lafriq)) echo 'selected'; echo '>Niger</option>
          <option value="af35"'; if (ereg ("35",$lafriq)) echo 'selected'; echo '>Nigeria</option>
          <option value="af36"'; if (ereg ("36",$lafriq)) echo 'selected'; echo '>Ouganda</option>
          <option value="af37"'; if (ereg ("37",$lafriq)) echo 'selected'; echo '>R&eacute;p. Centre-Africaine</option>
          <option value="af38"'; if (ereg ("38",$lafriq)) echo 'selected'; echo '>Rwanda</option>
          <option value="af39"'; if (ereg ("39",$lafriq)) echo 'selected'; echo '>Sao Tom&eacute; et Principe</option>
          <option value="af40"'; if (ereg ("40",$lafriq)) echo 'selected'; echo '>S&eacute;n&eacute;gal</option>
          <option value="af41"'; if (ereg ("41",$lafriq)) echo 'selected'; echo '>Seychelles</option>
          <option value="af42"'; if (ereg ("42",$lafriq)) echo 'selected'; echo '>Sierra Leone</option>
           <option value="af43"'; if (ereg ("43",$lafriq)) echo 'selected'; echo '>Somalie</option>
           <option value="af44"'; if (ereg ("44",$lafriq)) echo 'selected'; echo '>Soudan</option>
           <option value="af45"'; if (ereg ("45",$lafriq)) echo 'selected'; echo '>Swaziland</option>
          <option value="af46"'; if (ereg ("46",$lafriq)) echo 'selected'; echo '>Tanzanie</option>
          <option value="af47"'; if (ereg ("47",$lafriq)) echo 'selected'; echo '>Tchad</option>
          <option value="af48"'; if (ereg ("48",$lafriq)) echo 'selected'; echo '>Togo</option>
          <option value="af49"'; if (ereg ("49",$lafriq)) echo 'selected'; echo '>Zambie</option>
          <option value="af50"'; if (ereg ("50",$lafriq)) echo 'selected'; echo '>Zimbabwe</option>

</select>
 &nbsp; </td>


 <tr>
<td width=33% id="pays_asie" name="pays_asie" style="display:'; if (ereg ("7",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_ASIE.' : </br>
<select multiple size=4 name="liste_asie[]">
          <option value="a01"'; if (ereg ("01",$lasie)) echo 'selected'; echo '>Afghanistan</option>
          <option value="a02"'; if (ereg ("02",$lasie)) echo 'selected'; echo '>Arabie Saoudite</option>
          <option value="a03"'; if (ereg ("03",$lasie)) echo 'selected'; echo '>Arm&eacute;nie</option>
          <option value="a04"'; if (ereg ("04",$lasie)) echo 'selected'; echo '>Azerbaïdjan</option>
          <option value="a05"'; if (ereg ("05",$lasie)) echo 'selected'; echo '>Bahrain</option>
          <option value="a06"'; if (ereg ("06",$lasie)) echo 'selected'; echo '>Bangladesh</option>
          <option value="a07"'; if (ereg ("07",$lasie)) echo 'selected'; echo '>Birmanie</option>
          <option value="a48"'; if (ereg ("48",$lasie)) echo 'selected'; echo '>Bhoutan</option>
          <option value="a08"'; if (ereg ("08",$lasie)) echo 'selected'; echo '>Brunei</option>
          <option value="a09"'; if (ereg ("09",$lasie)) echo 'selected'; echo '>Cambodge</option>
          <option value="a10"'; if (ereg ("10",$lasie)) echo 'selected'; echo '>Chine (RP)</option>
          <option value="a11"'; if (ereg ("11",$lasie)) echo 'selected'; echo '>Cor&eacute;e (Nord)</option>
          <option value="a12"'; if (ereg ("12",$lasie)) echo 'selected'; echo '>Cor&eacute;e (Sud)</option>
          <option value="a13"'; if (ereg ("13",$lasie)) echo 'selected'; echo '>Emirats Arabes Unis</option>
          <option value="a14"'; if (ereg ("14",$lasie)) echo 'selected'; echo '>G&eacute;orgie</option>
          <option value="a15"'; if (ereg ("15",$lasie)) echo 'selected'; echo '>Hong Kong</option>
          <option value="a16"'; if (ereg ("16",$lasie)) echo 'selected'; echo '>Inde</option>
          <option value="a17"'; if (ereg ("17",$lasie)) echo 'selected'; echo '>Indon&eacute;sie</option>
          <option value="a18"'; if (ereg ("18",$lasie)) echo 'selected'; echo '>Iran</option>
          <option value="a19"'; if (ereg ("19",$lasie)) echo 'selected'; echo '>Irak</option>
          <option value="a20"'; if (ereg ("20",$lasie)) echo 'selected'; echo '>Israel</option>
          <option value="a21"'; if (ereg ("21",$lasie)) echo 'selected'; echo '>Japon</option>
          <option value="a22"'; if (ereg ("22",$lasie)) echo 'selected'; echo '>Jordanie</option>
          <option value="a23"'; if (ereg ("23",$lasie)) echo 'selected'; echo '>Kazakhstan</option>
          <option value="a24"'; if (ereg ("24",$lasie)) echo 'selected'; echo '>Kirghizistan</option>
          <option value="a25"'; if (ereg ("25",$lasie)) echo 'selected'; echo '>Koweit</option>
          <option value="a26"'; if (ereg ("26",$lasie)) echo 'selected'; echo '>Laos</option>
          <option value="a27"'; if (ereg ("27",$lasie)) echo 'selected'; echo '>Liban</option>
          <option value="a28"'; if (ereg ("28",$lasie)) echo 'selected'; echo '>Macao</option>
          <option value="a29"'; if (ereg ("29",$lasie)) echo 'selected'; echo '>Malaisie</option>
          <option value="a30"'; if (ereg ("30",$lasie)) echo 'selected'; echo '>Maldives</option>
          <option value="a31"'; if (ereg ("31",$lasie)) echo 'selected'; echo '>Mongolie</option>
          <option value="a32"'; if (ereg ("32",$lasie)) echo 'selected'; echo '>N&eacute;pal</option>
          <option value="a33"'; if (ereg ("33",$lasie)) echo 'selected'; echo '>Oman</option>
          <option value="a34"'; if (ereg ("34",$lasie)) echo 'selected'; echo '>Ouzbekistan</option>
          <option value="a35"'; if (ereg ("35",$lasie)) echo 'selected'; echo '>Pakistan</option>
          <option value="a36"'; if (ereg ("36",$lasie)) echo 'selected'; echo '>Singapour</option>
          <option value="a37"'; if (ereg ("37",$lasie)) echo 'selected'; echo '>Sri Lanka</option>
          <option value="a38"'; if (ereg ("38",$lasie)) echo 'selected'; echo '>Syrie</option>
          <option value="a39"'; if (ereg ("39",$lasie)) echo 'selected'; echo '>Tadjikistan</option>
          <option value="a40"'; if (ereg ("40",$lasie)) echo 'selected'; echo '>Taïwan</option>
          <option value="a41"'; if (ereg ("41",$lasie)) echo 'selected'; echo '>Thaïlande</option>
          <option value="a42"'; if (ereg ("42",$lasie)) echo 'selected'; echo '>Turkmenistan</option>
          <option value="a43"'; if (ereg ("43",$lasie)) echo 'selected'; echo '>Turquie</option>
          <option value="a44"'; if (ereg ("44",$lasie)) echo 'selected'; echo '>Vietnam</option>
          <option value="a45"'; if (ereg ("45",$lasie)) echo 'selected'; echo '>Y&eacute;men</option>
          <option value="a46"'; if (ereg ("46",$lasie)) echo 'selected'; echo '>Qatar</option>
          <option value="a47"'; if (ereg ("47",$lasie)) echo 'selected'; echo '>Philippines</option>

</select>
 &nbsp; </td>
 
<td width=33% id="pays_ameris" name="pays_ameris" style="display:'; if (ereg ("8",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_AMERIS.' : <br />
<select multiple size=4 name="liste_ameris[]">
          <option value="as01"'; if (ereg ("01",$lameris)) echo 'selected'; echo '>Argentine</option>
          <option value="as02"'; if (ereg ("02",$lameris)) echo 'selected'; echo '>B&eacute;lize</option>
          <option value="as03"'; if (ereg ("03",$lameris)) echo 'selected'; echo '>Bolivie</option>
          <option value="as04"'; if (ereg ("04",$lameris)) echo 'selected'; echo '>Br&eacute;sil</option>
          <option value="as05"'; if (ereg ("05",$lameris)) echo 'selected'; echo '>Chili</option>
          <option value="as06"'; if (ereg ("06",$lameris)) echo 'selected'; echo '>Colombie</option>
          <option value="as07"'; if (ereg ("07",$lameris)) echo 'selected'; echo '>Costa Rica</option>
          <option value="as08"'; if (ereg ("08",$lameris)) echo 'selected'; echo '>Equateur</option>
          <option value="as09"'; if (ereg ("09",$lameris)) echo 'selected'; echo '>Guat&eacute;mala</option>
          <option value="as10"'; if (ereg ("10",$lameris)) echo 'selected'; echo '>Guyane Française</option>
          <option value="as11"'; if (ereg ("11",$lameris)) echo 'selected'; echo '>Guyanne</option>
          <option value="as12"'; if (ereg ("12",$lameris)) echo 'selected'; echo '>Honduras</option>
          <option value="as13"'; if (ereg ("13",$lameris)) echo 'selected'; echo '>Iles Malouines</option>
          <option value="as14"'; if (ereg ("14",$lameris)) echo 'selected'; echo '>Nicaragua</option>
          <option value="as15"'; if (ereg ("15",$lameris)) echo 'selected'; echo '>Panama</option>
          <option value="as16"'; if (ereg ("16",$lameris)) echo 'selected'; echo '>Paraguay</option>
          <option value="as17"'; if (ereg ("17",$lameris)) echo 'selected'; echo '>P&eacute;rou</option>
          <option value="as18"'; if (ereg ("18",$lameris)) echo 'selected'; echo '>Salvador</option>
          <option value="as19"'; if (ereg ("19",$lameris)) echo 'selected'; echo '>Surinam</option>
          <option value="as20"'; if (ereg ("20",$lameris)) echo 'selected'; echo '>Uruguay</option>
          <option value="as21"'; if (ereg ("21",$lameris)) echo 'selected'; echo '>Venezuela</option>
</select>
 &nbsp; </td>

<td width=34% id="pays_oceanie" name="pays_oceanie" style="display:'; if (ereg ("9",$nzones )) {echo 'block';} else {echo 'none';}; echo '">
'.$txt_OCEANIE.'  : <br />
<select multiple size=4 name="liste_oceanie[]">
          <option value="oc01"'; if (ereg ("01",$loceanie)) echo 'selected'; echo '>Australie</option>
          <option value="oc02"'; if (ereg ("02",$loceanie)) echo 'selected'; echo '>Iles Cook</option>
          <option value="oc03"'; if (ereg ("03",$loceanie)) echo 'selected'; echo '>Iles Fiji</option>
          <option value="oc04"'; if (ereg ("04",$loceanie)) echo 'selected'; echo '>Iles Salomon</option>
          <option value="oc05"'; if (ereg ("05",$loceanie)) echo 'selected'; echo '>Iles Samoa</option>
          <option value="oc06"'; if (ereg ("06",$loceanie)) echo 'selected'; echo '>Nlle Z&eacute;lande</option>
          <option value="oc07"'; if (ereg ("07",$loceanie)) echo 'selected'; echo '>Nouvelle Cal&eacute;donie</option>
          <option value="oc08"'; if (ereg ("08",$loceanie)) echo 'selected'; echo '>Papouasie - Nvelle Guin&eacute;e</option>
          <option value="oc09"'; if (ereg ("09",$loceanie)) echo 'selected'; echo '>Polyn&eacute;sie française</option>
          <option value="oc10"'; if (ereg ("10",$loceanie)) echo 'selected'; echo '>Samoa Occidentale</option>
          <option value="oc11"'; if (ereg ("11",$loceanie)) echo 'selected'; echo '>Tonga</option>
          <option value="oc12"'; if (ereg ("12",$loceanie)) echo 'selected'; echo '>Vanuatu</option>
          <option value="oc13"'; if (ereg ("13",$loceanie)) echo 'selected'; echo '>Micron&eacute;sie</option>
          <option value="oc14"'; if (ereg ("14",$loceanie)) echo 'selected'; echo '>Palaos</option>
          <option value="oc15"'; if (ereg ("15",$loceanie)) echo 'selected'; echo '>Guam</option>
          <option value="oc16"'; if (ereg ("16",$loceanie)) echo 'selected'; echo '>Iles Mariannes du Nord</option>
          <option value="oc17"'; if (ereg ("17",$loceanie)) echo 'selected'; echo '>Marshall</option>
          <option value="oc18"'; if (ereg ("18",$loceanie)) echo 'selected'; echo '>Nauru</option>
          <option value="oc19"'; if (ereg ("19",$loceanie)) echo 'selected'; echo '>Wallis-et-Futuna</option>
          <option value="oc20"'; if (ereg ("20",$loceanie)) echo 'selected'; echo '>Tuvalu</option>
          <option value="oc21"'; if (ereg ("21",$loceanie)) echo 'selected'; echo '>Tokelau</option>
          <option value="oc22"'; if (ereg ("22",$loceanie)) echo 'selected'; echo '>Niue</option>
          <option value="oc23"'; if (ereg ("23",$loceanie)) echo 'selected'; echo '>Kiribati</option>
          <option value="oc24"'; if (ereg ("24",$loceanie)) echo 'selected'; echo '>Iles Pitcairn</option>
</select>
 &nbsp; </td>
</tr>
</tr></table></td></tr>';




echo '

</select> </td></tr>

</table>
</fieldset>

<input type="hidden" value="'; if (isset($type_ad2)) { echo $type_ad2;  }; echo '" id="type_ad2" name="type_ad2"  />
<input type="hidden" value="'; if (isset($type_ad)) { echo $type_ad;  }; echo '" id="type_ad" name="type_ad"  />

 <br />'.$txt_SauvFiche.' <input type="submit" name="post_ad" value="'.$txt_Sauver.'" /> '; 
 
 
 };







// INSTALLE OU MUTUELLE

if (($type_ad=="1") || ($type_ad=="2") || ($type_ad=="5") || ($type_ad=="8") ||($type_ad=="9")) {
                                          

echo '<font class="XLdr">'.$fiche_renseignee.'<br /><br />
<strong>'.$txt_fiche_cab.'</strong><br />
'.$txt_fiche_01.'</font><br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_anonym01.' ?</strong></font></legend>
<table width="100%" border="0" cellspacing="0">

<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">'.$txt_anonym02.'<br/><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left"><strong>'.$txt_anonym03.'</strong></td>
       <td colspan="3">
              <input type="radio" value="1" name="nconfidentialite" '; if ($nconfidentialite =="1") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt1.' &nbsp;<br />
              <input type="radio" value="2" name="nconfidentialite" '; if ($nconfidentialite =="2") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt2.' &nbsp;<br />
              <input type="radio" value="3" name="nconfidentialite" '; if ($nconfidentialite =="3") echo 'checked="checked"'; echo ' /> '.$txt_anonymopt3.'
</td></tr>
</table>
</fieldset>
<br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>Equipement / Organisation</strong></font></legend>
<table width="100%" border="0" cellspacing="0">

<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_ModExerc.'</div></td>
<td colspan="3">
                        <select name="nmodeexercice">
                          <option value="1"'; if ($nmodeexercice=="1") echo 'selected'; echo'>'.$txt_ModExopt01.'</option>
                          <option value="2"'; if ($nmodeexercice=="2") echo 'selected'; echo'>'.$txt_ModExopt02.'</option>
                        </select>
                        &nbsp;&nbsp; </td>
                    </tr>
	<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_ZonExerc.'</div></td>
    <td colspan="3">
                        <select name="nzoneexercice">
                          <option value="1"'; if ($nzoneexercice=="1") echo 'selected'; echo' >'.$txt_ZonExopt01.'</option>
                          <option value="2"'; if ($nzoneexercice=="2") echo 'selected'; echo' >'.$txt_ZonExopt02.'</option>
			  <option value="3"'; if ($nzoneexercice=="3") echo 'selected'; echo' >'.$txt_ZonExopt03.'</option>
                          <option value="4"'; if ($nzoneexercice=="4") echo 'selected'; echo' >'.$txt_ZonExopt04.'</option>
                        </select>
                        &nbsp;&nbsp; </td>
                    </tr>
	<tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp; '.$txt_Pratique.'</div></td>
    <td colspan="3">
                        <select name="nspecialite">
                          <option value="1"'; if ($nspecialite=="1") echo 'selected'; echo '>'.$txt_Praticopt01.'</option>
                          <option value="2"'; if ($nspecialite=="2") echo 'selected'; echo' >'.$txt_Praticopt02.'</option>
                          <option value="3"'; if ($nspecialite=="3") echo 'selected'; echo '>'.$txt_Praticopt03.'</option>
                          <option value="4"'; if ($nspecialite=="4") echo 'selected'; echo '>'.$txt_Praticopt04.'</option>
                          <option value="5"'; if ($nspecialite=="5") echo 'selected'; echo '>'.$txt_Praticopt05.'</option>
                          <option value="6"'; if ($nspecialite=="6") echo 'selected'; echo '>'.$txt_Praticopt06.'</option>
                          <option value="7"'; if ($nspecialite=="7") echo 'selected'; echo '>'.$txt_Praticopt07.'</option>
                          <option value="8"'; if ($nspecialite=="8") echo 'selected'; echo '>'.$txt_Praticopt08.'</option>
						</select> &nbsp;&nbsp; </td>
                    </tr>
                    <tr bgcolor="#'.$C_fond_Tclair.'">
                      <td width="36%" align="right">
                        <div align="left">&nbsp; '.$txt_secretaire.'</div>
                      </td>
                      <td colspan="3">
                        <input type="radio" value="1" name="nsecretaire" '; if ($nsecretaire=="1") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
                        <input type="radio" value="2" name="nsecretaire" '; if ($nsecretaire=="2") echo 'checked="checked"'; echo ' />'.$txt_oui.'</td>
                    </tr>
                    <tr bgcolor="#'.$C_fond_Tclair.'">
                      <td width="36%">&nbsp; '.$txt_assistante.'</td>
                      <td colspan="3">
                        <input type="radio" value="1" name="nassistante" '; if ($nassistante=="1") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
                        <input type="radio" value="2" name="nassistante" '; if ($nassistante=="2") echo 'checked="checked"'; echo ' />'.$txt_oui.'</td>
                    </tr>
                    <tr bgcolor="#'.$C_fond_Tclair.'"> 
                      <td width="36%" align="right" height="19"> 
                        <div align="left">&nbsp; '.$txt_informatiq.'</div>
                      </td>
                      <td width="31%" height="19">
                        <input type="radio" value="1" name="ninfo" '; if ($ninfo=="1") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
                        <input type="radio" value="2" name="ninfo" '; if ($ninfo=="2") echo 'checked="checked"'; echo ' />'.$txt_oui.'</td>
                      <td width="11%" height="19"> &nbsp;'.$txt_logiciel.'
                        </td>
                      <td width="22%" height="19">
                        <input type="text" name="nlogiciel" size="15" value='.$nlogiciel.'>
                        </td>
                    </tr>
                    <tr bgcolor="#'.$C_fond_Tclair.'"> 
                      <td width="36%" align="right">
                        <div align="left">&nbsp; '.$txt_rvg.'</div>
                      </td>
                      <td colspan="3">
                        <input type="radio" value="1" name="nrvg" '; if ($nrvg=="1") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
                        <input type="radio" value="2" name="nrvg" '; if ($nrvg=="2") echo 'checked="checked"'; echo ' />'.$txt_oui.'</td>
                    </tr>
                    <tr bgcolor="#'.$C_fond_Tclair.'"> 
                      <td width="36%" align="right" height="22">
                        <div align="left">&nbsp; '.$txt_panoramiq.'</div>
                      </td>
                      <td colspan="3" height="22">
                        <input type="radio" value="1" name="npanoramique" '; if ($npanoramique=="1") echo 'checked="checked"'; echo ' />'.$txt_non.'&nbsp;
                        <input type="radio" value="2" name="npanoramique" '; if ($npanoramique=="2") echo 'checked="checked"'; echo ' />'.$txt_pano.'&nbsp;
                        <input type="radio" value="3" name="npanoramique" '; if ($npanoramique=="3") echo 'checked="checked"'; echo ' />'.$txt_conebeam.'&nbsp;                        
                       <input type="hidden" value="'; if (isset($type_ad)) { echo $type_ad;  }; echo '" id="type_ad" name="type_ad"  />
                    </td></tr>
</table>
</fieldset>
<br />
<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px; background: #'.$C_fond_Tclair.';">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_insertImg.'</strong></font></legend>
<table width="100%" border="0" cellspacing="0">
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">'.$txt_img_limit.'</td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left">
&nbsp; </td>
       <td colspan="3">';

if (file_exists("$dest_dossier_ad/$id_membre.jpg"))

            { $imagette = "$adresse_site1/photos/photos_ad/$id_membre.jpg";
              imagette ($imagette,150) ; echo '<br /><input type="checkbox" name="effaceimg" value="1"> '.$txt_eff_Img.'
              <br /><br />'.$txt_eff_Img2.'<br /><br /> ';
            };
echo '
<input type="hidden" name="MAX_FILE_SIZE" value="200000" />
<p><label for="photo">'.$txt_photo.' :</label><input type="file" name="photo" /></p>
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
</table>
</fieldset>

 <br />'.$txt_SauvFiche.' <input type="submit" name="post_ad" value="'.$txt_Sauver.'" /> '; 

 };


if ($type_ad=="6") {

echo '
<table id="Formulaire_ad2" width="100%" border="0" cellspacing="0">
    <tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="2">&nbsp;</td></tr>
    <tr bgcolor="#'.$C_fond_Tclair.'">
    <td width="36%" align="right"><div align="left">&nbsp;'.$txt_DesSoc.'</div></td>
    <td><textarea rows="5" name="nremarques" cols="29">'.$nremarques.'</textarea> </td></tr>
	<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="2">&nbsp;</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4"><hr style="border: 1px solid #ccccdd"/></td></tr>
        <tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4"><strong>'.$txt_insertLogo.'</strong><br /></td></tr>
       <tr bgcolor="#'.$C_fond_Tclair.'">
       <td width="36%" align="left">
'.$txt_eff_Img2.'</td>
       <td colspan="3">';
if (file_exists("$dest_dossier_ad/$id_membre.jpg"))

         {    $imagette = "$adresse_site1/photos/photos_ad/$id_membre.jpg";
              imagette ($imagette,150) ; echo '<br /><input type="checkbox" name="effaceimg" value="1"> '.$txt_eff_Img.'
              <br /><br />'.$txt_img_limit.'<br /><br /> ';
          };
echo '  <input type="hidden" name="MAX_FILE_SIZE" value="200000" />
        <p><label for="photo">'.$txt_photo.' :</label><input type="file" name="photo" /></p>
</td></tr>
<tr bgcolor="#'.$C_fond_Tclair.'"><td colspan="4">&nbsp;</td></tr>
</table>
<input type="hidden" value="'; if (isset($type_ad)) { echo $type_ad;  }; echo '" id="type_ad" name="type_ad"  />

<br />'.$txt_SauvFiche.' <input type="submit" name="post_ad" value="'.$txt_Sauver.'" /> '; 

};





if ($type_ad =="7") echo "Vous avez acc&eagrave;s au site, mais il est inutile de remplir votre profil";



echo '</FORM> ';




?>
