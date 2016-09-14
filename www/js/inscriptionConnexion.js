$(document).ready(function () {
    /*
     MySql.Execute(
     "laurenceqdroot.mysql.db",
     "laurenceqdroot",
     "COIFF894d",
     "laurenceqdroot",
     "select * from player",
     function (data) {
     console.log(data);
     });
     
     */


    //Connexion
    $("#formConnect").submit(function () {	// à la soumission du formulaire						 
        $.ajax({// fonction permettant de faire de l'ajax
            type: "POST", // methode de transmission des données au fichier php
            url: "php/connexion.php", // url du fichier php
            data: "derby_name=" + $("#derbyName").val() + "&mdp=" + $("#password").val(), // données à transmettre
            success: function (msg) { // si l'appel a bien fonctionné
                if (msg == 1) // si la connexion en php a fonctionnée
                {
                    $("div#connexion").html("<span id=\"confirmMsg\">Vous &ecirc;tes maintenant connect&eacute;.</span>");
                    // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
                    window.location.assign("main.php");
                }
                else // si la connexion en php n'a pas fonctionnée
                {
                    $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de la connexion,\n\
 veuillez v&eacute;rifier votre login et votre mot de passe.");
                    // on affiche un message d'erreur dans le span prévu à cet effet

                }
            },
            error: function (msg) {
                alert(msg);
                console.log(msg);
            }
        });
        return false; // permet de rester sur la même page à la soumission du formulaire
    });

    //Inscription
    $("#formInscription").submit(function () {	// à la soumission du formulaire
        if ($('#password').val() == $('#password2').val()) {
            $.ajax({// fonction permettant de faire de l'ajax
                type: "POST", // methode de transmission des données au fichier php
                url: "php/inscription.php", // url du fichier php
                data: "derby_name=" + $("#derby_name").val() 
                        +"&prenom="+$("#prenom").val()
                        +"&nom="+ $("#nom").val()
                        +"&mail="+$("#mail").val()
                        +"&password="+$("#password").val(),
                // données à transmettre
                success: function (msg) { // si l'appel a bien fonctionné
                    if (msg == 1) // si la connexion en php a fonctionnée
                    {
                        alert("Vous êtes à prensent inscrit sur l'application ! Vous pouvez vous connecter !");
                        // on désactive l'affichage du formulaire et on affiche un message de bienvenue à la place
                        window.location.assign("index.php");
                    }
                    else if (msg == 0) // si la connexion en php n'a pas fonctionnée
                    {
                        $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de l'inscription, l'utilisateur existe déjà !");
                        // on affiche un message d'erreur dans le span prévu à cet effet

                    }
                    else{
                        console.log(msg);
                    }
                },
                error: function (msg) {
                    alert(msg);
                    console.log(msg);
                }
            });
        }
        //Cas où les mdps sont pas bien inscrit
        else{
             $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur : les mots de passes ne correspondent pas");
        }
        return false; // permet de rester sur la même page à la soumission du formulaire
    });


});