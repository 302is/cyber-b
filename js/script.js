$(window).ready(function(){
    
	var login = $(".login"),
			reg = $(".reg"),
			block = $(".block"),
			backdoor = $(".backdoor");
			
	login.on("click", function(){
		block.css("display","flex")
	})
	
	backdoor.on("click", function(){
		block.css("display","none");
		$("input[name='login']").val("");
		$("input[name='password']").val("");
	})
    
})

