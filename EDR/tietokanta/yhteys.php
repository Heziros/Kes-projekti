<?php
$host ="localhost";
$user = "localhost_kayttaj";
$pass = "Antedi01";
$dbname = "kesa_projekti";

try //yhteyden yrittäminen
{
    $yhteys = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
    $user, $pass);
    //luo PDO:n
}
catch(PDOException $e) // jos ei onnistu
{
    echo $e->getMessage(); //antaa ilmoituksen siitä missä virhe
}
?>
