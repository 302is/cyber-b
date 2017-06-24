<?php include_once("lib/db.php");?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<meta name='viewport' content="width=device-width, initial-scale=1">
	<title>Cyber-B | Ставки на киберспорт</title>
	<link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width" />
	<script src="js/jquery.js"></script>	
</head>
<body>
	
  <!-- ***************** --> 
  <!----- H E A D E R -----> 
  <!-- ***************** --> 
		<div class="header">
			<div class="logo">
				<img src="img/logo.png" alt="">
			</div>
			<div class="nav">
				<a class="nav-item" href="index">Главная</a>
				<a class="nav-item" href="#!">Ставки</a>
				<a class="nav-item" href="#!">Результаты</a>
				<a class="nav-item" href="#!">LIVE</a>
				<a class="nav-item" href="#!">Партнеры</a>
				<?php
					if(!$_SESSION['users']) {
					echo '
					<a class="nav-item login" href="#!">Вход</a>
					<a class="nav-item reg" href="#!">Регистрация</a>
					';
					}
					elseif($_SESSION['users']['role_id'] == 1){
					echo '
					<a class="nav-item" href="profile?id='.$_SESSION['users']['id'].'">'.$_SESSION['users']['name'].' | Счет : '.$_SESSION['users']['bank'].'тг</a>
					<a class="nav-item" href="pages/adminPanel">Админ-панель</a>
					<a class="nav-item" href="index?exit=1">Выйти</a>
					';
					}
					else {
					echo '
					<a class="nav-item" href="profile?id='.$_SESSION['users']['id'].'">'.$_SESSION['users']['name'].' | Счет : '.$_SESSION['users']['bank'].'тг</a>
					<a class="nav-item" href="index?exit=1">Выйти</a>
					';
					}
					
					if($_GET['exit']==1) {
						unset($_SESSION['users']);
						echo '<meta http-equiv="refresh" content="0;index">';
					}
				?>
			</div>
			<div class="category">
				<img src="img/csgo.png" alt="">
				<img src="img/dota2.png" alt="">
				<img src="img/ow.png"alt="">
				<img src="img/wot.png" alt="">
			</div>
		</div>
		