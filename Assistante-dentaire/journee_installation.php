<?PHP          // identique tous les sites

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
';

 // VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$lien=$_REQUEST['lien'];
$type=$_POST['type'];



echo '
<br />

 <p><center><div style="border: 1px solid #000000; text-align: center; width: 250pt; background: #'.$C_JI_Fonce.'; font-family: Verdana; font-size: 11pt; color: #FFFFFF">
<strong>Les journ&eacute;es de l\'installation <br /> et de l\'association en lib&eacute;ral 2013 :   ';



$req2=mysql_query("SELECT * FROM Jour_install_dates WHERE date>CURDATE() ORDER BY date");

$dern_annee = '';
$adresses = '';

while ($row=mysql_fetch_array($req2)) {

  $njour = substr($row["date"],8,2);
  $nmois = substr($row["date"],5,2);
  $nan = substr($row["date"],0,4);
  $id_JI = $row["id_JI"];

  if ($row["jour"]==1) {$jour="Lundi";};
  if ($row["jour"]==2) {$jour="Mardi";};
  if ($row["jour"]==3) {$jour="Mercredi";};
  if ($row["jour"]==4) {$jour="Jeudi";};
  if ($row["jour"]==5) {$jour="Vendredi";};
  if ($row["jour"]==6) {$jour="Samedi";};

echo $jour.' '.date_naturelle($row["date"]).' &agrave; '.$row["ville"].'';
if ($row["complet"]==1) {echo '<font class="complet">Complet</font>';};
echo '<br /> ';

// On créé les variables qui vont s'afficher après :

$adresses .= '- '.$row["ville"].' : '.$row["adresse"].' <br />';
$choix_dates_jinstall .= '<input type="radio" name="choixji" value="'.$id_JI.'" />'.date_naturelle($row["date"]).' &agrave; '.$row["ville"].' <br /> ';

};




echo '</strong></div></center>
 </p>
<br />
<table bgColor="#000000" align="center" border="0" cellPadding="1" cellSpacing="0" width="100%">
<tr><td>
<table border="0" cellPadding="3" cellSpacing="0" width="100%" valign="center">
<tr align="center">
<td width="25%" bgcolor="#'.$C_JI_Clair.'"> <center><strong><a href="index.php?cat=jinstall&amp;lien=inscription">Inscription</a></strong></center></td>
<td width="25%" bgcolor="#'.$C_JI_Clair.'"> <center><strong><a href="index.php?cat=jinstall&amp;lien=question">Poser une question</a></strong></center></td>
<td width="25%" bgcolor="#'.$C_JI_Clair.'"> <center><strong><a href="index.php?cat=jinstall&amp;lien=detail">D&eacute;tail du programme</a></strong></center></td>
<td width="25%" bgcolor="#'.$C_JI_Clair.'"> <center><strong><a href="index.php?cat=jinstall&amp;lien=historique">Historique</a></strong></center></td>

</tr></table>
</td></tr></table>



