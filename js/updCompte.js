$(document).ready(function () {

    $("#submitEditCompte").click(function () {

//        $('input').blur(function () {
//            if (!this.value) {
//                alert('un champ est vide');
//            }
//        });
        if ($("#derby_name").val() !== "" && $("#prenom").val() !== "" && $("#nom").val() !== "" &&
                $("#mail").val() !== "") {

            $.ajax({
                type: "POST",
                url: "php/updateCompte.php",
                data:
                        "derby_name=" + $("#derby_name").val() +
                        "&prenom=" + $("#prenom").val() +
                        "&nom=" + $("#nom").val() +
                        "&mail=" + $("#mail").val() +
                        "&option=0",
                success: function (msg) { // si l'appel a bien fonctionné
                    if (msg === "1") {
                        UIkit.notify({
                            message: 'Modification enregistré',
                            status: 'info',
                            timeout: 2000,
                            pos: 'top-center'
                        });
                        $("span#erreur").html("Vos modifications ont bien été enregistrés. Chargement ...");
                        location.reload();
                    } else {
                        $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur : Votre mot de passe est incorrect");

                    }
                },
                error: function (msg) {
                    alert("Erreur avec la fonction");
                }
            });
            return false;
        } else {
            UIkit.notify({
                message: 'Un ou plusieurs champs n\'ont pas étés remplis ! ',
                status: 'warning',
                timeout: 4000,
                pos: 'top-center'
            });
            $("span#erreur").html("Erreur : tous les champs sont obligatoires !");
        }
    });

    $('#savePWD').click(function () {
        if ($('#password2').val() === $('#password3').val()) {
            if ($("#password1").val() !== "" && $("#password2").val() !== ""
                    && $("#password3").val() !== "") {

                $.ajax({
                    type: "POST",
                    url: "php/updateCompte.php",
                    data:
                            "password1=" + $("#password1").val() +
                            "&password2=" + $("#password2").val() +
                            "&password3=" + $("#password3").val() +
                            "&option=1",
                    success: function (msg) {
                        if (msg === "1") {
                            UIkit.notify({
                                message: 'Modification enregistré',
                                status: 'info',
                                timeout: 2000,
                                pos: 'top-center'
                            });
                            $("span#erreur").html("Vos modifications ont bien été enregistrés. Chargement ...");
                            location.reload();
                        } else {
                            $("span#erreur").html("Erreur : Votre mot de passe est incorrect");
                        }
                    },
                    error: function (msg) {
                        alert("Erreur avec la fonction");
                    }
                });
                return false;
            } else {
                UIkit.notify({
                    message: 'Un des champs n\'est pas remplis !',
                    status: 'warning',
                    timeout: 4000,
                    pos: 'top-center'
                });
            }

        } else {
            UIkit.notify({
                message: 'Les mots de passe ne correspondent pas',
                status: 'warning',
                timeout: 4000,
                pos: 'top-center'
            });
            $("span#erreur").html("Erreur : les mots de passes ne correspondent pas");
        }
    });

    $('#back').click(function () {
        window.location = "main.php";
    });


});