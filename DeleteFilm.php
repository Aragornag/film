<?php
require_once('film.php');
session_start();
$_SESSION = array();
//echo $_POST['Title'] . ' ' . $_POST['Release_Year'] . ' ' . $_POST['Format'] . ' ' . $_POST['Stars'];


$_POST['ID'] = clear_data($_POST['ID']);

$pattern_ID = '/^\d+$/';

$_SESSION['deleteFilm']['error']['flag'] = 0;
if(!preg_match($pattern_ID,$_POST['ID']))
{
	$_SESSION['deleteFilm']['error']['ID'] = '<small class="text-danger">введите число</small>';
	$_SESSION['deleteFilm']['error']['flag'] = 1;
}




if($_SESSION['deleteFilm']['error']['flag'] == 0)
{
	$film = new Film();
	$info = $film->getInfo($_POST['ID']);
	$info = $info->fetch_array(MYSQLI_ASSOC);
	
	if (empty($info)){ 
		$_SESSION['deleteFilm']['result'] = '<b class="text-danger">Фильма с таким ID нету</b>';
	}
	else{
		$film->deleteFilm($_POST['ID']);
		$_SESSION['deleteFilm']['result'] = '<b class="text-success">Удаление успешно</b>';
	}
}


header("Location: http://localhost:8000");
exit();