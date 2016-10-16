var tabInfoGroupe;
//Permet de get les infos du compte en BDD
$.ajax({
    type: "POST", // methode de transmission des données au fichier php
    url: "php/getInfosGroupe.php", // url du fichier php
    success: function (msg) {
        if (msg == "0") {
            window.location.href = "main.php"
        }
        else {
            
            tabInfoGroupe = jQuery.parseJSON(msg); //On parse le JSON
            //Remplissage des champs
            $('#nom').val(tabInfoGroupe["nom"]);
            $('#mail').val(tabInfoGroupe["email"]);
            $('#adresse').val(tabInfoGroupe["adresse"]);
            if(tabInfoGroupe["photo"] != "undefined"){
                $('#photo').val(tabInfoGroupe["photo"]);
            }
            $('#descriptionGroupe').val(tabInfoGroupe["descriptif"]);
        }
    },
    error: function(msg){
        alert(msg);
    }
});