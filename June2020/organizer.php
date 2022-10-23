<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Organizer</title>
        <link rel="stylesheet" href="styl6.css"/>
    </head>

    <body>
        <header>
            <section id="pierwszyBlok">
                <h2>MÓJ ORGANIZER</h2>
            </section>

            <section id="drugiBlok">
                <form method="POST" action="">
                    <label>Wpis wydarzenia:</label>
                    <input name="wpisWydarzenia"/>
                    <button type="submit">ZAPISZ</button>

                    <?php
                        $conn = mysqli_connect('localhost','root','','egzamin6');
                
                        $wpisWydarzenia=$_POST['wpisWydarzenia'];

                        $sql = "UPDATE `zadania` SET `wpis` = '".$wpisWydarzenia."' WHERE `dataZadania` = '2020-08-27';";
            
                        mysqli_query($conn,$sql);
                    ?>
                </form>
            </section>

            <section id="trzeciBlok">
                <img src="logo2.png" alt="Mój organizer"/>
            </section>
        </header>

        <section id="blokGłówny">
            <?php
                $sql = "SELECT `dataZadania`, `miesiac`, `wpis` FROM `zadania` WHERE `miesiac` = 8;";

                $result = mysqli_query($conn,$sql);

                while($dane = $result->fetch_assoc()) {
                    echo("<section class='dzien'><h6>".$dane['dataZadania'].", ".$dane['miesiac']."</h6><p>".$dane['wpis']."</p></section>");
                }
            ?>
        </section>

        <footer>
            <?php
                $sql = "SELECT `miesiac`, `rok` FROM `zadania` WHERE `dataZadania` = '2020-08-01';";

                $tablica = mysqli_fetch_row(mysqli_query($conn, $sql));
                    echo("<h1>miesiąc: ".$tablica[0].", rok: ".$tablica[1]."</h1>");
                
                mysqli_close($conn);
            ?>

            <p>Stronę wykonał: ***********</p>
        </footer>
    </body>
</html>