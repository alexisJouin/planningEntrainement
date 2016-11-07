<?php
include("include/header.php");
include("include/testConnect.php");
?>
<title>Création du groupe</title>
<script src="js/creationGroupe.js"></script>


</head>
<body>
    <h1>Planning des entraînements Roller Derby</h1>

    <form id="formCreation" method="POST" action="#">
        <h2>Création du groupe</h2>

        <input id="nom" name="nom" placeholder='Nom du groupe' required>
        <input type="email" id="mail" placeholder="Email de l'association" required>
        <input type="text" id="adress" placeholder="Adresse de l'association">
        <textarea id='descriptionGroupe' placeholder="Décrivez votre groupe ou association Roller Derby" style="margin-bottom: 10px;"></textarea>
        <label for="photo">Choisir une photo pour votre groupe</label>
        <input type="file" id="photo" placeholder="Photo du groupe" style="margin-top: 0px;">
        <button type="submit" id="submit">Création</button>
        <button id="back">Retour</button>
        <span id="erreur"></span>
        <br>
        <br>        
    </form>

</body>
</html>
