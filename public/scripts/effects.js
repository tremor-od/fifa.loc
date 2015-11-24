		
$(document).ready(function(){
	
	/* variables */
	var $bgsound = new Audio('sounds/jungle_bussy.mp3');
	var $bodyClick = new Audio('sounds/tick.mp3');
	var $selectedCard = new Audio('sounds/magic_whoosh.mp3');
	$playersNumber = 0;
	
	// click sound
	
	$('body').click(function(){$bodyClick.play();});
	
	// rotate function	
	
	jQuery.fn.rotate = function (degrees) {
		jQuery(this).css({
			'-webkit-transform': 'rotate(' + degrees + 'deg)',
			'-moz-transform': 'rotate(' + degrees + 'deg)',
			'-ms-transform': 'rotate(' + degrees + 'deg)',
			'transform': 'rotate(' + degrees + 'deg)'
		});
		return jQuery(this);
	};
	rotation = 0;
	rotationTimer = setInterval(function () {
                rotation += 1;
                jQuery('.selectedPlayer #circle').rotate(rotation);
                
     }, 20);
	
	// volume of bg music 
	
	$bgsound.volume = 0.05;
	$('body').addClass('off');
	
	// expand effect on hover 
	
	$(".tots .card").each(function() {
                    $(this).stop().mouseover(function(){ 
						$this = $(this);
						$('p',$this).css({fontSize:'15px'});
						$('.leftFloat', $this).css({marginTop:'5px'});
						$('.rightFloat', $this).css({marginTop:'5px'});
					    $this.addClass('expand').css({opacity:'1'});
						$this.stop().parent('.border').addClass('borderBack');
                  }).mouseout(function(){
						$('.rightFloat', $this).css({marginTop:'3px'});
						$('.leftFloat', $this).css({marginTop:'3px'});
						$('.card p').css({fontSize:'13px'});
					   $this.removeClass('expand');	$this.stop().parent('.border').removeClass('borderBack');
                  });
     });
	
	// sound effect on hover 
	$(".tots .card").mouseenter(function() {
		var $hoverSound = new Audio('sounds/click.mp3');
		$hoverSound.play();
    });
	
     // loading players
	
			iCount = 0;
			var $load = setInterval(function(){
				var $cardsWoosh = new Audio('sounds/woosh.mp3');
				$('.players .border:nth-child('+iCount+') .card').fadeIn();	
				$cardsWoosh.play();
				if(iCount == 11){clearInterval($load);}
				iCount++;
			},100);

	
	//on click stop rotate and coins 
	
	$('.selectedPlayer .border').click(function(){
			clearInterval(rotationTimer);
			coinCounter = 1000;
			$('.selectedPlayer #circle').fadeOut('slow');
	});
	
	// adding glow
	
	setInterval(function(){
		$('.selectedPlayer .border').removeClass('noshine').addClass('shine');
		setTimeout(function(){
			$('.selectedPlayer .border').removeClass('shine').addClass('noshine');
		},500);
		
	},7000);
	
	// positions for desktop for main card
	
	$landingSpot = '0px';
	$marginLeft = '0';
	$topSpot = '210px';
	
	if($(window).width() <= 688){ // if it is smaller than load position for mobile
		$landingSpot = '50%';
		$topSpot = '150px';
		$marginLeft = '-70px';
	}
	
     // animate selected card
	
	setTimeout(function(){
			$('body').removeClass('off');
			$clone = $(' .selectedPlayer .mainCard').clone();
			$clone.appendTo('.selectedPlayer').css({
			position:'absolute',
			left:'45%',
			top:'50px',
			zIndex:999
			
			}).fadeIn(1000,function(){$selectedCard.play();}).animate({left:$landingSpot,top:$topSpot,marginLeft:$marginLeft},1000,function(){
			$bgsound.play();
			$('.selectedPlayer .mainCard , .selectedPlayer .mainCard .card ').css({display:"block"});
			$('body').addClass('off');
		}).fadeOut().removeClass('mainCard');
		$clone.find('.card').empty().css({
			backgroundImage:"url(images/golden-15.png)",
			display:"block",
		});
		},2000);
	
	
	//	loading coins
	
	function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
	finalAmt = Math.floor((Math.random() * 10000) + 1);
	cv = 500;
	coinCounter = 3;
	$('.selectedPlayer #coins').text(numberWithCommas($('.selectedPlayer #coins').text()));
    coinTimer = setInterval(function () {
        var cv = $('.selectedPlayer #coins').data('coins');
        if (cv != finalAmt) {
            if (finalAmt > cv) {
                cv += coinCounter;
				
				
            } else {
                cv -= coinCounter;
            }
            if (Math.abs(finalAmt - cv) < coinCounter) {
                cv = finalAmt;
            }
            $('.selectedPlayer #coins').data('coins', cv);
            $('.selectedPlayer #coins').text(numberWithCommas(cv));
        } else {
			clearInterval(rotationTimer);
            clearInterval(coinTimer);
			$('.selectedPlayer #circle').fadeOut('slow');
        }
    }, 1);
});