$(document).ready(function () {

    $('#backEditGroupe').click(function () {
        window.location = "main.php";
    });

    $('#buttonPlayers').click(function () {
        $('#divInfosGroupe').hide(500);
        $('#divPlayers').show(500);
    });

    $('#buttonInfosGroupe').click(function () {
        $('#divPlayers').hide(500);
        $('#divInfosGroupe').show(500);
    });

    $("#submit").click(function () { // à la soumission du formulaire
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
                    UIkit.notify({
                        message: 'Modification enregistrées',
                        status: 'success',
                        timeout: 5000,
                        pos: 'top-center'
                    });
                    $("span#erreur").html("Vos modifications ont bien été enregistrés");
                    $("span#erreur").html("Modifications enregistrées");
                    setTimeout(function () {
                        location.reload();
                    }, 1500);

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

    $('.order').click(function(){
        var id = $(this).attr("id");
        sortTable(id);
    });
    
    //Trie du tableau 
    function sortTable(n) {
        var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = $("#tabJoueurs");
        switching = true;
        // Set the sorting direction to ascending:
        dir = "asc";
        /* Make a loop that will continue until
         no switching has been done: */
        while (switching) {
            // Start by saying: no switching is done:
            switching = false;
            rows = table.find("tr");
            /* Loop through all table rows (except the
             first, which contains table headers): */
            for (i = 1; i < (rows.length - 1); i++) {
                // Start by saying there should be no switching:
                shouldSwitch = false;
                /* Get the two elements you want to compare,
                 one from current row and one from the next: */
                x = rows[i].getElementsByTagName("TD")[n];
                y = rows[i + 1].getElementsByTagName("TD")[n];
                /* Check if the two rows should switch place,
                 based on the direction, asc or desc: */
                if (dir == "asc") {
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir == "desc") {
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        // If so, mark as a switch and break the loop:
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                /* If a switch has been marked, make the switch
                 and mark that a switch has been done: */
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                // Each time a switch is done, increase this count by 1:
                switchcount++;
            } else {
                /* If no switching has been done AND the direction is "asc",
                 set the direction to "desc" and run the while loop again. */
                if (switchcount == 0 && dir == "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }
    
    sortTable(0);
});

