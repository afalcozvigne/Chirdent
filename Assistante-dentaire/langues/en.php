<?

// Index.php

$texte_singulier  = " on-line practitioner";
$texte_pluriel    = " On-line practitioners";
if ($cpt == 1){ $libel = $texte_singulier; }
else { $libel = $texte_pluriel; }
$activite = "Activity: &nbsp; $cpt $libel &nbsp;|&nbsp; $nbr_membre registered members &nbsp;|&nbsp; $nbr_article news online &nbsp;|&nbsp; $nbr_annonce announcements ";
$txt_deconnect    = "Logout";
$txt_mem          = "Remember";


//Type de membres

$txt_Mbre_01 = "Not Installed Dentist";
$txt_Mbre_02 = "Settled dentist (alone or associate)";
$txt_Mbre_09 = "Maxillofacial surgeon";
$txt_Mbre_03 = "Student in dentistry";
$txt_Mbre_04 = "Dental assistant";
$txt_Mbre_05 = "Health centers";
$txt_Mbre_06 = "Industry/Recruiter";
$txt_Mbre_07 = "Estate agency";
$txt_Mbre_08 = "Association, mayor,...";


// Niveau d'étude

$txt_Niv_01 = "Doctor of Dental Surgery";
$txt_Niv_02 = "Orthodontic doctor";
$txt_Niv_03 = "Internal in dentistry";
$txt_Niv_04 = "6th year student";
$txt_Niv_05 = "6th year completed";
$txt_Niv_06 = "5th year completed (CSCT)";
$txt_Niv_07 = "CECSMO Student";


// recherche d'annonces DR_annonces.php

$txt_ChAnnTitre = "Search ads";
$txt_ChAnnTexte = "Access offers liberal (replacements, collaborations, associations)
and offers employees (CDD, CDI) in France and abroad <br />
Choose the continent in the form of interest";
$txt_voirAnn       = "View ads :";
$txt_eFRANCE       = "In France";
$txt_MFRANCE       = "Metropolitan France";
$txt_eEUROP        = "In Europe";
$txt_eAMERIN       = "In North America";
$txt_eAMERIS       = "In South America";
$txt_eCARAIB       = "In Caribbean";
$txt_eAFRIQ        = "In Africa ";
$txt_eOCEANIE      = "In Oceania";
$txt_eASIE         = "In Asia";
$txt_MZone_01      = "Region";
$txt_NbAnnonces    = "Number of ads";










// Modifier / Effacer annonce :  membre/dr_ann_mod

$txt_No_Ad           = "You do not post ads. There is nothing to change.";
$txt_nb_ann          = "You have %1% ad%2% on $titre_site";
$txt_RemplaC         = "Replacement";
$txt_CollabC         = "Collaboration";
$txt_CollabAssC      = "Collaboration to join";
$txt_AssociationC    = "Association";
$txt_AssCessionC     = "Association for sale";
$txt_GardeC          = "A day care";
$txt_AdjointC        = "Student assistant position (employee)";
$txt_LouageServC     = "Rental service (employee)";
$txt_CDDC            = "Fixed-term contract ";
$txt_CDIC            = "Permanent contract)";
$txt_BenevoleC       = "Volunteer / training";
$txt_posteLe         = "Posted on";
$txt_expireLe        = "Expires on";
$txt_AnnVisible      = "Ad visible";
$txt_AnnNonVisible   = "Ad not visible";
$txt_AnnUrgActiv     = "Urgent option enabled";
$txt_voir            = "See";
$txt_editer          = "Edit";
$txt_effacer         = "Delete";
$txt_TypeAnn         = "Ad type";



// Ajouter une annonce : membre/dr_ann_add

