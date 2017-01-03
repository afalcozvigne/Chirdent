<?

// Index.php

$texte_singulier  = " praticien en ligne";
$texte_pluriel    = " praticiens en ligne";
if ($cpt == 1){ $libel = $texte_singulier; }
else { $libel = $texte_pluriel; }
$activite         = "Activit&eacute;: &nbsp; $cpt $libel &nbsp;|&nbsp; $nbr_membre inscrits &nbsp;|&nbsp; $nbr_article articles online &nbsp;|&nbsp; $nbr_annonce annonces";
$txt_deconnect    = "D&eacute;connexion";
$txt_mem          = "M&eacute;moriser";


//Type de membres

$txt_Mbre_01 = "Chirurgien dentiste non install&eacute;";
$txt_Mbre_02 = "Chirurgien dentiste install&eacute; (seul ou en association)";
$txt_Mbre_09 = "Stomatologue, chir.maxillo-facial";
$txt_Mbre_03 = "Etudiant en chirurgie dentaire";
$txt_Mbre_04 = "Assistante Dentaire/Secr&eacute;taire";
$txt_Mbre_05 = "Centre de soins (mutuelle,CPAM)";
$txt_Mbre_06 = "Industrie dentaire / soci&eacute;t&eacute; de recrutement";
$txt_Mbre_07 = "Agence immobili&egrave;re";
$txt_Mbre_08 = "Association, mairie,...";


// Niveau d'étude

$txt_Niv_01 = "Docteur en chirdent";
$txt_Niv_02 = "Docteur en chirdent mention ODF";
$txt_Niv_03 = "Interne";
$txt_Niv_04 = "6e ann&eacute;e en cours";
$txt_Niv_05 = "6e ann&eacute;e valid&eacute;e";
$txt_Niv_06 = "5e ann&eacute;e valid&eacute;e (CSCT)";
$txt_Niv_07 = "Etudiant CECSMO";

$txt_Ass_01 = "Assistante dentaire qualifi&eacute;e";
$txt_Ass_02 = "Assistante dentaire qualifi&eacute;e mention ODF";
$txt_Ass_03 = "Aide dentaire";
$txt_Ass_04 = "Secr&eacute;taire m&eacute;dicale";
$txt_Ass_05 = "Sans qualification souhaitant faire une formation";
$txt_Ass_F  = "Assistante dentaire en formation";
$txt_Aid_F  = "Aide dentaire en formation";
$txt_AssDir = "Assistante de direction";


// Journées de l'installation

$txt_Titre_JI    = "Les journ&eacute;es de l'installation et de l'association";






// recherche de CV DR_rempla.php

$txt_ChRemplTitre    = "Recherche de CV dans la CVth&egrave;que";
$txt_ChRemplTexte    = "Acc&eacute;dez aux fiches des assistantes dentaires, assistantes de direction, aide dentaires ou secr&eacute;taires
en France et &agrave; l'international<br />Choisissez dans le formulaire le continent qui vous int&eacute;resse";
$txt_NbCV            = "Nombre de CV";

// recherche d'annonces DR_annonces.php

$txt_ChAnnTitre    = "Recherche d'annonces";
$txt_ChAnnTexte    = "Acc&eacute;dez aux offres d'emploi d'assistante dentaire, aide dentaire ou secr&eacute;taire en France et &agrave; l'international<br />
Choisissez dans le formulaire le continent qui vous int&eacute;resse";
$txt_voirAnn       = "Consulter les annonces :";
$txt_eFRANCE       = "En France";
$txt_MFRANCE       = "France m&eacute;tropolitaine";
$txt_eEUROP        = "En Europe";
$txt_eAMERIN       = "En Am&eacute;rique du Nord";
$txt_eAMERIS       = "En Am&eacute;rique du Sud";
$txt_eCARAIB       = "Aux Cara&iuml;bes";
$txt_eAFRIQ        = "En Afrique ";
$txt_eOCEANIE      = "En Oc&eacute;anie";
$txt_eASIE         = "En Asie";
$txt_MZone_01      = "R&eacute;gion";
$txt_NbAnnonces    = "Nombre d'annonces";
$txt_UE_EUROP      = "Europe (Union Europ&eacute;enne comprise)";
$txt_AFRIQMAG      = "Afrique (Maghreb compris)";
$txt_ad            = "annonce";






