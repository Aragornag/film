<?php

require_once('film.php');
session_start();
$_SESSION = array();
//if ($_FILES && $_FILES["filename"]["error"]== UPLOAD_ERR_OK)
//{
    //$name = $_FILES["filename"]["name"];
//}

//$lines = file("ТЗ _sample_movies php.txt");

//var_dump($_FILES);
//echo $_FILES["uploadedFile"]["tmp_name"];
//exit;

if(pathinfo($_FILES["uploadedFile"]["name"],PATHINFO_EXTENSION) != 'txt'){
	$_SESSION['addFile']['error']['type'] = '<b class="text-danger">Неверный тип файла</b>';
	$_SESSION['addFile']['error']['flag'] = '<b class="text-danger">Отправка не удалась</b>';
	header("Location: http://localhost:8000");
	exit();
}

$start_count = $mysqli->query('SELECT COUNT(*) as count FROM `filmlist`;');
$start_count = mysqli_fetch_array($start_count);
$start_count = $start_count['count'];

$lines = file($_FILES["uploadedFile"]["tmp_name"]);

$line = 0;
//while($line < count($lines))
	$film = new Film();
	for($line = 0;$line <count($lines);$line++)
	{
		if (trim($lines[$line]) == "") continue;
		//$lines[$line] = ltrim(trim(stristr($lines[$line],':',false)),':');
		
		if (trim(stristr($lines[$line],':',true)) == 'Title')
		{
			$title = trim(ltrim(stristr($lines[$line],':',false),':'));	
			$date = trim(ltrim(stristr($lines[$line + 1],':',false),':'));
			$type = trim(ltrim(stristr($lines[$line + 2],':',false),':'));
			$artors = trim(ltrim(stristr($lines[$line + 3],':',false),':'));
			$line = $line + 3;
			
			$film->addFilm($title,$date,$type,$artors);
			
			//echo '===================<br>';
			//echo $title . '<br>' . $date . '<br>' . $type . '<br>' . $artors . '<br>';
			//echo '===================<br>';
			
		}
		
		//echo $lines[$line] . '<br>';
	}
$_SESSION['addFile']['error']['flag'] = '<b class="text-success">Отправка успешна</b>';	
$finish_count = $mysqli->query('SELECT COUNT(*) as count FROM `filmlist`;');
$finish_count = mysqli_fetch_array($finish_count);
$finish_count = $finish_count['count'];
$_SESSION['addFile']['result']['count'] = $finish_count - $start_count;
header("Location: http://localhost:8000");
exit();