<br />    ';







 if ($lien=="inscription") {


   echo '

 <br />
 <br />
  <span class="titredr">Inscription :</span>
 <br />

 <br />
   Inscrivez-vous d&egrave;s maintenant ! <u>Attention : nombre de places limit&eacute;</u> ! <br />
   NB : un ch&egrave;que de r&eacute;servation de 50 &euro; par personne est demand&eacute;. <br />
   (25 &euro; pour les &eacute;tudiants en 5e ou 6e ann&eacute;e sur justificatif)</strong>
   <br /><i>(d&eacute;jeuner compris et documents  p&eacute;dagogiques fournis)</i>
<br />
<br />
<strong>ADRESSE FORMATION <br />';

echo $adresses;

echo '</strong>
</span>
<br />
<br />

  ';






if (isset($_SESSION['email']))  {

  
  $_SESSION['email']=$email;
  $res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
  $row2=mysql_fetch_array($res2);

  $jour = substr($row2["anniv"],8,2);
  $mois = substr($row2["anniv"],5,2);
  $an = substr($row2["anniv"],0,4);
  $id_membre = $row2["id_membre"];




  $resji=mysql_query("SELECT * FROM jour_install_inscriptions WHERE  ji_id_membre='$id_membre'");
  $nb = mysql_num_rows($resji);
  $rowji=mysql_fetch_array($resji);
  
  $ji_quel_jour = $rowji["ji_quel_jour"];
  $paiement = $rowji["paiement"];
  
if ($row2['type']=="3") {$MONTANT_site = 2500; $montant = 25;}
                   else {$MONTANT_site = 5000; $montant = 50;};

if (($nb > 0) && ($paiement!="0")){ echo "<span class='important'>Vous &ecirc;tes inscrit &agrave; la journ&eacute;e du $ji_quel_jour</span><br />
                                                   <span class='important'>Vous avez r&eacute;gl&eacute; votre inscription.</span> <br />
                                                   <br /><strong>Vous pouvez inscrire une autre personne :</strong>  ";};

if (($nb > 0) && ($paiement=="0")){ echo "<span class='important'>Vous &ecirc;tes pr&eacute;-inscrit &agrave; la journ&eacute;e du $ji_quel_jour</span><br />
                                                   <span class='important'>Vous devez r&eacute;gler $montant &euro; pour finaliser votre inscription.</span> <br />
                                                   <br /><strong>Vous pouvez inscrire une autre personne :</strong>  "; };


// envoi du formulaire d email d'inscription  // debut // ****************************************************
if ($_POST['post']=="Inscription") {

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

  if ($choixji == "") {$err1=1;};
  if ($okjinstall == "") {$err2=1;};

	if (($err1=="")&&($err2==""))  {


echo "<span class='important'>Votre pr&eacute;-inscription a &eacute;t&eacute; prise en compte.</span><br />
<span class='important'>Vous devez r&eacute;gler $montant &euro; pour finaliser votre inscription.</span> <br />
<br /> ";


$req_id="SELECT max(id_ji) as id_ji FROM jour_install_inscriptions";
$res_id=mysql_query($req_id);
$row_id=mysql_fetch_array($res_id);
$new_id_val=$row_id['id_ji']+1;





include ("paiement_ji.php");




	        $headers = "From: robot@$titre_site2\r\n";
                $headers .= "Reply-To: robot@nepasrepondre.com\r\n";

$ji_id_membre            = unhtmlentities($ji_id_membre);
$date_installe           = unhtmlentities($date_installe);
$choixji                 = unhtmlentities($choixji);




$req3=mysql_query("SELECT * FROM Jour_install_dates WHERE id_JI='$choixji'");
$row3=mysql_fetch_array($req3);
  $ville_ji = $row3["ville"];
  $date_ji = date_naturelle($row3["date"]);
  $adresse_ji = date_naturelle($row3["adresse"]);
  






$ji_date = date("Y-m-d H:i:s");
$ji_ip   = $_SERVER['REMOTE_ADDR'];

$detail_inscrit = ''.$row2['civilite'].' '.$row2['prenom'].' '.$row2['nom'].'
          Date de naissance :  '.$jour.'/'.$mois.'/'.$an.'
          Adresse : '.$row2['adresse'].' - '.$row2['postal'].' '.$row2['ville'].'
          T&eacute;l : '.$row2['telephone'].' '.$row2['mobile'].'
          Email : '.$row2['email'].'';


if ($row2['type']=="1") $detail_inscrit2 = 'Chirurgien dentiste non installe';
if ($row2['type']=="2") $detail_inscrit2 = 'Chirurgien dentiste installe (seul ou en association)';
if ($row2['type']=="3") $detail_inscrit2 = 'Etudiant en chirurgie dentaire';







// ENVOI DU MAIL PRE-INSCRIPTION POUR DENTAL ET MACSF

@mail ("laurent.dussarps@gmail.com,marie-laure.mollis@macsf.fr","Pre-inscription pour la journee d'installation de $ville_ji - $date_ji","
 $detail_inscrit : \n
----
$detail_inscrit2
-------------------------------
Journee d'installation de $ville_ji
le $date_ji
-------------------------------

date time : $ji_date - ip : $ji_ip : \n

Bonne reception,\nLaurent Dussarps\nDental Networks / Chirdent

");




// ENVOI DU MAIL PRE-INSCRIPTION POUR LE MEMBRE

@mail ("$email","Pre-inscription pour la journee d'installation","
Cher membre,\n
Votre pre-inscription pour la journee de l'installation a bien ete prise en compte.Elle aura lieu a $ville_ji le $date_ji\n
Adresse : $adresse_ji\n
Afin de valider votre inscription, merci d'adresser une cheque de $montant euro a l'Ordre de :
DENTAL NETWORKS
7, rue Jules MICHELET 
33140 VILLENAVE D'ORNON (FRANCE) 

A bientot,
merci de votre confiance,

Dr Laurent Dussarps\nDental Networks / Chirdent");













// MISE EN PLACE DANS LA BDD


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

      $req="INSERT INTO jour_install_inscriptions (id_ji, ji_id_membre, ji_date_projet, ji_quel_jour, ji_ip, ji_datetime, paiement)
  VALUES ('$new_id_val', '$ji_id_membre', '$date_installe', '$choixji', '$ji_ip', '$ji_date', '0')";

$res=mysql_query($req);
$connect=0;



	}


}











echo '
<br /><br /><center><div style="border: 1px solid #505050; text-align: center; width: 450pt;">
<span class="menu3"><strong>'.$row2['prenom'].' '.$row2['nom'].' </strong>,
si vous souhaitez participer &agrave; la journ&eacute;e d\'installation, merci de renseigner les champs vides et de valider :</span>
<br /><br />
';

 if ($err1=="1") echo "<span class='important'>Vous devez choisir une date, SVP</span><br />";
 if ($err2=="1") echo "<span class='important'>Vous devez accepter les conditions, SVP.</span><br />";

echo'       <br />
<form method="post" action="index.php?cat=jinstall&amp;lien=inscription">

<table><tr><td width="270" valign="top"><span class="titredr">1) Vos coordonn&eacute;es :</span><br /> en cas d\'erreur, modifier <a href="index.php?cat=compte&incl=modif">ici</a>  </td>
<td>      <strong>'.$row2['civilite'].' '.$row2['prenom'].' '.$row2['nom'].'</strong><br />
          Date de naissance :  '.$jour.'/'.$mois.'/'.$an.' <br />
          Adresse : '.$row2['adresse'].' - '.$row2['postal'].' '.$row2['ville'].'<br />
          T&eacute;l : '.$row2['telephone'].' '.$row2['mobile'].'<br />
          Email : '.$row2['email'].'
</td></tr>
<tr><td colspan=2><input type="hidden" value="'.$row2['id_membre'].'" id="ji_id_membre" name="ji_id_membre"  /></td></tr>
<tr><td valign="top"><span class="titredr">2) Votre statut :</span><br /> en cas d\'erreur, modifier <a href="index.php?cat=compte&incl=modif">ici</a>   </td>
<td>';
          if ($row2['type']=="1") echo 'Chirurgien dentiste non install&eacute;';
          if ($row2['type']=="2") echo 'Chirurgien dentiste install&eacute; (seul ou en association)';
          if ($row2['type']=="3") echo 'Etudiant en chirurgie dentaire';

echo '
<tr><td colspan=2>&nbsp;</td></tr>
</td></tr><tr><td><span class="titredr">3) Date du projet d\'installation :</span></td><td>

<input type="text" name="date_installe" size="30" maxlength="30" /> (facultatif)
<tr><td colspan=2>&nbsp;</td></tr>

</td></tr><tr><td><span class="titredr">4) Choix de la journ&eacute;e :</span></td><td> ';



echo $choix_dates_jinstall;


echo '



</td></tr>

<tr><td colspan=2>&nbsp;</td></tr>
</td></tr><tr><td><span class="titredr">5) Acceptation et envoi <br />ch&egrave;que de r&eacute;servation :</span> </td>

<td><input type="checkbox" name="okjinstall" value="checkbox" />
Je m\'inscris pour la journ&eacute;e de la premi&egrave;re installation, dans la limite des places disponibles 
et je joins un ch&egrave;que de '.$montant.' &euro; libell&eacute; &agrave; l\'ordre de DENTAL NETWORKS (le ch&egrave;que me sera restitu&eacute; si le nombre de places ne me permet pas de venir &agrave; la journ&eacute;e)<br />
Adresse d\'envoi du ch&egrave;que : <br />DENTAL NETWORKS - JOURNEES DE L\'INSTALLATION <br />7, rue Jules MICHELET <br />33140 VILLENAVE D\'ORNON (FRANCE)<br />
Une annulation &agrave; intervenant dans les 10 jours pr&eacute;c&eacute;dent le jour de la formation ne pourra donner lieu &agrave; un rembousement.</td></tr>
<tr><td colspan=2><br />
    	<center><input type="submit" name="post" value="Inscription"></center>
</td></tr></table>
    	</form>
<br />
<br />';



echo '<br /><br /></div></center><br /><br />            ';




 }  else {



echo ' <br /><div class="important"><strong>POUR VOUS INSCRIRE, VOUS DEVEZ ETRE MEMBRE DU SITE.<br />
 Si vous n\'&ecirc;tes pas membre, inscrivez-vous <a href=" '.$adresse_site.'/index.php?cat=inscript"><u>ICI</u></a> (Inscription gratuite au site)<br />
 Si vous &ecirc;tes membre, veuillez vous identifier (menu en haut &agrave; droite) pour vous inscrire &agrave; l\'une des journ&eacute;es.</strong></div><br /><br />

 ';
 };

 };