$txt_FicheAvant     = "You must first complete the information on your office to post ads";
$txt_AnnImposs      = "Your status does not allow you to post ads.";
$txt_ann_distincts1 = "<strong>IMPORTANT</strong> Must pass AN AD by request (Ex: if you are absent from the first July to 15 July and 1 August to 15 August, it will enter two separate ads).";
$txt_ann_distincts2 = "<strong>IMPORTANT</strong> Must pass AN AD by request (Ex: if you offer a contract 1 July to 15 July and 1 August to 15 August, it will enter two separate ads).";
$txt_prop           = "You want to offer:";
$txt_choix_annonce  = "Choose your ad type";
$txt_Rempla         = "Replacement";
$txt_Collab         = "Collaboration";
$txt_CollabAss      = "Collaboration to join";
$txt_Association    = "An association";
$txt_AssCession     = "Association for sale";
$txt_Garde          = "A day care";
$txt_PosteSalarie   = "A salaried position";
$txt_Adjoint        = "A student assistant position (employee)";
$txt_LouageServ     = "A rental service (employee)";
$txt_CDD            = "A fixed-term contract ";
$txt_CDI            = "A permanent contract";
$txt_Benevole       = "Volunteer / training";
$txt_incluFiche     = "Your listing will be included in your ad. To change information, click <a href='index.php?cat=compte&incl=modif_dr'>HERE</a>";
$txt_votre_ann      = "Your ad";
$txt_explicAnn      = "Upon validation, this information will be available on the website by dentists that are not installed will contact you.";
$txt_jourGarde      = "Day Care<br />&nbsp; (dd/mm/yyyy)";
$txt_debRempla      = "Beginning of replacement<br />&nbsp; (dd/mm/yyyy)";
$txt_finRempla      = "End of Replacement<br />&nbsp; (dd/mm/yyyy)";
$txt_remuneration   = "Remuneration";
$txt_remFixe        = "Fixed";
$txt_remPourcent    = "Percentage";
$txt_remFixPcent    = "Fixed + percentage";
$txt_salaire        = "Approximate Monthly Salary:<br /> &nbsp; <i>(optional)</i>";
$txt_emploi_temps   = "Proposed timetable";
$txt_lundi          = "Monday";
$txt_mardi          = "Tuesday";
$txt_mercredi       = "Wednesday";
$txt_jeudi          = "Thursday";
$txt_vendredi       = "Friday";
$txt_samedi         = "Saturday";
$txt_matin          = "Morning";
$txt_apresmidi      = "Afternoon";
$txt_opt_AnUrg      = "Optional : &laquo;Urgent ad&raquo;";
$txt_titre_urgAnn   = "Title of &laquo;urgent ad&raquo;";
$txt_max100carac    = "100 characters max";
$txt_2e_fauteuil    = "Work on the second chair?";
$txt_secrPres       = "Secretary present ";
$txt_assPres        = "Dental assistant present ";
$txt_logement       = "Housing provided if needed";
$txt_remarques      = "Notes<br />&nbsp; <i>(optional)</i>";
$txt_expAnn         = "Expiry date of ad<br />&nbsp; (dd/mm/yyyy) :";
$txt_expRempla      = "The expiry date refers to the end of the replacement.";
$txt_expGrade       = "The expiry date refers to the day care.";
$txt_10mMax         = "Not more than 10 months";
$txt_AdPhotSuppl    = "Add additional photography for this ad";






// Effacer Fiche cabinet / CV

$txt_AttEffFiche  = "WARNING: You are about to delete the entry for your office. All ads will be deleted from the site $titre_site.";
$txt_AttEffCV     = "WARNING: You are about to delete your CV to the $titre_site's CV database .";
$txt_effacer_fiAn = "Delete your profile, your ads, photos";
$txt_fiche_del    = "Your file cabinet has been deleted";
$txt_CV_del       = "Your CV has been deleted";
$txt_CV_renseig   = "Your CV is knowledgeable and has been included in the CV database. <br /> You can also consult
ads posted by dentists installed";






// Effacer compte membre/del_compte.php
$txt_AttEff    = "WARNING: You are about to delete your account common to 3 sites";
$txt_EffacePas = "Do not delete your account !";
$txt_DesactCV  = "Rather disable your CV to no longer appear in the CV DATA ?";
$txt_EffAnn    = "Rather delete your ads to not appear ";
$txt_ConfirmEf = "Your account has been deleted.";



// fiche cabinet membre/dr.php

$txt_fiche_01   = "- You have to give this description of your firm before posting your ads <br />
 - It will fill the first <br />
 - It will be automatically added to all your ads <br />
 - It will change depending on the progress of your equipment / organization <br />";