// Modifier / Effacer annonce :  membre/dr_ann_mod

$txt_No_Ad           = "Vous n'avez pas post&eacute; d'annonces. Il n'y a donc rien &agrave; modifier.";
$txt_nb_ann          = "Vous avez %1% annonce%2% sur $titre_site";
$txt_AideDent        = "Aide dentaire";
$txt_AssDent         = "Assistante Dentaire";
$txt_AssDir          = "Assistante de direction";
$txt_SecretRecep     = "Secr&eacute;taire / R&eacute;ceptionniste";
$txt_AssCessionC     = "Association en vue de cession";
$txt_GardeC          = "Garde";
$txt_AdjointC        = "Poste d'&eacute;tudiant adjoint (salari&eacute;)";
$txt_LouageServC     = "Louage de service (salari&eacute;)";
$txt_CDDC            = "CDD";
$txt_CDIC            = "CDI";
$txt_CProf           = "contrat de qualification ou de professionnalisation";
$txt_en              = "en";
$txt_BenevoleC       = "B&eacute;n&eacute;volat/stage";
$txt_posteLe         = "Post&eacute; le";
$txt_expireLe        = "Expire le";
$txt_AnnVisible      = "Annonce visible";
$txt_AnnNonVisible   = "Annonce non visible";
$txt_AnnUrgActiv     = "Option urgente activ&eacute;e";
$txt_voir            = "Voir";
$txt_editer          = "Editer";
$txt_effacer         = "Supprimer";
$txt_TypeAnn         = "Type d'annonce";



// Ajouter une annonce : membre/dr_ann_add

$txt_FicheAvant     = "Vous devez d'abord remplir votre fiche cabinet pour pouvoir poster des annonces";
$txt_AnnImposs      = "Votre statut ne vous permet pas de poster des annonces.";
$txt_ann_distincts = "<strong>IMPORTANT</strong> Il faut passer UNE ANNONCE par demande.";
$txt_prop           = "Poste &agrave; pourvoir :";
$txt_choix_annonce  = "Poste propos&eacute;...";
$txt_prop_contrat   = "Nature du contrat propos&eacute; :";
$txt_choix_contrat  = "Type de contrat...";
$txt_Rempla         = "Un remplacement";
$txt_Collab         = "Une collaboration";
$txt_CollabAss      = "Une collaboration en vue association";
$txt_Association    = "Une association";
$txt_AssCession     = "Une association en vue de cession";
$txt_Garde          = "Une garde";
$txt_PosteSalarie   = "Un poste salari&eacute; (Etudiant-adjoint, CDD, CDI)";
$txt_Adjoint        = "Un poste d'&eacute;tudiant adjoint (salari&eacute;)";
$txt_LouageServ     = "Un louage de service (salari&eacute;)";
$txt_CDD            = "Un contrat &agrave; dur&eacute;e d&eacute;termin&eacute;e (CDD)";
$txt_CDI            = "Un contrat &agrave; dur&eacute;e ind&eacute;termin&eacute;e (CDI)";
$txt_CQualif        = "Un contrat de qualification ou professionnalisation";
$txt_Benevole       = "Du b&eacute;n&eacute;volat/stage";
$txt_incluFiche     = "Votre fiche sera inclue &agrave; votre annonce. Pour modifier les infos cliquez <a href='index.php?cat=compte&incl=modif_dr'>ICI</a>";
$txt_votre_ann      = "Votre annonce";
$txt_explicAnn      = "D&egrave;s validation, ces informations seront consultables sur le site par les chirurgiens dentistes non install&eacute;s qui pourront vous recontacter.";
$txt_jourGarde      = "Jour de garde<br />&nbsp; (jj/mm/aaaa)";
$txt_debRempla      = "D&eacute;but de remplacement<br />&nbsp; (jj/mm/aaaa)";
$txt_finRempla      = "Fin de remplacement<br />&nbsp; (jj/mm/aaaa)";
$txt_debContrat     = "D&eacute;but de contrat<br />&nbsp; (jj/mm/aaaa)";
$txt_finContrat     = "Fin de contrat<br />&nbsp; (jj/mm/aaaa)";
$txt_debContratSouh = "D&eacute;but de contrat souhait&eacute;<br />&nbsp; (jj/mm/aaaa)";
$txt_heuresSemaine  = "Nombre d'heures par semaine <br />&nbsp; (environ) :";
$txt_semaine        = "semaine";
$txt_annonce        = "Texte compl&eacute;mentaire <br />&nbsp; &agrave; votre annonce";
$txt_remuneration   = "R&eacute;mun&eacute;ration";
$txt_remFixe        = "Fixe";
$txt_remPourcent    = "Pourcentage";
$txt_remFixPcent    = "Fixe + pourcentage";
$txt_salaire        = "Salaire mensuel approximatif:<br /> &nbsp; <i>(facultatif)</i>";
$txt_emploi_temps   = "Emploi du temps propos&eacute;";
$txt_lundi          = "Lundi";
$txt_mardi          = "Mardi";
$txt_mercredi       = "Mercredi";
$txt_jeudi          = "Jeudi";
$txt_vendredi       = "Vendredi";
$txt_samedi         = "Samedi";
$txt_matin          = "Matin";
$txt_apresmidi      = "Apr&egrave;s midi";
$txt_opt_AnUrg      = "Option &laquo;Annonce urgente&raquo;";
$txt_titre_urgAnn   = "Titre de l'&laquo;annonce urgente&raquo;";
$txt_max100carac    = "100 caract&egrave;res max";
$txt_2e_fauteuil    = "Travail sur 2&egrave;me fauteuil?";
$txt_secrPres       = "Secr&eacute;taire pr&eacute;sente ";
$txt_assPres        = "Assistante pr&eacute;sente ";
$txt_logement       = "Logement assur&eacute; si besoin";
$txt_remarques      = "Remarques<br />&nbsp; <i>(facultatif)</i>";
$txt_expAnn         = "Date d'expiration de l'annonce<br />&nbsp; (jj/mm/aaaa) :";
$txt_expRempla      = "La date d'expiration correspond &agrave; la fin du remplacement. ";
$txt_expGrade       = "La date d'expiration correspond au jour de garde.";
$txt_10mMax         = "10 mois maximum";
$txt_AdPhotSuppl    = "Ajouter une photo suppl&eacute;mentaire pour cette annonce";






