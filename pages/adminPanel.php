<?
	include_once "../lib/config.php";
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>
<!-- ********************** --> 
<!---- A D M I N _ P A N E L ---> 
<!-- ********************** --> 
<div class="adminPanel">

	<div class="block">
		<form method="POST">
			<h1>Матчи</h1>
			<label for="count">Добавить 
				<select id="count">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</label>
			<label for="game">Выберите игру:
				<select id="game" name="game">
					<?php
						$game = mysqli_query($conn, "SELECT * FROM games");
						while($gameArr = mysqli_fetch_array($game)){
							echo '
								<option>'.$gameArr['name'].'</option>
							';
						}		
					?>
				</select>
			</label>
			<label for="turnir">Назовите турнир
				<input id="turnir" name="turnir" type="text">
			</label>
			<ul class="bet">
				<li class="date">
					<input name="date" type="date">
				</li>
				<li class="coef"><input name="fCoef" type="text"></li>
				<li class="teams">
					<select name="fTeam">
						<?php
							$fTeam = mysqli_query($conn, "SELECT * FROM teams");
							while($fTeamArr = mysqli_fetch_array($fTeam)){
								echo '
									<option>'.$fTeamArr['name'].'</option>
								';
							}		
						?>
					</select>
					-
					<select name="sTeam">
						<?
							$sTeam = mysqli_query($conn, "SELECT * FROM teams");
							while($sTeamArr = mysqli_fetch_array($sTeam)){
								echo '
									<option>'.$sTeamArr['name'].'</option>
								';
							}		
						?>
					</select>
				<li class="coef"><input name="sCoef" type="text"></li>
				<li name="addMatch" class="addMatch">+</li>
			</ul>
			<div class="msg"></div>	
		</form>
	</div>
	
	<div class="block">
	
		<form method="POST">
			<table>
				<?
					$users = mysqli_query($conn, "SELECT * FROM users");
					while($usersArr = mysqli_fetch_array($users)){
						echo '
							<tr>
								<td>'.$usersArr['name'].'</td>
							</tr>
						';
					}		
				?>
			</table>
		</form>
	
	</div>
	
	
</div>
<!---S C R I P T -->
<script>
	
	$("li[name='addMatch']").on("click", function(){
		var game = $("input[name='game']").val(),
			turnir = $("input[name='turnir']").val(),
			date = $("input[name='date']").val(),
			fTeam = $("select[name='fTeam']").val(),
			sTeam = $("select[name='sTeam']").val(),
			fCoef = $("input[name='fCoef']").val(),
			sCoef = $("input[name='sCoef']").val();
	
		$.ajax({
			type: "POST",
			url: "../pages/phpFunc",
			data: {
				game: game,
				turnir: turnir,
				date: date,
				fTeam: fTeam,
				sTeam: sTeam,
				fCoef: fCoef,
				sCoef: sCoef
			},
			success: function(data){
				$(".msg").html(data);
			}
		});		
		
	})
	
	
	$("#count").change(function () {
		$("#count option").each(function() {
		
		});
	}).change();
</script>	


