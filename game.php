<?php include_once("components/header.php") ?>
  <!-- ***************** --> 
  <!---- C O N T E N T ----> 
  <!-- ***************** --> 
		<div class="content">
		<br><br>
		
		<?php 
			global $conn;
			$game = $_GET['name'];
			switch ($game) {
				case "csgo":
					$query = mysqli_query($conn, "SELECT * FROM matches 
							LEFT JOIN tournament ON matches.id_tournament=tournament.id
							LEFT JOIN games ON games.game_id=tournament.game_id
							LEFT JOIN teams ON teams.team_id=matches.id_first_team
							WHERE games.game_id=1
							");
							
					while ($res = mysqli_fetch_array($query)) {
						echo '
							<ul class="bets">
								<li class="time">11:00</li>
								<li class="kef1">'.$res['first_coef'].'</li>
								<li class="teams"><img src="img/'.$res['teams.name'].'" alt=""> Gambit - Virtus.Pro <img src="img/VP.png" alt=""></li>
								<li class="kef2">2.15</li>
								<li class="go"><a href="#!">+</a></li>
							</ul>
						';
					}
					break;
				case "dota2":
				
					break;
				case "ow":
				
					break;
					
				case "wot":
				
					break;
			}
		?>
					
		</div>
		
<?php include_once("components/footer.php") ?>	