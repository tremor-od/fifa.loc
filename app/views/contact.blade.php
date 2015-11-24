<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/contact.css">
    <title>Ninja</title>
</head>
<body>
   <div class="wrapper">
		    <header>
        <div class="container">
         <div id="menuIcon">
          <img  src="images/menuBlack.png" alt="menu">
         	Navigation
         </div>
           <div class="myAccount">
               <img src="images/in_door_icon.png" alt="icon"> 
               MY ACCOUNT
           </div><!-- account -->
            <a href="/">
                <img id="logo" src="images/LOGO.png" alt="logo">
            </a>
            <nav>
                <div id="search">
                	<img src="images/search_icon.png" alt="search">  
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
		<div class="container"><h1>CONTACT US</h1></div>
		<div class="contactUsSection">
			<div class="container">
					<h2>WE&#8217;VE GOT YOUR BACK!</h2>

<p>Feel free to contact us with your questions about any aspect of our service or any general requests using the form below.</p>
<p>You can also contact us using social media but <a href="#">if your issue is account or order related then please raise a support ticket</a> from within your account page or visit our help page for further details.</p>
			<div class="balloon">
				<p>We are an automated 24/7 business and our customer services department will seek to respond to you straight away.</p>

				<p>Please note that the response time can vary during peak hours. We will however always respond to you within 24 hours</p>
			</div><!-- balloon -->
			<div class="contactForm">
                {{ Form::open(array('action' => 'HomeController@contact')) }}
                    <div>
                        <input type="text" name="name" required placeholder="Your name (Required)">
                        <input type="email" name="email" required placeholder="Your email (Required)">
                        <input type="text" name="subject" placeholder="Subject">
                    </div>
                    <textarea name="message" placeholder="Messsage"></textarea>
                    <input type="submit" value="SEND">
                {{ Form::close() }}
			</div><!-- contact form -->
			</div><!-- container -->
		</div><!-- contact us section -->
	<footer>
		<div class="container">
			<ul class="mainList">
				<li>
					<h3>FOLLOW US ON TWITTER!</h3>
					<img src="images/twt.png" alt="twitter"> 
				</li>
				<li>
					<h3>PRODUCTS</h3>
				   <div class="products">
						<img src="images/picHolder.png" alt="pic holder">
						<p>PRODUCT DESCRIPTION <br><span>&pound;00.00 GBP</span></p>
				   </div>
				   <div class="products">
						<img src="images/picHolder.png" alt="pic holder">
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
					<img src="images/f.png" alt="facebook"> 
					<img src="images/t.png" alt="twitter">
					<img src="images/g.png" alt="google"> 
					<img src="images/y.png" alt="youtube"> 
				</li>
			</ul>
		</div><!-- container -->
	</footer>
	<div class="copyright">
	   <div class="container">
			<img src="images/pay.png" alt="pay"> 
			<p>&copy; 2014 - 15 Ninja Pack Luck | All Rights Reserved</p>
	   </div><!-- container -->
	</div><!-- copyright -->
</div><!-- wrapper -->
	<script type="text/javascript" src="scripts/jquery.js"></script>
	<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>