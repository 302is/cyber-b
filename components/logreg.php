<?php include_once("lib/db.php") ?>
<div>

	<div class="log-block">
		<div class="forma">
			<form method="POST">
				<input type="text" name="login" placeholder="Введите логин">
				<input type="password" name="password" placeholder="Введите пароль">
				<input type="button" name="log" value="Войти">
				<div class="error"></div>
			</form>
		</div>
	</div>

	<div class="reg-block">
		<div class="forma">
			<form method="POST">
				<input type="text" name="name" placeholder="Введите имя">
				<input type="email" name="email" placeholder="Введите e-mail">
				<input type="text" name="login" placeholder="Введите логин">
				<input type="password" name="password" placeholder="Введите пароль">
				<input type="password" name="password1" placeholder="Повторите пароль">
				<input type="button" name="reg" value="Зарегистрироваться">
				<div class="error"></div>	
			</form>
		</div>
	</div>
	
	<div class="backdoor"></div>
	
</div>