// Effacer Fiche cabinet / CV

$txt_AttEffFiche  = "ATTENTION : Vous vous appr&ecirc;tez &agrave; effacer la fiche de votre cabinet. Toutes vos annonces du site $titre_site seront effac&eacute;es.";
$txt_AttEffCV     = "ATTENTION : Vous vous appr&ecirc;tez &agrave; effacer votre CV de la CVth&egrave;que de $titre_site.";
$txt_effacer_fiAn = "Effacer votre fiche, vos annonces, vos photos";
$txt_fiche_del    = "Votre fiche de cabinet a bien &eacute;t&eacute; effac&eacute;e";
$txt_CV_del       = "Votre CV a bien &eacute;t&eacute; effac&eacute;";
$txt_CV_renseig   = "Votre CV est renseign&eacute; et a &eacute;t&eacute; inclus &agrave; la CVth&egrave;que.<br />Vous pouvez en outre consulter
les offres d'emploi post&eacute;es par des dentistes install&eacute;s";






// Effacer compte membre/del_compte.php
$txt_AttEff    = "ATTENTION : Vous vous appr&ecirc;tez &agrave; effacer votre compte commun aux 3 sites";
$txt_EffacePas = "N'effacez pas votre compte !";
$txt_DesactCV  = "D&eacute;sactivez plutot votre CV pour ne plus apparaitre dans le CVt&egrave;que ";
$txt_EffAnn    = "Effacez plutot vos annonces pour ne plus apparaitre ";
$txt_ConfirmEf = "Votre compte vient d'&egrave;tre effac&eacute;.";



// fiche cabinet membre/dr.php

$txt_fiche_01    = "- Il faut renseigner ce descriptif de votre cabinet avant de poster vos annonces<br />
- Il ne sera &agrave; remplir que la premi&egrave;re fois<br />
- Il sera ajout&eacute; automatiquement &agrave; toutes vos annonces<br />
- Il faudra le modifier en fonction de l'&eacute;volution de votre &eacute;quipement / organisation<br />";
$txt_DesSoc        = "Descriptif de votre soci&eacute;t&eacute; : ";
$txt_fiche_ok      = "Votre fiche est renseign&eacute;e.";
$txt_fiche_ok2     = "Vous pouvez poster des annonces";
$txt_anonym01      = "Anonymat";
$txt_Q_anonym01    = "Souhaitez-vous prot&eacute;ger votre identit&eacute;?";
$txt_anonym02      = "Vous pouvez prot&eacute;ger votre identit&eacute; afin que votre nom n'apparaisse pas.<br />
                      NB : Quelque soit votre choix, votre adresse email n'apparait <u>jamais</u>: si un contact souhaite
                      vous adresser un email, il remplit un formulaire et notre serveur g&eacute;n&egrave;re le message sans que
                      votre adresse ne soit connue de l'exp&eacute;diteur.";
