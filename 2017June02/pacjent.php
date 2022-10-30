<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Poradnia</title>
        <link rel="stylesheet" href="poradnia.css"/>
    </head>

    <body>
        <section id="baner">
            <h1>PORADNIA SPECJALISTYCZNA</h1>
        </section>

        <section id="lewy">
            <h3>LEKARZE SPECJALIŚCI</h3>
            <table>
                <tr>
                    <td colspan="2">Poniedziałek</td>
                </tr>
                <tr>
                    <td>Anna Kowalska</td>
                    <td>otolaryngolog</td>
                </tr>
                <tr>
                    <td colspan="2">Wtorek</td>
                </tr>
                <tr>
                    <td>Jan Nowak</td>
                    <td>kardiolog</td>
                </tr>
            </table>

            <h3>LISTA PACJENTÓW</h3>
            <?php
                $conn = mysqli_connect('localhost','root','','poradnia');

                $sql = "SELECT `id`, `imie`, `nazwisko`, `choroba` FROM `pacjenci`;";
                $result = mysqli_query($conn,$sql);

                foreach($result as $value)
                    echo($value['id']." ".$value['imie']." ".$value['nazwisko']." ".$value['choroba']."<br/>");

                mysqli_close($conn);
            ?>

            <br/>
            <br/>

            <form action="pacjent.php" method="POST">
                Podaj id:
                <br/>
                <input type="number" name="id"/>
                <br/>
                <button type="submit">Pokaż szczegóły</button>
            </form>
        </section>

        <section id="prawy">
            <h2>KARTA PACJENTA</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','poradnia');

                $id = $_POST['id'];

                $sql = "SELECT `imie`, `nazwisko`, `leki_przepisane`, `opis` FROM `pacjenci` WHERE `id` = ".$id.";";
                
                $result = mysqli_query($conn,$sql);

                foreach($result as $value){
                    echo("<p>Imię i nazwisko: ".$value['imie']." ".$value['nazwisko']."</p>");
                    echo("<p>Przepisane leki: ".$value['leki_przepisane']."</p>");
                    echo("<p>Opis choroby: ".$value['opis']."</p>");
                }

                mysqli_close($conn);
            ?>
        </section>

        <section id="stopka">
            <p>utworzone przez: ***********</p>
            <a href="kwerendy.txt">Kwerendy do pobrania</a>
        </section>
    </body>
</html>