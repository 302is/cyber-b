<?php 
	include_once "../lib/config.php";
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	
	$game = $_POST['game'];
	$turnir = $_POST['turnir'];
	$date = $_POST['date'];
	$fTeam = $_POST['fTeam'];
	$sTeam = $_POST['sTeam'];
	$fCoef = $_POST['fCoef'];
	$sCoef = $_POST['sCoef'];
	
	if (empty($turnir)) 
		echo "<p>Заполните название турнира!</p>";
	elseif(empty($date))
		echo "<p>Заполните дату начала турнира!</p>";
	elseif(empty($fTeam) || empty($sTeam))
		echo "<p>Заполните участников!</p>";
	elseif(empty($fCoef) || empty($sCoef))
		echo "<p>Заполните коефиценты команд!</p>";
	else{
		
		$addTurnir = mysqli_query($conn, "INSERT INTO 
					tournament(name, game_id)
					values('$turnir','$game')
		");
		$addMatch = mysqli_query($conn, "INSERT INTO 
					matches(id_tournament, id_first_team, id_second_team,first_coef, second_coef, begin)
					values('$turnir','$fTeam','$sTeam','$fCoef','$sCoef','$date')
		");
		if($addMatch)
			echo "<p style='color:green'>Успешно!</p>";
		else
			echo "<p>Ошибка!</p>";
		
	}
		
		
?>