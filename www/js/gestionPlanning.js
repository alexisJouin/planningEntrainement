$(document).ready(function () {
//    var tabCurrentSession;
//    var id_player, id_groupe, derby_name, privilege, statut_in_groupe, nom_groupe;
//
//
//    getCurrentSession();
//
//    alert("id_player : " + id_player);




    //Gestion des selections des journées
    $('li').click(function () {
        var idDay = $(this).attr('id');
        if ($('#' + idDay + "HD").is(':visible')) {
            $('#' + idDay + "HD").hide();
            $('#' + idDay + "HF").hide();
            $('#' + idDay + "HD").attr('select', 0);
            $('#' + idDay + "HF").attr('select', 0);
            $("label[for='" + idDay + "HD']").hide();
            $("label[for='" + idDay + "HF']").hide();
            $('#' + idDay).css('background-color', '#f1f1f1');
            $('#' + idDay).removeClass('uk-icon-close');
        } else {
            $('#' + idDay + "HD").show();
            $('#' + idDay + "HF").show();
            $("label[for='" + idDay + "HD']").show();
            $("label[for='" + idDay + "HF']").show();
            $('#' + idDay + "HD").attr('select', 1);
            $('#' + idDay).css('background-color', '#07D');
            $('#' + idDay).addClass('uk-icon-close');
            $('.uk-icon-close').css('display', 'block');

        }

    }).children().click(function (e) {
        return false;
    });


    $('#formGestionPlanning').submit(function () {

        $(document).on({
            ajaxStart: function () {
                $("body").addClass("loading");
            },
            ajaxStop: function () {
                $("body").removeClass("loading");
            }
        });
        alert("test");

        var tabDaySelected = {};
        $('li').each(function () {
            var day = $(this).attr('id');
            if ($(this).children().children('#' + day + 'HD').attr('select') == 1 && $(this).children().children('#' + day + 'HD').val() != "") {

                tabDaySelected['day'] = day;
                tabDaySelected['horraire_debut'] = $('#' + day + 'HD').val();
                tabDaySelected['horraire_fin'] = $('#' + day + 'HF').val();
                alert(tabDaySelected);
                $.ajax({
                    type: "POST",
                    async: true,
                    url: "php/gestionPlanning.php",
                    data: "tabDaySelected=" + JSON.stringify(tabDaySelected) +
                            "&date_debut=" + $('#dateDebut').val() +
                            "&date_fin=" + $('#dateFin').val() +
                            "&lieu=" + $('#lieu').val() +
                            "&option=1", //id du groupe,
                    success: function (msg) {
                        console.log(msg);
                    }
                });
            }
        });



    });






});



