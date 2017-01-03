<?php



$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';



function formatString($aString,$aValues)
{
	// Example: formatString("Tallet ditt er %1%, tallet mitt er %2%", array("321","3928"));
	for ($i=0;$i<count($aValues);$i++)
	{
		$infront = $i+1;
		$aString = ereg_replace("%$infront%", $aValues[$i],$aString);
	}
	return $aString;
}







function AccesReserve () {

global $txt_AccReserv, $txt_PasMbre, $txt_DejaMbre  ;

echo '<table><tr><td valign="top"><img src="images/forbidden_64.png" border="1" width="64" height="64" /></td>
<td><div class="important"><strong>'.$txt_AccReserv.'</strong></div><br /></td></tr>
<td colspan="2"><a href="index.php?cat=inscript"><div class="XLdr"><strong>'.$txt_PasMbre.'</strong></div></a><br /></td></tr>
<td colspan="2"><fieldset style="width:95%; align:left; border: 1px solid #44526b; padding: 10px;">
<div class="XLdr"><strong>'.$txt_DejaMbre.'</strong></div> ';

formulaire(2);

echo'
</fieldset>
</td></tr>
</table><br />
';



}









function imagette ($imagette,$affiche) // $image = adresse de l'image    $affiche = taille en pixels

   {


            $taille=getimagesize($imagette);
            $largeur=$taille[0]; 
            $hauteur=$taille[1];

            //image verticale ou carrée 
            if ($hauteur>=$largeur) 
            {
            $hauteur2=$affiche; 
            $largeur2=round(($hauteur2/$hauteur)*$largeur);
            } 

            //image horizontale ou carrée 
            else
            {
            $largeur2=$affiche; 
            $hauteur2=round(($largeur2/$largeur)*$hauteur);
            }


echo " <a href='$imagette' ><img src='$imagette?".time()."  width='$largeur2' border='0' height='$hauteur2'></a> ";
// La fonction time permet de réactualiser l'image en temps réel : on donne une durée de vie à l'image en qq sortes

   };



// annule les HTMLentites pour l'email à la MACSF


function unhtmlentities($chaineHtml) {
        $tmp = get_html_translation_table(HTML_ENTITIES);
        $tmp = array_flip ($tmp);
        $chaineTmp = strtr ($chaineHtml, $tmp);

        return $chaineTmp;
}






