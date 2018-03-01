$(document).ready(function () {

    
    //Gestion Click
    $('#displayInscription').click(function () {
        $('#displayInscription').hide(200);
        $('#formConnect').hide(200);
        $('#forgotPWD').hide(200);
        $('#formInscription').show(350);
        $('#displayConnection').show(500);
    });

    $('#displayConnection').click(function () {
        $('#displayConnection').hide(200);
        $('#formInscription').hide(200);
        $('#formConnect').show(350);
        $('#displayInscription').show(500);
        $('#forgotPWD').show(500);
    });
    
    $('#erreurConnection').modal();



    //var liste_caractere_interdit = new Array('<', '>', '/', ',', '"', '\'');

    $('#forgotPWD').click(function () {
        UIkit.modal.prompt("Adresse mail : ", "", function (adressMail) {
            if (adressMail != "") {
                $.ajax({
                    type: "POST",
                    url: "php/sendMail.php",
                    data: "adressMail=" + adressMail + "&option=1",
                    success: function (msg) {
                        if (msg == "0") // si pas de compte associé
                        {
                            UIkit.modal.alert('Désolé, il n\'y a aucun compte associé à ' + adressMail);
                        } else if (msg == "1") {
                            UIkit.modal.alert('Un mail avec le mot de passe a été envoyé à ' + adressMail + "\nPensez à regarder dans vos courriers indésirables ;)");
                        } else {
                            UIkit.modal.alert('Désolé, une erreur est survenue ... :(');
                            console.log(msg);
                        }
                    }
                });


            }
            console.log(adressMail);

        });
    });


    //Connexion
    $("#formConnect").submit(function () {

        $.ajax({
            type: "POST",
            url: "php/connexion.php",
            data: "derby_name=" + $("#derbyNameConnect").val() + "&mdp=" + $("#passwordConnect").val(),
            success: function (msg) {
                console.log(msg);
                if (msg == 0){
                    $('#erreurConnection').modal('open');
                } else if (msg == 1) {
                    window.location.href = "main.php";
                }
            },
            error: function (msg) {
                alert("Erreur connection");
                console.log(msg);
            }
        });
        return false; // permet de rester sur la même page à la soumission du formulaire
    });

    var sexe;
    //Click sur radio button
    $('#homme').click(function () {
        sexe = 0;
    });
    $('#femme').click(function () {
        sexe = 1;
    });
    //Inscription
    $("#formInscription").submit(function () {	// à la soumission du formulaire
        if ($('#password').val() == $('#password2').val()) {

            $.ajax({// fonction permettant de faire de l'ajax
                type: "POST", // methode de transmission des données au fichier php
                url: "php/inscription.php", // url du fichier php
                data: "derby_name=" + $("#derby_name").val()
                        + "&prenom=" + $("#prenom").val()
                        + "&nom=" + $("#nom").val()
                        + "&sexe=" + sexe
                        + "&email=" + $("#mail").val()
                        + "&password=" + $("#password").val(),
                // données à transmettre
                success: function (msg) { // si l'appel a bien fonctionné
                    if (msg == "1") // si la connexion en php a fonctionnée
                    {
                        UIkit.notify({
                            message: 'Vous êtes à prensent inscrit sur l\'application ! Vous pouvez vous connecter !',
                            status: 'success',
                            timeout: 1000,
                            pos: 'top-center'
                        });

                        setTimeout(function () {
                            window.location.href = "index.php";
                        }, 1500);

//                        window.location.assign("index.php");
                    } else if (msg == "0") // si la connexion en php n'a pas fonctionnée
                    {
                        UIkit.notify({
                            message: 'l\'utilisateur existe déjà !',
                            status: 'warning',
                            timeout: 2000,
                            pos: 'top-center'
                        });
                        $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur lors de l'inscription, l'utilisateur existe déjà !");
                        // on affiche un message d'erreur dans le span prévu à cet effet

                    } else {
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