$txt_fiche_ok    = "Your datasheet is completed.";
$txt_fiche_ok2   = "You can post ads";
$txt_anonym01    = "Anonymity";
$txt_Q_anonym01  = "Would you protect your identity?";
$txt_anonym02    = "You can protect your identity so that your name does not appear.";
$txt_anonym03    = "Identity protection";
$txt_anonymopt1  = "unprotected";
$txt_anonymopt2  = "protected";
$txt_cab_org_00  = "Equipment / organization";
$txt_ModExerc    = "Mode of Exercise";
$txt_ModExopt01  = "Exercise alone";
$txt_ModExopt02  = "Group Exercise";
$txt_ZonExerc    = "Exercise area";
$txt_ZonExopt01  = "Urban";
$txt_ZonExopt02  = "campaign";
$txt_ZonExopt03  = "Semi-rural";
$txt_ZonExopt04  = "Suburbs";
$txt_Pratique    = "Practice";
$txt_Q_Pratique  = "Your orientation?";
$txt_Praticopt01 = "General practice";
$txt_Praticopt02 = "Orthodontics";
$txt_Praticopt03 = "Periodontology";
$txt_Praticopt04 = "Implantology";
$txt_Praticopt05 = "Prosthesis";
$txt_Praticopt06 = "Pedodontics";
$txt_Praticopt07 = "Endodontics";
$txt_Praticopt08 = "Oral Surgery";
$txt_secretaire  = "Secretariat";
$txt_Q_secretaire= "Do you have a secretary?";
$txt_assistante  = "Chairside assistant";
$txt_Q_assistante= "Do you have an assistant?";
$txt_informatiq  = "Computerization of office";
$txt_Q_informatiq= "Are you computer?";
$txt_logiciel    = "Software";
$txt_Q_logiciel  = "Your computer software?";
$txt_rvg         = "RVG";
$txt_Q_rvg       = "Do you have an RVG?";
$txt_panoramiq   = "Orthopantomograph";
$txt_Q_panoramiq = "Do you have an Orthopantomograph?";
$txt_insertImg   = "Insert a photo of your office";
$txt_img_limit   = "Upload your photo <br /> Format jpg, max: 200 KB <br /> <i> (optional)</i>";
$txt_eff_Img     = "Erase the image";
$txt_eff_Img2    = "PS: adding an image, you will overwrite the old one.";
$txt_photo       = "Photo";
$txt_parcourir   = "Browse";
$txt_SauvFiche   = "Save your data";
$txt_Sauver      = "Save";
$txt_ok_modif    = "Your data has been modified";
$txt_ValidAnn      = "Submit your ad";
$txt_CVNonRens     = "Your CV has not been filled. <br /> Fill your CV to appear in the CV database and be contacted by dentists installed";
$txt_FCNonRens     = "Your sheet has not been filled. <br /> Fill out your firm to post ads";
$txt_CVVisible     = "Visibility of your CV";
$txt_Q_CVVisible   = "Visibility of your CV?";
$txt_CVexplic      = "Disable your resume when you're not available. It will no longer appear, but you may need to delete your account";
$txt_CVActDesac    = "Enable / Disable your CV";
$txt_CV_01         = "Your CV will enrich the database of resume (CV Library) that is available to dentists installed";
$txt_actif         = "Active";
$txt_inactif       = "Inactive";
$txt_CV_02         = "Your Curriculum Vitae, your wishes";
$txt_CV_03         = "All this information will be your CV and will be available on the site installed by dentists who can contact you.";
$txt_NivEtude      = "Your level of study";
$txt_PaysDiplome   = "Country of Graduation";
$txt_mobilite      = "Your mobility";
$txt_mobilite_01   = "Mobile on the Department";
$txt_mobilite_02   = "Mobile on the Region";
$txt_mobilite_03   = "Mobile on Country";
$txt_mobilite_04   = "Mobile on International";
$txt_recherche     = "Looking for: <br /> <i> (several choices) </ i>";
$txt_Q_recherche   = "Your research? Check at least one box, please.";
$txt_disponib      = "Availability";
$txt_Zones_titre   = "Area(s) of publication of your CV";
$txt_Zone_00       = "By default, your CV will appear in your";
$txt_Zone_01       = "region";
$txt_Zone_02       = "department";
$txt_Zone_03       = "You can extend this issue";
$txt_Zone_04       = "to other French departments or ";
$txt_Zone_05       = "to other countries";
$txt_Zone_06       = "<br /> Other French departments where you want to seem <br /> <i> (optional) </i>";
$txt_Zone_07       = "Two numbers separated by commas (eg 75,93,92)";
$txt_Q_Zone_07     = "Field other departments is invalid use this syntax: 01, 02, 03 etc ...";
$txt_Zone_08       = "Other geographical areas <br />where you want to seem<br /> <i>(optional)</i> ";
$txt_Zone_09       = "Select the country you want to work (several choices) <br />
                    <i> Note: To select multiple countries, click leaving the CTRL key </i>";
$txt_UE            = "European Union";
$txt_EUROP         = "Europe (non-EU)";
$txt_AMERIN        = "North America";
$txt_CARAIB        = "Caribbean";
$txt_MAGHREB       = "Maghreb";
$txt_AFRIQ         = "Africa (excluding North Africa)";
$txt_ASIE          = "Asia";
$txt_AMERIS        = "South America";
$txt_OCEANIE       = "Oceania";
$txt_error         = "Be careful, you did not fill out all fields.";




// Menu

$txt_accueil       = "Home";
$txt_DentInst      = "Settled dentist";
$txt_VoCompt       = "Your account";
$txt_NvCompteInst  = "Create an account of settled";
$txt_ModifCompte   = "Modify account";
$txt_Mailinglist   = "Mailing list";
$txt_Identif       = "Identification";
$txt_connexion     = "Login";
$txt_mdp_perdu     = "Password lost";
$txt_Nv_email_act  = "Ask for a new activation email";
$txt_deconnexion   = "Logout";
$txt_fiche_cab     = "Information on the office";
$txt_a_remplir     = "To perform before the 1st announcement";
$txt_creer_fiche   = "Create datasheet";
$txt_editer_fiche  = "Edit datasheet";
$txt_effacer_fiche = "Erase datasheet";
$txt_ann           = "Your announcements";
$txt_ajout_ann     = "Add announcement";
$txt_edit_ann      = "Edit / erase announcement";
$txt_option_urgent = "Urgent ads";
$txt_option_urg_xl = "URGENT ADS !";
$txt_annonce_ici   = "[Your ad here?]";  
$txt_stat          = "Statistics";
$txt_CVtheque      = "CV database";
$txt_trouv_cv      = "Find a CV";
$txt_tracker_cv    = "Post a CV tracker";
$txt_NonDentInst   = "Not Installed Dentist";
$txt_NvCompteNInst = "Create an account";
$txt_services      = "Tools";
$txt_NvCVt         = "Create / edit your CV";
$txt_CherchAnn     = "View ads";
$txt_tracker_ann   = "Post a tracker of announcement";
$txt_mutuelles     = "Health centers/Recruiter";
$txt_NvCompteMut   = "Create an account";
$txt_Nous_Contact  = "Contact us";
$txt_legal         = "Legal";
$txt_Pub           = "Advertising";

