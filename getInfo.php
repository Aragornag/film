<?php
require_once('film.php');
session_start();
$_SESSION = array();
$id = clear_data($_GET['ID']);


$pattern_ID = '/^\d+$/';

$_SESSION['flag'] = 0;
if(!preg_match($pattern_ID,$id))
{
	$_SESSION['getInfo']['error']['ID'] = '<small class="text-danger">введите число</small>';
	$_SESSION['flag'] = 1;
	header("Location: http://localhost:8000");
	exit();
}

if($_SESSION['flag'] == 0)
{
	$film = new Film();

	$res = $film->getInfo($id);
	$res = $res->fetch_array(MYSQLI_ASSOC);
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
    
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
        <title>getinfo</title>
    
    </head>
    <body>
        <div class="container">
            <?php if (isset($res)):?>
			<p>ID: <b><?php echo $res['id']; ?></b></p>
            <p>Title: <b><?php echo $res['Title']; ?></b></p>
            <p>Release Year: <b><?php echo $res['Release Year']; ?></b></p>
            <p>Format: <b><?php echo $res['Format']; ?></b></p>
            <p>Stars: <b><?php echo $res['Stars']; ?></b></p>
            <?php 
			else:{
				$_SESSION['getInfo']['error']['ID'] = '<small class="text-danger">Фильма с этим ID не найдено</small>';
				header("Location: http://localhost:8000");
				exit();
			}
			endif;?>
			<a href="http://localhost:8000"><button type="button" class="btn btn-primary">На главную</button></a>
        <div>
    </body>
</html>


