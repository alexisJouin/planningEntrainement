$(document).ready(function () {
    var tabInfoCompte;
    //Permet de get les infos du compte en BDD
    $.ajax({
        type: "POST", // methode de transmission des données au fichier php
        url: "php/getInfosCompte.php", // url du fichier php
        success: function (msg) {
            tabInfoCompte = jQuery.parseJSON(msg); //On parse le JSON
            //Remplissage des champs
            $('#nom').val(tabInfoCompte["nom"]);
            $('#prenom').val(tabInfoCompte["prenom"]);
            $('#mail').val(tabInfoCompte["mail"]);
            $('#derby_name').val(tabInfoCompte["derby_name"]);
        }
    });


    $('#changePassword').modal();


});