$txt_anonym03      = "Protection identit&eacute;";
$txt_anonymopt1    = "Non prot&eacute;g&eacute;";
$txt_anonymopt2    = "Protection nom (Contact possible par t&eacute;l&eacute;phone et email)";
$txt_anonymopt3    = "Protection totale (Contact possible uniquement par email)";
$txt_cab_org_00    = "Equipement / organisation";
$txt_ModExerc      = "Mode d'exercice";
$txt_ModExopt01    = "Exercice seul";
$txt_ModExopt02    = "Exercice en groupe";
$txt_ZonExerc      = "Zone d'exercice";
$txt_ZonExopt01    = "Citadin";
$txt_ZonExopt02    = "Rural";
$txt_ZonExopt03    = "Semi-rural";
$txt_ZonExopt04    = "Banlieue";
$txt_Pratique      = "Orientation";
$txt_Q_Pratique    = "Votre orientation?";
$txt_Praticopt01   = "Omnipratique";
$txt_Praticopt02   = "ODF";
$txt_Praticopt03   = "Parodontologie";
$txt_Praticopt04   = "Implantologie";
$txt_Praticopt05   = "Proth&egrave;se";
$txt_Praticopt06   = "P&eacute;dodontie";
$txt_Praticopt07   = "Endodontie";
$txt_Praticopt08   = "Chirurgie buccale";
$txt_secretaire    = "Secr&eacute;taire au cabinet";
$txt_Q_secretaire  = "Avez vous une secr&eacute;taire?";
$txt_assistante    = "Assistante au fauteuil";
$txt_Q_assistante  = "Avez vous une assistante?";
$txt_informatiq    = "Informatisation du cabinet";
$txt_Q_informatiq  = "Etes-vous informatis&eacute;?";
$txt_logiciel      = "Logiciel";
$txt_Q_logiciel    = "Le nom de votre logiciel informatique, SVP.";
$txt_rvg           = "RVG";
$txt_Q_rvg         = "Avez vous une RVG ?";
$txt_panoramiq     = "Radiographie";
$txt_pano          = "Panoramique";
$txt_conebeam      = "Cone beam";
$txt_Q_panoramiq   = "Avez vous un appareil de radiographie?";
$txt_insertImg     = "Ins&eacute;rer une photo de votre cabinet";
$txt_insertLogo    = "Ins&eacute;rer votre logo";
$txt_insPhotoId    = "Ins&eacute;rer votre photo d'identit&eacute;";
$txt_img_limit     = "T&eacute;l&eacute;charger votre photo Format jpg, max: 200Ko <i>(facultatif)</i>";
$txt_eff_Img       = "Effacer l'image";
$txt_eff_Img2      = "PS: en ajoutant une image, vous allez &eacute;craser l'ancienne.";
$txt_photo         = "Photo";
$txt_parcourir     = "Parcourir";
$txt_SauvFiche     = "Sauvegarder vos donn&eacute;es";
$txt_Sauver        = "Enregistrer";
$txt_ok_modif      = "Vos donn&eacute;es ont &eacute;t&eacute; modifi&eacute;es";
$txt_ValidAnn      = "Valider votre annonce";
$txt_CVNonRens     = "Votre CV n'a pas &eacute;t&eacute; renseign&eacute;.<br />Remplissez votre CV pour apparaitre dans la CVth&egrave;que et pouvoir &ecirc;tre contact&eacute; par des dentistes install&eacute;s";
$txt_FCNonRens     = "Votre fiche n'a pas &eacute;t&eacute; renseign&eacute;e.<br />Remplissez la fiche de votre cabinet afin de pouvoir poster des annonces";
$txt_CVVisible     = "Visibilit&eacute; de votre CV";
$txt_Q_CVVisible   = "Visibilit&eacute; de votre CV?";
$txt_CVexplic      = "D&eacute;sactivez votre CV quand vous n'&ecirc;tes pas disponible. Il n'apparaitra plus, sans que vous ayez besoin d'effacer votre compte";
$txt_CVActDesac    = "Activez / D&eacute;sactivez votre CV";
$txt_CV_01         = "Votre CV permettra d'enrichir la base de donn&eacute;es des CV (CVth&egrave;que) qui est consultable par les dentistes install&eacute;s";
$txt_actif         = "Actif";
$txt_inactif       = "Inactif";
$txt_Diplomes      = "Vos dipl&ocirc;mes, formations";
$txt_CV_02         = "Votre Curriculum Vitae, vos souhaits";
$txt_CV_03         = "Toutes ses informations constitueront votre CV et seront consultables sur le site par les chirurgiens dentistes install&eacute;s et les centres de soins qui pourront vous recontacter.";
$txt_NivEtude      = "Votre formation actuelle";
$txt_PaysDiplome   = "Pays d'obtention du dipl&ocirc;me";
$txt_DateDiplome   = "Date d'obtention du dipl&ocirc;me";
$txt_QualifSpec    = "Qualifications particuli&egrave;res<br />&nbsp;(implantologie, ODF,...)";
$txt_Activite      = "Activit&eacute;(s) lors des<br />&nbsp;derniers mois";
$txt_Q_Activite    = "Activit&eacute;(s) lors des derniers mois?";
$txt_Interets      = "Principaux centres d'int&eacute;r&ecirc;ts";
$txt_lettreMotiv   = "Lettre de motivation";
$txt_competences   = "Vos comp&eacute;tences";
$txt_compet01      = "Travailler &agrave; &quot; quatre mains &quot;";
$txt_compet02      = "Aider &agrave; la mise en place d'un champ op&eacute;ratoire (digue)";
$txt_compet03      = "Assister lors de chirurgie en parodontologie";
$txt_compet04      = "Assister lors de chirurgie en implantologie";
$txt_compet05      = "Assister lors de chirurgie de dents de sagesse";
$txt_compet06      = "Assister lors des prises d'empreinte";
$txt_compet07      = "Assurer la liaison avec un laboratoire de proth&egrave;se";
$txt_compet08      = "Organiser la st&eacute;rilisation";
$txt_compet09      = "Assurer la tra&ccedil;abilit&eacute; des instruments et des produits";
$txt_compet10      = "G&eacute;rer un planning de rendez vous";
$txt_compet11      = "R&eacute;aliser la motivation &agrave; l'hygi&egrave;ne des patients";
$txt_compet12      = "Utiliser l'outil informatique";
$txt_compet13      = "G&eacute;rer les commandes, g&eacute;rer un stock de produits";
$txt_compet14      = "Remplir les feuilles de s&eacute;curit&eacute; sociale";
$txt_compet15      = "Utiliser les lecteurs de carte s&eacute;same vital";
$txt_compet16      = "G&eacute;rer avec efficacit&eacute; le standard t&eacute;l&eacute;phonique";
$txt_mobilite      = "Votre mobilit&eacute;";
$txt_mobilite_01   = "Mobile sur le D&eacute;partement";
$txt_mobilite_02   = "Mobile sur la R&eacute;gion";
$txt_mobilite_03   = "Mobile sur le Pays";
$txt_mobilite_04   = "Mobile sur l'International";
$txt_recherche     = "Vous recherchez<br /><i>&nbsp; (plusieurs choix possibles)</i>";
$txt_Q_recherche   = "Vos recherches ? Cocher au moins une case, SVP.";
$txt_disponib      = "Disponibilit&eacute;s";
$txt_Zones_titre   = "Zone(s) de parution de votre CV";
$txt_Zone_00       = "Par d&eacute;faut, votre CV s'affiche dans votre";
$txt_Zone_01       = "r&eacute;gion";
$txt_Zone_02       = "d&eacute;partement";
$txt_Zone_03       = "Vous pouvez &eacute;tendre cette parution";
$txt_Zone_04       = "&agrave; d'autres d&eacute;partements fran&ccedil;ais ou";
$txt_Zone_05       = "&agrave; d'autres pays";
$txt_Zone_DOMTOM   = "Cas particulier des DOM-TOM : ils sont class&eacute;s selon leur zone g&eacute;ographique (Martinique, Guadeloupe : caraibes ; Ile de la r&eacute;union : Afrique ; etc...)";
$txt_Zone_06       = "Autres d&eacute;partements fran&ccedil;ais<br />&nbsp; o&ugrave; vous d&eacute;sirez paraitre<br />&nbsp; <i>(facultatif)</i>";
$txt_Zone_07       = "2 chiffres s&eacute;par&eacute;s par des virgules (ex: 75,93,92)";
$txt_Q_Zone_07     = "Le champ 'autres d&eacute;partements' est invalide utilisez cette syntaxe: 01, 02, 03 etc...";
$txt_Zone_08       = "Autres zones g&eacute;ographiques<br />&nbsp; o&ugrave; vous d&eacute;sirez paraitre<br />&nbsp; <i>(facultatif)</i> ";
$txt_Zone_09       = "Choisissez les pays ou vous souhaiteriez travailler (plusieurs choix possibles)<br />
                   <i>NB : Pour s&eacute;l&eacute;ctionner plusieurs pays, cliquez en laissant la touche CTRL appuy&eacute;e</i>";
