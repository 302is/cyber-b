<?php include_once("lib/db.php") ?>
<?php 
	if (empty($_POST['name'])) {
		echo "<p>Введите имя</p>";
	}
	elseif (empty($_POST['email'])) {
		echo "<p>Введите email</p>";
	}
	elseif (empty($_POST['login'])) {
		echo "<p>Введите логин</p>";
	}
	elseif (empty($_POST['password'])) {
		echo "<p>Введите пароль</p>";
	}
	elseif (empty($_POST['password1'])) {
		echo "<p>Повторите пароль</p>";
	}

	
	
?>











