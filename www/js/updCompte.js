$('#back').click(function(){
   window.location = "main.php" ;
});
$("#formEditionCompte").submit(function () { // à la soumission du formulaire
    if ($('#password2').val() === $('#password3').val()) {
        $.ajax({
            type: "POST", // methode de transmission des données au fichier php
            url: "php/updateCompte.php", // url du fichier php
            data: // données à transmettre
                    "derby_name=" + $("#derby_name").val() +
                    "&pswOld=" + $("#password1").val() +
                    "&mdp=" + $("#password2").val() +
                    "&prenom=" + $("#prenom").val() +
                    "&nom=" + $("#nom").val() +
                    "&mail=" + $("#mail").val() +
                    "&photo=" + $("#photo").val(),
            success: function (msg) { // si l'appel a bien fonctionné
                if (msg === "1") {
                    alert("Modification enregistré");
                    $("span#erreur").html("Vos modifications ont bien été enregistrés");
                    location.reload();
                } else {
                    $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur : Votre mot de passe est incorrect");
                    UIkit.notify({
                        message: 'Mot de passe incorrect',
                        status: 'warning',
                        timeout: 2000,
                        pos: 'top-center'
                    });
                }
            },
            error: function (msg) {
                alert("Erreur avec la fonction");
            }
        });
        return false;
    } else {
        $("span#erreur").html("<img src=\"img/error.png\" \n\
style=\"float:left;width:2.5%;\" />&nbsp;Erreur : les mots de passes ne correspondent pas");
    }
    return false;
});