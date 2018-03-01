<?php
include("include/header.php");
include("include/testConnect.php");
?>
<title>Edition du groupe</title>
<script src="js/editionGroupe.js"></script>
<link rel="stylesheet" href="css/groupePage.css"/>


</head>
<body>
    <h1>Mon groupe <span id="nomGroupe"></span></h1>

    <div class="buttons">
        <a class="waves-effect waves-light btn blue" id="buttonPlayers"><i class="material-icons left">group</i>Les Joueurs</a>
        <a class="waves-effect waves-light btn" id="buttonInfosGroupe"><i class="material-icons left">edit</i>Infos du groupe</a>
        <a class="waves-effect waves-light btn red" id="backEditGroupe"><i class="material-icons left">cancel</i>Retour</a>
    </div>

    <div id="divPlayers">
        <h2>Infos joueurs</h2>
        <table id="tabJoueurs" class="responsive-table">
            <thead>
                <tr>
                    <th id="0" class="order">Derby Name <i class="material-icons left">import_export</i> </th>
                    <th id="1" class="order">Nom  <i class="material-icons left">import_export</i></th>
                    <th id="2" class="order">Prénom  <i class="material-icons left">import_export</i></th>
                    <th>Email</th>
                    <th id="4" class="order">Sexe  <i class="material-icons left">import_export</i></th>
                    <th id="5" class="order">Privilèges  <i class="material-icons left">import_export</i></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>

    <div id="divInfosGroupe">
        <h2>Edition du groupe</h2>
        <form id="formEditionGroupe" class="col s12" method="POST" action="#">      
            <div class="row">
                <div class="input-field col s6">
                    <input type="text" id="nom" name="nom" placeholder="Nom du groupe" required>
                    <label for="nom">Nom</label>
                </div>
                <div class="input-field col s6">
                    <input type="email" id="mail" placeholder="Email de l'association" required>
                    <label for="mail">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input type="text" id="adresse" placeholder="Adresse de l'association">
                    <label for="adresse">Adresse Postale</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id='descriptionGroupe' class="materialize-textarea" placeholder="Décrivez votre groupe ou association Roller Derby"></textarea>
                    <label for="descriptionGroupe">Déscription du groupe</label>
                </div>
            </div>
            <a class="waves-effect waves-light btn center" id="submit"><i class="material-icons left">check</i>Sauvegarder</a>
            <span id="erreur"></span>
            <br>
            <br>        
        </form>
    </div>

</body>

<script src="js/infoGroup.js"></script>
</html>
