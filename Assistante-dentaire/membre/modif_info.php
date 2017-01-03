<?PHP

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];
$inc=$_REQUEST['inc'];
$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';

echo '
<br />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_ModCompte.'</font><br />';


// RECUPERATION DES DONNES
$_SESSION['email']=$email;
$res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row2=mysql_fetch_array($res2);
  $id_membre=$row2['id_membre'];
  $nemail=$row2['email'];
  $npass=$row2['pass1'];
  if (!isset($type)) {$type=$row2['type'];}
  $ncivilite=$row2['civilite'];
  $nsociete=$row2['societe'];
  $nprenom=$row2['prenom'];
  $nnom=$row2['nom'];
  $nadresse=$row2['adresse'];
  $ncp=$row2['postal'];
  $nville=$row2['ville'];
  $liste_pays=htmlentities($row2['pays']);
  $pays=htmlentities($row2['pays']);
  $indicatif=$row2['indicatif'];
  $zone=$row2['zone'];
  $nactivite=$row2['nactivite'];
  $ntel=$row2['telephone'];
  $nmob=$row2['mobile'];
  $nfax=$row2['fax'];
  $njour = substr($row2["anniv"],8,2);
  $nmois = substr($row2["anniv"],5,2);
  $nan = substr($row2["anniv"],0,4);

  $noketudes=$row2['oketudes'];
  $nokpapier=$row2['okpapier'];



if ($post==$txt_Sauver) {

  $nemail=protect($_POST['nemail']);
  $npass=protect($_POST['npass']);
  $type=protect($_POST['ntype']);
  $ncivilite=$_POST['ncivilite'];
  $nsociete=protect(strtoupper($_POST['nsociete']));
  $nprenom=protect(ucfirst($_POST['nprenom']));
  $nnom=protect(strtoupper($_POST['nnom']));
  $nadresse=protect($_POST['nadresse']);
  $ncp=protect($_POST['ncp']);
  $nville=protect(ucfirst($_POST['nville']));
  $liste_pays=protect($_POST['liste_pays']);
  $pays=protect($_REQUEST['pays']);
  $indicatif=protect($_REQUEST['indicatif_tel']);
  $zone=protect($_REQUEST['zone']);
  $nactivite=protect($_POST['nactivite']);
  $ntel=protect($_POST['ntel']);
  $nmob=protect($_POST['nmob']);
  $nfax=protect($_POST['nfax']);
  $nan=protect($_POST['nan']);
  $nmois=$_POST['nmois'];
  $njour=protect($_POST['njour']);
  $noketudes=protect($_POST['noketudes']);
  $nokpapier=protect($_POST['nokpapier']);



  if (strlen($npass)<3) $err['pass']='<span style="color: red">3 caract&egrave;res minimum</span>';
  if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $nemail)==0) $err['email']='<span style="color: red">Email non valable</span>';

  if ($nemail=="") $err['email']='<span style="color: red">'.$txt_identif.'?</span>';
  if ($npass=="") $err['pass']='<span style="color: red">'.$txt_pass.'?</span>';
  if ($ncivilite=="") $err['ncivilite']='<span style="color: red">'.$txt_item_01.'?</span>';
  if ($nprenom=="" || $nnom=="") $err['prenom']='<span style="color: red">'.$txt_item_02.'?</span>';
  if ($nadresse=="") $err['adresse']='<span style="color: red">'.$txt_item_05.'?</span>';
  if ($nville=="" || $ncp=="") $err['ville']='<span style="color: red">'.$txt_item_06b.'?</span>';
  if ($liste_pays=="") $err['pays']='<span style="color: red">'.$txt_item_07b.'?</span>';
   if ($ntel == "" && $nmob == "" ) $err['ntel']='<span style="color: red">'.$txt_item_08b.'</span>';
  if ($noketudes=="") $err['noketudes']='<span style="color: red">'.$txt_item_12b.'</span>';
  if ($nokpapier=="") $err['nokpapier']='<span style="color: red">'.$txt_item_12b.'</span>';


