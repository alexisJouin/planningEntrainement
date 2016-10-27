$(document).ready(function () {
    $('#backEditGroupe').click(function () {
        window.location = "main.php";
    });

    $("#formEditionGroupe").submit(function () { // à la soumission du formulaire
        $.ajax({
            type: "POST", // methode de transmission des données au fichier php
            url: "php/updateGroupe.php", // url du fichier php
            data: // données à transmettre
                    "nom=" + $("#nom").val() +
                    "&email=" + $("#mail").val() +
                    "&adresse=" + $("#adresse").val() +
                    "&descriptif=" + $("#descriptionGroupe").val() +
                    "&photo=" + $("#photo").val(),
            success: function (msg) { // si l'appel a bien fonctionné
                if (msg === "1") {
                    $("span#erreur").html("Vos modifications ont bien été enregistrés");
                    $("span#erreur").html("Modifications enregistrées");
                    location.reload();
                } else {
                    console.log("Modification non enregistré : " + msg);
                    $("span#erreur").html("Erreur lors de l'enregistrement");
                }
            },
            error: function (msg) {
                console.log("Erreur lors de l'appel AJAX avec PHP");
            }
        });
        return false;
    });
});

