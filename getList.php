<?php
require_once('film.php');
require_once('mysqlConnect.php');
session_start();
$_SESSION = array();
//$film = new Film();

//$res = $film->getList();
//$res = $res->fetch_array(MYSQLI_BOTH);
//$res = $res->fetch_all(MYSQLI_ASSOC);
//var_dump($res);
$pattern_page = '/^\d+$/';
if(!preg_match($pattern_page,$_GET['page']))
{
	header("Location: http://localhost:8000");
	exit();
}

if(isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}

$postCount = 5;
$from = ($page - 1) * $postCount;

$sql = "SELECT COUNT(*) as count FROM `filmlist`";
$resCount = $mysqli->query($sql);
$count = mysqli_fetch_assoc($resCount)['count'];
$pagesCount = ceil($count/$postCount);

if($page > $pagesCount)
	$from = $count - $count % $postCount;


$film = new Film();
$res = $film->getList($from,$postCount);
$res = $res->fetch_all(MYSQLI_ASSOC);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <title>getList</title>

</head>
<body>
	<div class="container">
	<div class="mt-4 mb-4">
    <?php
    foreach ($res as $row) {
        echo "<a href=getInfo.php?ID={$row['id']}>" . $row['Title'] . '</a>'.'<br>';
    }
    ?>
	</div>
		<nav>
		  <ul class="pagination">
		  <?php
			if($page != 1){
			  $prev = $page - 1;
			}
			else $prev = $page;
			if($page != $pagesCount){
				$next = $page + 1;
			}
			else $next = $pagesCount;
			
			
			?>
			<li class="page-item"><a class="page-link" href="<?php echo "/getList.php?page=$prev";?>">Previous</a></li>
			<li class="page-item"><a class="page-link" href="<?php echo "/getList.php?page=1";?>"><?php echo 1;?></a></li>
			
			
			<?php
				if($page - 3 > 1){
					echo '<li class="page-item"><span class="page-link">...</span></li>';
				}
				for($i = 2; $i >= 1; $i--)
				{
					if (($page - $i > 1)){
						echo '<li class="page-item"><a class="page-link" href="/getList.php?page='. $page - $i .'">'. $page - $i .'</a></li>';
					}	
				}
			?>
			<?php if(($page != 1)&&($page != $pagesCount)):?>
			<li class="page-item"><a class="page-link" href="<?php echo "/getList.php?page=$page";?>"><?php echo $page;?></a></li>
			<?php endif;?>
			
			<?php
			
				for($i = 1; $i <= 2; $i++)
				{
					if (($page + $i < $pagesCount)){
						echo '<li class="page-item"><a class="page-link" href="/getList.php?page='. $page + $i .'">'. $page + $i .'</a></li>';
					}	
				}
				if($page + 3 < $pagesCount){
					echo '<li class="page-item"><span class="page-link">...</span></li>';
				}
			?>
			
			
			<li class="page-item"><a class="page-link" href="<?php echo "/getList.php?page=$pagesCount";?>"><?php echo $pagesCount;?></a></li>
			<li class="page-item"><a class="page-link" href="<?php echo "/getList.php?page=$next";?>">Next</a></li>
		  </ul>
		</nav>
    <div>
</body>
</html>


