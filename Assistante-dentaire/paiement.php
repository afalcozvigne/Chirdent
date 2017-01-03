<?PHP

// include("admin/citelis.php"); // config de citelis
// formulaire d'inscription et modification commun avec verif et insert BDD
// ce script est appelé à l'inscription d'un site, d'un évènement ou lors d'une modif section membres


// VERIF DES CHAMPS

$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];
$tarif = $_POST['tarif'];
$inc=$_REQUEST['inc'];

$numeric = ' onKeypress="if((event.keyCode < 45 || event.keyCode > 57) && event.keyCode > 31 && event.keyCode != 43) event.returnValue = false; if((event.which < 45 || event.which > 57) && event.which > 31 && event.which != 43) return false;"';


include("commun/connect.php");
$_SESSION['email']=$email;
$res2=mysql_query("SELECT * FROM $table_membre WHERE email='$email'");
$row2=mysql_fetch_array($res2);
$type = $row2['type'];
$id_membre = $row2['id_membre'];




if ((isset($type)) && (isset($_SESSION['email'])))  {


if ($cat=='paiement')  {
echo ' <br />
<div class="important"><strong>Bienvenue '.$row2['prenom'].' '.$row2['nom'].' sur les sites du Groupe Dental NetWorks, votre adresse email est confirm&eacute;e. Vous pouvez poursuivre votre inscription :</strong></div><br /><br />';
$mu=3;
echo'<br />';
include("inscriptionbd.php");
                        }

if ($cat=='activ')  {
echo ' <br />
<div class="important"><strong> '.$row2['prenom'].' '.$row2['nom'].', votre inscription n\'est plus valide. Vous devez r&eacute;activer votre compte pour utiliser les services Web du groupe Dental Networks :</strong></div><br /><br />';
echo'<br />';
                    }


if ($post=="") {



echo ' 
<br /><br />
<span class="titre"><strong>PAIEMENT</strong></span><br />
<br />
Vous disposez de plusieurs solutions de paiement. Choisissez votre moyen de paiement :<br />
<br />  <br />
<hr style="border: 1px solid #ccccdd"/>

<div class="menu3"><strong>Durée de l\'inscription</strong></div> <br />

<FORM action="index.php?cat=paiement" method=post>';

if (($type=="1") || ($type=="2") || ($type=="3") || ($type=="4")|| ($type=="9")) {

echo '<input type="radio" value="0" name="tarif" onclick=this.form.submit() '; if ($tarif=="0") echo 'checked="checked"'; echo ' /> Inscription pour 6 mois : 10 euros <br />
<input type="radio" value="1" name="tarif" onclick=this.form.submit() '; if (($tarif=="1") || ($tarif=="")) echo 'checked="checked"'; echo ' /> Inscription pour 12 mois : 15 euros <br />';

                                                             };


if (($type=="5") || ($type=="6") || ($type=="7") || ($type=="8")) {

echo '<input type="radio" value="0" name="tarif" onclick=this.form.submit() '; if ($tarif=="0") echo 'checked="checked"'; echo ' /> Inscription pour 6 mois : 25 euros <br />
<input type="radio" value="1" name="tarif" onclick=this.form.submit() '; if (($tarif=="1") || ($tarif=="")) echo 'checked="checked"'; echo ' /> Inscription pour 12 mois : 35 euros <br /> ';

                                                             };

echo '

</FORM>

<br />  <br />
<hr style="border: 1px solid #ccccdd"/>

<div class="menu3"><strong>Modalité de paiement</strong></div>
<table width="100%">
  <tr><td width="50%" align="center" style="background: #e5ebf5; padding: 5px; border: 15px solid #ffffff" valign="top">
<fieldset style="border: 1px solid #000000; background: #E3E6F0">
<legend style="color: #000000";><strong>Paiement sécurisé par carte bancaire</strong></legend> <br />
  Payer par le service de paiement sécurisé Citelis sur internet du Crédit Mutuel.<br /><br />
<form method="post" action="citelis/sample/call_request.php">

   ';







if (($type=="1") || ($type=="2") || ($type=="3") || ($type=="4")|| ($type=="9")) {      if ($tarif=="0") {$MONTANT_site = 1000;};
                                                                                        if ($tarif=="1") {$MONTANT_site = 1500;};
                                                                                        if (($tarif!="0") && ($tarif!="1")) {$MONTANT_site = 1500;};
                                                                   };


if (($type=="5") || ($type=="6") || ($type=="7") || ($type=="8")) {      if ($tarif=="0") {$MONTANT_site = 2500;};
                                                                         if ($tarif=="1") {$MONTANT_site = 3500;};
                                                                         if (($tarif!="0") && ($tarif!="1")) {$MONTANT_site = 3500;};
                                                                   };


// paramètres pour CITELIS


$IDENT_FACTURE=date("Hmi").$id_membre;

// on tronque IDENT_FACTURE pour ne garder que 6 chiffres
$IDENT_FACTURE = substr($IDENT_FACTURE, 0, 6);

?>


<input type="hidden" name="siteid" value="<?php echo $siteid ?>" />
<input type="hidden" name="prix_total" value="<?php echo $prix_total ?>" />
<input type="hidden" name="frais_expedition" value="<?php echo $frais_expedition ?>" />
<input type="hidden" name="IDENT_FACTURE" value="<?php echo $IDENT_FACTURE ?>" />
<input type="hidden" name="article" value="<?php echo $article ?>" />
<input type="hidden" name="order_id" value="<?php echo $order_id ?>" />
<input type="hidden" name="LIBELLE" value="<?php echo $LIBELLE ?>" />
<input type="hidden" name="customer_email" value="<?php echo $customer_email ?>" />

<input type="image" src="http://www.occasion-dentaire.chirdent.net/images/b-citelis.gif" value="Citelis" border="0" />
</form>


<?php

// citelis

     /* ATTENTION au chemin pour l'include   */
     //ini_set('include_path', 'citelis/sample/');
     // include("citelis/sample/call_request.php");
     /* initialisation de l objet Citelis */
     // $facture = new Citelis;
     // $facture->init("requete");

     /* création des parametres de la facture */     /* obligatoire */
     $facture->MONTANT = $MONTANT_site; /*montant en Centimes !!!!! */
     


     /* obligatoire mais renseigné par des valeurs par défaut si pas renseigné */
     //$facture->IDENT_FACTURE=;
     //$facture->CODE_LANGUE=;

     /* facultatif */
     //$facture->CODE_DEVISE_COMPL=;
     //$facture->COMPLEMENT_TICKET="++".$_SESSION['siteid'];
     $facture->CONTENU_CADDIE="Annonce No ".$_SESSION['siteid'].": $LIBELLE";
     $facture->CONTEXTE_RETOUR=$_SESSION["valid_user"];
     $facture->EMAIL_CLIENT=$_SESSION["valid_user"];
     //$facture->NUM_CLIENT;
     //$facture->NUM_COMMANDE;
     //$facture->URL_ANNULATION;
     //$facture->URL_REFUS;
     //$facture->URL_SUCCES;

     // $facture->depart_paiement();


?>



echo '          
		</fieldset></td>
		<td align="center" style="background: #e5ebf5; padding: 5px; border: 15px solid #ffffff" valign="top">
		<fieldset style="border: 1px solid #000000; background: #E3E6F0">
<legend style="color: #000000";><strong>Paiement par chèque bancaire</strong></legend><br />
			Votre inscirption est validée dès réception du chèque.<br /><br />
                       <center><input type="image" src="'.$adresse_site1.'/citelis/logo/cheque.jpg" /></center><br/>
                        Vous êtes prévenu par email.<br /><br />
                        Libellez votre chèque à l\'ordre de Dental Networks SARL<br />
                        Et envoyez le : 7, rue Jules Michelet 33140 VILLENAVE D\'ORNON - (FRANCE) <br /><br /> </fieldset>

		</td>
	</tr>
</table>

<br />
<br /><br /> ';


};};

?>
