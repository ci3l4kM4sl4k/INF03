<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Document</title>
        <link rel="stylesheet" href="przychodnia.css"/>
    </head>

    <body>
        <section id="baner">
            <h1>PRAKTYKA LEKARZA RODZINNEGO</h1>
        </section>

        <section id="lewy">
            <h3>LISTA PACJENTÓW</h3>
            <?php
                $conn = mysqli_connect('localhost','root','','przychodnia');

                $sql = "SELECT `id`, `imie`, `nazwisko` FROM pacjenci;";
                $result = mysqli_query($conn,$sql);

                foreach($result as $value)
                    echo($value['id']." ".$value['imie']." ".$value['nazwisko']."<br/>");

                mysqli_close($conn);
            ?>

            <br/><br/>

            <form method="POST" action="pacjent.php">
                Podaj id:
                <br/>

                <input type="number" name="id"/>
                <br/>

                <button type="submit">Pokaż dane</button>
            </form>

            <h3>LEKARZE</h3>
            <ul>
                <li>pn - śr</li>
                <ol>
                    <li>Anna Kwiatkowska</li>
                    <li>Jan Kowalewski</li>
                </ol>
                <li>czw - pt</li>
                <ol>
                    <li>Krzysztof Nowak</li>
                </ol>
            </ul>
        </section>

        <section id="prawy">
            <h2>INFORMACJE SZCZEGÓŁOWE O PACJENCIE</h2>
            <?php
                $conn = mysqli_connect('localhost','root','','przychodnia');
                
                $id = $_POST['id'];

                $sql = "SELECT `imie`, `nazwisko`, `choroby_przewlekle`, `uczulenia` FROM `pacjenci` WHERE `id` = ".$id.";";
                
                $result = mysqli_query($conn,$sql);

                foreach($result as $value)
                {
                    echo("<p>Imię i nazwisko: ".$value['imie']." ".$value['nazwisko']."</p>");
                    echo("<p>Choroby przewlekłe: ".$value['choroby_przewlekle']."</p>");
                    echo("<p>Uczulenia: ".$value['uczulenia']."</p>");
                }
                
                mysqli_close($conn);
            ?>
        </section>

        <section id="stopka">
            <p>utworzone przez: ***********</p>
            <a href="kwerendy.txt">Pobierz plik z kwerendami</a>
        </section>
    </body>
</html>