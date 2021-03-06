<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/faq.css">
    <title>Ninja Faq</title>
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
    <section class="container">
            <h2>FAQ</h2>
            <div class="accordion">
                @foreach($faqList as $faq)
                    <div class="tab">
                        <h3>{{$faq->question}}</h3>
                        <div class="content">
                            {{$faq->answer}}
                        </div><!-- content -->
                    </div><!-- tab -->
                @endforeach

            </div><!-- accordion -->
            <h2>DO YOU HAVE ANOTHER QUESTION?</h2>
            <a href="/contacts" id="moreQ">
	Get in Touch with us</a>
    </section>
</div><!-- wrapper -->
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
<script type="text/javascript" src="scripts/jquery.js"></script>
<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>