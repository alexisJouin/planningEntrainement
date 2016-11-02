$(document).ready(function () {
    var tabCurrentSession;
    var tabListGroup;
    var id_player, id_groupe, derby_name, privilege, statut_in_groupe, nom_groupe;
    var data = new Array();

    getCurrentSession();

    //TO DO replace hide par empty pour empécher d'afficher avec console les div
    if (id_groupe == 0 || id_groupe == null || id_groupe == "") {
        $('#planning').hide();
        $('#firstUse').show();
        getListGroup();
    } else {
        if (statut_in_groupe == 2) { // si personne accepté 
            $('#firstUse').hide();
            $('#linkToCreateGroup').hide();
            $('#planning').show();
            
            if (privilege == 1 || privilege == 2) { //Si c'est l'admin
                $('#linkToCreateGroup').hide();
                $('#EditGroupeMove').show();
                $('#PlannningMove').show();
                getListDemandePlayer();

            }
        } else if (statut_in_groupe == 1) {
            $('#linkToCreateGroup').hide();
            $('#notification ul').append('<li>Vous avez demandé de rejoindre le groupe : <u><b>' + nom_groupe + '</b></u></li>');
            $('body').append("<h1>Votre demande pour rejoindre le groupe : <u>" + nom_groupe + "</u> est en cours de validation par l'administrateur</h1>");
        }

    }

    //get list des groupes
    function getListGroup() {
        $.ajax({
            url: "php/getListGroup.php",
            async: false,
            success: function (msg) {
                if (msg != "" || msg != null) {

                    var output = "";

                    tabListGroup = jQuery.parseJSON(msg);

                    //Pour chaque Groupe
                    for (var i in tabListGroup)
                    {
                        //Génération des listes
                        output += "<li id='" + tabListGroup[i].id + "'>" + tabListGroup[i].nom +
                                "<a href='#modalInfoGroupe" + tabListGroup[i].id + "' data-uk-modal><img src='img/info.png' id='" + tabListGroup[i].id +
                                "' style='width:30px; float:right; cursor:pointer;'></a><button class='buttonRejoindre'id='buttonInfoGroupe" +
                                tabListGroup[i].id + "'>Rejoindre</button></li>";

                        //Génération des modals
                        $('#firstUse').append('<div id="modalInfoGroupe' + tabListGroup[i].id + '" class="uk-modal"><div class="uk-modal-dialog"><div class="uk-modal-header"><a class="uk-modal-close uk-close"></a></div></div></div>');
                        $('#modalInfoGroupe' + tabListGroup[i].id).children().children().append("<h2>Info du groupe " + tabListGroup[i].nom + "</h2>");
                        $('#modalInfoGroupe' + tabListGroup[i].id).children().append(
                                "<ul class='uk-list uk-list-striped'>\n\
                                    <li><u>Adresse Mail</u> : " + tabListGroup[i].email + "</li>\n\
                                    <li><u>Adresse</u> : " + tabListGroup[i].adresse + "</li>\n\
                                    <li><u>Description du groupe</u> : " + tabListGroup[i].descriptif + "</li>\n\
                                    <li><u>Photo du groupe</u> : " + tabListGroup[i].photo + "</li>\n\
                                </ul>");


                    }

                    $('#listLiGroup').append(output);
                } else {
                    console.log("Erreur : il n'a aucun groupe ");
                }

            },
            error: function () {
                console.log("Errreur lors de la récupération des groupe");
            }
        });
    }

    //Pour demander de rejoindre un groupe
    $(function () {
        $(".buttonRejoindre").click(function () {
            //TODO : ajax call to rejoindre groupe pour le current player co
            $.ajax({
                type: "POST",
                url: "php/rejoindreGroupe.php",
                data: "idGroupe=" + $(this).parent().attr("id") + "&option=1&id_player=" + id_player,
                success: function (msg) {
                    alert("Votre demande pour rejoindre le groupe a été envoyé !");
                    location.reload();
                }
            });
        });
    });

    //Récupère la liste des demandes
    function getListDemandePlayer() {
        $.ajax({
            type: "POST",
            url: "php/rejoindreGroupe.php",
            data: "idGroupe=" + id_groupe + "&option=2", //id du groupe,
            success: function (msg) {
                var tabListDemande = jQuery.parseJSON(msg);
                //Pour chaque demande de joueurs dans le groupe
                for (var i in tabListDemande) {
                    $('#notification ul').append('<li id="' + tabListDemande[i].id_player + '"><u><b>' + tabListDemande[i].nom_player +
                            '</b></u> Veux rejoindre le groupe <input id="reponseDemande" type="radio" name="reponseDemande" value="yes" /> Oui <input id="reponseDemande" type="radio" name="reponseDemande" value="no" /> Non </li>');
                }

                testHasNotif();

                //Gestion des demande par l'admin
                $('input#reponseDemande').change(function () {
                    var id_playerDemande = $(this).parent().attr('id');
                    var value_playerDemande = $(this).attr('value');
                    $.ajax({
                        type: "POST",
                        url: "php/rejoindreGroupe.php",
                        data: "id_playerDemande=" + id_playerDemande + "&value_playerDemande=" + value_playerDemande + "&option=3",
                        success: function (msg) {
                            $('#' + id_playerDemande).fadeOut(1500);
                            testHasNotif();
                        }

                    });
                });
            }
        });
    }
    ;

    //Get et récupère les valeurs des variables sessions
    function getCurrentSession() {
        $.ajax({
            url: "php/getCurrentSession.php",
            async: false,
            success: function (msg) {
                if (msg != "" || msg != null) {
                    tabCurrentSession = jQuery.parseJSON(msg);
                    id_player = tabCurrentSession['id_player']; //Version 1 Pour get info du tab JSON
                    id_groupe = tabCurrentSession['id_groupe'];//Version 2
                    derby_name = tabCurrentSession['derby_name'];
                    privilege = tabCurrentSession['privilege'];
                    statut_in_groupe = tabCurrentSession['statut_in_groupe'];
                    nom_groupe = tabCurrentSession['nom_groupe'];

                } else {
                    console.log("Erreur : les sessions sont vides ! ");
                }

            },
            error: function () {
                console.log("Errreur lors de la récupération des variables sessions");
            }
        });
    }

    //Gestion des click bouton
    $("#creationMove").click(function () {
        window.location.href = "creationGroup.php";
    });

    $("#EditProfilMove").click(function () {
        window.location.href = "EditionCompte.php";
    });
    $("#EditGroupeMove").click(function () {
        window.location.href = "editionGroupe.php";
    });
    $("#PlannningMove").click(function () {
        window.location.href = "gestionPlanning.php";
    });

    //Bouton de déconnexion
    $("#logOff").click(function () {
        $.ajax({
            type: "POST",
            url: "php/logOff.php",
            success: function () {
                window.location.href = "index.php";
            }
        });
    });

    //Si il y a des notifications !
    function testHasNotif() {
        if ($("#notification ul").has("li").length) {
            $("#paramButton").attr("src", "img/paramAlert.png");
        }
        else {
            $("#paramButton").attr("src", "img/param.png");
        }
    }
    
    testHasNotif();



    $(function () {
        $('#dateScrolling').jqxScrollView({width: 600, height: 450, buttonsOffset: [1, 1]});
        //$('#StartBtn').jqxButton({theme: theme});
        //$('#StopBtn').jqxButton({theme: theme});
//        $('#StartBtn').click(function () {
//            $('#dateScrolling').jqxScrollView({slideShow: true});
//        });
//        $('#StopBtn').click(function () {
//            $('#dateScrolling').jqxScrollView({slideShow: false});
//        });
    });

    $('#yes').click(function () {
        console.log("Test Yes! ");
        UIkit.notify({
            message: 'yES §§	 !',
            status: 'info',
            timeout: 2000,
            pos: 'top-center'
        });
    });

//     alert($(".derby_name_session"));


});
