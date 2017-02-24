<?php
    include("include/header.php");
    include("include/testConnect.php");
?>
    <link rel="stylesheet" href="css/gestionPlanning.css">
    <title>Gestion Planning</title>
    </head>

    <body>
        <h1>Gestion des planning d'entraînements</h1>
        <ul id='menuPlanning'>
            <li><a id="planningCreationLink" href='createPlanning.php'>Créer un planning d'entraînement</a></li>
            <li><a href='editEntrainement.php'>Modifier un entraînement</a></li>
            <li><a href='createEvent.php'>Créer un évenement spécial - En cours de développement ...</a></li>
            <li><a href='main.php'>Annuler</a></li>
        </ul>
    </body>
    <script>
        $(document).ready(function(){
            $.ajax({
                url: "php/gestionPlanning.php",
                type: "POST",
                async: false,
                data: "option=2",
                success: function (msg) {
                    console.log(msg.length)
                     if(msg != "" && msg != null && msg.length != 2){
                         $('#planningCreationLink').text("Modifier le planning d'entraînement");
                     }
                     else{
                         $('#planningCreationLink').text("Créer le planning d'entraînement");
                     }
                }
        
            });
        });
    
    </script>
</html>