// #####################################################################################
// #####################################################################################

 if ($lien=="question") {
   

   
// envoi du formulaire d email de question // debut // ****************************************************
if ($_POST['qji_post']=="Envoyer") {

$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

  if ($qji_nom == "" || $qji_mail == "" || $qji_tel == "" || $qji_question =="" ) {$err=1;};
  if (preg_match("/[[:print:]]+@([[:alnum:]]|-)+\.[[:alpha:]]+/", $qji_mail)==0) $err_mail=1;;

	if (($err=="")&&($err_mail==""))  {
          
          
          echo "<span class='important'>Votre question a &eacute;t&eacute; prise en compte. Vous serez prochainement contact&eacute; par les organisateurs.</span><br />";

	        $headers = "From: robot@$titre_site2\r\n";
                $headers .= "Reply-To: robot@nepasrepondre.com\r\n";

$qji_nom          = unhtmlentities($qji_nom);
$qji_mail         = unhtmlentities($qji_mail);
$qji_tel          = unhtmlentities($qji_tel);
$qji_question     = unhtmlentities($qji_question);
$qji_date=date("Y-m-d H:i:s");
$qji_ip=$_SERVER['REMOTE_ADDR'];



// ENVOI DU MAIL QUESTION POUR DENTAL ET MACSF

@mail ("laurent.dussarps@gmail.com,marie-laure.mollis@macsf.fr","$qji_nom a une question sur les journees d'installation","
Question de $qji_nom : \n
----\n
$qji_question
----\n
T&eacute;l&eacute;phone : $qji_tel
Email : $qji_mail \n
-------------------------------

date time : $qji_date - ip : $qji_ip : \n

Bonne r&eacute;ception,\nLaurent Dussarps\nDental Networks / Chirdent

");




// MISE EN PLACE DANS LA BDD


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

      $req="INSERT INTO jour_install_questions  (id_qji, qji_nom, qji_mail, qji_tel, qji_question, qji_ip, qji_datetime)
  VALUES ('', '$qji_nom', '$qji_mail', '$qji_tel', '$qji_question', '$qji_date', '$qji_ip')";

$res=mysql_query($req);
$connect=0;


$qji_nom          = "";
$qji_mail         = "";
$qji_tel          = "";
$qji_question     = "";

	}
	}

// envoi du formulaire d email de question // fin // ****************************************************




 if ($err=="1") echo "<span class='important'>Merci de remplir tous les champs dans le formulaire, SVP</span><br />";
 if ($err_mail=="1") echo "<span class='important'>Merci de v&eacute;rifier votre adresse email, SVP</span><br />";

echo'
<br />
<form method="post" action="index.php?cat=jinstall&amp;lien=question">

<center><div style="border: 1px solid #505050; text-align: center; width: 450pt;">

    	<center><br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th colspan="3" scope="col">Pour toute question concernant ces journ&eacute;es, contactez les organisateurs :</th>
   </tr>
   <tr>
     <th scope="col">&nbsp;</th>
     <th colspan="2" scope="col">&nbsp;</th>
   </tr>
   <tr>
     <th rowspan="3" scope="col"><textarea name="qji_question" cols="30" rows="4" id="qji_question">'.$qji_question.'</textarea>
       <br />
     Votre question </th>
     <th scope="col">Votre nom : </th>
     <th scope="col"><input type="text" name="qji_nom" size="25" maxlength="30" value="'.$qji_nom.'" /></th>
   </tr>
   <tr>
     <th scope="col">Votre email : </th>
     <th scope="col"><input type="text" name="qji_mail" size="25" maxlength="120" value="'.$qji_mail.'" /></th>
   </tr>
   <tr>
     <th scope="col">n&deg; t&eacute;l&eacute;phone : </th>
     <th scope="col"><input type="text" name="qji_tel" size="25" value="'.$qji_tel.'" /></th>
   </tr>
   <tr>
     <th colspan="3" scope="col">&nbsp;</th>
   </tr>
   <tr>
     <th colspan="3" scope="col"><input type="submit" name="qji_post" value="Envoyer"></th>
   </tr>
 </table>
<br />
</div>


</form>';

 };




// #####################################################################################
// #####################################################################################







 if ($lien=="detail") { echo '
   
 <p>
 <span class="titredr">Programme de la journ&eacute;e :</span> (&agrave; titre indicatif)
 <br />

 <br />

<p>Vous &ecirc;tes accueillis et pris en charge  par les organisateurs. Des documents p&eacute;dagogiques contenant les conf&eacute;rences vous seront fournis</p>
<br/>
 - &nbsp;8h30-9h00&nbsp;&nbsp;  : Accueil des participants <br />
 -&nbsp; 9h00-9h05&nbsp;&nbsp;  : Pr&eacute;sentation de la journ&eacute;e<br />
 - &nbsp;9h05-9h45&nbsp;&nbsp;  : G&eacute;omarketing<br />
 - &nbsp;9h45-10h00 : Aides &agrave; l\'installation<br />
- 10h00-11h15: Modes d\'exercice et incidences &eacute;conomiques<br />
<br />
Pause<br />
<br />
- 11h30-12h30: Les obligations l&eacute;gales<br />
- 12h30-13h00: La couverture sociale<br />
<br />
D&eacute;jeuner<br />
<br />
- 14h00-14h30: La responsabilit&eacute; civile professionnelle RCP<br />
- 14h30-15h15: Les assurances<br />
- 15h15-16h15: Le budget pr&eacute;visionnel et le financement<br />
<br />
Pause<br />
<br />
- 16h30-17h30: Les postes cl&eacute; de la 2035<br />
- 17h30-18h00: Questions - questionnaire d\'&eacute;valuation <br /> <br /><br />
 <span class="titredr">D&eacute;tail des th&ecirc;mes abord&eacute;s :</span>
 <br /><br />
- <strong>&Eacute;tude de march&eacute; - G&eacute;omarketing</strong> :<br />
des outils existent pour &eacute;valuer le potentiel du lieu de votre installation. Tr&egrave;s pr&eacute;cis, ils permettent de connaitre la population d\'un secteur donn&eacute;, sa consommation de soins (proportion soins / proth&egrave;ses / HN), l\'attractivit&eacute; d\'un secteur sur les communes alentour, etc...</p>
<p>- <strong>Aides &agrave; l&rsquo;installation</strong> : <br />
des dispositifs permettent de b&eacute;n&eacute;ficier d\'exon&eacute;rations fiscales et de pr&ecirc;ts &agrave; taux z&eacute;ro. Il faut en connaitre le d&eacute;tail pour pouvoir en profiter !</p>
<p>- <strong>Modes d&rsquo;exercice et incidences &eacute;conomiques</strong> : <br />
l\'exercice lib&eacute;ral, la collaboration, l\'exercice au sein d\'une SCM ou d\'une SEL : comment &eacute;valuer le juste prix de votre association, quelles diff&eacute;rences entre ces modes d\'exercice et quelles en sont les incidences &eacute;conomiques ?</p>
<p>- <strong>Formalit&eacute;s de l\'installation</strong> : <br />
listing des d&eacute;marches aupr&egrave;s de l\'Ordre, de l\'URSSAF, de l\'Assurance maladie, des imp&ocirc;ts... pour ne rien oublier des formalit&eacute;s.</p>
<p>- <strong>Les obligations l&eacute;gales du chirurgien dentiste</strong> :<br />
  L\'exercice de l\'art dentaire est une activit&eacute; r&egrave;glement&eacute;e. Le chirurgien-dentiste doit respecter notamment le Code de d&eacute;ontologie qui d&eacute;finit les relations entre confr&egrave;res et avec les patients. Le cabinet dentaire est un &eacute;tablissement recevant du public (ERP) ce qui implique certaines obligations &agrave; ajouter &agrave; celles li&eacute;es &agrave; l\'activit&eacute; de soins. <br />
Connaitre les obligations l&eacute;gales li&eacute;es au local peut permettre d\'am&eacute;nager correctement votre cabinet dentaire si vous le cr&eacute;ez, de pr&eacute;voir les am&eacute;nagements &agrave; effectuer si vous rachetez ou vous vous associez.</p>
<p>- <strong>Les obligations l&eacute;gales du chirurgien dentiste employeur </strong>:<br />
Le chirurgien dentiste est un professionnel de sant&eacute; qui n\'est souvent pas pr&eacute;par&eacute; &agrave; son r&ocirc;le d\'employeur. Les formalit&eacute;s de l\'embauche, les affichages obligatoires, l\'organisation mat&eacute;rielle seront abord&eacute;es.</p>
<p>- <strong>Assurances et Couverture sociale</strong>  :<br />
Comment sommes-nous couverts en cas de maladie et maternit&eacute; par l\'assurance obligatoire CARCDSF ? Quand une assurance compl&eacute;mentaire peut-elle &ecirc;tre n&eacute;cessaire ?</p>
<p>- <strong>Budget pr&eacute;visionnel et Financement</strong> :<br />
Comment financer son installation et son mat&eacute;riel ? Le projet est-il rentable ? Quel type de financement choisir (cr&eacute;dit bancaire, leasing mobilier et immobilier) ? Comment n&eacute;gocier ? Qu\'est-ce qui est n&eacute;gociable ?</p>
<p>- <strong>Postes cl&eacute;s de la 2035 (d&eacute;claration des revenus professionnels)</strong> :<br />
Pour tout comprendre pour optimiser sa fiscalit&eacute; : frais d&eacute;ductibles, amortissements, leasings, conditions d\'exon&eacute;rations des plus-values.
</p>
';

};





// #####################################################################################
// #####################################################################################







 if ($lien=="historique") { echo '<table cellspacing="0" cellpadding="2" style="text-align: left" width="100%">';


$req2=mysql_query("SELECT * FROM Jour_install_dates ORDER BY date desc");

$dern_annee = '';

while ($row=mysql_fetch_array($req2)) {

  $njour = substr($row["date"],8,2);
  $nmois = substr($row["date"],5,2);
  $nan = substr($row["date"],0,4);
  if ($row["jour"]==1) {$jour="Lundi";};
  if ($row["jour"]==2) {$jour="Mardi";};
  if ($row["jour"]==3) {$jour="Mercredi";};
  if ($row["jour"]==4) {$jour="Jeudi";};
  if ($row["jour"]==5) {$jour="Vendredi";};
  if ($row["jour"]==6) {$jour="Samedi";};

  




if ($dern_annee!=$nan) {  echo ' <tr><td colspan="2"><br /><strong>'.$nan.'</strong></td></tr>';
                          $dern_annee=$nan ;

     }






echo '<tr><td>'.$jour.' '.date_naturelle($row["date"]).'</td><td>'.$row["ville"].'</td><td> '.$row["adresse"].'</td></tr>';





};

echo '</table>';

 };









    ?>

<br />
<br />

<center><img src="http://www.dentiste-remplacant.com/images/jinst.jpg" width="515" height="172" align="center"/></center>
<br />

<span class="menu3">Dentiste-Remplacant.com et ses partenaires (AGAKAM, CIPS, MACSF et HSBC) vous proposent de participer aux <strong>journ&eacute;es de l'installation</strong> au cous de laquelle tous les points cl&eacute; seront abord&eacute;s. </p>

<br />
<br /> 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
   <tr>
     <th scope="col"><img src="http://www.dentiste-remplacant.com/images/agakam.jpg" width="77" height="77" /></th>
     <th scope="col"><img src="http://www.dentiste-remplacant.com/images/cips.gif" width="102" height="78" /></th>
     <th scope="col"><img src="http://www.dentiste-remplacant.com/images/DR.gif" width="110" height="77" /></th>
     <th scope="col"><img src="http://www.dentiste-remplacant.com/images/macsf.gif" width="97" height="78" /></th>
     <th scope="col"><img src="http://www.dentiste-remplacant.com/images/hsbc.gif" width="150" height="54" /></th>
   </tr>
 </table>
 <br /> <br />
     


</center>





<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>