$txt_bas           = $titre_site."&reg; is a registered trademark of CHIRDENT / Dental Networks GmbH. Copyright © 2001-".date("Y").". All rights reserved worldwide.
<br />Accordance with CNIL, you have the right to access, rectify and delete data concerning you.<br />
This right may be exercised by contacting us by email or mail.<br />
CHIRDENT SARL - 7 rue Jules Michelet - 33140 Villenave Ornon - Fax: 05.56.84.98.18 - Dentiste-Remplacant.com Version 6 - Online since September 2012 <br />";
$txt_bas_rouge     = "Collection by spam emails on this site is prohibited. Also the extraction of databases, outside the conditions of use is prohibited.";


// Accueil.php

$txt_accueil_01 = "Since 2001, Dentiste-Remplacant.com has connected more than 8,200 dentists";
$txt_accueil_02 = "Welcome to one of the oldest websites offering free access to listings of replacement,
collaboration, association in France and abroad. <br /> Care centers (social security, mutual,
clinics, hospitals) and communities are also able to offer positions.";
$txt_inscription = "Free registration";
$txt_apropos_JI  = "Days of the installation&nbsp;".date("Y")."";
$txt_info_serv  = "Information and services";
$txt_DernArt    = "Last articles";
$txt_InternServ = "Internet Services";
$txt_partenai   = "Partners";
$txt_enreg_com  = "You are registered as";
$txt_ChangStatu = "you have changed status? Click: ";
$txt_ICI        = "HERE";



// Contact.php

$txt_form       = "By form";
$txt_ChampsObl  = "All fields are required";
$txt_Vnom       = "Your name";
$txt_Vemail     = "Your email";
$txt_SujetMsg   = "Subject of the message";
$txt_TexteMsg   = "Message text";
$txt_TexteEnv   = "Send";
$txt_PCourrier  = "By mail";
$txt_tel        = "By phone";
$txt_fax        = "By fax";


// inscription.php

$txt_DejaInsc = "Already registered";
$txt_inscbd1  = "Your details";
$txt_inscbd2  = "Checking email";
$txt_inscbd3  = "Confirmation";
$txt_tt_ins1  = "Choosing ID";
$txt_tt_ins2  = "Your datasheet member";
$txt_inscr_01 = "Register Now to view Tenders or requests for employment
or to post your ads. It is quick and easy.";
$txt_inscr_02 = "Your login will allow you to access 3 websites :";
$txt_inscr_03 = "You are:";
$txt_inscr_04 = "Select";
$txt_identif  = "Your email adress";
$txt_pass     = "Password";
$txt_item_01  = "Civility";
$txt_item_01a = "Miss";
$txt_item_01b = "Mrs";
$txt_item_01c = "Mr";
$txt_item_02  = "Name";
$txt_item_03  = "First name";
$txt_item_04  = "Birthday";
$txt_item_05  = "Adress";
$txt_item_06  = "Zip code, City";
$txt_item_06b = "City";
$txt_item_07  = "Country";
$txt_item_07b = "Country selection";
$txt_item_08  = "Phone";
$txt_item_08b = "At least one number, please";
$txt_item_09  = "Cell";
$txt_item_10  = "Fax";
$txt_item_11  = "Publication of a paper version of <br />a journal addressed to professionals";
$txt_item_12  = "Participate in surveys";
$txt_item_12b = "Please choose one";
$txt_item_13  = "I have read and agree to the site conditions.";
$txt_item_13b = "You must agree to the terms of use";
$txt_item_14  = "Vous acceptez notamment, compte tenu de la gratuit&eacute; du service, de recevoir des emails de Chirdent/Dental Networks
pouvant promouvoir ses partenaires.";
$txt_item_15  = "Attention, vous n'avez pas rempli tous les champs.";
$txt_item_16  = "Pour poursuivre votre inscription, cliquez sur continuer";
$txt_oui      = "Yes";
$txt_non      = "No";
$txt_Bla_01   = "&#8226; <strong>Si vous &ecirc;tes Etudiant ou chirurgien dentiste non install&eacute;</strong>, inscrivez-vous
  pour devenir membre, ce qui vous permettra : <br />
  - sur Dentiste-Remplacant.com de cr&eacute;er votre fiche figurant dans l'annuaire des rempla&ccedil;ants
  et collaborateurs. Vous y exposez vos disponibilit&eacute;s et vos coordonn&eacute;es.
  Les dentistes install&eacute;s pourront consulter l'annuaire, votre fiche et vous contacter
  (par e-mail, t&eacute;l&eacute;phone, fax, etc...) s'ils sont int&eacute;ress&eacute;s
  par votre profil. <br />
  - vous pourrez de consulter les annonces post&eacute;es sur le site par les chirurgiens
  dentistes install&eacute;s, class&eacute;es zones par zone.<br />
