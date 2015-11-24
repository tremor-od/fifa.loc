<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/style/normalize.css">
    <link rel="stylesheet" href="/style/my_account.css">
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
          <div class="coinsStatus">You have  {{ $user->coins['coins'] }} COINS</div>
           <div class="myAccount">{{ $user->name }}</div><!-- account -->
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
    <div class="container">
   		<h1>MY ACCOUNT</h1>
	</div>
	   <div class="accountInfo">
	     <div class="container">
		   <h2>WELCOME BACK! <span>{{ $user->name }}</span></h2>
			<p>In this dashboard you will be able to see your Recent Orders, manage your Shipping and Billing Addresses or <a href="#">EDIT</a> your Password and Account Details.</p>
			<br/>
             <p><a href="/cabinet/withdraw">withdraw coins</a></p>
             <div class="recentOrders">
				<h3>RECENT ORDERS</h3>
				<div class="tableBox">
					<table>
						<tr>
							<th>ORDER</th>
							<th>DATE</th>
							<th>Pack price</th>
							<th>TOTAL win</th>
							<th></th>
						</tr>
                        @foreach($orderList as $order)
						<tr>
							<td>{{$order->id}}</td>
							<td>{{date("F j, Y", strtotime($order->created_at))}}</td>
							<td>{{$order->price}}</td>
							<td>{{$order->value}}</td>
							<td>
								<a href="/cabinet/order/{{$order->id}}"><img src="images/view_icon.png" alt="view"></a>
								<a href="#"><img src="/images/help_icon.png" alt="help"></a>
							</td>
						</tr>
                        @endforeach

					</table>
				</div><!-- table box -->
			</div><!-- recent orders -->
			<div class="billingAddress">
				<h3>BILLING ADDRESS</h3>
				<div class="info">
					<ul>
						<li><b>{{ $user->name }}</b></li>
						<li>{{ $user->company_name }}</li>
						<li>{{ $user->company_address }}</li>
						<li>City</li>
						<li>County</li>
						<li>LS1 8HU</li>
					</ul>
					<a href="/cabinet/editUser">EDIT</a>
				</div><!-- info -->
			</div><!-- billing address -->
			<h3>MY SUPPORT CONVERSATIONS</h3>
			<p><b>You have no support conversations.</b></p>
    	</div><!-- container -->
	</div><!-- account info -->
</div><!-- wrapper -->



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
<script type="text/javascript" src="/scripts/jquery.js"></script>
<script type="text/javascript" src="/scripts/script.js"></script>
</body>
</html>