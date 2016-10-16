$(document).ready(function () {



    //Connexion
    $("#formConnect").submit(function () {	// à la soumission du formulaire						 
        $.ajax({// fonction permettant de faire de l'ajax
            type: "POST", // methode de transmission des données au fichier php
            url: "php/connexion.php", // url du fichier php
            data: "derby_name=" + $("#derbyName").val() + "&mdp=" + $("#password").val(), // données à transmettre
            success: function (msg) { // si l'appel a bien fonctionné
                if (msg == null) // si la connexion en php n'a pas fonctionnée
                {
                    $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de la connexion,\n\
 veuillez v&eacute;rifier votre login et votre mot de passe.");
                    // on affiche un message d'erreur dans le span prévu à cet effet
                }
                else // si la connexion en php a fonctionnée
                {

                    $("div#connexion").html("<span id=\"confirmMsg\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
                    // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
                    window.location.href = "main.php";
                }
            },
            error: function (msg) {
                console.log(msg);
            }        
        });
        return false; // permet de rester sur la même page à la soumission du formulaire
    });

    var sexe;
    //Click sur radio button
    $('#homme').click(function () {
        sexe = 0;
        alert(sexe);
    });
    $('#femme').click(function () {
        sexe = 1;
        alert(sexe);
    });
    //Inscription
    $("#formInscription").submit(function () {	// à la soumission du formulaire
        var photo = $("#photoPlayer")[0].files[0];
//        alert(photo);
        if ($('#password').val() == $('#password2').val()) {
            alert(sexe);
            $.ajax({// fonction permettant de faire de l'ajax
                type: "POST", // methode de transmission des données au fichier php
                url: "php/inscription.php", // url du fichier php
                data: "derby_name=" + $("#derby_name").val()
                        + "&prenom=" + $("#prenom").val()
                        + "&nom=" + $("#nom").val()
                        + "&sexe=" + sexe
                        + "&email=" + $("#mail").val()
                        + "&photo=" + photo
                        + "&password=" + $("#password").val(),
                // données à transmettre
                success: function (msg) { // si l'appel a bien fonctionné
                    if (msg == "1") // si la connexion en php a fonctionnée
                    {
                        alert("Vous êtes à prensent inscrit sur l'application ! Vous pouvez vous connecter !");
                        // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
                        window.location.assign("index.php");
                    }
                    else if (msg == "0") // si la connexion en php n'a pas fonctionnée
                    {
                        $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de l'inscription, l'utilisateur existe déjà !");
                        // on affiche un message d'erreur dans le span prévu à cet effet

                    }
                    else {
                        console.log(msg);
                    }
                },
                error: function (msg) {
                    console.log(msg);
                }
            });
        }
        //Cas où les mdps sont pas bien inscrit
        else {
            $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur : les mots de passes ne correspondent pas");
        }
        return false; // permet de rester sur la même page à la soumission du formulaire
    });


});