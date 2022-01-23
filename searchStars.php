<?php
require_once('film.php');
session_start();
$_SESSION = array();


$search = clear_data($_GET['search']);
$pattern_Stars = '/^.*[a-z]|[A-Z].*$/';

$_SESSION['flag'] = 0;
if(!preg_match($pattern_Stars,$search))
{
	$_SESSION['searchStars']['error']['Stars'] = '<small class="text-danger">начинатся должно с буквы</small>';
	$_SESSION['flag'] = 1;
	header("Location: http://localhost:8000");
	exit(); 
}
if($_SESSION['flag'] == 0)
{
	$film = new Film();

	$res = $film->searchStars($_GET['search']);

	$res = $res->fetch_all(MYSQLI_ASSOC);
}



//var_dump($res);

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
    <?php if (!empty($res)):?>

        <?php
        foreach ($res as $row) {
            echo "<a href=getInfo.php?ID={$row['id']}>" . $row['Title'] . '</a>'.'<br>';
        }
        ?>

    <?php else:?>
        <p>Результат поиска пуст</p>
    <?php endif; ?>

    <div>
</body>
</html>


