<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">

<head>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <title> PHPrenotation System </title>
    <style>
        body {
            background-position: 0 0;
        }
    </style>
</head>


<body>
    <img src="img/scritta.png" alt="PHPrenotation System">
    <?php

    //Controllo se sono stati passati i dati
    if (isset($_POST["nome"]) && isset($_POST["cognome"]) && isset($_POST["email"]) && isset($_POST["data"]) && isset($_POST["orario"])) {

        //Conenssione database
        require "db.php";
        $mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

        // Verifico se è connesso
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        //Salvo i dati in sessione
        $_SESSION["nome"] = mysqli_real_escape_string($mysqli, $_POST["nome"]);
        $_SESSION["cognome"] = mysqli_real_escape_string($mysqli, $_POST["cognome"]);
        $_SESSION["email"] = mysqli_real_escape_string($mysqli, $_POST["email"]);
        $_SESSION["telefono"] = mysqli_real_escape_string($mysqli, $_POST["telefono"]);
        $_SESSION["data"] = mysqli_real_escape_string($mysqli, $_POST["data"]);
        $_SESSION["orario"] = mysqli_real_escape_string($mysqli, $_POST["orario"]);
        $_SESSION["concluso"] = 0;

        //Riepilogo dei dati inseriti
        echo '<div class="row">';
        echo '<div class="column">';

        echo "<h3>Nome: " . $_POST["nome"] . "<h3>";
        echo "<h3>Cognome: " . $_POST["cognome"] . "<h3>";
        echo "<h3>Email: " . $_POST["email"] . "<h3>";
        echo "<h3>Telefono: " . $_POST["telefono"] . "<h3>";
        echo "<h3>Giorno: " . $_POST["data"] . "<h3>";
        echo "<h3>Orario: " . $_POST["orario"] . "<h3>";

        echo '</div>';
        echo '<div class="column">';

        //Form per la selezione dei posti
        echo '<form action="concluso.php" method="post">';
        echo '<label for="posti">Quanti posti vuoi prenotare?</label> <br><br>';

        echo '<select name="posti" id="posti">';
        for ($i = 1; $i <= 100; $i++) {//massimo 100 posti
            echo '<option value="' . $i . '" required>' . $i . '</option>';
        }
        echo '</select><br><br>';

        //echo '<input type="text" id="posti" name="posti"><br>';
    
        echo '<input type="submit" value="Prenota">';
        echo '</form>';

        echo 'Costo approsimativo (senza sconti): <a id=\'prezzo\'></a>';
        echo '</div>';
        echo '</div>';
    } else {
        echo "<h3>Ops qualcosa è andato storto</h3>";
        echo "<a href=index.php>";
        echo '<input type="button" value="Home">';
        echo "</a>";
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $("#posti").bind("change keyup", function (event) {
            var a = $(this).val();
            var prezzo = 0;
            if (a <= 5) {
                prezzo = 60;
            } else {
                prezzo = 15 * a;
            }
            $('#prezzo').text(prezzo + '€');

        });
    </script>
</body>

</html>