$(document).ready(function () {


    function convertDateToDefaultFormat(date) {
        yr = date.getFullYear();
        month = date.getMonth() < 10 ? '0' + date.getMonth() : date.getMonth() + 1;
        day = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
        newDate = yr + '-' + month + '-' + day;

        return newDate;
    }

    $('#dateDebut').val((convertDateToDefaultFormat(new Date())));

    $('#backToMenuGestion').click(function(){
        window.location.href = "gestionPlanning.php";
    });
    
    
    
    $('#buttonAddEntrainement').click(function () {
        var date = $('#dateAdd').val();
        var horraire_debut = $('#horraire_debutAdd').val();
        var horraire_fin = $('#horraire_finAdd').val();
        var lieu = $('#lieuAdd').val();

        if (date != "" && horraire_debut != "" && horraire_fin != "" && lieu != "") {
            $.ajax({
                url: "php/getListEntrainement.php",
                type: "POST",
                async: false,
                data: "option=4&horraire_debut=" + horraire_debut + "&horraire_fin=" + horraire_fin + "&lieu=" + lieu + "&date=" + date,
                success: function () {
                    $('#cancel').click();
                }

            });
        } else {
            alert("Tous les champs sont à renseigner !");
        }

    });


    $('input[type="date"]').change(function () {
        if (($('#dateDebut').val() != "") && ($('#dateFin').val() != "")) {
            $.ajax({
                url: "php/getListEntrainement.php",
                type: "POST",
                async: false,
                data: "option=1&date_debut=" + $('#dateDebut').val() + "&date_fin=" + $('#dateFin').val(),
                success: function (msg) {

                    if (msg != "" && msg != null && msg.length != 2) {
                        if ($('#listEntrainement').children().length > 1) {
                            $('#listEntrainement').children().remove();
                        }
                        var output = "";

                        var tabListEntrainement = jQuery.parseJSON(msg);

                        //Pour chaque entrainement
                        for (var i in tabListEntrainement)
                        {
                            //Génération des listes d'entrainement
                            output += "\n\
                                    <li id='" + tabListEntrainement[i].id + "'> \n\
                                        <p> Entraînement du " + tabListEntrainement[i].date + "</p>\n\
                                        <label for='" + tabListEntrainement[i].id + "HD'>Horraire de début : </label>\n\
                                        <input type='time' id='" + tabListEntrainement[i].id + "HD'/>\n\
                                        <label for='" + tabListEntrainement[i].id + "HF'>Horraire de fin : </label>\n\
                                        <input type='time' id='" + tabListEntrainement[i].id + "HF'/>\n\
                                        <input type='text' id='" + tabListEntrainement[i].id + "Lieu' placeholder='Lieu'>\n\
                                        <button class='updButton' id='buttonUpdEntrainement" + tabListEntrainement[i].id + "'>Modifier</button>\n\
                                        <button class='delButton' id='buttonDelEntrainement" + tabListEntrainement[i].id + "'>Supprimer</button>\n\
                                    </li>";

                            $('#listEntrainement').append(output);

                            $('#' + tabListEntrainement[i].id + "HD").val(tabListEntrainement[i].horraire_debut);
                            $('#' + tabListEntrainement[i].id + "HF").val(tabListEntrainement[i].horraire_fin);
                            $('#' + tabListEntrainement[i].id + "Lieu").val(tabListEntrainement[i].lieu);


                        }

                        //Remove les doublons qui ont un chanp vide
                        $('#listEntrainement input').each(function () {
                            if ($(this).val() == "") {
                                $(this).parent().remove();
                            }
                        });

                        gestionClickButton();


                    } else {
                        console.log("Erreur : il n'a aucun entrainement à cette date ... ");
                    }

                }

            });
        }
    });


    function gestionClickButton() {
        //Mis à jour
        $('.updButton').click(function () {
            var id = $(this).parents().attr('id');
            var horraire_debut = $('#' + id + "HD").val();
            var horraire_fin = $('#' + id + "HF").val();
            var lieu = $('#' + id + "Lieu").val();

            $.ajax({
                url: "php/getListEntrainement.php",
                type: "POST",
                async: false,
                data: "option=2&horraire_debut=" + horraire_debut + "&horraire_fin=" + horraire_fin + "&lieu=" + lieu + "&id=" + id,
                success: function () {
                    $('#span' + id).fadeOut(1000);
                    $("#" + id).append("<span id='span" + id + "' style='color:red;font-weight:bold;'>Entraînement mis à jour avec succès </span>");
                }

            });
        });

        //Delete 
        $('.delButton').click(function () {
            var id = $(this).parents().attr('id');
            $.ajax({
                url: "php/getListEntrainement.php",
                type: "POST",
                async: false,
                data: "option=3&id=" + id,
                success: function () {
                    $("#" + id).fadeOut(800, function () {
                        $(this).remove();
                    });
                }

            });
        });
    }


});

