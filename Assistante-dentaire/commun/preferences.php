<?PHP

// RECUPERATION DES DONNES
$_SESSION['email']=$email;
$res2=mysql_query("SELECT id_membre,geo,pays FROM $table_membre WHERE email='$email'");
$row2=mysql_fetch_array($res2);
  $id_membre=$row2['id_membre'];
  $pays=$row2['pays'];
  $geo=$row2['geo'];
  if (($geo=="0")||($geo=="")) {}

  else {


if ($siteweb == "DR") {
  
  if ($geo=="9") { $lien_carte ='<strong><a href="'.$adresse_site.'/index.php?cat=dr_annonces&amp;pays='.$pays.'">Offres d\'emploi</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=dr_rempla&amp;pays='.$pays.'">Demandes d\'emploi</a></strong> ';}
  else {
                 
                   $lien_carte ='<strong><a href="'.$adresse_site.'/index.php?cat=dr_annonces&amp;zone='.$geo.'">Offres d\'emploi</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=dr_rempla&amp;zone='.$geo.'">Demandes d\'emploi</a></strong> ';
        };
};


if ($siteweb == "CD") { 
  
  if ($geo=="9") { $lien_carte ='<strong><a href="'.$adresse_site.'/index.php?cat=cd_vente;pays='.$pays.'">Ventes cabinets</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_asso;pays='.$pays.'">Associations</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_locat;pays='.$pays.'">Ventes/locations</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_souhait;pays='.$pays.'">Souhaits acheteurs</a></strong>';}
  else {
                   $lien_carte ='<strong><a href="'.$adresse_site.'/index.php?cat=cd_vente;zone='.$geo.'">Ventes cabinets</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_asso;zone='.$geo.'">Associations</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_locat;zone='.$geo.'">Ventes/locations</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=cd_souhait;zone='.$geo.'">Souhaits acheteurs</a></strong> ';
 

      };
};



if ($siteweb == "AD") {

  if ($geo=="9") {$lien_carte =' <strong><a href="'.$adresse_site.'/index.php?cat=ad_annonces;pays='.$pays.'">Offres d\'emploi</a></strong><br />
                                 <strong><a href="'.$adresse_site.'/index.php?cat=ad_cv;pays='.$pays.'">CV assistantes</a></strong>'; }

  else {
                  $lien_carte ='<strong><a href="'.$adresse_site.'/index.php?cat=ad_annonces;zone='.$geo.'">Offres d\'emploi</a></strong><br />
                                <strong><a href="'.$adresse_site.'/index.php?cat=ad_cv;zone='.$geo.'">CV assistantes</a></strong>';
       };

  };


?>

<div class="menu" style="position:relative; left:20px; top:-264px;"><strong><a href="<? echo "$adresse_site" ?>/article.php">Carte des demandes</a></strong>
<form method="post" name="log" action="<?PHP echo $lien_carte ?>">
<p align="justify" style="padding-right: 45px" />
<img src="<? echo "$adresse_site1"; ?>/images/carte_france_p.gif" style="position:relative; left:0px; top:0px;" align="left" border="0" class="rt"><br />

L'Annuaire National des Rempla&ccedil;ants ou Collaborateurs : 
consultez notre base de donn&eacute;es d'&eacute;tudiants et
de praticiens &agrave; la recherche d'un remplacement, d'un poste salari&eacute;,
d'une collaboration ou d'une association, sur toute la France.<br /><br />
</p>
</div>
<div class="menu" style="position:relative; left:17px; top:-250px;"><img src="<? echo "$adresse_site1" ?>/img/ligne_grise.jpg" width="160" height="1" alt="" /></div>










<?



 };
 
 
 
 
 
 
?>
 
 
