var tabInfoCompte;
$.ajax({
    type: "POST", // methode de transmission des données au fichier php
    url: "php/getInfosCompte.php", // url du fichier php
    success: function (msg) {
        tabInfoCompte = jQuery.parseJSON(msg); //On parse le JSON
        //Remplissage des champs
        $('#nom').val(tabInfoCompte["nom"]);
        $('#prenom').val(tabInfoCompte["prenom"]);
        $('#mail').val(tabInfoCompte["mail"]);
        $('#photo').val(tabInfoCompte["photo"]);
        $('#derby_name').val(tabInfoCompte["derby_name"]);
 
    }
});


$("#formEditionCompte").submit(function () {	// à la soumission du formulaire						 
        $.ajax({// fonction permettant de faire de l'ajax
            type: "POST", // methode de transmission des données au fichier php
            url: "php/updateCompte.php", // url du fichier php
            data:    // données à transmettre
                    "derby_name=" + $("#derbyName").val() + 
                    "&mdp=" + $("#password").val(), 
            success: function (msg) { // si l'appel a bien fonctionné
                
            }
            
    });
});
