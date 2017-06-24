  <!-- ***************** --> 
  <!---- C O N T E N T ----> 
  <!-- ***************** --> 
  <div class="game">
		<?php 
			global $conn;
			
			echo "csgo";
			
			/*
			$query = mysqli_query($conn, "SELECT * FROM matches 
					LEFT JOIN tournament ON matches.id_tournament=tournament.id
					LEFT JOIN games ON games.game_id=tournament.game_id
					LEFT JOIN teams ON teams.team_id=matches.id_first_team
					WHERE games.abbr='CSGO'
				");
				
			$query2 = mysqli_query($conn, "SELECT * FROM matches 
					LEFT JOIN tournament ON matches.id_tournament=tournament.id
					LEFT JOIN games ON games.game_id=tournament.game_id
					LEFT JOIN teams ON teams.team_id=matches.id_second_team
					WHERE games.abbr='CSGO'
				");
					
			while ($res = mysqli_fetch_array($query)) {
				$res2 = mysqli_fetch_array($query2);
				echo '
					<ul class="bets">
						<li class="time">'.$res['begin'].'</li>
						<li class="kef1">'.$res['first_coef'].'</li>
						<li class="teams"><img src="img/'.$res['logo'].'" alt=""> '.$res['name'].' - '.$res2['name'].' <img src="img/'.$res2['logo'].'" alt=""></li>
						<li class="kef2">'.$res['second_coef'].'</li>
						<li class="go"><a href="#!">+</a></li>
					</ul>
				';
			};*/
		?>
		
	</div>