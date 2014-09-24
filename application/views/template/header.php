<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/style.css"/>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>resources/css/custom.css"/>
<script src="<?php echo base_url();?>resources/sliderengine/jquery.js"></script>

<title>BOOK-MART.com</title>
</head>
<body>
<div id="header">
	
	<link href='http://fonts.googleapis.com/css?family=Varela+Round|Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url();?>resources/js/bookmart.js"></script>

	
	<div id="div_upper">
			<ul>
				<li style="font-size:14px;">Welcome to Book-Mart!</li>
				<li style="font-size:11px;" id="login_span">
				<?php
					if(isset($user_id)){
						echo $name.' | <a href="'.base_url().'logout">Sign out</a>';
					}else{
						echo '<a href="javascript:void(0);" class="overlayLink" data-action="registration-form.html">Register</a> / <a href="javascript:void(0);" class="overlayLink" data-action="login-form.html">Log In</a>';
					}
				?>
				</li>
				<li style="font-size:11px;"><a href="<?php echo base_url();?>my_books_library">My Books</a></li>
				<li style="font-size:11px;"><a href="<?php echo base_url();?>shopping_cart">Checkout</a></li>
				<li>
					<select>
						<option>SGD</option>
						<option>EUR</option>
					</select>
				</li>
			</ul>
	</div>
	<div class="overlay" style="display: none;">
		<div class="login-wrapper">
			<div class="login-content">
				<a class="close">x</a>
				<h3>Sign in</h3>
				<form id="loginFrm" name="loginFrm" method="post">
					<label for="username">
						Username:
						<input type="text" name="email" id="email" placeholder="Username must be between 8 and 20 characters" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{8,20}$" required="required" />
					</label>
					<label for="password">
						Password:
						<input type="password" name="password" id="password" placeholder="Password must contain 1 uppercase, lowercase and number" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" required="required" />
					</label>
					<button id="sign_in" name="sign_in" type="submit">Sign in</button>
				</form>
			</div>
		</div>
	</div>
	
	
	<div id="div_lower">
		<div id="logo">BOOK-MART</div>
		<div id="search_div">
			<input class="search_text" type="text" placeholder="Search for anything here"></input>
			<input type="submit" name="search_btn" id="search_btn" value=""></input>
		</div>
		<div class="connect_us">
			<img src="<?php echo base_url();?>resources/images/google.png"/>
			<img src="<?php echo base_url();?>resources/images/fb.png"/>
			<img src="<?php echo base_url();?>resources/images/twitter.png"/>
			<img src="<?php echo base_url();?>resources/images/youtube.png"/>
		</div>
	</div>
</div>

<div id="main" style="min-height:450px;">
	<div id="menu">
		<ul class="menu-list">
			<li class="active"><a href="<?php echo base_url();?>home">HOME</a></li>
			<li><a href="<?php echo base_url();?>show/hot_deals">HOT DEALS</a></li>
			<li><a href="<?php echo base_url();?>show/category/Education">EDUCATION</a></li>
			<li><a href="<?php echo base_url();?>show/category/Magazine">MAGAZINES</a></li>
			<li><a href="javascript:void(0);" style="text-decoration:none;cursor:default;">GIFT</a></li>
			<li><a href="javascript:void(0);" style="text-decoration:none;cursor:default;">READING ACCESSORIES</a></li>
			<li><a href="javascript:void(0);" style="text-decoration:none;cursor:default;">BULK SALES</a></li>
		</ul>
	</div>