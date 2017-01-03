<? // VERIF DES CHAMPS
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_legal.'</font></td></tr>
<tr><td valign="top">



<br />
<br />



';









?>





</div>
</center>


<br />
<fieldset style="width:95%; align:left; border: 1px solid #44526b; padding: 10px;">
<legend style="color: #FFFFFF; background: #44526b; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong>CHIRDENT SARL</strong></legend>
CHIRDENT SARL - Dental NetWorks<br />
7, rue Jules Michelet - 33140 Villenave d'Ornon (FRANCE)<br /><br />
<?PHP echo $txt_tel ?> : +33 (0) 6 12 29 45 02 <br />
<?PHP echo $txt_fax ?> : +33 (0) 5 56 84 98 18 <br />
<br />
Siret : 480-565-969-00015 - Ape 6311-Z
<br />
</fieldset>

<br /><br />

<fieldset style="width:90%; align:left; border: 1px solid #44526b; padding: 10px;">
<legend style="color: #FFFFFF; background: #44526b; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong><?PHP echo $txt_CondUtil ?></strong></legend>
<?PHP echo $txt_rules ?>
<br />
</fieldset>

<br /><br />
<fieldset style="width:90%; align:left; border: 1px solid #44526b; padding: 10px;">
<legend style="color: #FFFFFF; background: #44526b; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;"><strong>CNIL</strong></legend>
<?PHP echo $txt_NumCNIL.''.$num_cnil ?>
<br />
</fieldset>

</td></tr></table>













<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