#AFFICHAGE FORMULAIRE D'IDENTIFICATION
function formulaire($AffConnect) {

global $email, $pass, $connect, $administrateur, $txt_mem, $txt_VoCompt, $txt_deconnect, $HTTP_USER_AGENT, $txt_Vemail, $txt_pass ;


if ($connect!=1) {


     if ($AffConnect=="1") {
// Détermination du type de navigateur employé par le visiteur
echo'
<div valign="top" style="position:relative; left:'; if (ereg ("Firefox", $HTTP_USER_AGENT)) {echo "170";} else {echo "170";}; echo 'px; top:12px;"  />
<form method="post" name="log" action="http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']).'/index.php">
<input type="text" class="rt" size="25" maxlength="120" value="email" name="email"
          onfocus="javascript:if(this.value==\'email\') this.value=\'\';"
          onblur="javascript:if(this.value==\'\') this.value=\'email\';" />
<input type="password" class="rt" size="15" maxlength="120" value="password" name="pass" onclick="javascript:if(this.value==\'password\') this.value=\'\';"
          onblur="javascript:if(this.value==\'\') this.value=\'password\';" />

<input type="checkbox" name="memoriser" title="se souvenir de mes identifiants" / style="position:relative; top:3px; width: 30px">'.$txt_mem.'
 <input type="submit" class="submit" name="ok" value="Ok" />
</form>
 </div>


       ';        }


     if ($AffConnect=="2") {
// Détermination du type de navigateur employé par le visiteur
echo'
<table>
<tr><td width="320">
<form method="post" name="log" action="http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']).'/index.php">
<p><label>'.$txt_Vemail.' :</label>
<input type="text" class="rt" size="30" maxlength="120" value="email" name="email"
          onfocus="javascript:if(this.value==\'email\') this.value=\'\';"
          onblur="javascript:if(this.value==\'\') this.value=\'email\';" />
</p>
<p><label>'.$txt_pass.' :</label>
<input type="password" class="rt" size="25" maxlength="120" value="password" name="pass" onclick="javascript:if(this.value==\'password\') this.value=\'\';"
          onblur="javascript:if(this.value==\'\') this.value=\'password\';" />
</p>
<p><label><input type="checkbox" name="memoriser" style="position:relative; top:3px; width: 30px">
'.$txt_mem.' </label>
</p>
 <input type="submit" class="submit" name="ok" value="Ok" />
</form>
</td><td width="140"><img src="images/empreinte.jpg" border="1" width="140" height="200" /></td></tr></table>

       ';        }

    
         }
    

    else {
      
      if ($AffConnect=="1") {

      if (isset($_COOKIE['DentalNetworks'])) $url_decon='<input type="button" value="'.$txt_deconnect.'" style="width: 100px" class="bout" onclick="javascript:location.href=\'index.php?co=null\'" />';
      else $url_decon='<input type="submit" value="'.$txt_deconnect.'" title="'.$txt_deconnect.'" class="bout" style="width: 100px" />';

      echo'
<div valign="top" style="position:relative; left:'; if (ereg ("Firefox", $HTTP_USER_AGENT)) {echo "170";} else {echo "170";}; echo 'px; top:12px;"  />
<form method="post" action="http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']).'/index.php">
<font class="titre">'.$_SESSION['email'].' </font>
<a href="http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']).'/index.php?cat=compte" />'.$txt_VoCompt.'</a>  |
<a href="http://'.$_SERVER["HTTP_HOST"].dirname($_SERVER['PHP_SELF']).'/index.php?co=null">'.$txt_deconnect.'</a>
<input type="hidden" name="email" value="" />
</form>
</div>

';                       }



       if ($AffConnect=="2") {  header("location:index.php?cat=compte");

                       }


   }



} // fin formulaire









Function Pub () {

global $txt_Pub ;

echo '
<fieldset style="width:90%; align:left; border: 1px solid #44526b; padding: 10px;">
<legend style="color: #FFFFFF; background: #44526b; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong>'.$txt_Pub.' :</strong></legend>
<br /><br /> <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
</fieldset>
';
  };










// Détermination du navigateur

 function getBrowser()
{
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
     $platform = 'Unknown';
     $version= "";
 
    //First get the platform?
     if (preg_match('/linux/i', $u_agent)) {
         $platform = 'linux';
     }
     elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
         $platform = 'mac';
     }
     elseif (preg_match('/windows|win32/i', $u_agent)) {
         $platform = 'windows';
     }
     
    // Next get the name of the useragent yes seperately and for good reason
     if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Internet Explorer'; 
        $ub = "MSIE"; 
    } 
    elseif(preg_match('/Firefox/i',$u_agent)) 
    { 
        $bname = 'Mozilla Firefox';
        $ub = "Firefox"; 
    } 
    elseif(preg_match('/Chrome/i',$u_agent)) 
    { 
        $bname = 'Google Chrome'; 
        $ub = "Chrome"; 
    } 
    elseif(preg_match('/Safari/i',$u_agent)) 
    { 
        $bname = 'Apple Safari'; 
        $ub = "Safari"; 
    } 
    elseif(preg_match('/Opera/i',$u_agent)) 
    { 
        $bname = 'Opera'; 
        $ub = "Opera"; 
    } 
    elseif(preg_match('/Netscape/i',$u_agent)) 
    { 
        $bname = 'Netscape'; 
        $ub = "Netscape"; 
    } 
    
    // finally get the correct version number
     $known = array('Version', $ub, 'other');
     $pattern = '#(?<browser>' . join('|', $known) .
     ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
     if (!preg_match_all($pattern, $u_agent, $matches)) {
         // we have no matching number just continue
     }
     
    // see how many we have
     $i = count($matches['browser']);
     if ($i != 1) {
         //we will have two since we are not using 'other' argument yet
         //see if version is before or after the name
         if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
             $version= $matches['version'][0];
         }
         else {
             $version= $matches['version'][1];
         }
     }
     else {
         $version= $matches['version'][0];
     }
     
    // check if we have a number
     if ($version==null || $version=="") {$version="?";}
     
    return array(
         'userAgent' => $u_agent,
         'name'      => $bname,
         'version'   => $version,
         'platform'  => $platform,
         'pattern'   => $pattern
     );
 }


















