<?

// S'affiche juste après la création de l'annonce.
// paiement.php : même rôle mais si on paie une annonce déjà créée ultérieurement

$AFFICHE_montant = $MONTANT_site/100;

echo '<br /><br />
Votre inscription sera activ&eacute;e <strong>apr&egrave;s</strong> votre paiement car carte bancaire (activation imm&eacute;diate) ou par ch&egrave;que bancaire (activation d&egrave;s r&eacute;ception du ch&egrave;que).

<br /><br />
<hr style="border: 1px solid #ccccdd"/>

<div class="menu3"><strong>Modalit&eacute; de paiement</strong></div>
<table width="100%">
  <tr><td align="center" style="background: #e5ebf5; padding: 5px; border: 15px solid #E3E6F0" valign="top">

<fieldset style="border: 1px solid #000000; background: #E3E6F0">
<legend style="color: #000000";><strong>Paiement s&eacute;curis&eacute; par carte bancaire</strong></legend>
Payer <strong>'.$AFFICHE_montant.' &euro; par le service de paiement s&eacute;curis&eacute; Citelis sur internet du Cr&eacute;dit Mutuel.<br /><br />
<form method="post" action="'.$adresse_site1.'/citelis/sample/call_request.php">
<input type="hidden" name="customer_email" value="'.$email.'" />
<input type="hidden" name="prix" value="'.$MONTANT_site.'" />
<input type="hidden" name="caddie" value="JI_'.$new_id_val.'" />
<input type="image" src="'.$adresse_site1.'/images/b-citelis.gif" value="Citelis" border="0" />
</form>
</legend>
</fieldset>
</td></tr>

<tr><td align="center" style="background: #e5ebf5; padding: 5px; border: 15px solid #E3E6F0" valign="top">
<fieldset style="border: 1px solid #000000; background: #E3E6F0">
<legend style="color: #000000";><strong>Paiement par ch&egrave;que bancaire</strong></legend>
  Votre annonce sera activ&eacute;e d&egrave;s r&eacute;ception du r&egrave;glement de <strong>'.$AFFICHE_montant.' &euro; </strong> &agrave; l\'ordre de DENTAL NETWORKS.<br />
  Merci de pr&eacute;ciser vos r&eacute;f&eacute;rences (nom, coordonn&eacute;es, etc...) et
  de l\'envoyer &agrave; l\'adresse postale : Dental Networks Journ&eacute;es d\'installation - Dr Laurent Dussarps - 7, rue Jules Michelet - 33140 Villenave d\'Ornon<br /><br />
<img src="http://www.achat-dentaire.com/data/images/cheque.gif" border="0" />

</legend>
</fieldset>
</td></tr>

<tr><td align="center" style="background: #e5ebf5; padding: 5px; border: 15px solid #E3E6F0" valign="top">

<fieldset style="border: 1px solid #000000; background: #E3E6F0">
<legend style="color: #000000";><strong>Paiement par virement bancaire</strong></legend>
  Votre annonce sera activ&eacute;e d&egrave;s r&eacute;ception du r&egrave;glement de <strong>'.$AFFICHE_montant.' &euro; </strong>.<br />
  Attention &agrave; bien pr&eacute;ciser vos r&eacute;f&eacute;rences (nom, coordonn&eacute;es, etc...)<br /><br />
<table width="350" border="0" cellpadding="1">
  <tr><td colspan="4"><strong>RIB</strong></td></tr>
  <tr>
    <td>Code banque</td>
    <td>Code guichet</td>
    <td>n&deg; compte</td>
    <td>cl&eacute;</td>
  </tr>
  <tr>
    <td>10907</td>
    <td>00001</td>
    <td>05721428893</td>
    <td>32</td>
  </tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4"><strong>IBAN</strong> : FR76 1090 7000 0105 7214 2889 332</td></tr>
  <tr><td colspan="4">&nbsp;</td></tr>
  <tr><td colspan="4"><strong>Bank Identification Code (BIC)</strong> : CCBPFRPPBDX</td>
  </tr>
</table>
</legend>
</fieldset>
</td></tr>
</table> ';

?>