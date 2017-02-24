$(document).ready(function () {
    var tabCurrentSession;
    var tabListGroup;
    var id_player, id_groupe, derby_name, privilege, statut_in_groupe, nom_groupe;
    var forAdmin = "false";


    var sizeWidthScreen = $(window).width();
    var sizeHeightScreen = $(window).height();
    var widthScroll = "75%";
    gestionSize();


    //Quand la taille de fenêtre change
    $(window).resize(function () {
        gestionSize();
    });

    function gestionSize() {
        sizeWidthScreen = $(window).width();
        sizeHeightScreen = $(window).height();

        if (sizeWidthScreen <= 370) {
            setStylePhone();
            $('h3').css('font-size', '11px');
            $('h4').css('font-size', '10px');
            $('h4').css('margin-left', '6%');

        } else if (sizeWidthScreen <= 500 && sizeWidthScreen > 370) {
            setStylePhone();
//            $('h3').css('left', '19%');
        } else if (sizeWidthScreen > 500) {
            widthScroll = "400px";
            $('#dateScrolling').css('margin', '0px auto 0px 0px');
            $('#dateScrolling').css('left', '' + (sizeWidthScreen / 2) - 250 + 'px');
            $('#arrowLeft').css('left', '' + (sizeWidthScreen / 2) - 350 + 'px');
            $('#arrowRight').css('right', '' + (sizeWidthScreen / 2) - 350 + 'px');
        }
    }
    ;

    function setStylePhone() {
        widthScroll = "100%";
        $('#dateScrolling').css('margin-left', '0px');
        $('#dateScrolling').css('border-radius', '0px');
        $('h3').css('font-size', '20px');
        $('h4').css('font-size', '15px');
        $('#arrowLeft').hide();
        $('#arrowRight').hide();
    }

    // Check la plateform
    window.mobileAndTabletcheck = function () {
        var check = false;
        (function (a) {
            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4)))
                check = true;
        })(navigator.userAgent || navigator.vendor || window.opera);
        return check;
    };
    window.mobileAndTabletcheck();


