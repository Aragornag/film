<?php
require_once('film.php');

$film = new Film();

$res = $film->getInfo($_GET['ID']);
$res = $res->fetch_array(MYSQLI_ASSOC);


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
            <p>Title: <b><?php echo $res['Title']; ?></b></p>
            <p>Release Year: <b><?php echo $res['Release Year']; ?></b></p>
            <p>Format: <b><?php echo $res['Format']; ?></b></p>
            <p>Stars: <b><?php echo $res['Stars']; ?></b></p>
            <?php else:?>
            <p>Такого ID нету</p>
            <?php endif; ?>

        <div>
    </body>
</html>


