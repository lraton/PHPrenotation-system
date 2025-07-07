<!DOCTYPE html>

<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VTKT9J2Z0Y"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-VTKT9J2Z0Y');
    </script>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <title> PHPrenotation System </title>
</head>

<body>
    <img src="img/scritta.png" alt="PHPrenotation System">
    <p id="intro">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</br>
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</br>
        La leggenda narra che chi riuscirà a superare le difficoltà della torre</br>
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</br>
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</br>
    </p>
    <form action="selezione.php" method="post">
        <table border="5" calss="table-responsive">
            <?php
            //Conenssione database
            require "db.php";
            $mysqli = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_database);

            // Verifico se è connesso
            if ($mysqli->connect_errno) {
                echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                exit();
            }
            //seleziono le date disponibili
            $sql = "SELECT data  FROM giornata where 1 group by data order by data";
            $result = $mysqli->query($sql);
            $i = 0;
            if ($result->num_rows > 0) {
                // output query date
                while ($row = $result->fetch_assoc()) {
                    if ($i == 0) { //se è la prima riga apro la tabella
                        echo '<tr>';
                    }
                    $datadivisa = explode("-", $row["data"]);
                    if ($row["data"] >= date("Y-m-d")) { //se il giorno non è passato abilita la selezione
                        switch ($datadivisa[1]) {
                            case 1:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- GENNAIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 2:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- FEBBRAIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 3:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- MARZO -' . $datadivisa[0] . '</td>';
                                break;
                            case 4:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- APRILE -' . $datadivisa[0] . '</td>';
                                break;
                            case 5:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- MAGGIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 6:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- GIUGNO -' . $datadivisa[0] . '</td>';
                                break;
                            case 7:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- LUGLIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 8:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- AGOSTO -' . $datadivisa[0] . '</td>';
                                break;
                            case 9:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- SETTEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 10:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- OTTOBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 11:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- NOVEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 12:
                                echo '<td> <input type="radio"  name="date" value="' . $row["data"] . '" required >' . $datadivisa[2] . '- DICEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                        }
                    } else {  //se il giorno è passato disabilita la selezione
                        switch ($datadivisa[1]) {
                            case 1:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- GENNAIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 2:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- FEBBRAIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 3:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- MARZO -' . $datadivisa[0] . '</td>';
                                break;
                            case 4:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- APRILE -' . $datadivisa[0] . '</td>';
                                break;
                            case 5:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- MAGGIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 6:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- GIUGNO -' . $datadivisa[0] . '</td>';
                                break;
                            case 7:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- LUGLIO -' . $datadivisa[0] . '</td>';
                                break;
                            case 8:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- AGOSTO -' . $datadivisa[0] . '</td>';
                                break;
                            case 9:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- SETTEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 10:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- OTTOBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 11:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- NOVEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                            case 12:
                                echo '<td> <input type="radio"  disabled required >' . $datadivisa[2] . '- DICEMBRE -' . $datadivisa[0] . '</td>';
                                break;
                        }
                    }
                    $i++;
                    if ($i == 3) { //se ho 3 date chiudo la riga
                        echo '</tr>';
                        $i = 0;
                    }
                }
            } else {
                echo "<h3>Ops qualcosa è andato storto</h3>";
            }
            ?>
        </table>
        <input type="submit" value="Continua">
    </form>

    <h3>Rules</h3>
    <p>- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </br>
        -Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</br>
        -Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </br>
        -Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</br>
        -Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</br>
    </p>
</body>

</html>