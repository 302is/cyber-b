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
    
});

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