// QUE POUR LES MEMBRES HUMAINS Dentiste, étudiant, assistante, stomato
if ($type == "1" || $type=="2" || $type == "3" || $type=="4" || $type=="9") {  
  if (($nan == "" || $nmois == "" || $njour == "") || (!is_numeric($nan) || !is_numeric($njour) || !is_numeric($nmois)) || $nmois > 12 || $njour > 31 || $nan < 1900 || $nan > date("Y"))  $err['anniv']='<span style="color: red">Date incorrecte</span>';
                                                              };

// QUE POUR LES SOCIETES : Centre de soins, industrie, agence immobilière, association
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {
  if ($nsociete=="") $err['nsociete']='<span style="color: red">'.$txt_item_17.'?</span>';
                                                              };




  if (is_array($err)) {
    $post="insc"; echo '<span class="important">'.$txt_item_15.'</span><br />';
  } else {

    // preparation des données

    $nemail=a($nemail);
    $pass=a($npass);
    $type=a($ntype);
    $civilite=a($ncivilite);
    $prenom=a($nprenom);
    $nom=a($nnom);
    $adresse=a($nadresse);
    $cp=a($ncp);
    $ville=a($nville);
    $liste_pays=a($liste_pays);
    $pays=a($pays);
    $indicatif=a($indicatif);
    $zone=a($zone);
    $tel=a($ntel);
    $mob=a($nmob);
    $fax=a($nfax);
    $an=a($nan);
    $mois=a($nmois);
    $jour=a($njour);
    $oketudes=a($noketudes);
    $okpapier=a($nokpapier);
    $ip=$_SERVER['REMOTE_ADDR'];
    $date_creation=date("Y-m-d H:i:s");

 if ($pays == "France") {

    $departement=substr($cp,0,2);

    $region_dept=array('NORD-PAS-DE-CALAIS', '59 62', 'ILE-DE-FRANCE', '75 77 78 91 92 93 94 95', 'ALSACE', '67 68', 'AQUITAINE', '24 33 40 47 64', 'AUVERGNE', '03 15 43 63', 'BASSE-NORMANDIE', '14 50 61', 'BOURGOGNE', '21 58 71 89', 'BRETAGNE', '22 29 35 56', 'CENTRE', '18 28 36 37 41 45', 'CHAMPAGNE-ARDENNES', '08 10 51 52', 'CORSE', '20', 'FRANCHE-COMTE', '25 39 70 90', 'HAUTE-NORMANDIE', '27 76', 'LORRAINE', '54 55 57 88', 'LIMOUSIN', '19 23 87', 'MIDI-PYRENEES', '09 12 31 32 46 65 81 82', 'PAYS-DE-LA-LOIRE', '44 49 53 72 85', 'LANGUEDOC-ROUSSILLON', '11 30 34 48 66', 'PACA', '04 05 06 13 83 84', 'PICARDIE', '02 60 80', 'POITOU-CHARENTES', '16 17 79 86', 'RHONE-ALPES', '01 07 26 38 42 69 73 74', 'DOM-TOM', '99');
    for($i=1;$i<count($region_dept);$i=$i+2) {
      if (substr_count($region_dept[$i], $departement)==1) $region=$region_dept[($i-1)];
    }
         } else {$region=""; $departement="";};

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

   // Enregistrement dans la BDD . (le champs validation: 1=attente email, 0=ok RAS)

    if (!is_array($err)) { // pas d erreur, on y go

     $req="UPDATE $table_membre SET type='$type', email='$nemail', pass1='$pass', societe='$societe', civilite='$ncivilite', nom='$nom', prenom='$prenom', anniv='$an-$mois-$jour', adresse='$adresse', postal='$cp', ville='$ville',
     departement='$departement', region='$region', pays='$pays', zone='$zone', telephone='$tel', mobile='$mob', fax='$fax', oketudes='$oketudes', okpapier='$okpapier', ip_modif='$ip', date_modif='$date_creation' WHERE id_membre='$id_membre'";

     if ($row2['email'] != $nemail) {
 // Annule la validation de l'email : il faut recliquer sur le lien d'activation envoyé
 $req2="UPDATE $table_membre SET verif_email='0' WHERE id_membre='$id_membre'";
     };


     echo'<span class="important">'.$txt_ok_modif.'</span><br />';







// email de confirm  UNIQUEMENT SI IL Y A MODIFICATION DE L' ADRESSE EMAIL

if ($row2['email'] != $nemail) {

$idm=md5("$nemail$pass");
$message="-- Message automatique --\n
Bonjour,\n\nFélicitation, votre pré-inscription aux sites de Dental Networks est prise en compte.\n
Cliquez sur le lien suivant ou recopiez le dans votre navigateur pour valider votre adresse email :\n
".$var_sitewebb."index.php?cat=mail_valid&idm=$idm \n\n
Vos identifiants sont:
      Email = $nemail
      Mot de passe= $pass\n\n
L'équipe de $titre_site vous remercie.\n- www.dentiste-remplacant.com\n- www.cabinet-dentaire.com\n- www.assistante-dentaire.com";

$headers =  "From: robot@$titre_site2\r\n";
$headers .= "Reply-To: robot@nepasrepondre.com\r\n";


@mail($nemail, "[$titre_site3] - Confirmation de votre inscription", $message, $headers);











echo'<br /><div class="important"> Vos avez changé d\'adresse email. Un email vous a été posté sur votre nouvelle adresse afin de la confirmer. Pour réactiver votre compte, vous devez cliquer sur le lien d\'activation.</div><br />
<br />
<strong>Important</strong> :<br />
- cet email peut mettre quelques minutes à arriver, si vous ne le recevez pas immédiatement, actualisez votre logiciel de messagerie plusieurs fois.<br />
- si vous ne recevez pas l\'email de confirmation, il est possible que vous ayez mal tapé votre adresse email. Ré-inscrivez-vous !<br />

';

                // email de confirm
};


      $res=mysql_query($req);

     if ($row2['email'] != $nemail) {    $res2=mysql_query($req2);   };



         $connect=1;



    } // fin enregistrement bdd

  } // fin du traitement et de l'insertion

} // fin de l'action 'enregistrer'




