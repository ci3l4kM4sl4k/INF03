<?php
$conn = mysqli_connect('localhost','root','','dane');

$tytul = $_POST['tytul'];
$gatunek = $_POST['gatunek'];
$rok = $_POST['rok'];
$ocena = $_POST['ocena'];

$sql = "INSERT INTO `filmy` (`id`, `gatunki_id`, `rezyserzy_id`, `tytul`, `rok`, `ocena`) VALUES (NULL, '".$gatunek."', '0', '".$tytul."', '".$rok."', '".$ocena."');";
mysqli_query($conn,$sql);

echo("Film ".$tytul." został dodany do bazy");

mysqli_close($conn);