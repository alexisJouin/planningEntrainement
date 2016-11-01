<?php
    include("include/header.php");
    include("include/testConnect.php");
?>
    <link rel="stylesheet" href="css/gestionPlanning.css">
    <title>Gestion Planning</title>
    </head>

    <body>
        <h1>Gestion des planning d'entrainements</h1>
        <ul id='menuPlanning'>
            <li><a id="planningCreationLink" href='createPlanning.php'>Créer un planning d'entrainement</a></li>
            <li><a href='editPlanning.php'>Modifier un entrainement</a></li>
            <li><a href='createEvent.php'>Créer un évenement spécial</a></li>
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
                         $('#planningCreationLink').text("Modifier le planning d'entrainement");
                     }
                     else{
                         $('#planningCreationLink').text("Créer le planning d'entrainement");
                     }
                }
        
            });
        });
    
    </script>
</html>