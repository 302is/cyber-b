<?php include_once("components/header.php") ?>

<!-- ***************** --> 
<!---- C O N T E N T ----> 
<!-- ***************** --> 
<div class="content">
<?php
	$match = $_GET['match'];
	
	$query = mysqli_query($conn, "SELECT * FROM matches 
	LEFT JOIN tournament ON matches.id_tournament=tournament.id
	LEFT JOIN games ON games.game_id=tournament.game_id
	LEFT JOIN teams ON teams.team_id=matches.id_first_team
	WHERE match_id='$match'
	");
	$query2 = mysqli_query($conn, "SELECT * FROM matches 
			LEFT JOIN tournament ON matches.id_tournament=tournament.id
			LEFT JOIN games ON games.game_id=tournament.game_id
			LEFT JOIN teams ON teams.team_id=matches.id_second_team
			WHERE match_id='$match'
	");
	$res = mysqli_fetch_array($query);
	$res2 = mysqli_fetch_array($query2);
?>
<div class="wrap">
	<h2>Турнир : <?php echo $res['title'] ?></h2>
		<br>
	<form method="POST">
		<span class="coef" style="color: #FF8C00;"><?php echo $res['first_coef'] ?></span>
		<input type="radio" name="team" id="team1" value="1">
		<label for="team1"><?php echo $res['name'] ?></label>
			
		<input type="radio" name="team" id="team2" value="2">
		<label for="team2"><?php echo $res2['name'] ?></label>
		<span style="margin-left:20px; color: #FF8C00;"><?php echo $res['second_coef'] ?></span>
			<br><br>
		<input type="text" placeholder=" Сумма" name="bank" pattern="^[ 0-9]+$">
		<input type="submit" value="Поставить ставку" name="submit">
	</form>
<br>
<?php
	if(isset($_POST['submit'])) {
		
		//config
		$user_id = $_SESSION['users']['id'];
		$match_id = $res['match_id'];
		$bank = $_POST['bank'];
		$bank = htmlspecialchars(trim($bank));
		
		if(empty($_POST['team'])) {
			echo '<p class="error">Выберите команду</p>';
		}
		elseif(empty($bank)) {
			echo '<p class="error">Введите сумму для ставки</p>';
		}
		elseif ($_SESSION['users']['bank']<$bank) {
			echo '<p class="error">У вас недостаточно средств</p>';
		}
		else {
			if($_POST['team']=="1") {
				$team_id = $res['team_id'];
				$coef = $res['first_coef'];
			}
			else {
				$team_id = $res2['team_id'];
				$coef = $res['second_coef'];
			}
			$_SESSION['users']['bank'] = $_SESSION['users']['bank'] - $bank;
			$user_bank = $_SESSION['users']['bank'];
			
			mysqli_query($conn, "UPDATE users SET bank = '$user_bank' WHERE id = '$user_id'");
			mysqli_query($conn, "INSERT INTO bets(match_id, team_id, user_id, coef, bank)
				VALUES('$match_id', '$team_id', '$user_id', '$coef', '$bank')");
			echo '<meta http-equiv="refresh" content="0">';
			echo '<p style="color:green">Ставка успешно поставлена</p>';
		}
	}

?>
</div>
<script>
	$("a[href='index']").click(function(){
		location.href = 'index';
	});	
	$(".category img").click(function(){
		location.href = 'index';
		var page = $(this).attr('src'),
			reImg = page.replace('img/',''),
			rePng = reImg.replace('.png','');
			
			$(".wrapper").load('pages/' + rePng);
			return false;
	});
</script>
</div>
<?php include_once("components/footer.php") ?>		
		

