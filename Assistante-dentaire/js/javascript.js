




// Fonction permettant dès qu'un pays est choisi de pré-sélectionner l'indicatif téléphonique + la zone
function select_country(pays, indicatif, zone) {  document.getElementById('ind_fixe').value = '+' + indicatif;
                                                   document.getElementById('ind_mobile').value = '+' + indicatif;
                                                   document.getElementById('ind_fax').value = '+' + indicatif;
                                                   document.getElementById('indicatif_tel').value = '+' + indicatif;
                                                   document.getElementById('pays').value = pays;
                                                   document.getElementById('zone').value = zone;
}




function select_type_dr(type_dr) {  document.getElementById('type_dr').value = type_dr;

}





function afficherjs(obj) {
		if (document.getElementById(obj).style.display =='none') {
				document.getElementById(obj).style.display = 'block';
		} else {
				document.getElementById(obj).style.display= 'none';
		}
}


