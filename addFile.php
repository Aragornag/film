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
$_SESSION['addFile']['error']['flag'] = 0;	
header("Location: http://localhost:8000");
exit();