- sur Cabinet-Dentaire.com de trouver un cabinet &agrave; acheter ou un local ou &agrave; louer. <br />
<br />   ";
$txt_Bla_02   = "&#8226; <strong>Si vous &ecirc;tes Chirurgien dentiste install&eacute;</strong>, inscrivez-vous
pour devenir membre, ce qui vous permettra : <br />
- sur Dentiste-Remplacant.com de trouver un rempla&ccedil;ant, un collaborateur ou un associ&eacute;. <br />
- sur Cabinet-Dentaire.com de vendre votre cabinet ou le louer. <br />
- sur Assistante-Dentaire.com de recruter une aide ou assistante dentaire ou bien une secr&eacute;taire. <br />
- postez autant d'annonces que vous souhaitez GRATUITEMENT (hors options). <br />
<br />";
$txt_Bla_03   = "&#8226; <strong>Si vous &ecirc;tes un centre de soin priv&eacute; ou public ou une indusrie dentaire</strong>, <br />
postez vos offres d'emploi sur Dentiste-Remplacant.com.<br />
<br /> ";
$txt_Bla_04   = "&#8226; <strong>Si vous &ecirc;tes Assistante dentaire ou si vous souhaitez le devenir</strong>, inscrivez-vous
pour devenir membre, ce qui vous permettra : <br />
- sur Assistante-Dentaire.com de trouver un employeur ou un praticien pour effectuer votre formation.<br />
- Vous pourrez consulter les offres d\'emploi et poster votre CV consultable en ligne.<br />
<br />";

//mot de passe perdu : oubli.php

$txt_oubli01  = "By entering the email address used in your
 registration in the form below, you will receive your password by email at this address.";
$txt_ouberr01 = "Must be a valid email address";
$txt_ouberr02 = "This address does not exist in our database";
$txt_oubmail01 = "Your password";
$txt_oubmail02 = "Reminder of your login";
$txt_oubmail03 = "NB: These identifiers are valid for 3 websites of";
$txt_oubmail04 = "Your password was mailed to the address";
$txt_oubmail05 = "Good reception";


// Nouvel email d'activation

$txt_Activ01 = " When to use this form? <br />
 &bull; You have not received your activation email after your registration <br />
 &bull; Changed your email since joining <br />
 &bull; To reactivate your account (unused for a long time) that was automatically inactivated.<br /> ";

$txt_Activ02 = "No match for that name and password in our database";
$txt_Activ03 = "Thank you to fill the following fields to a new email will be sent";



//  Fonctions

$txt_AccReserv = "ACCESS TO RESERVE MEMBERS. <br />
If you are a member, please log in to access this area.";
$txt_DejaMbre  = "Already a member? Log in !";
$txt_PasMbre  = "Not a member yet? Sign up now!";


// Compte de membre

$txt_ModCompte = "Edit your info";
$txt_ModPref   = "Your preferences";
$txt_EffCompte = "Delete your account";
$txt_CV        = "Your CV";
$txt_DelCV     = "Delete your CV";
$txt_bienvenue = "Welcome to your account";
$txt_date_insc = "You are subscribed since";
$txt_cred_fiche= "Create / Edit datasheet";


// Mentions légales


$txt_CondUtil = "Rules of Use";
$txt_NumCNIL  = "Number statement to the CNIL :";
$txt_rules = "<center>
<b style='background: #eeeeee; font-size: 12pt; border: 1px solid #aaaaaa'>CONDITIONS D'UTILISATION DU SERVICE</b>
</center><br /><br />


