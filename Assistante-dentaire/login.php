<? // VERIF DES CHAMPS             // identique 3 sites
$cat=$_REQUEST['cat'];
$post=$_REQUEST['post'];
$type=$_POST['type'];

echo '
<table cellpadding="0" cellspacing="3" border="0" width="100%" height="auto">
<tr><td valign="top" width="60%">
<table cellpadding="3" cellspacing="3" border="0" width="95%" height="auto" align="center">
<tr><td valign="top"><font class="XXLdr">'.$txt_connexion.'</font></td></tr>
<tr><td valign="top">
<br />
<br />';






echo '




<fieldset style="width:95%; align:left; border: 1px solid #'.$C_titre.'; padding: 10px;">
    <legend style="color: #FFFFFF; background: #'.$C_titre.'; font-size: 8pt; padding: 5px; margin: 5px 5px 5px 5px;">
    <font class="titre"><strong>'.$txt_Identif.' :</strong></font></legend>';

formulaire(2);

echo '<br /><br />
&bull; <a href="index.php?cat=oubli">'.$txt_mdp_perdu.'?</a>
<br />
&bull; <a href="index.php?cat=emailvalidationno">'.$txt_Nv_email_act.'</a>
<br /><br />
</fieldset>

';



?>





<br />

</td></tr></table>


<td width="40%" valign="top">

<?PHP Pub() ; ?>


<br />
<br />
</td></tr></table>

