<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Szkoła Ponadgimnazjalna</title>
        <link rel="stylesheet" type="text/css" href="styl.css"/>
    </head>

    <body>
        <section id="baner">
            <h1>Oceny uczniów: język polski</h1>
        </section>

        <section id="lewy">
            <h2>Lista uczniów: </h2>
            <ol>
                <?php
                    $conn = mysqli_connect('localhost','root','');
                    $db = mysqli_select_db($conn, 'szkola');

                    $sql = "SELECT `imie`, `nazwisko` FROM `uczen`;";
                    $result = mysqli_query($conn, $sql);

                    foreach($result as $value)
                        echo("<li>".$value['imie']." ".$value['nazwisko']."</li>");

                    mysqli_close($conn);
                ?>
            </ol>
        </section>

        <section id="prawy">
            <?php
                $conn = mysqli_connect('localhost','root','');
                $db = mysqli_select_db($conn, 'szkola');

                $sql1 = "SELECT `imie`, `nazwisko` FROM `uczen` WHERE `id` = 2;";
                $result1 = mysqli_query($conn, $sql1);

                $sql2 = "SELECT AVG(`ocena`) FROM `ocena` WHERE `uczen_id` = 2 AND `przedmiot_id` = 1;";
                $result2 = mysqli_query($conn, $sql2);

                mysqli_close($conn);
            ?>

            <h2>
                Uczeń: 

                <?php
                    foreach($result1 as $value)
                        echo($value['imie']." ".$value['nazwisko']);
                ?>
            </h2>

            <p>
                Średnia ocen z języka polskiego: 
                <?php
                    foreach($result2 as $value)
                    echo($value['AVG(`ocena`)']);
                ?>
            </p>
        </section>

        <section id="stopka">
            <h3>Zespół Szkół Ponadgimnazjalnych</h3>
            <p>Stronę opracował: ***********</p>
        </section>
    </body>
</html>