$txt_UE            = "Union Europ&eacute;enne";
$txt_EUROP         = "Europe (Hors UE)";
$txt_AMERIN        = "Am&eacute;rique du Nord";
$txt_CARAIB        = "Cara&iuml;bes";
$txt_MAGHREB       = "Maghreb";
$txt_AFRIQ         = "Afrique (Hors Maghreb)";
$txt_ASIE          = "Asie";
$txt_AMERIS        = "Am&eacute;rique du Sud";
$txt_OCEANIE       = "Oc&eacute;anie";
$txt_error         = "Attention, vous n'avez pas rempli tous les champs.";




// Menu

$txt_accueil       = "Accueil";
$txt_DentInst      = "Dentiste Install&eacute;";
$txt_VoCompt       = "Votre compte";
$txt_NvCompteInst  = "Cr&eacute;er un compte install&eacute;";
$txt_ModifCompte   = "Modifier votre compte";
$txt_Mailinglist   = "Mailing list";
$txt_Identif       = "Identification";
$txt_connexion     = "Se connecter";
$txt_mdp_perdu     = "Mot de passe perdu";
$txt_Nv_email_act  = "Demander un nouvel email d'activation";
$txt_deconnexion   = "Se d&eacute;connecter";
$txt_fiche_cab     = "Votre fiche cabinet";
$txt_fiche_soc     = "Fiche de votre soci&eacute;t&eacute;";
$txt_a_remplir     = "A remplir avant la 1&egrave;re annonce !!";
$txt_creer_fiche   = "Cr&eacute;er fiche";
$txt_editer_fiche  = "Editer votre fiche";
$txt_effacer_fiche = "Effacer votre fiche";
$txt_ann           = "Vos annonces";
$txt_ajout_ann     = "Ajouter une annonce";
$txt_edit_ann      = "Editer / effacer annonces";
$txt_option_urgent = "Option annonce urgente";
$txt_option_urg_xl = "ANNONCES URGENTES !";
$txt_annonce_ici   = "[Votre annonce ici?]";
$txt_stat          = "Statistiques";
$txt_CVtheque      = "CVth&egrave;que";
$txt_trouv_cv      = "Voir les CV";
$txt_tracker_cv    = "Poster un tracker de CV";
$txt_NonDentInst   = "Dentiste Non Install&eacute;";
$txt_Ass_Secr      = "Assistante/secr&eacute;taire";
$txt_NvCompteNInst = "Cr&eacute;er un compte";
$txt_services      = "Vos services";
$txt_NvCVt         = "Cr&eacute;er / modifier votre CV";
$txt_CherchAnn     = "Voir les annonces";
$txt_tracker_ann   = "Poster un tracker d'annonce";
$txt_mutuelles     = "Centres de sant&eacute;/Recruteurs";
$txt_NvCompteMut   = "Cr&eacute;er un compte";
$txt_Nous_Contact  = "Nous contacter";
$txt_legal         = "Mentions l&eacute;gales";
$txt_Pub           = "Publicit&eacute;";

