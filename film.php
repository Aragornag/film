<?php

require_once('mysqlConnect.php');

class Film{
	
	//public int $id;
	//public ?string $name;
	//public string $realiseDate;
	//public string $videoType;


	
	public function addFilm($name, $date, $type, $actorlist)
	{
        global $mysqli;
        // INSERT INTO `filmlist` (`id`, `Title`, `Release Year`, `Format`, `Stars`) VALUES (NULL, 'test', '1111', 'test', 'test test test');
		$sql = "INSERT INTO `filmlist` (`id`, `Title`, `Release Year`, `Format`, `Stars`) VALUES (NULL, '$name', '$date', '$type', '$actorlist');";
		$mysqli->query($sql);

	}
	public function deleteFilm($id)
	{
        global $mysqli;
		$sql = "DELETE FROM `filmlist` WHERE `filmlist`.`id` = $id;";
		$mysqli->query($sql);
	}

    public function getInfo($id)
    {
        global $mysqli;
        $sql = "SELECT * FROM `filmlist` WHERE id = $id;";
        return $mysqli->query($sql);
    }
    public function getList($sort = 'ASC')
    {
        global $mysqli;
        $sql = "SELECT `id`,`Title` FROM `filmlist` ORDER BY `Title` $sort;";
        return $mysqli->query($sql);
    }

    public function searchTitle($search)
    {
        global $mysqli;
        $sql = "SELECT `id`,`Title` FROM `filmlist` WHERE `Title` LIKE '%$search%'";
        return $mysqli->query($sql);
    }
    public function searchStars($search)
    {
        global $mysqli;
        $sql = "SELECT `id`,`Title` FROM `filmlist` WHERE `Stars` LIKE '%$search%'";
        return $mysqli->query($sql);
    }

}

