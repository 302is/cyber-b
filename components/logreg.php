<?php include_once("lib/db.php") ?>
<div>

	<div class="log-block">
		<div class="forma">
			<form method="POST" onsubmit="return false">
				<input type="text" name="login" placeholder="Введите логин">
				<input type="password" name="password" placeholder="Введите пароль">
				<input type="submit" name="log" value="Войти">
				<?php 
					if(isset($_POST['log'])) {
						$login = $_POST['login'];
						$login = htmlspecialchars(trim($login));
						$password = $_POST['password'];
						$password = htmlspecialchars(trim($password));
						$password = md5($password);
						$query = "SELECT * FROM users WHERE login=".$login." and password=".$password;
						
						if(empty($_POST['login'])) {
							echo ' <p>asd</p> ';
						}
					}
				?>
			</form>
		</div>
	</div>

	<div class="reg-block">
		<div class="forma">
			<form method="POST">
				<input type="text" name="name" placeholder="Введите имя" required>
				<input type="email" name="email" placeholder="Введите e-mail" required>
				<input type="text" name="login" placeholder="Введите логин" required>
				<input type="password" name="password" placeholder="Введите пароль" required>
				<input type="password" name="password1" placeholder="Повторите пароль" required>
				<input type="submit" name="reg" value="Зарегистрироваться">
			</form>
		</div>
	</div>
	
	<div class="backdoor"></div>
	
</div>
