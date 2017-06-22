<?php include_once("lib/db.php") ?>
<?php 
	
	if (empty($_POST['login'])) {
		echo "<p>Введите логин</p>";
	}
	elseif (empty($_POST['password'])) {
		echo "<p>Введите пароль</p>";
	}
	else{
		$login = $_POST['login'];
		$login = htmlspecialchars(trim($login));
		$password = $_POST['password'];
		$password = htmlspecialchars(trim($password));
		$password = md5($password);
		$query = mysqli_query($conn,"SELECT * FROM users WHERE login='$login' and password='$password'");
	
		if(mysqli_num_rows($query)>0) {
			$res =  mysqli_fetch_assoc($query);
			$_SESSION['users']=$res;
			echo '<meta http-equiv="refresh" content="0;index.php">';
		}else {
			echo '<p>Логин или пароль был введен неправильно<p>';
		}

	}
	
?>











