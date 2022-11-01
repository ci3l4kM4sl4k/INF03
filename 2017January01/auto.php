<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Komis Samochodowy</title>
        <link rel="stylesheet" href="auto.css"/>
    </head>

    <body>
        <section id="baner">
            <h1>SAMOCHODY</h1>
        </section>

        <section id="lewy">
            <h2>Wykaz samochodów</h2>
            <ul>
                <?php
                    $conn = mysqli_connect('localhost','root','','komis');

                    $sql = "SELECT `id`, `marka`, `model` FROM `samochody`;";
                    $result = mysqli_query($conn,$sql);

                    foreach($result as $value)
                        echo("<li>".$value['id']." ".$value['marka']." ".$value['model']."</li>");

                    mysqli_close($conn);
                ?>
            </ul>

            <h2>Zamówienia</h2>
            <ul>
                <?php
                    $conn = mysqli_connect('localhost','root','','komis');

                    $sql = "SELECT `samochody_id`, `klient` FROM `zamowienia`;";
                    $result = mysqli_query($conn,$sql);

                    foreach($result as $value)
                        echo("<li>".$value['samochody_id']." ".$value['klient']."</li>");

                    mysqli_close($conn);
                ?>
            </ul>
        </section>

        <section id="prawy">
            <h2>Pełne dane: Fiat</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','komis');

                $sql = "SELECT * FROM `samochody` WHERE `marka` = 'Fiat';";
                $result = mysqli_query($conn,$sql);

                foreach($result as $value)
                    echo($value['id']."/".$value['marka']."/".$value['model']."/".$value['rocznik']."/".$value['kolor']."/".$value['stan']."<br/>");

                mysqli_close($conn);
            ?>
        </section>

        <section id="stopka">
            <table>
                <tr>
                    <td><a href="kwerendy.txt">Kwerendy</a></td>
                    <td>Autor:***********</td>
                    <td><img src="auto.png" alt="komis samochodowy"/></td>
                </tr>
            </table>
        </section>
    </body>`
</html>