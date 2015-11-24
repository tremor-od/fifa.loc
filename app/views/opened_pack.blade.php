<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/style/normalize.css">
    <link rel="stylesheet" href="/style/opened_pack.css">
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
			<div class="container">
				<div class="tots">
							<h1>{{$packStatistic->pack['name']}}</h1>
							<div class="selectedPlayer">
								<p>You are opening the <br>
                                    {{$packStatistic->pack['fullName']}}</p>
								<p>COINS({{$packStatistic->value}}): <span data-coins='150' id="coins">0</span></p>
								<div class="mainCard">
									<img id="circle" src="/images/circle_spin.png" alt="circle">
								<div class="border noshine">

                                    @if(!empty($specialList))
                                        @foreach($specialList as $player)
                                            <?php $card = $player->card()->first()?>
                                            <div class="card">
                                                <h3>Gianluigi Buffon</h3>
                                                <h4>82 <span>GK</span></h4>
                                                <div class="club">
                                                    <img src="/images/juve.png" alt="juve">
                                                    <img src="/images/italy.png" alt="italy">
                                                </div><!-- club -->
                                                <img id="player_img" class="player_image" src="/images/player.png" alt="buffon">
                                                <div class="rating">
                                                    <div class="leftFloat">
                                                        <p>92 DIV</p>
                                                        <p>80 HAN</p>
                                                        <p>66 KIC</p>
                                                    </div><!-- left float -->
                                                    <div class="rightFloat">
                                                        <p>82 REF</p>
                                                        <p>46 SPE</p>
                                                        <p>92 POS</p>
                                                    </div><!-- right float -->
                                                </div><!-- rating -->
                                            </div><!-- card -->
                                        @endforeach
                                    @endif

                                </div><!-- border -->
								</div><!-- main card -->
							</div><!-- selected player -->

							<div class="players">

                                @if(!empty($basicList))
                                    @foreach($basicList as $player)
                                        <?php $card = $player->card()->first()?>
                                        <div class="border" >
                                            <div class="card" style="background-image: url(/images/pink.png);">
                                                <h3>{{ $card->title.'playerId-'.$player->id }}</h3>
                                                <h4>{{ $card->rating }} <span>{{ $player->role['name'] }}</span></h4>
                                                <div class="club">
                                                    <img src="/images/juve.png" alt="juve">
                                                    <img src="/images/italy.png" alt="italy">
                                                </div><!-- club -->
                                                <img id="player_img" class="player_image" src="/images/player.png" alt="buffon">
                                                <div class="rating">
                                                    <div class="leftFloat">
                                                        <p>{{ $player->d1v }} DIV</p>
                                                        <p>{{ $player->han }} HAN</p>
                                                        <p>{{ $player->kic }} KIC</p>
                                                    </div><!-- left float -->
                                                    <div class="rightFloat">
                                                        <p>{{ $player->ref }} REF</p>
                                                        <p>{{ $player->spe }} SPE</p>
                                                        <p>{{ $player->pos }} POS</p>
                                                    </div><!-- right float -->
                                                </div><!-- rating -->
                                            </div><!-- card -->
                                        </div><!-- border -->
                                        @endforeach
                                    @endif
							</div><!-- players -->
				</div><!--tots -->
			</div><!-- container -->
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
	<script type="text/javascript" src="/scripts//effects.js"></script>
</body>
</html>