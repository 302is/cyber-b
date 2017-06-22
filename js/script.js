$(window).ready(function(){
    
	var login = $(".login"),
			reg = $(".reg"),
			logBlock = $(".log-block"),
			regBlock = $(".reg-block"),
			backdoor = $(".backdoor"),
			submit = $("input[type='button']");
			
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
		$("input[name='email']").val("");
		$("input[name='password']").val("");
		$("input[name='password1']").val("");
		$(".error").html("");
	})
	
	$(document).keyup(function (e) {
		if(e.which == 13 && logBlock.css("display") !== "none") 
			submit.click();
		if(e.which == 13 && regBlock.css("display") !== "none") 
			submit.click();		
	});
		
	submit.click(function(){
		var login = $("input[name='login']").val(),
			password = $("input[name='password']").val();
	
		$.ajax({
			type: "POST",
			data: {
				login: login, 
				password: password
			},
			url: "../check.php",
			success: function(data){
				$(".error").html(data)
			}
		})
		
	})
	
	
	//To store timeout id
	$('#play').hide();
	var timeoutId;

	var slideImage = function( step ) {
		
		if ( step == undefined ) step = 1;
		
		//Clear timeout if any
		clearTimeout ( timeoutId );
		
		//Get current image's index
		var indx = $('.item:visible').index('.item');
		
		//If step == 0, we don't need to do any fadein our fadeout
		if ( step != 0 ) {
		   //Fadeout this item
		   $('.item:visible').fadeOut();
		}
		
		//Increment for next item
		indx = indx + step ;
		
		//Check bounds for next item
		if ( indx >= $('.item').length ) {
			indx = 0;
		} else if ( indx < 0 ) {
			indx = $('.item').length - 1;
		}
		
		//If step == 0, we don't need to do any fadein our fadeout
		if ( step != 0 ) {
		   //Fadein next item
		   $('.item:eq(' + indx + ')').fadeIn();
		}
		
		//Set Itmeout
		timeoutId = setTimeout ( slideImage, 5000 );
	};

	//Start sliding
	slideImage(0);

	//When clicked on prev
	$('#prev').click(function() {

		//slideImage with step = -1
		slideImage ( -1 );   
	});
	   
	//When clicked on next
	$('#next').click(function() {
			
		 //slideImage with step = 1
		 slideImage ( 1 );
	});
					 
	//When clicked on Pause
	$('#pause').click(function() {

	   //Clear timeout
	   clearTimeout ( timeoutId );    
		
		//Hide Pause and show Play
		$(this).hide();
		$('#play').show();
	});

	//When clicked on Play
	$('#play').click(function() {
	   
	   //Start slide image
	   slideImage(0);

	   //Hide Play and show Pause
	   $(this).hide();
	   $('#pause').show();    
	});


	
});
