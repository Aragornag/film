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
            <form action="addFilm.php" method="post">
                <div class="form-group col-4">
                Title:
                <br>
                <input type="text" name="Title" value="Title" class="form-control">
                <br> Release Year:
                <br>
                <select name="Release_Year" class="form-select">
                    <?php for($i = 1970;$i<=2022;$i++):?>
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
                <input type="text" name="Stars" value="Stars" class="form-control">
                <br>
                <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
            <div>

                <h1>Удалить фильм</h1>
                <div class="form-group col-4">
                    <form action="DeleteFilm.php" method="post">
                        ID:
                        <br>
                        <input type="text" name="ID" value="" class="form-control">
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

                <h1>Показать информацию о фильме</h1>
                <div class="form-group col-4">
                    <form action="getInfo.php" method="get">
                        ID:
                        <br>
                        <input type="text" name="ID" value="" class="form-control">
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

                <h1>Показать список фильмов, отсортированных по названию в алфавитном порядке</h1>
                <a href="getList.php">
                    <button type="button" class="btn btn-primary">Показать список фильмов</button>
                </a>

                <h1>Найти фильм по названию</h1>
                <div class="form-group col-4">
                    <form action="search.php" method="get">
                        Ваш запрос поиска:
                        <br>
                        <input type="text" name="search" value="" class="form-control">
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
                        <br>
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </form>
                </div>

            </div>
    </body>

</html>