<?php
include("include/header.php");
include("include/testConnect.php");
?>
<title>Edition du groupe</title>
<script src="js/editionGroupe.js"></script>


</head>
<body>
    <h1>Planning des entraînements Roller Derby</h1>

    <form id="formEditionGroupe" method="POST" action="#">
        <h2>Edition du groupe</h2>

        <input id="nom" name="nom" placeholder='Nom du groupe' required>
        <input type="email" id="mail" placeholder="Email de l'association" required>
        <input type="text" id="adresse" placeholder="Adresse de l'association">
        <textarea id='descriptionGroupe' placeholder="Décrivez votre groupe ou association Roller Derby" style="margin-bottom: 10px;"></textarea>
        <label for="photo">Choisir une photo pour votre groupe</label>
        <input type="file" id="photo" placeholder="Photo du groupe" style="margin-top: 0px;">
        <button type="submit" id="submit">Sauvegarder</button>
        <span id="erreur"></span>
        <br>
        <br>        
    </form>
    <button id="backEditGroupe">Retour</button>
</body>

<script src="js/infoGroup.js"></script>
</html>