$txt_bas           = $titre_site."&reg; est une marque d&eacute;pos&eacute;e de CHIRDENT / Dental Networks Sarl. Copyright &copy; 2001-".date("Y").". Tous droits r&eacute;serv&eacute;s pour tous pays.
<br />Conform&eacute;ment aux dispositions CNIL, vous disposez d'un droit d'acc&egrave;s de rectification et de suppression des donn&eacute;es vous concernant. <br />
Ce droit peut &ecirc;tre exerc&eacute; en nous contactant par email ou par courrier.<br />
CHIRDENT SARL / Dental Networks - 7 rue Jules Michelet - 33140 Villenave d'Ornon - Fax: 05.56.84.98.18 - Assistante-Dentaire.com Version 3 - En ligne depuis Aout 2013 <br />";
$txt_bas_rouge     = "La collecte des emails par robots sur ce site est interdite. De m&ecirc;me l'extraction des bases de donn&eacute;es, en dehors des conditions d'utilisation, est interdite.";


// Accueil.php

$txt_accueil_01 = "Trouvez votre Assistante Dentaire ou votre secr&eacute;taire";
$txt_accueil_11 = "Trouvez votre CDI ou CDD dans un cabinet dentaire, un centre de soins,...";
$txt_accueil_02 = "Bienvenue sur l'un des sites Internet les plus anciens proposant l'acc&egrave;s gratuit &agrave; des offres d'emploi et des CV d'assistantes ou secr&eacute;taires en France et &agrave; l'international.<br />
Les centres de soins (s&eacute;curit&eacute; sociale, mutuelle, cliniques, hopitaux) et les collectivit&eacute;s 
ont &eacute;galement la possibilit&eacute; de proposer des postes.";
$txt_inscription = "Inscription gratuite"; 
$txt_apropos_JI = "Journ&eacute;es de l'installation&nbsp;".date("Y")."";
$txt_info_serv  = "Information et services";
$txt_DernArt    = "Derniers articles";
$txt_InternServ = "Services Internet";
$txt_partenai   = "Partenaires";
$txt_enreg_com  = "Vous &ecirc;tes enregistr&eacute; comme";
$txt_ChangStatu = "Vous avez chang&eacute; de statut ? Cliquez: ";
$txt_ICI        = "ICI";



