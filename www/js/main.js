$(document).ready(function () {
    var tabCurrentSession;
    var tabListGroup;
    var id_player, id_groupe, derby_name, privilege, statut_in_groupe;
    var data = new Array();
    var nomGroupe = new Array();

    //Get et récupère les valeurs des variables sessions
    $.ajax({
        url: "php/getCurrentSession.php",
        async: false,
        success: function (msg) {
            if (msg != "" || msg != null) {
                tabCurrentSession = jQuery.parseJSON(msg);
                id_player = tabCurrentSession['id_player'];
                id_groupe = tabCurrentSession['id_groupe'];
                derby_name = tabCurrentSession['derby_name'];
                privilege = tabCurrentSession['privilege'];
                statut_in_groupe = tabCurrentSession['statut_in_groupe'];
            } else {
                console.log("Erreur : les sessions sont vides ! ");
            }

        },
        error: function () {
            console.log("Errreur lors de la récupération des variables sessions");
        }
    });

    //TO DO replace hide par empty pour empécher d'afficher avec console les div
    if (id_groupe == 0 || id_groupe == null || id_groupe == "") {
        $('#planning').hide();
        $('#firstUse').show();
    } else {
        if (statut_in_groupe == 2) { // si personne accepté 
            $('#firstUse').hide();
            $('#planning').show();

            if (privilege == 1 || privilege == 2) { //Si c'est l'admin
                $('#EditGroupeMove').show();
            }
        } else if (statut_in_groupe == 1) {
            $('#notification').append('<p>Vous avez demandé de rejoindre le groupe :' + id_groupe + '</p>');
            $('body').append("<h1>Votre demande pour rejoindre le groupe : <u>"+ id_groupe + "</u> est en cours de validation par l'administrateur</h1>")
        }

    }

    //get list des groupes
    $.ajax({
        url: "php/getListGroup.php",
        async: false,
        success: function (msg) {
            if (msg != "" || msg != null) {

                var output;

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

    //Pour demander de rejoindre un groupe
    $(function () {
        $(".buttonRejoindre").click(function () {
            //TODO : ajax call to rejoindre groupe pour le current player co
            $.ajax({
                type: "POST",
                url: "php/rejoindreGroupe.php",
                data: "idGroupe=" + $(this).parent().attr("id"), //id du groupe,
                success: function (msg) {
                    alert("Votre demande pour rejoindre le groupe a été envoyé !");
                }
            });
        });
    });



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
