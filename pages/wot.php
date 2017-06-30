  <!-- ***************** --> 
  <!---- C O N T E N T ----> 
  <!-- ***************** --> 

<ul class="bets">
	<li class="time">Начало</li>
	<li class="kef1">Коэф.</li>
	<li class="teams">Противостояние</li>
	<li class="kef2">Коэф</li>
	<li class="go">Ставка</li>
</ul>
  
  <div class="game">
		<?php 
			include_once "../lib/config.php";
			$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
			
			$query = mysqli_query($conn, "SELECT * FROM matches 
					LEFT JOIN tournament ON matches.id_tournament=tournament.id
					LEFT JOIN games ON games.game_id=tournament.game_id
					LEFT JOIN teams ON teams.team_id=matches.id_first_team
					WHERE games.name='World of Tanks'
					ORDER BY begin ASC
					");
					
			$query2 = mysqli_query($conn, "SELECT * FROM matches 
					LEFT JOIN tournament ON matches.id_tournament=tournament.id
					LEFT JOIN games ON games.game_id=tournament.game_id
					LEFT JOIN teams ON teams.team_id=matches.id_second_team
					WHERE games.name='World of Tanks'
					ORDER BY begin ASC
					");
					
			while ($res = mysqli_fetch_array($query)) {
				$res2 = mysqli_fetch_array($query2);
				$date = strtotime($res['begin']);
				$time = date('d M, H:i', $date);
				echo '
					<ul class="bets">
						<li class="time">'.$time.'</li>
						<li class="kef1">'.$res['first_coef'].'</li>
						<li class="teams"><img src="img/'.$res['logo'].'" alt=""> '.$res['name'].' - '.$res2['name'].' <img src="img/'.$res2['logo'].'" alt=""></li>
						<li class="kef2">'.$res['second_coef'].'</li>
						<li class="go"><a href="bet?match='.$res['match_id'].'">+</a></li>
					</ul>
				';
			};

		?>
		
	</div>