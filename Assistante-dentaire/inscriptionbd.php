<?PHP
function on($val,$comp){
	if ($val==$comp) echo " bgcolor='#e34b7c' ";
	if ($val!=$comp) echo " bgcolor='#FFFFFF' ";
}
if (!$mu) exit();


?>


<table bgColor="#FFFFFF" align="center" border="1" cellPadding="1" cellSpacing="3" width="100%">
<tr><td>
<table border="0" cellPadding="1" cellSpacing="1" width="100%" align="center">
<tr align="center">
<td width="33%" align="center" <?PHP on($mu,1)?> > <?php if ($mu==1) {echo'<font class="titre"><strong> ';}; echo $txt_inscbd1; if ($mu==1) {echo'</strong></font>';}; ?></td>
<td width="34%" align="center" <?PHP on($mu,2)?> > <?php if ($mu==2) {echo'<font class="titre"><strong> ';}; echo $txt_inscbd2; if ($mu==1) {echo'</strong></font>';};?></td>
<td width="33%" align="center" <?PHP on($mu,3)?> > <?php if ($mu==3) {echo'<font class="titre"><strong> ';}; echo $txt_inscbd3; if ($mu==1) {echo'</strong></font>';};?></td>
</tr></table>
</td></tr></table>