<p style='background: #eeeeee'>Le pr&eacute;sent accord
constitue un accord entre vous - l'Utilisateur - et la soci&eacute;t&eacute; CHIRDENT SARL
Sarl. En utilisant ce service et les annonces, vous reconnaissez accepter les
termes et conditions suivantes. Si vous ne les acceptez pas, n'utilisez pas ce
service et n'acc&eacute;dez pas au pr&eacute;sent site Internet.</span>
</p>
<hr />
</p>
<br>
<p>Description du service : Le service auquel vous acc&eacute;dez par le pr&eacute;sent site vous permet de
recevoir, &agrave partir de crit&egrave;res g&eacute;ographiques ou de sp&eacute;cialit&eacute;s m&eacute;dicales,
en vue d'une publication. Toutes les informations et donn&eacute;es de
quelque nature que ce soit obtenues &agrave partir de ce site sont ci-apr&egrave;s d&eacute;nomm&eacute;es
les INFORMATIONS.
</p>
<p>Utilisation autoris&eacute;e
/ Utilisations non autoris&eacute;es Les INFORMATIONS peuvent &ecirc;tre utilis&eacute;es
exclusivement par le seul utilisateur qui a s&eacute;lectionn&eacute; le service, pour son
usage priv&eacute; et personnel. L'utilisateur est autoris&eacute; exclusivement &agrave
consulter les INFORMATIONS ; il ne peut imprimer les dites INFORMATIONS qu'en 3
exemplaires maximum.
</p>
</p>
<b>Toute autre
utilisation est strictement interdite. Notamment vous ne pouvez pas</b> (sans
que la
liste ci-apr&egrave;s soit limitative)&nbsp;:&nbsp;</span><o:p>
</p>
<div style='padding-left: 15px'>
<p><b>1&ordm;)</b> traduire,
adapter, transformer, reproduire, copier, sauvegarder, modifier, repr&eacute;senter,
proc&eacute;der &agrave tout autre arrangement des INFORMATIONS en tout ou partie, et plus
particuli&egrave;rement extraire tout ou partie des donn&eacute;es de quelque nature que ce
soit contenues dans les INFORMATIONS, cr&eacute;er tout produit d&eacute;riv&eacute; des
INFORMATIONS de quelque nature que ce soit;<o:p>
</p>
<p><b>2&ordm;)</b> imprimer les
INFORMATIONS pour un nombre de tirage sup&eacute;rieur &agrave celui autoris&eacute; ci-dessus;<o:p>
</p>
</p>
<b>3&ordm;)</b> publier,
diffuser, ou divulguer par quelque moyen que ce soit tout ou partie des
INFORMATIONS ;
</p>
<p><b>4&ordm;)</b> distribuer,
louer, c&eacute;der, transf&eacute;rer sous quelque forme que ce soit et &agrave quelque titre
que ce soit, sous-licencier, partager ou pr&ecirc;ter les INFORMATIONS ou les droits
d'utilisation pr&eacute;vus aux pr&eacute;sentes;
</p>
</p>
<b>5&ordm;)</b> faire une
exploitation commerciale des INFORMATIONS, en tout ou partie, pour votre compte
ou le compte d'un tiers ; permettre l'acc&egrave;s aux informations &agrave tout tiers,
notamment pour exploiter des prestations de services ou toute autre utilisation
impliquant le traitement de donn&eacute;es de tiers;&nbsp;
</p>
<p><b>6&ordm;)</b> utiliser toute
donn&eacute;e d&eacute;coulant directement ou indirectement des INFORMATIONS pour enrichir
ou cr&eacute;er des bases de donn&eacute;es tant &agrave titre gratuit qu'&agrave titre on&eacute;reux et ce
tant pour votre compte que le compte d'un tiers;&nbsp;<o:p>
</p>
</p>
<b>7&ordm;)</b> d&eacute;tourner ou
essayer de d&eacute;tourner le code source ou la structure de tout ou partie des
INFORMATIONS par retraitement, d&eacute;sassemblage, d&eacute;compilation ou tout autre
moyen ; tenter de d&eacute;verrouiller ou contourner tout syst&egrave;me de protection ou de
d&eacute;cryptage utilis&eacute; pour prot&eacute;ger les INFORMATIONS ;<o:p>
</p>
<p><b>8&ordm;)</b> modifiez,
enlever, cacher toutes mentions et l&eacute;gendes de propri&eacute;t&eacute;, de copyright, ou
tout symbole de marques contenus dans les INFORMATIONS.<o:p>
</p>
</p>
<b>9&ordm;)</b> d&eacute;tourner le
pr&eacute;sent service pour le rendre accessible ou le faire utiliser dans un autre
site.
<br>
<br>
Vous ne pouvez pas
transf&eacute;rer &agrave qui que ce soit le pr&eacute;sent accord, en tout ou partie, tant &agrave
titre gratuit qu'&agrave titre on&eacute;reux, sans l'accord expr&egrave;s &eacute;crit et pr&eacute;alable
de la soci&eacute;t&eacute; CHIRDENT SARL.</div>
<o:p>
</p>
<p>Il est ici pr&eacute;cis&eacute;,
en tant que de besoin, vous ne b&eacute;n&eacute;ficiez d'aucuns droits de propri&eacute;t&eacute;
intellectuelle sur les INFORMATIONS qui restent la propri&eacute;t&eacute; exclusive de la
soci&eacute;t&eacute; CHIRDENT SARL.<o:p>
</p>
</p>
Exclusion de
Garantie et Limitation de Responsabilit&eacute; Vous assumez toute responsabilit&eacute; des
risques li&eacute;s &agrave l'utilisation de ce serveur et du r&eacute;seau Internet. Les
INFORMATIONS sont fournies &quot;telles quelles&quot; sans garanties d'aucune
sorte, ni expresse, ni implicite. Plus particuli&egrave;rement, la soci&eacute;t&eacute; CHIRDENT SARL
 exclut toute garantie quant &agrave l'utilisation, aux r&eacute;sultats de
l'utilisation et &agrave toutes op&eacute;rations en relation avec les INFORMATIONS plus
particuli&egrave;rement en termes d'exactitude, de pr&eacute;cision, de fiabilit&eacute; notamment
typographique, de mise &agrave jour ou autres. Dans la mesure o&ugrave; la v&eacute;rification du
contenu des annonces post&eacute;es peut pr&eacute;senter des inexactitudes, la v&eacute;rification
des dipl&ocirc;mes, sp&eacute;cialit&eacute;s, identit&eacute;s et autres donn&eacute;es de chaque annonce
incombe &agrave vous UTILISATEUR. La soci&eacute;t&eacute; CHIRDENT SARL exclut &eacute;galement
toute garantie quant &agrave l'ad&eacute;quation &agrave un usage particulier des INFORMATIONS
pour l'Utilisateur. Il est &eacute;galement rappel&eacute; que la soci&eacute;t&eacute; CHIRDENT SARL
ne garantit pas que les INFORMATIONS seront sans virus ou sans autre composant
susceptible de cr&eacute;er un pr&eacute;judice &agrave l'Utilisateur. Plus g&eacute;n&eacute;ralement la
totalit&eacute; des risques li&eacute;s aux INFORMATIONS aux performances et aux r&eacute;sultats
en relation avec les INFORMATIONS est assum&eacute;e par vous l'Utilisateur. La soci&eacute;t&eacute;
ne pourra en aucun cas &ecirc;tre responsable d'une quelconque cons&eacute;quence tant
direct qu'indirect ou m&ecirc;me fortuite pour l'Utilisateur (y compris en cas de
perte de profit, interruption de travail, ou de perte d'information sans que
cette liste soit limitative) r&eacute;sultant de l'Utilisation des INFORMATIONS ou
en relation avec les INFORMATIONS. Cette exclusion de garantie s'appliquera m&ecirc;me
si la soci&eacute;t&eacute; CHIRDENT SARL avait &eacute;t&eacute; avis&eacute;e de la possibilit&eacute; d'un tel
risque.<o:p>
</p>
<p>Dans le cas o&ugrave;
l'exclusion de garantie et la limitation de responsabilit&eacute; &eacute;nonc&eacute;es dans le
pr&eacute;sent accord serait, pour quelque raison que ce soit, consid&eacute;r&eacute; comme inex&eacute;cutable
ou inapplicable, vous acceptez que la responsabilit&eacute; de la soci&eacute;t&eacute; CHIRDENT SARL
 ne puisse &ecirc;tre engag&eacute;e qu'&agrave hauteur d'un montant forfaitaire de 15 euros.&nbsp;<o:p>
