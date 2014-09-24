	<div class="container-fluid breadcrumbBox text-center">
		<ol class="breadcrumb">
			<li><a href="#">Review</a></li>
			<li class="active"><a href="#">Order</a></li>
			<li><a href="#">Payment</a></li>
		</ol>
	</div>
	
	<div class="container text-center">

		<div class="col-md-5 col-sm-12">
			<div class="bigcart"></div>
			<h1>Your shopping cart</h1>
			<p>
				This is a shopping cart
			</p>
		</div>
		
		<div class="col-md-7 col-sm-12 text-left">
			<ul>
				<li class="row list-inline columnCaptions">
					<span>QTY</span>
					<span>ITEM</span>
					<span>Price</span>
				</li>
			<?php
				if(count($books) && $books){
					$total_payment = 0;
					foreach($books as $book){
						echo '<li class="row">
								<span class="quantity">1</span>
								<span class="itemName">'.$book['name'].'</span>
								<span class="popbtn"><a class="arrow"></a></span>
								<span class="price">$'.$book['selling_price'].'</span>
							</li>';
						$total_payment += $book['selling_price'];
					}
			?>
				
				<li class="row totals">
					<span class="itemName">Total:</span>
					<span class="price">$<?php echo $total_payment;?></span>
					<span class="order"> <a class="text-center" href="shopping_cart/purchase">ORDER</a></span>
				</li>
			<?php
				}else{
					echo '<li class="row">
							Your cart is empty
						</li>';
				}
			?>
			</ul>
		</div>

	</div>