// Contact.php

$txt_form       = "Par formulaire";
$txt_ChampsObl  = "Tous les champs sont obligatoires";
$txt_Vnom       = "Votre nom";
$txt_Vemail     = "Votre email";
$txt_SujetMsg   = "Sujet de votre message";
$txt_TexteMsg   = "Texte du message";
$txt_ImgVerif   = "Recopiez le code anti-SPAM";
$txt_TexteEnv   = "Poster";
$txt_PCourrier  = "Par courrier";
$txt_tel        = "Par t&eacute;l&eacute;phone";
$txt_fax        = "Par fax";
$txt_MsgPoste   = "Votre message a &eacute;t&eacute; post&eacute;";

// inscription.php

$txt_DejaInsc = "D&eacute;j&agrave; inscrit";
$txt_inscbd1  = "Vos coordonn&eacute;es";
$txt_inscbd2  = "V&eacute;rification email";
$txt_inscbd3  = "Confirmation";
$txt_tt_ins1  = "Choix de vos identifiants";
$txt_tt_ins2  = "Votre fiche de membre";
$txt_inscr_01 = "Inscrivez-vous maintenant pour pouvoir consulter les offres ou demandes d'emploi
ou bien pour poster vos annonces. C'est facile et rapide.";
$txt_inscr_02 = "Vos identifiants vous permettront d'acc&eacute;der aux 3 sites web :";
$txt_inscr_03 = "Vous &ecirc;tes :";
$txt_inscr_04 = "S&eacute;lectionnez";
$txt_identif  = "Votre adresse email";
$txt_pass     = "Mot de passe";
$txt_item_01  = "Civilit&eacute;";
$txt_item_01a = "Mle";
$txt_item_01b = "Mme";
$txt_item_01c = "M.";
$txt_item_02  = "Nom";
$txt_item_03  = "Pr&eacute;nom";
$txt_item_04  = "Date d'anniversaire";
$txt_item_05  = "Adresse";
$txt_item_06  = "Code postal, Ville";
$txt_item_06b = "Ville";
$txt_item_07  = "Pays";
$txt_item_07b = "Choix pays";
$txt_item_08  = "T&eacute;l&eacute;phone";
$txt_item_08b = "Au moins un num&eacute;ro svp";
$txt_item_09  = "Mobile";
$txt_item_10  = "Fax";
$txt_item_11  = "Publication sur une version papier <br />d'un journal adress&eacute; aux professionnels";
$txt_item_12  = "Participation &agrave; des enqu&ecirc;tes";
$txt_item_12b = "Un choix svp";
$txt_item_13  = "J'ai lu et j'accepte les conditions du site.";
$txt_item_13b = "Vous devez accepter les conditions d'utilisation";
$txt_item_14  = "Vous acceptez notamment, compte tenu de la gratuit&eacute; du service, de recevoir des emails de Chirdent/Dental Networks
pouvant promouvoir ses partenaires.";
$txt_item_15  = "Attention, vous n'avez pas rempli tous les champs.";
$txt_item_16  = "Pour poursuivre votre inscription, cliquez sur continuer";
$txt_oui      = "Oui";
$txt_non      = "Non";
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
$txt_emailConf = "Un email vous a &eacute;t&eacute; post&eacute;. Pour poursuivre votre inscription, vous devez cliquer 
sur le lien d'activation qui reste valide 48 heures. Pass&eacute; ce d&eacute;lai, votre compte sera supprim&eacute;.</div><br />
<br />
<strong>Important</strong> :<br />
- cet email peut mettre quelques minutes &agrave; arriver, si vous ne le recevez pas imm&eacute;diatement, actualisez votre logiciel de messagerie plusieurs fois.<br />
- si vous ne recevez pas l'email de confirmation, il est possible que vous ayez mal tap&eacute; votre adresse email. Cliquez ici : <a href='index.php?cat=emailvalidationno' />Email de validation jamais re&ccedil;u</a> <br />
";

