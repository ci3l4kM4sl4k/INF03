<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8"/>
        <title>Portal ogłoszeniowy</title>
        <link rel="stylesheet" href="styl1.css"/>
    </head>
    
    <body>
        <section id="baner">
            <h1>Portal Ogłoszeniowy</h1>
        </section>

        <section id="srodek">
            <section id="lewy">
                <h2>Kategorie ogłoszeń</h2>

                <ol>
                    <li>Książki</li>
                    <li>Muzyka</li>
                    <li>Filmy</li>
                </ol>

                <img src="ksiazki.jpg" alt="Kupię / sprzedam książkę"/>

                <table>
                    <tr>
                        <td>Liczba ogłoszeń</td>
                        <td>Cena ogłoszenia</td>
                        <td>Bonus</td>
                    </tr>
                    <tr>
                        <td>1 - 10</td>
                        <td>1 PLN</td>
                        <td rowspan="3">Subskrypcja newslettera to upust 0,20 PLN na ogłoszenie</td>
                    </tr>
                    <tr>
                        <td>11 - 50</td>
                        <td>0,80 PLN</td>
                    </tr>
                    <tr>
                        <td>51 i więcej</td>
                        <td>0,60 PLN</td>
                    </tr>
                </table>
            </section>

            <section id="prawy">
                <h2>Ogłoszenia kategorii książki</h2>

                <?php
                    $conn = mysqli_connect('localhost','root','','ogloszenia');

                    $sql1 = "SELECT `id`, `tytul`, `tresc` FROM `ogloszenie` WHERE `kategoria` = 1;";
                    
                    $result1 = mysqli_query($conn,$sql1);

                    foreach($result1 as $value){
                        $sql2 = "SELECT `uzytkownik`.`telefon` FROM `uzytkownik` INNER JOIN `ogloszenie` ON `uzytkownik`.`id` = `ogloszenie`.`uzytkownik_id` WHERE `ogloszenie`.`id` = ".$value['id'].";";
                        $result2 = mysqli_fetch_row(mysqli_query($conn,$sql2));
                        echo("<br/><h3>".$value['id']." ".$value['tytul']."</h3><br/><a>".$value['tresc']."</a><br/><br/><a>telefon kontaktowy: ".$result2[0]."</a><br/>");
                    }
                ?>
            </section>
        </section>

        <section id="stopka">
            Portal ogłoszeniowy opracował: ***********
        </section>
    </body>
</html>