// ####################          bibliotheque des fonctions communes

Function removeaccents($string){
   $string= strtr($string,  "ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ","AAAAAAaaaaaaOOOOOOooooooEEEEeeeeCcIIIIiiiiUUUUuuuuyNn");
   return $string; 
   }






function protect($chaine) { // protection contre injection de code
  $chaine= htmlentities($chaine, ENT_NOQUOTES, "UTF-8");
  $chaine=stripslashes(trim($chaine));
  if ($chaine!="")
    return $chaine;
  else
    return FALSE;
}



function email_valid() {  // verification si l'email a été confirmé
  global $id_membre;
  $res=mysql_query("SELECT validation FROM membres WHERE id_membre='$id_membre'");
  $r=mysql_fetch_array($res);
  if ($r['validation']==0) return TRUE; else return FALSE;
}




function a($chaine) {
  $chaine=addslashes($chaine);
  return $chaine;
}

function s($chaine) {
  $chaine=stripslashes($chaine);
  return $chaine;
}






function nav($nb_ligne,$limite,$page){
	if(isset($_GET['deb'])) $debut=$_GET['deb'];
	else $debut=0;

	$pages=intval($nb_ligne/$limite);
	if ($nb_ligne%$limite) $pages++;
	
	$ligne='';
	
	if($pages>1){
		$page_ac=$debut/$limite+1;

		if($pages>10){
			if($page_ac<=5){
				$deb=1;
				$fin=10;
			}
			elseif($page_ac>5 && $pages-$page_ac>5){
				$deb=$page_ac-3;
				$fin=$page_ac+6;
			}
			elseif($pages-$page_ac<=5){
				$deb=$pages-9;
				$fin=$pages;
			}
			else{
				$deb=1;
				$fin=$pages;
			}
		}
		
		else{
			$deb=1;
			$fin=$pages;
		}

		if($page_ac>2){
			$ligne.='<a href="'.$page.'">&lt;&lt;</a> ';
		}
		
		if($debut>=$limite){
			$precedent=$debut-$limite;
			$ligne.='<a href="'.$page.'&amp;deb='.$precedent.'">&lt;</a>';
		}

		for ($i=$deb;$i<=$fin;$i++){
			$nouvdebut=$limite*($i-1);
			if($nouvdebut==$debut){
				$ligne.='<strong>'.$i.'</strong> ';
            }
			else{
				$ligne.='<a href="'.$page.'&amp;deb='.$nouvdebut.'">'.$i.'</a> ';
			}
		}
		if($debut!=$limite*($pages-1)){
			$suivant=$debut+$limite;
			$ligne.='<a href="'.$page.'&amp;deb='.$suivant.'">&gt;</a>';
		}

		if ($nb_ligne%$limite)
			$final=($pages-1)*$limite;
		else
			$final=$pages*$limite;

		if($fin!=$pages){
			$ligne.=' <a href="'.$page.'&amp;deb='.$final.'">&gt;&gt;</a> ';
		}

	}
	echo $ligne;
}










function date_naturelle($date) {  // transformation d'un datetime en date francaise
  $an=strtok($date,"-");
  $mois=strtok("-");
  $jour=strtok("-");
  $jour=strtok($jour," ");
  $hms=str_replace("$an-$mois-$jour"," - ", $date);
  $h=strtok($hms, ":"); $m=strtok(":"); $s=strtok(":");
  if (trim($s)!="") $heure=$h."h".$m; else $heure="";
  //if (substr_count($heure, ":")==0) $heure="";
  $mois_nat=array("", "janvier", "f&eacute;vrier", "mars", "avril", "mai", "juin", "juillet", "ao&ucirc;t", "septembre", "octobre", "novembre", "d&eacute;cembre");
  $date_nat="$jour ".$mois_nat[abs($mois)]." $an";
  if ($jour==0 && $mois==0 && $an==0)
  return "nc";
  else
  return $date_nat.$heure;
}


