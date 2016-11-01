$(document).ready(function () {

    //Get planning
    $.ajax({
        url: "php/gestionPlanning.php",
        type: "POST",
        async: false,
        data: "option=2",
        success: function (msg) {
            var test = msg.length;
            if (msg != "" && msg != null && msg.length != 2) {

                $('#submitPlanning').text('Modifier le planning');
                var tabListGroup = jQuery.parseJSON(msg);

                //Pour chaque Groupe
                for (var i in tabListGroup)
                {
                    showItem(tabListGroup[i].day);
                    $('#' + tabListGroup[i].day + "HD").val(tabListGroup[i].horraire_debut);
                    $('#' + tabListGroup[i].day + "HF").val(tabListGroup[i].horraire_fin);
                    $('#dateDebut').val(tabListGroup[i].date_debut);
                    $('#dateFin').val(tabListGroup[i].date_fin);
                    $('#lieu').val(tabListGroup[i].lieu);
                }

            } else {
                $('#submitPlanning').text('Créer le planning');
            }
        }

    });

    $('#backToMenuGestion').click(function () {
        window.location.href = 'gestionPlanning.php';
    });




    //Gestion des selections des journées
    $('li').click(function () {
        var idDay = $(this).attr('id');
        if ($('#' + idDay + "HD").is(':visible')) {
            hideItem(idDay);
        } else {
            showItem(idDay);
        }

    }).children().click(function (e) {
        return false;
    });


    $('#formGestionPlanning').submit(function () {

        //Logo de chargement ...
        $(document).on({
            ajaxStart: function () {
                $("body").addClass("loading");
            },
            ajaxStop: function () {
                $("body").removeClass("loading");
            }
        });

        var tabDaySelected = {};
        $('li').each(function () {
            var day = $(this).attr('id');
            if ($(this).children().children('#' + day + 'HD').attr('select') == 1 && $(this).children().children('#' + day + 'HD').val() != "") {

                tabDaySelected['day'] = day;
                tabDaySelected['horraire_debut'] = $('#' + day + 'HD').val();
                tabDaySelected['horraire_fin'] = $('#' + day + 'HF').val();

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
                        window.location.href = "gestionPlanning.php";
                    }
                });
            }
        });
        
        //Pour supprimer les date déselected
        var tabDayUnSelected = [];
        $('li').each(function () {
            var day = $(this).attr('id');
            if ($(this).children().children('#' + day + 'HD').attr('select') == 0 || $(this).children().children('#' + day + 'HD').attr('select') == "0/") {
                tabDayUnSelected.push(day);
            }
        });
        
        console.log(JSON.stringify(tabDayUnSelected));
        $.ajax({
            type: "POST",
            async: true,
            url: "php/gestionPlanning.php",
            data: "option=3&tabDayUnSelected=" + JSON.stringify(tabDayUnSelected),
            success: function (msg) {
                console.log(msg);
            }

        });

    });


    function hideItem(idDay) {
        $('#' + idDay + "HD").hide();
        $('#' + idDay + "HF").hide();
        $('#' + idDay + "HD").attr('select', 0);
        $('#' + idDay + "HF").attr('select', 0);
        $("label[for='" + idDay + "HD']").hide();
        $("label[for='" + idDay + "HF']").hide();
        $('#' + idDay).css('background-color', '#f1f1f1');
        $('#' + idDay).removeClass('uk-icon-close');
    }
    function showItem(idDay) {
        $('#' + idDay + "HD").show();
        $('#' + idDay + "HF").show();
        $("label[for='" + idDay + "HD']").show();
        $("label[for='" + idDay + "HF']").show();
        $('#' + idDay + "HD").attr('select', 1);
        $('#' + idDay).css('background-color', '#07D');
        $('#' + idDay).addClass('uk-icon-close');
        $('.uk-icon-close').css('display', 'block');
    }
});



