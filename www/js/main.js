$(document).ready(function () {
    var tabCurrentSession;
    var tabListGroup;
    var id_player, id_groupe, derby_name, privilege;
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
            }
            else {
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
    }
    else {
        $('#firstUse').hide();
        $('#planning').show();
        if (privilege == 1 || privilege == 2) {
            $('#EditGroupeMove').show();
        }
    }

    //get list des groupes
    $.ajax({
        url: "php/getListGroup.php",
        async: false,
        success: function (msg) {
            if (msg != "" || msg != null) {
//                alert(msg)
//                tabListGroup = jQuery.parseJSON(msg);
//                console.log(tabListGroup);
//                nomGroupe = msg['nom'];
                $('#listGroup').append(msg);
//                alert(msg);


            }
            else {
                console.log("Erreur : il n'a aucun groupe ");
            }

        },
        error: function () {
            console.log("Errreur lors de la récupération des groupe");
        }
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