// AFFICHAGE FORMULAIRE

if ($npays=='') $npays="France";

echo '<table cellspacing="0" cellpadding="2" style="text-align: left" />';


echo '
<br /><br />
<FORM action="index.php?cat=compte&amp;incl=modif" method=post>
'.$txt_inscr_03.' <select name="type" onchange=this.form.submit()>';

if (($type=="1")||($type=="2")||($type=="3")) { echo '
          <option value="1" ';if ($type=="1") echo 'selected'; echo' >'.$txt_Mbre_01.'</option>
          <option value="2" ';if ($type=="2") echo 'selected'; echo' >'.$txt_Mbre_02.'</option>
          <option value="3" ';if ($type=="3") echo 'selected'; echo' >'.$txt_Mbre_03.'</option>';
                                                         };
if ($type=="9") echo '<option value="9" selected>'.$txt_Mbre_09.'</option> ';
if ($type=="4") echo '<option value="4" selected>'.$txt_Mbre_04.'</option> ';
if ($type=="5") echo '<option value="5" selected>'.$txt_Mbre_05.'</option> ';
if ($type=="6") echo '<option value="6" selected>'.$txt_Mbre_06.'</option> ';
if ($type=="7") echo '<option value="7" selected>'.$txt_Mbre_07.'</option> ';
if ($type=="8") echo '<option value="8" selected>'.$txt_Mbre_08.'</option> ';

echo '

</select></FORM>

<tr><td colspan="2"><br />

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_tt_ins1.' :</strong></font></legend>
    
