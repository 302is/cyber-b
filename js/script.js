$(document).ready(function(){
    
	var login = $(".login"),
			reg = $(".reg"),
			logBlock = $(".log-block"),
			regBlock = $(".reg-block"),
			backdoor = $(".backdoor"),
			logSubmit = $("input[name='log']"),
			regSubmit = $("input[name='reg']");
			
	login.on("click", function(){
		backdoor.fadeIn("slow");
		logBlock.fadeIn("fast");
	})

    reg.on("click", function(){
		backdoor.fadeIn("slow");
		regBlock.fadeIn("fast");
	})
	
	backdoor.on("click", function(){
		regBlock.fadeOut("fast");
		logBlock.fadeOut("fast");;
		backdoor.fadeOut("slow");
		$("input[name='login']").val("");
		$("input[name='name']").val("");
		$("input[name='email']").val("");
		$("input[name='password']").val("");
		$("input[name='password1']").val("");
		$("input[name='password2']").val("");
		$(".error").html("");
	})
	
	$(document).keyup(function (e) {
		if(e.which == 13 && logBlock.css("display") !== "none") 
			logSubmit.click();
		if(e.which == 13 && regBlock.css("display") !== "none") 
			regSubmit.click();		
	});
		
	logSubmit.click(function(){
		var login = $("input[name='login']").val(),
			password = $("input[name='password']").val();
	
		$.ajax({
			type: "POST",
			data: {
				login: login, 
				password: password
			},
			url: "../auth.php",
			success: function(data){
				$(".error").html(data)
			}
		})
		
	})
	
	regSubmit.click(function(){
		var name = $("input[name='name']").val(),
			email = $("input[name='email']").val(),
			login1 = $("input[name='login1']").val(),
			password1 = $("input[name='password1']").val(),
			password2 = $("input[name='password2']").val();
	
		$.ajax({
			type: "POST",
			data: {
				name: name, 
				email: email,
				login1: login1,
				password1: password1,
				password2: password2
			},
			url: "../reg.php",
			success: function(data){
				$(".error").html(data)
			}
		})
		
	})

	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	$(".wrapper").load("home");
	
	$("a[href='index']").click(function(){
		$(".wrapper").load("home");
		return false;
	});
	
	$("a[href='pages/adminPanel']").click(function(){
		$(".wrapper").load("pages/adminPanel");
		return false;
	});
	
	$(".category img").click(function(){
		var page = $(this).attr('src'),
			reImg = page.replace('img/',''),
			rePng = reImg.replace('.png','');
			
			$(".wrapper").load('pages/' + rePng);
			return false;
	});
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

});
