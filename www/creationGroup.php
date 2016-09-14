<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Création du groupe</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>


    </head>
    <body>
        <h1>Planning des entrainements Roller Derby</h1>

        <form id="formCreation" method="POST" action="#">
            <h2>Création du groupe</h2>

            <input id="nom" name="nom" placeholder='Nom du groupe'>
            <input type="email" id="mail" placeholder="Email de l'association">
            <input type="text" id="adress" placeholder="Adresse de l'association">
            <textarea id='descriptionGroupe' placeholder="Décrivez votre groupe ou association Roller Derby"></textarea>
            <button type="submit" id="submit">Création</button>
            <button type="reset" id="back">Retour</button>
            <br>
            <br>
        </form>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
        <script src="http://mysqljs.com/mysql.js"></script>
        <script src="js/antipub.js"></script>
        <script>
            $(document).ready(function () {
                $("#back").click(function () {
                    window.location("main.html");
                });
            });
        </script>
    </body>
</html>
