
<?php
foreach($books as $book){
?>
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<img src="images/shop/product9.jpg" alt="" />
				<h2>$<?php echo $book['original_price'];?></h2>
				<p><?php echo $book['name'];?></p>
				<a href="javascript:addtocart(<?php echo $book['id'];?>);" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
			</div>
			<img src="images/home/new.png" class="new" alt="" />
		</div>
		<div class="choose">
			<ul class="nav nav-pills nav-justified">
				<li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
				<li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
			</ul>
		</div>
	</div>
</div>
<?php
}
?>