</p>
</p>Marques: Vous
vous engagez express&eacute;ment &agrave respecter les droits des titulaires des droits
d'auteur sur ces marques et plus particuli&egrave;rement &agrave ne pas utiliser de quelque
mani&egrave;re que ce soit lesdites marques. Notamment toute utilisation frauduleuse
ou contrefa&ccedil;on engagerait votre responsabilit&eacute;.<o:p>
</p>
<p>Acceptation de
diffusion Si vous fournissez &agrave la soci&eacute;t&eacute; CHIRDENT SARL une information
telle que notamment une annonce, r&eacute;action, des donn&eacute;es, des r&eacute;ponses, des
questions, des commentaires, des avis, des suggestions, des projets, des id&eacute;es
ou tout autre forme d'information, celle-ci sera pr&eacute;sum&eacute;e non confidentielle.
La soci&eacute;t&eacute; CHIRDENT SARL n'aura aucune obligation &agrave prot&eacute;ger cette
information d'une &eacute;ventuelle diffusion. Par ailleurs la soci&eacute;t&eacute; CHIRDENT SARL
 sera en droit d'utiliser ladite information pour quelle que raison que
ce soit y compris en vue de son utilisation &agrave des fins commerciales et ce sans
aucune indemnit&eacute; pour vous, ce que vous acceptez express&eacute;ment.<o:p>
</p>
</p>
<p><b>Pr&eacute;cisions</b><o:p>
</p>
<p>Le pr&eacute;sent accord
formalise l'int&eacute;gralit&eacute; de nos accords relatifs &agrave l'utilisation des
INFORMATIONS. La soci&eacute;t&eacute; CHIRDENT SARL se r&eacute;serve le droit de ne plus
diffuser, de modifier toutes INFORMATIONS contenues sur ce service et le service
lui-m&ecirc;me &agrave tout moment. La soci&eacute;t&eacute; a &eacute;galement le droit de modifier les
termes et conditions de la pr&eacute;sente licence &agrave tout moment.<o:p></p>
<p>Le pr&eacute;sent contrat
est soumis au droit fran&ccedil;ais. Dans le cas o&ugrave; l'une des clauses du pr&eacute;sent
accord serait illicite, nul ou inex&eacute;cutable, elle ne pourra en aucun cas
affecter la validit&eacute; des autres clauses qui continueront &agrave s'appliquer. Dans
un tel cas, la clause concern&eacute;e serait alors remplac&eacute;e par une clause
juridiquement valable se rapprochant le plus possible du sens de la clause
litigieuse.<o:p>
</p>
</p>
<p><strong>&nbsp;<o:p>Propri&eacute;t&eacute; intellectuelle</strong></p>
<p>Tous les &eacute;crans, graphismes et autres informations pr&eacute;sents
  sur le site de Occasion-dentaire.com sont la propri&eacute;t&eacute; de la
  soci&eacute;t&eacute; CHIRDENT SARL.</p>
<p>Toute reproduction, modification, traduction, distribution, sauvegarde,
  impression pour un nombre sup&eacute;rieur &agrave; trois exemplaires, exploitation,
  utilisation de tout ou partie de ces &eacute;l&eacute;ments est strictement
  interdite sans l'accord pr&eacute;alable et formel de son propri&eacute;taire,
  CHIRDENT SARL.</p>
<p>&nbsp;</p>
<div style='border: 1px dotted #808080; padding: 5px; color: #505050'>
<p><b><u>Note sp&eacute;cifique
relative au spam et courrier non sollicit&eacute;.</u></b> <o:p><br>
<br>
<b>La collecte d'adresses email sur tous nos documents (y compris le
web) est interdite et peut entrainer des sanctions p&eacute;nales. </b></p>
<o:p>
<p>Article 226-18 du Code P&eacute;nal </p>
<p>&laquo; Le fait de collecter des donn&eacute;es par un moyen frauduleux, d&eacute;loyal
  ou illicite, ou de proc&eacute;der &agrave; un traitement d'informations nominatives
  concernant une personne physique malgr&eacute; l'opposition de cette personne,
  lorsque cette opposition est fond&eacute;e sur des raisons l&eacute;gitimes,
  est puni de cinq ans d'emprisonnement et de 300000 euros d'amende.<br>
  En cas de traitement automatis&eacute; de donn&eacute;es nominatives ayant
  pour fin la recherche dans le domaine de la sant&eacute;, est puni des m&ecirc;mes
  peines le fait de proc&eacute;der &agrave; un traitement :<br>
  1&ordm; Sans avoir pr&eacute;alablement inform&eacute; individuellement les
  personnes sur le compte desquelles des donn&eacute;es nominatives sont recueillies
  ou transmises de leur droit d'acc&egrave;s, de rectification et d'opposition,
  de la nature des informations transmises et des destinataires des donn&eacute;es
  ;<br>
  2&ordm; Malgr&eacute; l'opposition de la personne concern&eacute;e ou, lorsqu'il
  est pr&eacute;vu par la loi, en l'absence du consentement &eacute;clair&eacute; et
  expr&egrave;s de la personne, ou, s'il s'agit d'une personne d&eacute;c&eacute;d&eacute;e,
  malgr&eacute; le refus exprim&eacute; par celle-ci de son vivant. &raquo;</p>
