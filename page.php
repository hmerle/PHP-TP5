<?php
session_start();
$time = date('d\/m\/Y H:i:s', $_SESSION['time']);
$site = $_SESSION['site'];
echo 'Bonjour ';
echo $_SESSION['name'];
echo ". Ta première connexion était le ";
echo $time;
//echo $_SESSION['time'];
echo ".";
echo "<br><a href='".$site."'>Cliquez pour ouvrir votre page préférée</a>";
session_destroy();