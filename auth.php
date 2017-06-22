<?php include_once("components/header.php") ?>
<?php include_once("lib/db.php");?>
  <!-- ***************** --> 
  <!---- C O N T E N T ----> 
  <!-- ***************** --> 
		<div class="content">
		<br><br>
			<div class="log-block">
				<div class="forma">
					<form method="POST">
						<input type="text" name="login" placeholder="Введите логин" required>
						<input type="password" name="password" placeholder="Введите пароль" required>
						<input type="submit" name="log" value="Войти">
					
		<?php 
			if(isset($_POST['log'])) {
				global $conn;
				$login = $_POST['login'];
				$login = htmlspecialchars(trim($login));
				$password = $_POST['password'];
				$password = htmlspecialchars(trim($password));
				$password = md5($password);
				$query = mysqli_query($conn,"SELECT * FROM users WHERE login='$login' and password='$password'");
			
				if(mysqli_num_rows($query)>0) {
					$res = mysqli_fetch_assoc($query);
					$_SESSION['users']=$res;
					echo '<meta http-equiv="refresh" content="0;index.php">';
				}
				else {
					echo '<p class="error">Логин или пароль был введен неправильно</p>';
				}
			}
		?>
					</form>
				</div>
			</div>
		</div>
		
<?php include_once("components/footer.php") ?>	