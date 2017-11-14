<?php
// muodostetaan yhteys tietokantaan
try {
    $yhteys = new PDO("mysql:host=localhost;dbname=shepgame", "root", "Napalminalle125!q9");
} catch (PDOException $e) {
    die("VIRHE: " . $e->getMessage());
}
// virheenkäsittely: virheet aiheuttavat poikkeuksen
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// merkistö: käytetään latin1-merkistöä; toinen yleinen vaihtoehto on utf8.
$yhteys->exec("SET NAMES latin1");

// valmistetaan kysely
$kysely = $yhteys->prepare("SELECT * FROM objects");
// suoritetaan kysely
$kysely->execute();

$kaikkiTiedot = array();

$i = 0;

// käsitellään tulostaulun rivit yksi kerrallaan
while ($rivi = $kysely->fetch()) {
    $naytettavatKentat = array("left", "top", "width", "height", "objectcolor");

    $yhdenRivinTiedot = array();

    foreach($naytettavatKentat as $kentta) {
        // Kentän nimi on $kentta
        $yhdenRivinTiedot[$kentta] = $rivi[$kentta];
    }

    $kaikkiTiedot[$rivi["objectid"]] = $yhdenRivinTiedot;

    $i++;
}
header("Content-Type: application/json");
echo json_encode($kaikkiTiedot);