function date_naturelle_s($date) {  // transformation d'un datetime en date francaise
  $an=strtok($date,"-");
  $mois=strtok("-");
  $jour=strtok("-");
  $jour=strtok($jour," ");
  $hms=str_replace("$an-$mois-$jour"," à ", $date);
  $h=strtok($hms, ":"); $m=strtok(":"); $s=strtok(":");
  if (trim($s)!="") $heure=$h."h".$m; else $heure="";
  //if (substr_count($heure, ":")==0) $heure="";
  $mois_nat=array("", "janvier", "f&eacute;vrier", "mars", "avril", "mai", "juin", "juillet", "ao&ucirc;t", "septembre", "octobre", "novembre", "d&eacute;cembre");
  $date_nat="$jour ".$mois_nat[abs($mois)]." $an";
  if ($jour==0 && $mois==0 && $an==0) 
  return "nc";
  else
  return $date_nat;
}





function get_diff_dates($date1,$date2)  // donne la différence entre deux dates
{

//Extraction des données
// FORMAT DATE : AAAA-MM-JJ
list($annee1, $mois1, $jour1) = explode('-', $date1);
list($annee2, $mois2, $jour2) = explode('-', $date2);
//Calcul des timestamp
$timestamp1 = mktime(0,0,0,$mois1,$jour1,$annee1);
$timestamp2 = mktime(0,0,0,$mois2,$jour2,$annee2);
$reste = ($timestamp2 - $timestamp1)/86400;

echo $reste; //Affichage du nombre de jour
// echo abs($timestamp2 - $timestamp1)/(86400*7); //Affichage du nombre de semaine
// On utilise abs afin d'obtenir toujours une valeur positive, donc les dates peuvent être mises dans n'importe quel ordre.

}





function valid_date_1($jour,$mois,$annee)  // vérifie si la date est valide
{ if (!is_numeric($jour) or $jour>31 or !is_numeric($mois) or $mois>12 or !is_numeric($annee) or $annee<date("Y") or $jour==0 or $mois==0 or $annee==0)
    {return FALSE;} else {return TRUE;};

};







function valid_date_2($jour,$mois,$annee)  // vérifie si la date n'est pas passée = compare à la date d'aujourd'hui
{         $date = mktime (0,0,0,$mois,$jour,$annee);
          $date_actuelle = mktime (0,0,0,date("m"),date("d"),date("Y"));
          if (($date-$date_actuelle) <0)   {return FALSE;} else {return TRUE;};


};



function valid_compare_date($jour1,$mois1,$annee1,$jour2,$mois2,$annee2)  // vérifie que la date 2 est bien après la date 1
{         $date1 = mktime (0,0,0,$mois1,$jour1,$annee1);
          $date2 = mktime (0,0,0,$mois2,$jour2,$annee2);
          if (($date2-$date1) <0) {return FALSE;} else {return TRUE;};

};

function date_6mois_maxi($jour,$mois,$annee)  // vérifie que la date est inférieure à maintenant+10 mois
{         $date = mktime (0,0,0,$mois,$jour,$annee);
          $mois6 =  date("m")+10;
          $date_6mois = mktime (0,0,0,$mois6,date("d"),date("Y"));
          if (($date_6mois-$date) <0)   {return FALSE;} else {return TRUE;};

};




function url($url){

if ((get_cfg_car("session.use_trans_sid") == 0) and (SID != "")) {
$url .= ((strpos($url,"?") === FALSE)?"?":"&").SID;
}
return $url;
};





