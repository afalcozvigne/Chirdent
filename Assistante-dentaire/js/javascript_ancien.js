


function plie(div) {
		if (document.getElementById(div).style.height=='1px') {
				document.getElementById(div).style.height= 'auto';
		} else {
				document.getElementById(div).style.height= '1px';
		}
}




function replie(div) {
		if (document.getElementById(div).style.height=='auto') {
				document.getElementById(div).style.height= '1px';
		} else {
				document.getElementById(div).style.height= 'auto';
		}
}






// Fonction permettant dès qu'un pays est choisi de pré-sélectionner l'indicatif téléphonique + la zone
function select_country(pays, indicatif, zone) {  document.getElementById('ind_fixe').value = '+' + indicatif;
                                                   document.getElementById('ind_mobile').value = '+' + indicatif;
                                                   document.getElementById('ind_fax').value = '+' + indicatif;
                                                   document.getElementById('indicatif_tel').value = '+' + indicatif;
                                                   document.getElementById('pays').value = pays;
                                                   document.getElementById('zone').value = zone;
}



function ChangeMessage(message,champ)
  {
  if(document.getElementById)
    document.getElementById(champ).innerHTML = message;
  }





function afficherjs(obj) {
		if (document.getElementById(obj).style.display =='none') {
				document.getElementById(obj).style.display = 'block';
		} else {
				document.getElementById(obj).style.display= 'none';
		}
}



function afficherFormulaireDR()
{
  var a = document.getElementById("Formulaire_dr1");
  var b = document.getElementById("Formulaire_dr2"); 

  if ((document.item.type.value == 2) || (document.item.type.value == 5))     {a.syle.display = "block"; b.style.display = "none";  }
  if ((document.item.type.value == 1) || (document.item.type.value == 3))     {b.style.display = "block"; a.style.display = "none"; }

  else  {   a.style.display = "none";   }
}








function select_type_dr(type_dr) {  document.getElementById('type_dr').value = type_dr;

}