<table cellpadding="0" cellspacing="3" border="0" />
<tr><td>

<form method="post" action="index.php?cat=compte&amp;incl=modif" name="insc">
<input type="hidden" value="'.$type.'" name="ntype"  />
</td></tr>
<tr><td class="menu2">'.$txt_identif.'

 <img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'info1\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'info1\').style.visibility=\'hidden\'"/>

<div id="info1" style="visibility: hidden; width: 350px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>Attention !</b></div>
Votre email doit &ecirc;tre valide, car pour terminer l\'inscription, vous devrez consulter imm&eacute;diatement votre messagerie et cliquer sur le lien d\'activation
</div>


</td><td class="menu2"><input type="text" name="nemail" value="'.$nemail.'" size="35" /> '.$err['email'].'</td></tr>
<tr><td class="menu2">'.$txt_pass.'</td><td class="menu2"><input type="password" name="npass" value="'.$npass.'" /> '.$err['pass'].'</td></tr>

</table>
</fieldset>
<br />

';


echo'

<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_tt_ins2.' :</strong></font></legend>

<table cellpadding="3" cellspacing="3" border="0" />';

if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {echo'
<tr><td>Raison sociale</td><td><input type="text" size="35" name="nsociete" value="'.$nsociete.'" /> '.$err['nsociete'].'</td></tr> ';}

echo '
<tr><td align="right">'.$txt_item_01.' </td><td>
<input type="radio" name="ncivilite" value="Mlle" '; if ($ncivilite=="Mlle") echo 'checked="checked"'; echo' />'.$txt_item_01a.'
<input type="radio" name="ncivilite" value="Mme" '; if ($ncivilite=="Mme") echo 'checked="checked"'; echo' />'.$txt_item_01b.'
<input type="radio" name="ncivilite" value="M." '; if ($ncivilite=="M.") echo 'checked="checked"'; echo' />'.$txt_item_01c.'
 '.$err['ncivilite'].'</td></tr>';

echo '<tr><td align="right">'.$txt_item_02.' ';
if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {echo' du contact';};
echo '</td><td><input type="text" name="nnom" value="'.$nnom.'" />'.$err['nom'].' </td></tr>
<tr><td align="right">'.$txt_item_03.' ';

if ($type == "5" || $type=="6" || $type == "7" || $type=="8") {echo' du contact';};
echo '</td><td><input type="text" name="nprenom" value="'.$nprenom.'" size="12" />  '.$err['prenom'].'</td></tr> ';



if ($type == "1" || $type=="2" || $type == "3" || $type=="4" || $type=="9") {  // Dentiste, étudiant, assistante, stomato
echo '<tr><td>'.$txt_item_04.'</td><td>
<input type="text" name="njour" value="'.$njour.'"  size="1" maxlength="2"/ '.$numeric.' >
<input type="text" name="nmois" value="'.$nmois.'"  size="1" maxlength="2"/ '.$numeric.' >
<input type="text" name="nan" value="'.$nan.'"  size="3" maxlength="4"/ '.$numeric.' >
 '.$err['anniv'].'</td></tr> '; };

 echo '
<tr><td>'.$txt_item_05.'</td><td><input type="text" name="nadresse" value="'.$nadresse.'" size="35" /> '.$err['adresse'].'</td></tr>
<tr><td>'.$txt_item_06.'</td><td><input type="text" name="ncp" value="'.$ncp.'" size="5" maxlength="5" '.$numeric.' />&nbsp;
<input type="text" name="nville" value="'.$nville.'" size="27" /> '.$err['ville'].'</td></tr>
<tr><td>'.$txt_item_07.'<br /></td><td>'; ?>

  <select name="liste_pays" id="liste_pays" onchange="this.options[this.selectedIndex].onclick();" style="border: 1px solid #c0c5dd">

  <option value=""><?PHP echo $txt_item_07b ?> ...</option>
  
  

<?PHP

$reqPays=mysql_query("SELECT * FROM ListePays WHERE (type_lien=2 OR type_lien=3) ORDER BY ordre_affiche DESC,nom_lien");

    while ($rowPays=mysql_fetch_array($reqPays)) {

$nom_lien    =  $rowPays['nom_lien'];
$nom_affiche =  $rowPays['nom_affiche'];
$id_tel      =  $rowPays['id_tel'];
$zone2       =  $rowPays['zone2'];

echo  ' <option value="'.$nom_lien.'" onclick="select_country(\''.$nom_lien.'\',\''.$id_tel.'\', \''.$zone2.'\');">'.$nom_affiche.'</option> ';


                                                    }


?>


</select> <?=$err['pays'] ?>

<?




// FONCTION RAJOUTEE POUR MODIFICATION PAYS -------- debut 2eme partie -----------
//  Pour que le pays sélectionné soit choisi par défaut dans le sélect s'il est réaffiché

echo' <script type="text/javascript">document.getElementById(\'liste_pays\').value = \''.$liste_pays.'\'</script>';

// FONCTION RAJOUTEE POUR MODIFICATION PAYS -------- fin 2eme partie -----------
  ?>


</td></tr>

<tr><td><?PHP echo $txt_item_08 ?></td><td><input id="ind_fixe" name="ind_fixe" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($indicatif)) { echo $indicatif;  }?>" type="text" readonly >&nbsp;
<input type="text" name="ntel" value="<?=$ntel ?>" <?=$numeric ?> /> <?=$err['ntel'] ?></td></tr>

<tr><td><?PHP echo $txt_item_09 ?></td><td><input id="ind_mobile" name="ind_mobile" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($indicatif)) { echo $indicatif;  }?>" type="text" readonly >&nbsp;
<input type="text" name="nmob" value="<?=$nmob ?>" <?=$numeric ?> /> </td></tr>

