<?php include_once("components/header.php"); ?>
<!-- ***************** --> 
<!---- C O N T E N T ----> 
<!-- ***************** --> 
<?php
	$id = $_SESSION['users']['id'];
	$query = mysqli_query($conn, "SELECT * FROM bets WHERE user_id='$id'");
	$bets = mysqli_fetch_array($query);
?>
<div class="content">
	<div class="wrap">
		<h2><? echo $_SESSION['users']['name'] ?></h2>
		<span>Пополнить счет</span>
	</div>
</div>
<script>
	$("a[href='index']").click(function(){
		location.href = 'index';
	});	
	$(".category img").click(function(){
		location.href = 'index';
		var page = $(this).attr('src'),
			reImg = page.replace('img/',''),
			rePng = reImg.replace('.png','');
			
			$(".wrapper").load('pages/' + rePng);
			return false;
	});
</script>
<?php include_once("components/footer.php") ?>		
		

