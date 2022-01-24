<?php session_start();?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <title>HTML5</title>
    </head>

    <body>
    <div class="container">
        <h1>Загрузить файл</h1>
		
		<?php if(isset($_SESSION['addFile']['error']['flag'])) echo $_SESSION['addFile']['error']['flag'];
			echo '<br>';
			if(isset($_SESSION['addFile']['error']['type'])) echo $_SESSION['addFile']['error']['type'];
			if(isset($_SESSION['addFile']['result']['count'])) echo '<b>Добавлено '.$_SESSION['addFile']['result']['count']. ' фильмов</b>';
		?>
        <form method="POST" action="addFile.php" enctype="multipart/form-data">
            <div>
                <span>Upload a File:</span>
                <input type="file" name="uploadedFile" />
                <br>
            </div>

            <input type="submit" name="uploadBtn" value="Upload" />
        </form>
        <div>
            <h1>Добавить фильм</h1>
			<?php if(isset($_SESSION['addFilm']['error']['flag']) and ($_SESSION['addFilm']['error']['flag'] == 0)) echo '<b class="text-success">Отправка успешна</b>'; ?>
            <form action="addFilm.php" method="post">
                <div class="form-group col-4">
                Title:
                <br>
                <input type="text" name="Title" placeholder="Title" class="form-control">
				<?php if(isset($_SESSION['addFilm']['error']['Title'])) echo $_SESSION['addFilm']['error']['Title'];?>
                <br> Release Year:
                <br>
                <select name="Release_Year" class="form-select">
                    <?php for($i = 1800;$i<=2030;$i++):?>
                    <option value="<?php echo $i?>"><?php echo $i?></option>
                    <?php endfor;?>
                </select>
                <br> Format:
                <br>
                <select name="Format" class="form-select">
                    <option value="VHS">VHS</option>
                    <option value="DVD">DVD</option>
                    <option value="Blu-Ray">Blu-Ray</option>
                </select>
                <br> Stars:
                <br>
                <input type="text" name="Stars" placeholder="Stars" class="form-control">
				<?php if(isset($_SESSION['addFilm']['error']['Stars'])) echo $_SESSION['addFilm']['error']['Stars'];?>
                <br>
                <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
            <div>

                <h1>Удалить фильм</h1>
				<?php if(isset($_SESSION['deleteFilm']['result'])) echo $_SESSION['deleteFilm']['result']; ?>
                <div class="form-group col-4">
                    <form action="DeleteFilm.php" method="post" onSubmit='return confirm("Вы уверены что хотите удалить фильм?");'>
                        ID:
                        <br>
                        <input type="number" min="1" name="ID" value="" class="form-control">
						<?php if(isset($_SESSION['deleteFilm']['error']['ID'])) echo $_SESSION['deleteFilm']['error']['ID'];?>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary" >
                    </form>
                </div>

                <h1>Показать информацию о фильме</h1>
                <div class="form-group col-4">
                    <form action="getInfo.php" method="get">
                        ID:
                        <br>
						<?php if(isset($_SESSION['getInfo']['error']['ID'])) echo $_SESSION['getInfo']['error']['ID'];?>
                        <input type="number" min="1" name="ID" value="" class="form-control">
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

                <h1>Показать список фильмов, отсортированных по названию в алфавитном порядке</h1>
                <a href="getList.php?page=1">
                    <button type="button" class="btn btn-primary">Показать список фильмов</button>
                </a>

                <h1>Найти фильм по названию</h1>
                <div class="form-group col-4">
                    <form action="search.php" method="get">
                        Ваш запрос поиска:
                        <br>
                        <input type="text" name="search" value="" class="form-control">
						<?php if(isset($_SESSION['search']['error']['Title'])) echo $_SESSION['search']['error']['Title'];?>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

                <h1>Найти фильм по имени Актера</h1>
				
				
                <div class="form-group col-4">
                    <form action="searchStars.php" method="get">
                        Ваш запрос поиска:
                        <br>
                        <input type="text" name="search" value="" class="form-control">
						<?php if(isset($_SESSION['searchStars']['error']['Stars'])) echo $_SESSION['searchStars']['error']['Stars'];?>
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

            </div>
    </body>

</html>