var tabInfoGroupe;
var sexe;
var privilege;
//Permet de get les infos du compte en BDD
$.ajax({
    type: "POST", // methode de transmission des données au fichier php
    url: "php/getInfosGroupe.php", // url du fichier php
    data: "option=0",
    success: function (msg) {
        if (msg == "0") {
            window.location.href = "main.php"
        } else {

            tabInfoGroupe = jQuery.parseJSON(msg); //On parse le JSON

            for (var i in tabInfoGroupe) {
                //Remplissage des champs dans infos groupe
                $('#nom').val(tabInfoGroupe[i].nom);
                $('#mail').val(tabInfoGroupe[i].email);
                $('#adresse').val(tabInfoGroupe[i].adresse);
                $('#descriptionGroupe').val(tabInfoGroupe[i].descriptif);
                $('#nomGroupe').html(tabInfoGroupe[i].nom);

                sexe = tabInfoGroupe[i].sexe;
                if (sexe == 0) {
                    sexe = "man";
                } else {
                    sexe = "women";
                }
                privilege = tabInfoGroupe[i].privilege;
                if (privilege == 0) {
                    privilege = "Membre";
                } else {
                    privilege = "Admin";
                }

                //Remplissage du tableau des joueurs
                $("tbody").append("\n\
                    <tr id=player" + tabInfoGroupe[i].id + ">\n\
                        <td>" + tabInfoGroupe[i].derby_name + "</td>\n\
                        <td>" + tabInfoGroupe[i].nomPlayer + "</td>\n\
                        <td>" + tabInfoGroupe[i].prenom + "</td>\n\
                        <td>" + tabInfoGroupe[i].emailPlayer + "</td>\n\
                        <td><img src='img/" + sexe + ".png'</td>\n\
                        <td>" + privilege + "</td>\n\
                        <td><a class='delPlayer'>Supprimer</a></td>\n\
                    </tr>\n\
                ");

            }

            //Enlever personne du groupe
            $('.delPlayer').click(function () {
                var idPlayer = $(this).parent().parent().attr("id");

                $.ajax({
                    type: "POST",
                    url: "php/getInfosGroupe.php",
                    data: "option=1&idPlayer=" + idPlayer.replace(/[^0-9]/g, ''),
                    success: function (msg) {

                        if (msg == 0) {
                            alert("ATTENTION ! Vous ne pouvez pas vous retirer de votre propre groupe !!");
                        } else {
                            $('#' + idPlayer).hide(1000);
                            $('#' + idPlayer).empty();
                        }
                    }
                });



            });
        }
    },
    error: function (msg) {
        alert(msg);
    }
});