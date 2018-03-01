$(document).ready(function () {
    $(document).ready(function () {
        $("#back").click(function () {
            window.location.href = "main.php";
        });
    });
    //Création du groupe
    $("#formCreation").submit(function () {	// à la soumission du formulaire
        var nom = $('#nom').val();
        var email = $('#mail').val();
        var adress = $('#adress').val();
        var descriptionGroupe = $('#descriptionGroupe').val();
        var photo = $('#photo')[0].files[0];


        $.ajax({// fonction permettant de faire de l'ajax
            type: "POST", // methode de transmission des données au fichier php
            url: "php/creationGroupe.php", // url du fichier php
            data:
                    "nom=" + nom
                    + "&email=" + email
                    + "&adress=" + adress
                    + "&mail=" + $("#mail").val()
                    + "&descriptionGroupe=" + descriptionGroupe
                    + "&photo=" + photo,
            // données à transmettre
            success: function (msg) { // si l'appel a bien fonctionné
                if (msg == 0) // si la connexion en php n'a pas fonctionnée
                {
                    UIkit.notify({
                        message: 'Le groupe existe déjà !',
                        status: 'warning',
                        timeout: 3000,
                        pos: 'top-center'
                    });

                    $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de la création, le groupe existe déjà !");
                    // on affiche un message d'erreur dans le span prévu à cet effet

                } else {
                    console.log(msg);
                    UIkit.notify({
                        message: 'Votre Groupe a été créé. Vous êtes le super administrateur de ce groupe',
                        status: 'success',
                        timeout: 2000,
                        pos: 'top-center'
                    });
                    setTimeout(function () {
                        window.location.href = "main.php";
                    }, 1500);

                }
            },
            error: function (msg) {
                console.log(msg);
            }
        });
        return false; // permet de rester sur la même page à la soumission du formulaire
    });


});