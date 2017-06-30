<!-- ***************** --> 
<!---- C O N T E N T ----> 
<!-- ***************** --> 
<div class="content">
	<div class="block1">
		<div class="slider">
			<div id='items'>
				<div class='item first'><img src="img/slider1.jpg" alt=""></div>
				<div class='item'><img src="img/slider2.jpg"/></div>
				<div class='item'><img src="img/slider3.jpg"/></div>
				<div class='item'><img src="img/slider4.jpg"/></div>
				
				<ul id='controls'>
					<li id='prev'><img src="img/prev.png" alt=""></li>
					<li id='play'><img src="img/play.png" alt=""></li>
					<li id='pause'><img src="img/pause.png" alt=""></li>
					<li id='next'><img src="img/next.png" alt=""></li>
				</ul>
			</div>
		</div>
		
		<div class="box">
		<h2>Удобные способы пополнения и снятия денег</h2>
		<a href="#!"><div>ПОДРОБНЕЕ</div></a>
		</div>
	</div>
	
	<div class="block2">
	
		<div class="box1">
		s
		</div>
		
		<div class="box2">
			<div class="box3">
				<a href="#!">
					<h2>Матчи LIVE</h2>
					<img src="img/twitch.png" alt="LIVE">
				</a>
			</div>
			
		</div>
		

	</div>
</div>	
<script>	
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
	$('body #prev').click(function() {

		//slideImage with step = -1
		slideImage ( -1 );   
	});
	   
	//When clicked on next
	$('body #next').click(function() {
			
		 //slideImage with step = 1
		 slideImage ( 1 );
	});
					 
	//When clicked on Pause
	$('body #pause').click(function() {

	   //Clear timeout
	   clearTimeout ( timeoutId );    
		
		//Hide Pause and show Play
		$(this).hide();
		$('body #play').show();
	});

	//When clicked on Play
	$('body #play').click(function() {
	   
	   //Start slide image
	   slideImage(0);

	   //Hide Play and show Pause
	   $(this).hide();
	   $('body #pause').show();    
	});
</script>
		

