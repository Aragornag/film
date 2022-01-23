<?php
require_once('film.php');
session_start();
$_SESSION = array();
//echo $_POST['Title'] . ' ' . $_POST['Release_Year'] . ' ' . $_POST['Format'] . ' ' . $_POST['Stars'];



$_POST['Title'] = clear_data($_POST['Title']);
$_POST['Release_Year'] = clear_data($_POST['Release_Year']);
$_POST['Format'] = clear_data($_POST['Format']);
$_POST['Stars'] = clear_data($_POST['Stars']);

$pattern_Title = '/^.*[a-z]|[A-Z]|[0-9].*$/';
$pattern_Stars = '/^.*[a-z]|[A-Z].*$/';

$_SESSION['addFilm']['error']['flag'] = 0;
if(!preg_match($pattern_Title,$_POST['Title']))
{
	$_SESSION['addFilm']['error']['Title'] = '<small class="text-danger">начинатся должно с буквы или цифры</small>';
	$_SESSION['addFilm']['error']['flag'] = 1;
}
if(mb_strlen($_POST['Title']) > 100)
{
	$_SESSION['addFilm']['error']['Title'] = '<small class="text-danger">название должно бить до 100 символов</small>';
	$_SESSION['addFilm']['error']['flag'] = 1;
}

if(!preg_match($pattern_Stars,$_POST['Stars']))
{
	$_SESSION['addFilm']['error']['Stars'] = '<small class="text-danger">начинатся должно с буквы</small>';
	$_SESSION['addFilm']['error']['flag'] = 1;
}

if($_SESSION['addFilm']['error']['flag'] == 0)
{
	$film = new Film();
	$film->addFilm($_POST['Title'],$_POST['Release_Year'],$_POST['Format'],$_POST['Stars']);
}


header("Location: http://localhost:8000");
exit(); 