<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/style/normalize.css">
    <link rel="stylesheet" href="/style/sign_up.css">
    <title>Ninja</title>
</head>
<body>
   <div class="wrapper">
		<header>
        <div class="container">
         <div id="menuIcon">
          <img  src="/images/menuBlack.png" alt="menu">
         	Navigation
         </div>
           <div class="myAccount">
               <img src="/images/in_door_icon.png" alt="icon"> 
               MY ACCOUNT
           </div><!-- account -->
            <a href="/">
                <img id="logo" src="/images/LOGO.png" alt="logo">
            </a>
            <nav>
                <div id="search">
                	<img src="/images/search_icon.png" alt="search">  
                	<input type="text" placeholder="Search ...">
                </div>
                
                <ul class="mainUl">
                    <li><a href="#">PRODUCT 1</a>
                    	<ul class="subMenuUl">
                    		<li><a href="#">Item 1</a></li>
                    	</ul>
                    </li>
                    <li><a href="#">PRODUCT 2</a>
                    	<ul class="subMenuUl">
                    		<li><a href="#">Item 1</a></li>
                    	</ul>
                    </li>
                    <li><a href="#">PRODUCT 3</a>
                    	<ul class="subMenuUl">
                    		<li><a href="#">Item 1</a></li>
                    	</ul>
                    </li>
                    <li><a href="#">GET TO KNOW US!</a>
                    	<ul class="subMenuUl">
                    		<li><a href="#">Item 1</a></li>
                    	</ul>
                    </li>
                </ul>
            </nav>        
        </div><!-- container -->
    </header>
       {{ $messages }}
		<div class="container"><h1>MY ACCOUNT</h1></div>
		<div class="loginSignUp container">
			<div class="login">
                {{--{{$messages}}--}}
                {{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@login')) }}
					<h2>LOGIN</h2>
					<p>Welcome back!</p>
					<div class="loginForm">
						{{--<input type="text" placeholder="Your email">--}}
                        {{ Form::email('email', null, ['placeholder' => 'Your email']) }}
                        {{ Form::text('password', null, ['placeholder' => 'Your password', 'autocomplete' => 'off']) }}
						{{--<input type="text" placeholder="Your password">--}}
					</div><!-- login form -->
					<p><a href="/auth/forgot">Forgot your password?</a></p>
					{{--<a href="#">LOGIN</a>--}}
                {{ Form::submit("LOGIN", ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
			</div><!-- login -->
			<div class="signUp">
				<h2>WANNA JOIN US?</h2>
				<p>Easy! Just fill the info down here</p>
				<div class="signUpForm">
                    {{ Form::open(array('class' => 'form-horizontal', 'action' => 'AuthController@registration')) }}
					<p class="blackBox">
                        <label><input id="coinSite" type="radio"  name="stage1"/><span></span></label>
                        <label for="coinSite">Coin site</label>
                    </p>
					<p class="blackBox right">
                        <label><input checked="checked" id="reseller" type="radio"  name="stage1"/><span></span></label>
                        <label for="reseller">Reseller</label>
                    </p>

                    {{ Form::text('coin_site', null, ['placeholder' => 'Coin site url', 'id' => 'coinSiteUrl']) }}
                    {{ Form::text('company_name', null, ['placeholder' => 'Company name']) }}
                    {{ Form::text('company_address', null, ['placeholder' => 'Company address']) }}
                    {{ Form::text('vat_no', null, ['placeholder' => 'VAT No.']) }}
                    {{ Form::text('phone', null, ['placeholder' => 'Contact Phone']) }}
                    {{ Form::email('email', null, ['placeholder' => 'Email']) }}
                    {{ Form::text('skype', null, ['placeholder' => 'Skype contact']) }}
                    {{ Form::text('qq_number', null, ['placeholder' => 'QQ Number']) }}
					<p class="left">Preferred payment methods:</p>

                    @foreach($paymentList as $pay)
                        <p>
                            <label>
                                {{ Form::radio('pay_id', $pay->id, null, ['id' => $pay->name.'Radio']) }}
                                <span></span>
                            </label>
                            <label for="{{$pay->name}}Radio"><img src="{{$pay->image}}" alt="{{$pay->name}}"></label>
                        </p>
                    @endforeach

                    {{ Form::submit("SIGN UP", ['class' => 'btn btn-primary']) }}
                    {{ Form::close() }}
				</div><!-- sign up form -->
			</div><!-- sign up -->
			
		</div><!-- login and sign up -->
	<footer>
		<div class="container">
			<ul class="mainList">
				<li>
					<h3>FOLLOW US ON TWITTER!</h3>
					<img src="/images/twt.png" alt="twitter">
				</li>
				<li>
					<h3>PRODUCTS</h3>
				   <div class="products">
						<img src="/images/picHolder.png" alt="pic holder">
						<p>PRODUCT DESCRIPTION <br><span>&pound;00.00 GBP</span></p>
				   </div>
				   <div class="products">
						<img src="/images/picHolder.png" alt="pic holder">
						<p>PRODUCT DESCRIPTION <br><span>&pound;00.00 GBP</span></p>
				   </div>
				</li>
				<li>
					<h3>GET TO KNOW US!</h3>
					<ul class="loremIpsumList">
						<li>LOREM IPSUM</li>
						<li>LOREM IPSUM</li>
						<li>LOREM IPSUM</li>
						<li>LOREM IPSUM</li>
						<li>LOREM IPSUM</li>
					</ul>
					<h3>STAY IN TOUCH</h3>
					<img src="/images/f.png" alt="facebook">
					<img src="/images/t.png" alt="twitter">
					<img src="/images/g.png" alt="google">
					<img src="/images/y.png" alt="youtube">
				</li>
			</ul>
		</div><!-- container -->
	</footer>
	<div class="copyright">
	   <div class="container">
			<img src="/images/pay.png" alt="pay">
			<p>&copy; 2014 - 15 Ninja Pack Luck | All Rights Reserved</p>
	   </div><!-- container -->
	</div><!-- copyright -->
</div><!-- wrapper -->
	<script type="text/javascript" src="/scripts/jquery.js"></script>
	<script type="text/javascript" src="/scripts/script.js"></script>
</body>
</html>