//    var getUrlParameter = function getUrlParameter(sParam) {
//        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
//                sURLVariables = sPageURL.split('&'),
//                sParameterName,
//                i;
//
//        for (i = 0; i < sURLVariables.length; i++) {
//            sParameterName = sURLVariables[i].split('=');
//
//            if (sParameterName[0] === sParam) {
//                return sParameterName[1] === undefined ? true : sParameterName[1];
//            }
//        }
//    };

    getCurrentSession();

    //TO DO replace hide par empty pour empécher d'afficher avec console les div
    if (id_groupe == 0 || id_groupe == null || id_groupe == "") {
        forAdmin = "false";
        $('#planning').hide();
        $('#firstUse').show();
        $('footer').hide();
        getListGroup();
    } else {
        if (statut_in_groupe == 2) { // si personne accepté 
            forAdmin = "false";
            $('#firstUse').hide();
            $('#linkToCreateGroup').hide();
            $('#planning').show();
            var currentPage = $('#dateScrolling').jqxScrollView('currentPage');

//            var currentPage = getUrlParameter('currentPage');
//            $("#dateScrolling").jqxScrollView('changePage', getUrlParameter('currentPage'));


            if (privilege == 1 || privilege == 2) { //Si c'est l'admin
                forAdmin = "true";
                $('#linkToCreateGroup').hide();
                $('#EditGroupeMove').show();
                $('#PlannningMove').show();
                $('#ExportMove').show();
                getListDemandePlayer();

            }


            getListEntrainement();


        } else if (statut_in_groupe == 1) {
            forAdmin = "false";
            $('#linkToCreateGroup').hide();
            $('[forAdmin="true"]').hide();
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
                                "' class='infoButton'/></a><button class='buttonRejoindre'id='buttonInfoGroupe" +
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
                    $('#notification ul').append('<li id="' + tabListDemande[i].id_player + '">\n\
                                                    <u><b>' + tabListDemande[i].prenom_player + ', ' + tabListDemande[i].derby_name + '</b></u> Veux rejoindre le groupe <br><input id="reponseDemande" type="radio" name="reponseDemande" value="yes" /> Oui <input id="reponseDemande" type="radio" name="reponseDemande" value="no" /> Non </li>');
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
    $("#ExportMove").click(function () {
        window.location.href = "exportPresence.php";
    });

    //Mise à jour
    $("#updateButton").click(function () {
        $.ajax({
            url: "php/gestionReponse.php",
            type: "POST",
            async: false,
            data: "option=0",
            success: function () {
                window.location.reload();
            }

        });
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
        } else {
            $("#paramButton").attr("src", "img/param.png");
        }
    }

    testHasNotif();


    function getListEntrainement() {
        $.ajax({
            url: "php/getListEntrainement.php",
            type: "POST",
            async: false,
            data: "option=5",
            success: function (msg) {
                if (msg != "" && msg != null && msg.length != 2) {
                    var tabListEntrainement = jQuery.parseJSON(msg);
                    var output = "";

                    //Pour chaque entraînement
                    for (var i in tabListEntrainement)

                    {
                        output += "\
                            <div class ='entrainement' id='" + tabListEntrainement[i].id + "'>\n\
                                <a href='#modalInfoEntrainement" + tabListEntrainement[i].id + "' data-uk-modal>\n\
                                    <img src='img/info.png' class='infoButton'/>\n\
                                </a>\n\
                                <h1>" + $.format.date(tabListEntrainement[i].date, 'ddd d') + "  " + $.format.date(tabListEntrainement[i].date, 'MMMM yyyy') + "</h1>\n\
                                <h2>Entraînement de " + tabListEntrainement[i].horraire_debut + " à " + tabListEntrainement[i].horraire_fin + "</h2>\n\
                                <ul id='listPresenceDefile" + tabListEntrainement[i].id + "' list='defile'></ul>\n\
                                <br><img src='img/notif_alert.png' id='notReponse' alt='pas de réponse !'/><figcaption id='notReponse'>Vous n'avez pas répondu !</figcaption>\n\
                                <span id='buttonReponse'>\n\
                                    <div class='oui'>\n\
                                        <button value='yes' id='yes' idEntrainement=" + tabListEntrainement[i].id + " >OUI</button>\n\
                                        <button value='noContact' id='noContact' idEntrainement=" + tabListEntrainement[i].id + " >OUI mais sans contact</button>\n\
                                    </div>\n\
                                    <div class='non'>\n\
                                        <button value='yn' id='yn' idEntrainement=" + tabListEntrainement[i].id + " >Peut-être</button>\n\
                                        <button value='no' id='no' idEntrainement=" + tabListEntrainement[i].id + " >NON</button>\n\
                                    </div>\n\
                                </span>\n\
                            </div>";

                        $('#dateScrolling').append(output);

                        $('#modalEntrainement').append('\
                            <div id="modalInfoEntrainement' + tabListEntrainement[i].id + '" class="uk-modal">\n\
                                <div class="uk-modal-dialog">\n\
                                    <div class="uk-modal-header">\n\
                                        <a class="uk-modal-close uk-close"></a>\n\
                                        <h2>Entraînement du ' + $.format.date(tabListEntrainement[i].date, 'dd/MM/yyyy') + ' </h2>\n\
                                    </div>\n\
                                    Lieu : <a href="https://www.google.fr/maps/place/' + tabListEntrainement[i].lieu + '">' + tabListEntrainement[i].lieu + '</a>\n\
                                    <br><span class="listPlayerReponse" id="nbrPersonne' + tabListEntrainement[i].id + '"></span>\n\
                                    <div class="listPlayerReponse" id="divListReponse' + tabListEntrainement[i].id + '">\n\
                                        <h3><u>Liste des personnes présentes</u> : </h3>\n\
                                        <ul id="listPresence' + tabListEntrainement[i].id + '" class="uk-list uk-list-striped" style="max-height: 200px;overflow: auto;"></ul>\n\
                                        <h3><u>Liste des personnes absentes</u> : </h3>\n\
                                        <ul id="listPresence' + tabListEntrainement[i].id + 'No" class="uk-list uk-list-striped" style="max-height: 200px;overflow: auto;"></ul>\n\
                                        <h3 forAdmin="' + forAdmin + '"><u>Liste des personnes n\'ayant pas répondu !</u> : </h3>\n\
                                        <button id="sendRappel" idEntrainement="' + tabListEntrainement[i].id + '" forAdmin="' + forAdmin + '"><u>Envoyer un mail !</u> : </button>\n\
                                        <ul forAdmin="' + forAdmin + '" id="listPresence' + tabListEntrainement[i].id + 'NoRep" class="uk-list uk-list-striped" style="max-height: 200px;overflow: auto;"></ul>\n\
                                    </div>\n\
                                </div>\n\
                            </div>'
                                );

                        getListPresence(tabListEntrainement[i].id);


                        getCurrentPlayerPresence(tabListEntrainement[i].id);


                    }

                    //Supprime les doublons 
                    $('.entrainement').each(function () {
                        $('[id="' + this.id + '"]:gt(0)').remove();
                    });

                    //Supprime les doublons
                    $('.listPlayerReponse').each(function () {
                        var idDiv = $(this).attr('id');
                        $('#' + idDiv).children('ul').children('li').each(function () {
                            $('#' + idDiv).children('ul').children('[id="' + this.id + '"]:gt(0)').remove();
                        });
                    });



                    scrollView();
                } else {
                    //TO DO  mettre un message aucun d'entrainement prévus
                }
            }

        });
    }


    function scrollView() {

        $('#dateScrolling').jqxScrollView({
            width: widthScroll,
            height: 480,
            buttonsOffset: [1, 1]
        });

        currentPage = $('#dateScrolling').jqxScrollView('currentPage');



        $('#arrowRight').click(function () {
            $("#dateScrolling").jqxScrollView('forward');
            currentPage = $('#dateScrolling').jqxScrollView('currentPage');
        });

        $('#arrowLeft').click(function () {
            $("#dateScrolling").jqxScrollView('back');
            currentPage = $('#dateScrolling').jqxScrollView('currentPage');
        });


        $('#dateScrolling').bind('pageChanged', function (event)
        {
            var page = event.args.currentPage;
            currentPage = page;
        });

    }
    ;

    function getListPresence(idEntrainement) {
        $.ajax({
            url: "php/gestionReponse.php",
            type: "POST",
            async: false,
            data: "option=2&idEntrainement=" + idEntrainement,
            success: function (msg) {
                var output = "";
                var output2 = "";

                if (msg != "" && msg != null && msg.length != 2) {

                    var tabList = jQuery.parseJSON(msg);
                    var nbrPresence = 0;
                    var nbrMec = 0;
                    var nbrNana = 0;
                    var tabListPresence = tabList[0];
                    var tabListNoPresence = tabList[1];
                    $('#listPresenceDefile' + idEntrainement).append("<li><span>Personnes présentes : </span></li>");
                    for (var i in tabListPresence) {
                        if (tabListPresence[i].statut == 2) { //Si présent
                            if (tabListPresence[i].sexe == 0) {//Si c'est un homme
                                output += "<li id='liIdPlayer" + tabListPresence[i].id_player + "' class='boy'>" + tabListPresence[i].prenom + ",  " + tabListPresence[i].derby_name + "</li>";
                                output2 += "<li class='boy'><p class='boy'>" + tabListPresence[i].prenom + " , " + tabListPresence[i].derby_name + "</p></li>";
                                nbrMec++;
                            } else if (tabListPresence[i].sexe == 1) {
                                output += "<li id='liIdPlayer" + tabListPresence[i].id_player + "' class='girl'>" + tabListPresence[i].prenom + ",  " + tabListPresence[i].derby_name + "</li>";
                                output2 += "<li><p class='girl'>" + tabListPresence[i].prenom + " , " + tabListPresence[i].derby_name + "</p></li>";
                                nbrNana++;
                            }
                            $('#listPresence' + idEntrainement).append(output);

                            nbrPresence++;
                        } else if (tabListPresence[i].statut == 1) {
                            output += "<li id='liIdPlayer" + tabListPresence[i].id_player + "' style='color:orange;'>" + tabListPresence[i].prenom + ",  " + tabListPresence[i].derby_name + " => Peut-être</li>";
                            $('#listPresence' + idEntrainement).append(output);
                        } else if (tabListPresence[i].statut == 0) {
                            output += "<li id='liIdPlayer" + tabListPresence[i].id_player + "' style='color:red;'>" + tabListPresence[i].prenom + ",  " + tabListPresence[i].derby_name + "</li>";
                            $('#listPresence' + idEntrainement + 'No').append(output);
                        } else if (tabListPresence[i].statut == 3) {
                            if (tabListPresence[i].sexe == 0) {//Si c'est un homme
                                nbrMec++;
                            } else {
                                nbrNana++;
                            }
                            output += "<li id='liIdPlayer" + tabListPresence[i].id_player + "' style='color:green;'>" + tabListPresence[i].prenom + ",  " + tabListPresence[i].derby_name + " (No Contact) </li>";
                            output2 += "<li><p style='color:green;'>" + tabListPresence[i].prenom + " , " + tabListPresence[i].derby_name + "</p></li>";
                            $('#listPresence' + idEntrainement).append(output);
                            nbrPresence++;
                        }
                    }
                    $('#listPresenceDefile' + idEntrainement).append(" " + output2);

                    for (var i in tabListNoPresence) {
                        output += "<li id='liIdPlayer" + tabListNoPresence[i].id_playerNo + "' style='color:red;'>" + tabListNoPresence[i].prenomNo + ",  " + tabListNoPresence[i].derby_nameNo + "</li>";
                        $('#listPresence' + idEntrainement + 'NoRep').append(output);
                    }

                    $('#nbrPersonne' + idEntrainement).append("Nombre de personne pour l\'entrainement : <b>" + nbrPresence + " joueurs\
                        </b>   dont <b class='boy'>" + nbrMec + " Mec</b> et <b class='girl'>" + nbrNana + " Nana</b>");



                } else {

                }

//                //Pour un joueur spécifique
//                else {
//                    alert("Héhe")
//                    $("#notReponse").show();
//                    $("#notReponse").effect("shake", { direction: "up", times: 10, distance: 5}, 3000 );
//                }

            }

        });
    }

    function getCurrentPlayerPresence(idEntrainement) {
        $.ajax({
            url: "php/gestionReponse.php",
            type: "POST",
            async: false,
            data: "option=3&idEntrainement=" + idEntrainement,
            success: function (statut) {
                var tabStatut = jQuery.parseJSON(statut);
                var statutPlayer = tabStatut['statut'];

                //Si non
                if (statutPlayer == 0) {
                    $("#" + idEntrainement + " button[value=no]").addClass("selectedButtonReponse");
                }
                //Si peut-être
                else if (statutPlayer == 1) {
                    $("#" + idEntrainement + " button[value=yn]").addClass("selectedButtonReponse");
                } else if (statutPlayer == 2) {
                    $("#" + idEntrainement + " button[value=yes]").addClass("selectedButtonReponse");
                } else if (statutPlayer == 3) {
                    $("#" + idEntrainement + " button[value=noContact]").addClass("selectedButtonReponse");
                } else if (statutPlayer == "undefined") {
                    $("#" + idEntrainement).children('#notReponse').show();
                } else if (statut == "false") {
                    $("#" + idEntrainement).children('#notReponse').show();
                }

            }

        });
    }

    //Gestion des boutons de réponses
    $('#buttonReponse button').click(function () {
        var id = $('.jqx-scrollview-page[page=' + currentPage + ']').attr('id');
        var reponse = $(this).val();
        var idButton = $(this).attr("id");

        $.ajax({
            url: "php/gestionReponse.php",
            type: "POST",
            async: false,
            data: "option=1&idEntrainement=" + id + "&reponse=" + reponse,
            success: function () {
                $("#" + id + " button").removeClass("selectedButtonReponse");
                $("#" + id + " button[value= " + idButton + " ]").addClass("selectedButtonReponse");
                $("#" + id + " button").parent().parent.parent("#notReponse").fadeOut(1000);
                //TODO Modifier directement dans la liste des présence dans INFO
            }
        });
    });

    //Envoie mail de rappel
    $('#sendRappel').click(function () {
        var idEntrainement = $(this).attr('identrainement')
        UIkit.modal.confirm("Envoyer un mail aux personnes n'ayant toujours pas répondu ?", function () {
            $.ajax({
                type: "POST",
                url: "php/sendMailRappel.php",
                data: "id_entrainement=" + idEntrainement + "&id_groupe=" + id_groupe,
                success: function (msg) {
                    console.log(msg)
                    if (msg == "1") { //Si tout est OK 
                        UIkit.modal.alert("Un email de rappel a bien été envoyé à tous les joueurs n'ayant pas répondu");
                    } else {
                        UIkit.modal.alert('Désolé, une erreur est survenue ... :(');
                        console.log(msg);
                    }
                }
            });
        });
    });

    //Text défilant 
    $(function () {
        $('ul[list="defile"]').each(function () {
            var id = $(this).attr('id');
            $('#' + id).liScroll({travelocity: 0.1});
        });
    });

});

//Logo de chargement ... à améliorer
$(document).on({
    ajaxStart: function () {
        $("body").addClass("loading");
    },
    ajaxStop: function () {
        $("body").removeClass("loading");
    }
});
