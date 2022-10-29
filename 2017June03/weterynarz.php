<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8" />
        <title>Weterynarz</title>
        <link rel="stylesheet" href="weterynarz.css" />
    </head>

    <body>
        <section id="baner">
            <h1>GABINET WETERYNARYJNY</h1>
        </section>

        <section id="lewy">
            <h2>PSY</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','weterynarz');

                $sql = "SELECT `id`, `imie`, `wlasciciel` FROM `zwierzeta` WHERE `rodzaj` = 1;";
                $result = mysqli_query($conn,$sql);

                foreach($result AS $value)
                    echo($value['id']." ".$value['imie']." ".$value['wlasciciel']."<br/>");

                mysqli_close($conn);
            ?>

            <h2>KOTY</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','weterynarz');

                $sql = "SELECT `id`, `imie`, `wlasciciel` FROM `zwierzeta` WHERE `rodzaj` = 2;";
                $result = mysqli_query($conn,$sql);

                foreach($result AS $value)
                    echo($value['id']." ".$value['imie']." ".$value['wlasciciel']."<br/>");

                mysqli_close($conn);
            ?>
        </section>

        <section id="srodkowy">
            <h2>SZCZEGÓŁOWA INFORMACJA O ZWIERZĘTACH</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','weterynarz');

                $sql = "SELECT `imie`, `telefon`, `szczepienie`, `opis` FROM `zwierzeta`;";
                $result = mysqli_query($conn,$sql);

                foreach($result AS $value)
                {
                    echo("Pacjent: ".$value['imie']."<br/>");
                    echo("Telefon właściciela: ".$value['telefon'].", ostatnie szczepienie: ".$value['szczepienie'].", informacje: ".$value['opis']);
                    echo("<hr>");
                }

                mysqli_close($conn);
            ?>
        </section>

        <section id="prawy">
            <h2>WETERYNARZ</h2>
            <a href="logo.jpg"><img src="logo-mini.jpg"></a>
            <p>Krzysztof Nowakowski, lekarz weterynarii</p>
            <h2>GODZINY PRZYJĘĆ</h2>
            <table>
                <tr>
                    <td>Poniedziałek</td>
                    <td>15:00 - 19:00</td>
                </tr>
                <tr>
                    <td>Wtorek</td>
                    <td>15:00 - 19:00</td>
                </tr>
            </table>
        </section>
    </body>
</html>