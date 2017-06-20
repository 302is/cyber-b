$(window).ready(function(){
    
	var login = $(".login"),
			reg = $(".reg"),
			logBlock = $(".log-block"),
			regBlock = $(".reg-block"),
			backdoor = $(".backdoor");
			
	login.on("click", function(){
		logBlock.css("display","flex")
	})

    reg.on("click", function(){
		regBlock.css("display","flex")
	})
	
	backdoor.on("click", function(){
		regBlock.css("display","none");
		logBlock.css("display","none");
		$("input[name='login']").val("");
		$("input[name='email']").val("");
		$("input[name='password']").val("");
		$("input[name='password1']").val("");
	})
    
})