function playflash ($a){

echo("
<OBJECT classid=\"clsid:D27CDB6E-AE6D-11cf-96B8-444553540000\"
 codebase=\"http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0\"
 ID=Movie1 WIDTH=20 HEIGHT=20>
 <PARAM NAME=movie VALUE=\"$a\"> <PARAM NAME=quality VALUE=high> <PARAM
NAME=bgcolor VALUE=#FFFFFF> <EMBED src=\"Movie1.swf\" quality=high
bgcolor=#FFFFFF  WIDTH=20 HEIGHT=20 TYPE=\"application/x-shockwave-flash\"
PLUGINSPAGE=\"http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash\"></EMBED>
</OBJECT>
");

};



# ----------------------------------------------------------------------------------------


function error ($error){

echo ("<center><b><font size=2>$error</font></b></center>");
@include ("finhtml.php");
exit;

};

# ----------------------------------------------------------------------------------------


function erreurserveurmysql() {
echo ("<center><b><font color=FF0000 size=2>Erreur d'accès à la base de donnée SQL<br>Veuillez nous excusez de ce désagrément</font></b></center>");
@include ("finhtml.php");
exit;
};




# ----------------------------------------------------------------------------------------



function scrolljava ($a,$b,$c){

echo("
<center>
<applet code=\"text_scroller.class\" width=700 height=70>
<param name=info value=\"Applet by Gokhan Dagli,textscroller.tripod.com\">
<param name=textcolor value=\"6C8AB7\">
<param name=bgcolor value=\"FFFFFF\">
<param name=enable_bgpicture value=\"0\">
<param name=speed value=\"120\">	
<param name=textdimension value=\"12\">
<param name=fonttype value=\"Arial\">
<param name=paragraph_number value=\"3\">
<param name=parag1 value=\"$a\">
<param name=parag2 value=\"$b\">
<param name=parag3 value=\"$c\">
</applet>
</center>");
};


# ----------------------------------------------------------------------------------------

function fdate ($date){


$array = split("-", $date); 
$date="$array[2]-$array[1]-$array[0]";
return ($date);
};


# ----------------------------------------------------------------------------------------


function lastnews (){

require ("adminews/news-conf.php3");
$lngfile="adminews/lang/fr.txt";

//-------------translation-------------------------------------------
$phrases = get_translations($lngfile);

if (!isset($debut)) $debut = 0;

$connexion = @mysql_connect("$serveur","$user","$password");
if (!$connexion) {echo erreurServeurMySQL();}

if ($connexion) {
$resultat = mysql_db_query("$base","select * from $table order by date desc Limit $debut,$nnp",$connexion);
$num = mysql_num_rows($resultat);

if ($num<>0)
 {
  $i=0;

  while ($i<$num)
   {
  $titre = mysql_result($resultat,$i,"titre");
  $titrez = "$titre";
  $titre = "<b>$titre</b>";
  $titre = strtoupper($titre); # Titre en majuscules
  
  
    $id = mysql_result($resultat,$i,"id");
    $Date = mysql_result($resultat,$i,"date");
    $texte = mysql_result($resultat,$i,"texte");
    $auteur = mysql_result($resultat,$i,"auteur");
    $autmail = mysql_result($resultat,$i,"autmail");
    $categ = mysql_result($resultat,$i,"categorie");
    $image = mysql_result($resultat,$i,"image");
    $imgurl = mysql_result($resultat,$i,"imgurl");
    $target = mysql_result($resultat,$i,"target");
    $texte = ucfirst($texte);
    $texte = ereg_replace("\n","<br>",$texte);
    $titre = ucfirst($titre);
    $datelim = mktime(date("H"),date("i"),0,date("m"),date("d")-$jours,date("Y"));
    $datelim1 = date("Y/m/d H:i", $datelim);
    $time = substr ("$Date", -5);
    $rest = substr ("$Date", 0, 10);
    list ($year, $month, $day) = split ("/", $rest);

$titre = strtoupper($titre);

//------------------------------------------------------------------------
// date format
//------------------------------------------------------------------------

    $Date1 = ("$day"."-"."$month"."-"."$year"." $time");

# mise en forme belle


$texter=substr ($texte,0,150);
$textpalm=addslashes($texte);


echo'
<div style="widh:100%; height: auto;border: 1px dotted #ccccdd; text-align: left; padding: 2px">
	<div style="widh:100%; height: auto; background-image: url(\'images/a18.jpg\'); text-align: left; padding: 2px; border: 1px solid #ffffff;">
		<b>'.$titre.'</b><br />
		cat&eacute;gorie '.$categ.'
	</div>
		'.$texter.'...
		<div style="text-align: right"><a href="news.php?cmd=lire&art='.$id.'">Lire l\'article complet</a></div>
</div>';

$i++;   }
 }

#echo"<br>";

$resultat = mysql_close($connexion);

}

};  

?>
