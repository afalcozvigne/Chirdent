<?PHP

// VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];
$inc=$_REQUEST['inc'];
$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';


// RECUPERATION DES DONNES
$_SESSION['email']=$email;
$res2=mysql_query("SELECT id_membre,geo,pays,OK_emailing FROM $table_membre WHERE email='$email'");
$row2=mysql_fetch_array($res2);
  $id_membre=$row2['id_membre'];
  $pays=$row2['pays'];
  $geo=$row2['geo'];
  $newsl=$row2['OK_emailing'];
  if ($geo=="0") { $geo="0" ;};




if ($post=="sauver") {

  $geo=protect($_POST['geo']);
  $geo=a($geo);
  $newsl=protect($_POST['newsl']);
  $newsl=a($newsl);

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);
$req="UPDATE $table_membre SET geo='$geo',OK_emailing='$newsl' WHERE id_membre='$id_membre'";

echo'<span class="important">Vos pr&eacute;f&eacute;rences viennent d\'&ecirc;tre modifi&eacute;es.</span><br /><br />';

$res=mysql_query($req);


} // fin de l'action 'continuer'




// AFFICHAGE FORMULAIRE

if ($npays=='') $npays="France";




echo '

<br />
<font class="XXLdr" style="position:relative; top:-25px; left:10px;">'.$txt_ModCompte.'</font><br />
<form method="post" action="index.php?cat=compte&amp;incl=pref" name="insc">
<input type="hidden" value="'.$type.'" name="ntype"  />

<table cellspacing="0" cellpadding="2" style="text-align: left" width="610">
<tr><td><strong>Zone g&eacute;ographique &agrave afficher par d&eacute;faut :</strong>

 <br /><img src="http://www.occasion-dentaire.com/images/info.gif" alt="info" width="19" height="18" style="border: none: align: center; vertical-align: middle" border="0"
 onmouseover="javascript:document.getElementById(\'info1\').style.visibility=\'visible\'"
 onmouseout="javascript:document.getElementById(\'info1\').style.visibility=\'hidden\'"/>

<div id="info1" style="visibility: hidden; width: 350px; position: absolute; background: #eeeeee; padding: 2px; padding-top: 5px; border: 1px outset">
<div style="background: #'.$C_titre.'; color: white; text-align: center"><b>Info</b></div>
Si vous choisissez une zone, un raccourci s\'affichera dans le menu de droite, sous la boite d\'identification.</div>


</td><td><select name="geo">
          <option value="">-- s&eacute;lectionnez --</option>
          <option value=1 ';if ($geo=="1") echo 'selected'; echo' >France</option>
          <option value=2 ';if ($geo=="2") echo 'selected'; echo' >Europe</option>
          <option value=3 ';if ($geo=="3") echo 'selected'; echo' >Am&eacute;rique du Nord</option>
          <option value=4 ';if ($geo=="4") echo 'selected'; echo' >Am&eacute;rique du Sud</option>
          <option value=5 ';if ($geo=="5") echo 'selected'; echo' >Caraibes</option>
          <option value=6 ';if ($geo=="6") echo 'selected'; echo' >Afrique</option>
          <option value=7 ';if ($geo=="7") echo 'selected'; echo' >Oc&eacute;anie</option>
          <option value=8 ';if ($geo=="8") echo 'selected'; echo' >Asie</option> ';
          

// Si le pays du membre est la France, il vaut mieux qu'il utilise l'option 1 que l'option 9
// on ne lui en laisse pas le choix

if ($pays!="France") { echo '<option value=9 ';if ($geo=="9") echo 'selected'; echo' >Votre pays ('.$pays.')</option>';};

          

 echo '
          </select></td></tr>

<tr><td colspan="2"><br />
<hr style="border: 1px solid #ccccdd"/>
</td></tr>
<tr><td><strong>Abonnement &agrave; la newsletter</strong><br />
Informations professionnelles, invitations aux congr&egrave;s, promotions sur du mat&eacute;riel,  </td>
<td><select name="newsl">
          <option value="">-- s&eacute;lectionnez --</option>
          <option value=0 ';if ($newsl=="0") echo 'selected'; echo' >Non</option>
          <option value=1 ';if ($newsl=="1") echo 'selected'; echo' >Oui</option>
        </select></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr><td><strong>Langue</strong></td>
<td><select name="preflangue">
          <option value="">-- s&eacute;lectionnez --</option>
          <option value=1 ';if ($newsl=="1") echo 'selected'; echo' >Francais</option>
          <option value=2 ';if ($newsl=="2") echo 'selected'; echo' >Anglais</option>
        </select></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>

<tr><td><strong>Contact par SMS</td><td>En projet.</td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2"><hr style="border: 1px solid #ccccdd"/></td></tr>
<tr><td colspan="2">&nbsp;</td></tr>
<tr><td colspan="2">Pour valider vos modifications,
cliquez sur sauver <input type="submit" name="post" value="sauver" /></td></tr>
</form>
</table>


';



?>
