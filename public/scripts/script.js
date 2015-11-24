$(document).ready(function(){
	
		//menu items on hover
	$('header ul.mainUl li').hover(function(e){
		$(this).stop().find('ul.subMenuUl').show();
	},function(){
		$(this).find('ul.subMenuUl').hide();
	});
	$('header #menuIcon').click(function(){
		$('header ul.mainUl > li').slideToggle();
	});
	
	// hiding menu and button 
	
	$(window).resize(function(){
	if($(window).width() <= 883){
		$('header ul.mainUl > li').hide();
		$('header #menuIcon').show();
	}	
		else{
		$('header ul.mainUl li').show();
		$('header #menuIcon').hide();
	}
		
	});
	
	//hiding menu on body click
	
	$('body').click(function(){$('ul.subMenuUl').hide();});
	
	//search bar pop up
	$expand = true;
	$('header #search img').click(function(){
		if($expand){
			$('header #search img').animate({right:'0'});
			$('header #search input[type=text]').animate({right:'0'});
			$expand = false;
		}else{
				$('header #search img').animate({right:'-125px'});
				$('header #search input[type=text]').animate({right:'-125px'});
				$expand = true;
		}
	});
	
	//accordion 
	

	$('.accordion h3').click(function(){
		if($(this).next().hasClass('getDown')){
			$(this).next().slideUp().removeClass('getDown');
			$(this).removeClass('arrow_down');
		}
		else{
			$('.accordion .content').slideUp().removeClass('getDown');
			$('.accordion h3').removeClass('arrow_down');
			$(this).addClass('arrow_down');
			$(this).next().slideDown().addClass('getDown');
		}
	});

	
	// changing form when clicking on radio button
	$('.signUpForm #coinSite').click(function(){
		var $this = $(this);
		if($this.is(':checked')){
			$('.signUpForm input[type=text]').hide();
			$('.signUpForm > div').hide();
			$('.signUpForm #coinSiteUrl').show();
			$('.signUpForm p.left').hide();
		}
	});
	$('.signUpForm #reseller').click(function(){
		var $this = $(this);
		if($this.is(':checked')){
			$('.signUpForm input[type=text]').show();
			$('.signUpForm > div').show();
			$('.signUpForm p.left').show();
			$('.signUpForm #coinSiteUrl').hide();
		}
	});
	// selecting payment method
	$('.payment .method > div').click(function(){
		$(this).addClass('active').siblings('div').removeClass('active');
	});
});