<p><br>
  <b><u>Note sur la
  p&eacute;n&eacute;tration
des syst&egrave;mes informatiques</u></b> <br>
  <br>
  Article 323-1 du Code P&eacute;nal</p>
<p>&laquo; Le fait d'acc&eacute;der ou de se maintenir, frauduleusement, dans
  tout ou partie d'un syst&egrave;me de traitement automatis&eacute; de donn&eacute;es
  est puni d'un an d'emprisonnement et de 15000 euros d'amende.<br>
  Lorsqu'il en est r&eacute;sult&eacute; soit la suppression ou la modification
  de donn&eacute;es contenues dans le syst&egrave;me, soit une alt&eacute;ration
  du fonctionnement de ce syst&egrave;me, la peine est de deux ans d'emprisonnement
  et de 30000 euros d'amende. &raquo;</p>
<p>Article 323-2 du Code P&eacute;nal</p>
<p>&laquo; Le fait d'entraver ou de fausser le fonctionnement d'un syst&egrave;me
  de traitement automatis&eacute; de donn&eacute;es est puni de trois ans d'emprisonnement
  et de 45000 euros d'amende. &raquo;</p>
<p>Article 323-3 du Code P&eacute;nal</p>
<p>&laquo; Le fait d'introduire frauduleusement des donn&eacute;es dans un syst&egrave;me
  de traitement automatis&eacute; ou de supprimer ou de modifier frauduleusement
  les donn&eacute;es qu'il contient est puni de trois ans d'emprisonnement et
  de 45000 euros d'amende. &raquo;</p>
<p><o:p>
</p>
</p>
</div>

<p>&nbsp;  </p>
<p> </p>
<strong>Droits appliquables et diff&eacute;rends
</strong>
<p> Dentiste-remplacant.com, Cabinet-dentaire.com et Assistante-dentaire.com
  sont repr&eacute;sent&eacute;s
  par CHIRDENT SARL d&#8217;une part et l&#8217;utilisateur d&#8217;autre part
  sont deux parties distinctes et ind&eacute;pendantes, respectivement responsables
  en leur nom propre.</p>
<p>L&#8217;invalidit&eacute; d&#8217;une ou plusieurs clauses de
  ces pr&eacute;sentes Conditions G&eacute;n&eacute;rales d&#8217;utilisation
  des services Web Dentiste-remplacant.com, Cabinet-dentaire.com ou Assistante-dentaire.com
  n&#8217;entra&icirc;nera pas la nullit&eacute; des
  autres stipulations.</p>
<p>En vous connectant sur les Sites Dentiste-remplacant.com, Cabinet-dentaire.com
  ou Assistante-dentaire.com, vous acceptez les pr&eacute;sentes Conditions G&eacute;n&eacute;rales d&#8217;Utilisation
  de mani&egrave;re enti&egrave;re et sans r&eacute;serve, et d&eacute;clarez &ecirc;tre
  satisfait par l&#8217;ensemble des termes et renoncez &agrave; les remettre
  en cause, de quelque mani&egrave;re que ce soit.</p>
<p> En cas de diff&eacute;rend, les parties conviennent que la production
  par Dentiste-remplacant.com, Cabinet-dentaire.com ou Assistante-dentaire.com
  d&#8217;enregistrements issus des serveurs du Site
  Dentiste-remplacant.com, Cabinet-dentaire.com ou Assistante-dentaire.com (adresse
  IP, datetime, identifiants, mots de passe, &#8230;)
  feront foi entre les parties.</p>
<p> Le pr&eacute;sent contrat est r&eacute;gi par la loi fran&ccedil;aise,
  alors m&ecirc;me que les parties seraient de nationalit&eacute; &eacute;trang&egrave;re,
  et/ou que le contrat s&#8217;ex&eacute;cuterait en tout ou partie &agrave; l&#8217;&eacute;tranger.</p>
<p> Tout litige qui s&#8217;&eacute;l&egrave;verait &agrave; propos
  de l&#8217;ex&eacute;cution des pr&eacute;sentes Conditions G&eacute;n&eacute;rales
  et qui ne pourrait &ecirc;tre r&eacute;solu &agrave; l&#8217;amiable, sera
  soumis &agrave; la comp&eacute;tence du Tribunal de Commerce de Bordeaux. </p>
<p><br>
    <br>
</p>";


















?>