<tr><td><?PHP echo $txt_item_10 ?></td><td><input id="ind_fax" name="ind_fax" style="width: 50px; background-color:#EBEBE4;" value="<? if (isset($indicatif)) { echo $indicatif;  }?>" type="text" readonly >&nbsp;
<input type="text" name="nfax" value="<?=$nfax ?>" <?=$numeric ?> /> </td></tr>

<?PHP    echo'
<tr><td>'.$txt_item_11.'</td><td>
          <input type="radio" name="noketudes" value="1" '; if ($noketudes =="1") echo 'checked="checked"'; echo' />'.$txt_non.'
          <input type="radio" name="noketudes" value="2" '; if ($noketudes =="2") echo 'checked="checked"'; echo' />'.$txt_oui.'
 '.$err['noketudes'].'
</td></tr>

<tr><td>'.$txt_item_12.'</td><td>
          <input type="radio" name="nokpapier" value="1" '; if ($nokpapier =="1") echo 'checked="checked"'; echo' />'.$txt_non.'
          <input type="radio" name="nokpapier" value="2" '; if ($nokpapier =="2") echo 'checked="checked"'; echo' />'.$txt_oui.'
 '.$err['nokpapier'].'
</td></tr>

<tr><td colspan="2">

<input type="hidden" value="'; if (isset($zone)) { echo $zone;  }; echo '" id="zone" name="zone"  />
<input type="hidden" value="'; if (isset($pays)) { echo $pays;  }; echo '" id="pays" name="pays"  />
<input type="hidden" value="'; if (isset($indicatif_tel)) { echo $indicatif_tel;  }; echo '" id="indicatif_tel" name="indicatif_tel" />
<input type="hidden" value="'; if (isset($type)) { echo $type;  }; echo '" id="type" name="type"  />

</td></tr>

<tr><td colspan="2"><div style="padding-left:300px">';
echo' <input type="submit" name="post" value="'.$txt_Sauver.'" /></div></td></tr>
</form><br />
</table>


';



?>
