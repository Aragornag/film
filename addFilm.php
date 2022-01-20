<?php
require_once('film.php');
//echo $_POST['Title'] . ' ' . $_POST['Release_Year'] . ' ' . $_POST['Format'] . ' ' . $_POST['Stars'];

$film = new Film();

$film->addFilm($_POST['Title'],$_POST['Release_Year'],$_POST['Format'],$_POST['Stars']);

header("Location: http://localhost:8000");
exit();