//mot de passe perdu : oubli.php

$txt_oubli01  = "En saisissant l'adresse e-mail ayant servi &agrave; votre inscription dans le formulaire
ci-dessous, vous recevrez votre mot de passe, par email, &agrave; cette adresse.";
$txt_ouberr01 = "Adresse email non valide";
$txt_ouberr02 = "Cette adresse n'existe pas dans notre base de donn&eacute;es";
$txt_oubmail01 = "Votre mot de passe";
$txt_oubmail02 = "Rappel de vos identifiants";
$txt_oubmail03 = "NB: Ces identifiants sont valables pour les 3 sites Web de";
$txt_oubmail04 = "Votre mot de passe vous a &eacute;t&eacute; post&eacute; &agrave; l'adresse";
$txt_oubmail05 = "Merci de votre confiance";


// Nouvel email d'activation

$txt_Activ01 = "Dans quel cas utiliser ce formulaire ?<br />
&bull; Vous n'avez pas re&ccedil;u votre email d'activation apr&egrave;s votre inscription <br />
&bull; Vous avez chang&eacute; d'email depuis votre inscription <br />
&bull; Pour r&eacute;activer votre compte (inutilis&eacute; depuis longtemps) qui a &eacute;t&eacute; inactiv&eacute; automatiquement.<br /> ";

$txt_Activ02 = "Aucune correspondance pour ce nom et ce mot de passe dans notre base de donn&eacute;es";
$txt_Activ03 = "Merci de remplir les champs suivants pour qu'un nouvel email vous soit adress&eacute;";



//  Fonctions

$txt_AccReserv = "ACCES RESERVE AUX MEMBRES. <br />
Si vous &ecirc;tes membre, veuillez vous identifier pour acc&eacute;der &agrave; cette zone.";
$txt_DejaMbre  = "D&eacute;j&agrave; membre ? Identifiez-vous !";
$txt_PasMbre  = "Pas encore membre ? Inscrivez-vous !";


// Compte de membre

$txt_ModCompte = "Modifier vos infos";
$txt_ModPref   = "Vos pr&eacute;f&eacute;rences";
$txt_EffCompte = "Effacer votre compte";
$txt_CV        = "Votre CV";
$txt_DelCV     = "Effacer votre CV";
$txt_bienvenue = "Bienvenue sur votre compte";
$txt_date_insc = "Vous &ecirc;tes inscrit depuis le";
$txt_cred_fiche= "Cr&eacute;er / Editer votre fiche cabinet";


// Mentions légales


$txt_CondUtil = "Conditions d'utilisation du site";
$txt_NumCNIL  = "D&eacute;claration CNIL n&ordm;";

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