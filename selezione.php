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
</head>

<body>
    <img src="img/scritta.png" alt="PHPrenotation System">
    <?php

    //Conenssione database
    require "db.php";
    $mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

    // Verifico se è connesso
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    //Query per selezionare la data
    $sql = "SELECT  id_giornata, data  FROM giornata WHERE data='" . $_POST["date"] . "' Group by data ";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        // Form per la prenotazione
        while ($row = $result->fetch_assoc()) {

            echo '<form action="prenotazione.php" method="post">';
            echo '<fieldset>';
            echo '<legend> ' . $row["data"] . '</legend>';

            echo '<label for="nome">Nome:</label>';
            echo '<input type="text" id="nome" name="nome" required><br><br>';

            echo '<label for="cognome">Cognome:</label>';
            echo '<input type="text" id="cognome" name="cognome" required><br><br>';

            echo '<label for="email">Email:</label>';
            echo '<input type="email" id="email" name="email" required><br><br>';

            echo '<label for="telefono">Telefono (senza prefisso):</label>';
            echo '<input type="tel" id="telefono" name="telefono" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" required><br><br>';

            echo '<label for="data">Data:</label>';
            echo '<input type="text" id="data" name="data" value="' . $row["data"] . '" readonly><br><br>';

            //Select con gli orari
            echo '<label for="orario">Scegli un orario:</label>';
            echo '<select name="orario" id="orario">';

            //Query per selezionare l'orario
            $orario = "SELECT  orario, posti_liberi  FROM giornata WHERE data='" . $row["data"] . "' ORDER BY orario";
            $resultorario = $mysqli->query($orario);
            if ($resultorario->num_rows > 0) {
                while ($row1 = $resultorario->fetch_assoc()) {
                    if ($row1["posti_liberi"] == 1) { //se ci sono posti liberi
                        echo '<option id="orario" name="orario" value="' . $row1["orario"] . '" >' . $row1["orario"] . '</option>';
                    } else {//se non ci sono posti liberi
                        //echo '<option id="orario" name="orario" value="'.$row1["orario"].'" >'.$row1["orario"].'</option>';
                    }
                }
            } else {
                echo '<option value="">Nessun risultato</option>';
            }
            echo '</select><br><br>';

            echo '<label for="posti">Clicca continua per poter scegliere quanti posti prenotare</label><br><br>';

            echo '<input type="submit" value="Continua">';
            echo '</fieldset>';
            echo '</form>';

        }
    } else {
        echo "<h3>Ops qualcosa è andato storto</h3>";
    }


    ?>

</body>

</html>