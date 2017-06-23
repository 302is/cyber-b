<?php include_once("lib/db.php") ?>
<?php 
	if (empty($_POST['name'])) 
		echo "<p>Введите имя</p>";
		
	elseif (empty($_POST['login1']))
		echo "<p>Введите логин</p>";
		
	elseif (empty($_POST['email'])) 
		echo "<p>Введите email</p>";
		
	elseif (empty($_POST['password1'])) 
		echo "<p>Введите пароль</p>";
		
	elseif (empty($_POST['password2'])) 
		echo "<p>Повторите пароль</p>";
	
	elseif($_POST['password1'] !== $_POST['password2'])
		echo "<p>Пароли не совпадают!</p>";
	
	else{
		$login = $_POST['login1'];
		$login = htmlspecialchars(trim($login));
		$email = $_POST['email'];
		$email = htmlspecialchars(trim($email));
		
		$query = mysqli_query($conn,"SELECT * FROM users WHERE login = '$login' or email = '$email'");

		if(mysqli_num_rows($query) > 0) {
			echo "<p>Такой пользователь уже существует!</p>";
		}
		else{
			$name = $_POST['name'];
			$name = htmlspecialchars(trim($name));
			$password = $_POST['password1'];
			$password = htmlspecialchars(trim($password));
			$passwordmd5 = md5($password);
			$bank = 500;
			
			mysqli_query ($conn, "INSERT INTO users (name, login, email, password, bank, role_id) 
								VALUES ('$name', '$login', '$email', '$passwordmd5', '$bank', 2)
								");
			echo "<p style='color: green'>Вы успешно зарегистрированы</p>";
			
		}
		
	}
	
	
	
?>











