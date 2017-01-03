<?PHP




$postMACSF=$_POST['postMACSF'];


echo '
<br />
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">

<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">MERCI DE VOTRE INSCRIPTION !</font></td></tr>
</table><br /><br />
<br />';





if (isset($_SESSION['email']))  {
  

  $_SESSION['email']=$email;
  $res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
  $row2=mysql_fetch_array($res2);
  


if ($row2['pays'] == "France")  {


echo '
<br /><br />

<span>Si vous souhaitez &ecirc;tre contact&eacute; par la MACSF et recevoir le cadeau de bienvenue, merci de remplir le formulaire :</span>
(Si vous ne souhaitez pas, cliquez <a href="index.php?cat=compte">ACCES DIRECT A VOTRE COMPTE</a>)
<br /><br />

';







// envoi du formulaire d email
if (isset($_POST['postMACSF'])) {


// Vérifie si n'a pas déjà fait la demande de cadeau
$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);
      $req="SELECT id_mbre FROM cadeau_macsf where id_mbre=$id_membre";
      $res=mysql_query($req);
      $nb = mysql_num_rows($res);
  if ($nb > 0) $err_dejainscrit=1;
  

	
  if ($mutuelle == "" && $prevoyance == "" && $rcp == "" && $locaux == "" && $auto == "" && $habitation == "" && $epargne == "" && $retraite == "" && $immobilier == "" && $materiel == "" && $autre == ""  ) $err=1;
  if ($okmacsf == "" ) $err_okmacsf=1;


	if (($err=="") && ($err_okmacsf=="") && ($err_dejainscrit=="")) {
          
          
          echo '<span class="important">Votre demande a &eacute;t&eacute; prise en compte. Vous serez prochainement contact&eacute; par la MACSF.</span><br /><a href="index.php?cat=compte">ACCES DIRECT A VOTRE COMPTE</a>';

	        $headers = "From: robot@$titre_site2\r\n";
                $headers .= "Reply-To: robot@nepasrepondre.com\r\n";


if ($row2['type'] == "1") {$inscrit = "Chirurgien dentiste non installé";};
if ($row2['type'] == "2") {$inscrit = "Chirurgien dentiste installé (seul ou en association)";};
if ($row2['type'] == "3") {$inscrit = "Etudiant en chirurgie dentaire";};
if ($row2['type'] == "4") {$inscrit = "Assistante Dentaire";};

$id_membre        = unhtmlentities($row2['id_membre']);
$civilite_macsf   = unhtmlentities($row2['civilite']);
$prenom_macsf     = unhtmlentities($row2['prenom']);
$nom_macsf        = unhtmlentities($row2['nom']);
$adresse_macsf    = unhtmlentities($row2['adresse']);
$postal_macsf     = unhtmlentities($row2['postal']);
$ville_macsf      = unhtmlentities($row2['ville']);
$telephone_macsf  = unhtmlentities($row2['telephone']);
$mobile_macsf     = unhtmlentities($row2['mobile']);
$email_macsf      = unhtmlentities($row2['email']);
$jour = substr($row2["anniv"],8,2);
$mois = substr($row2["anniv"],5,2);
$an = substr($row2["anniv"],0,4);
$date_kdo=date("Y-m-d H:i:s");
$ip=$_SERVER['REMOTE_ADDR'];

$interet == "";
if ($mutuelle == "1")   {$interet .= "Mutuelle\n";              $interet_resume .= "01-";  };
if ($prevoyance == "1") {$interet .= "Prévoyance\n";            $interet_resume .= "02-";};
if ($rcp == "1")        {$interet .= "Assurance RCP\n";         $interet_resume .= "03-";};
if ($locaux == "1")     {$interet .= "Assurance locaux\n";      $interet_resume .= "04-";};
if ($auto == "1")       {$interet .= "Assurance auto\n";        $interet_resume .= "05-";};
if ($habitation == "1") {$interet .= "Assurance habitation\n";  $interet_resume .= "06-";};
if ($epargne == "1")    {$interet .= "Epargne\n";               $interet_resume .= "07-";};
if ($retraite == "1")   {$interet .= "Retraite\n";              $interet_resume .= "08-";};
if ($immobilier == "1") {$interet .= "Financment immobilier\n"; $interet_resume .= "09-";};
if ($materiel == "1")   {$interet .= "Financment materiel\n";   $interet_resume .= "10-";};
if ($autre == "1")      {$interet .= "autre(s) financement(s)";  $interet_resume .= "11";};


// ENVOI DU MAIL

@mail ("laurent.dussarps@gmail.com,marie-laure.mollis@macsf.fr,marketing@macsf.fr","$prenom_macsf $nom_macsf veut un
cadeau MACSF","
INSCRIPTION SUR $titre_site3\n
--Données confidentielles, ne diffuser qu'en interne --\n
$civilite_macsf $prenom_macsf $nom_macsf\n$inscrit.\n$adresse_macsf\n$postal_macsf $ville_macsf\n(FRANCE)\n
Téléphone : $telephone_macsf
Portable : $mobile_macsf \n

Date de naissance : $jour-$mois-$an\n
 \n

-------------------------------

Souhaite des informations concernant : \n

$interet


Bonne réception,\nLaurent Dussarps\nDental Networks / Chirdent

");




// MISE EN PLACE DANS LA BDD


$conexion_rech=mysql_connect($DBserveur,$DBuser,$DBpassword);
$selectbase=@mysql_select_db($dbase);

      $req="INSERT INTO cadeau_macsf (id_mbre, site, date, ip, interets, rencontre)
  VALUES ('$id_membre', '$siteweb', '$date_kdo', '$ip', '$interet_resume', '0')";

$res=mysql_query($req);
$connect=0;


		}
	}


?>







<center>
<div style="width:80%; text-align: left; padding: 4px;">

    <?php

    if ($err!="") echo "<span class='important'>Merci de cocher une ou plusieurs case(s) dans le formulaire</span><br />";
    if ($err_okmacsf!="") echo "<span class='important'>Vous devez accepter d'&ecirc;tre contact&eacute; par la MACSF</span><br />";
    if ($err_dejainscrit!="")  echo "<span class='important'>Vous &ecirc;tes d&eacute;j&agrave; inscrit pour &ecirc;tre contact&eacute; par la MACSF</span><br />";

    echo' 
<form method="post" action="index.php?cat=macsf&amp;postMACSF=OK">
    	<center><br />


    	Vous souhaitez des informations concernant :<br />

    	  <table width="500" border="0" cellpadding="0" cellspacing="0" bordercolor="#000000">
            <tr>
              <th width="125" bgcolor="#f29400" scope="col">Mutuelle</th>
              <th width="125" bgcolor="#97be0d" scope="col">Assurance</th>
              <th width="125" bgcolor="#009ee0" scope="col">Epargne</th>';
              
// Pas de financement pour les assistantes
if ($row2['type'] != "4") {echo '<th width="125" bgcolor="#93117e" scope="col">Financement</th>';};


            echo '</tr>
            <tr>
              <td valign="top">

              <input type="checkbox" name="mutuelle" value="1" /> Mutuelle<br />
              <input type="checkbox" name="prevoyance" value="1" /> Pr&eacute;voyance
              
              </td>

              <td valign="top">
              
              <input type="checkbox" name="rcp" value="1" /> RCP<br />
              <input type="checkbox" name="locaux" value="1" />locaux<br />
              <input type="checkbox" name="auto" value="1" />Auto<br />
              <input type="checkbox" name="habitation" value="1" />habitation
              
              </td>

              <td valign="top">
              
              <input type="checkbox" name="epargne" value="1" />Epargne<br />
              <input type="checkbox" name="retraite" value="1" />Retraite
              
              </td> ';

// Pas de financement pour les assistantes
 if ($row2['type'] != "4") {echo '

              <td valign="top">

              <input type="checkbox" name="immobilier" value="1" />Immobilier<br />
              <input type="checkbox" name="materiel" value="1" />Mat&eacute;riel<br />
              <input type="checkbox" name="autre" value="1" />autre

              </td>  ';};
              

echo '            </tr>
          </table>
    	  <br />
    	</center>

             <br />


          Vos coordonn&eacute;es vont &ecirc;tre communiqu&eacute;es afin que le cadeau de bienvenue puisse vous &ecirc;tre adress&eacute; ; merci de v&eacute;rifier leur validit&eacute; :
          <br /><br />
          <strong>'.$row2['civilite'].' '.$row2['prenom'].' '.$row2['nom'].'</strong><br />
          '.$row2['adresse'].' - '.$row2['postal'].' '.$row2['ville'].'<br />
          '.$row2['telephone'].' '.$row2['mobile'].'<br />
          '.$row2['email'].'

          <br /><br />
          <input type="checkbox" name="okmacsf" value="checkbox" />
    	  J\'accepte d\'&ecirc;tre contact&eacute; pour la remise du cadeau de bienvenue. <br />
    	  Cette offre est limit&eacute;e &agrave; 1 cadeau par personne en France et dans la limite des stocks disponibles.<br />
    	  Si vous &ecirc;tes assistante, pour des raisons statutaires, seules les assistantes dipl&ocirc;m&eacute;es peuvent &ecirc;tre contact&eacute;es par la MACSF.

          <br /><br />
    	<input type="submit" name="postMACSF" value="Etre contact&eacute;"> </form>




    	';

}

// Pas en France métropolitaine
else { header("location: index.php?cat=compte");  };

 }  else {       // Pas connecté

                                          

echo ' <br /><div class="important"><strong>ACCES RESERVE AUX MEMBRES.<br />
 Si vous &ecirc;tes membre, veuillez vous identifier pour acc&eacute;der &agrave; cette zone.</strong></div><br /><br />

<br />

<span class="menu3">La MACSF vous propose de vous offrir un cadeau et de r&eacute;pondre &agrave; vos questions en mati&egrave;re de mutuelle, assurance, &eacute;pargne et financement.
Merci de vous identifier afin d\'obtenir vos coordonn&eacute;es pour vous contacter.</strong></span>
<br />
<br />  ';
 };



 
echo '</div></center>';



 echo '

</td><td width="40%" valign="top">
     ';



Pub() ;




echo '

</td></tr></table>
';


