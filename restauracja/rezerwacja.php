<?php
echo("Dodano rezerwację do bazy");

$conn = mysqli_connect('localhost','root','','baza');

$data=$_POST['data'];
$ile=$_POST['ile'];
$telefon=$_POST['telefon'];
if(isset($_POST['check']))
    $check = true;
else
    $check = false;

$sql = "INSERT INTO `rezerwacje` (`id`, `nr_stolika`, `data_rez`, `liczba_osob`, `telefon`) VALUES (NULL, NULL, '".$data."', '".$ile."', '".$telefon."');";

mysqli_query($conn, $sql);

mysqli_close($conn);