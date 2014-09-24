
<?php
foreach($books as $book){
?>
<div class="col-sm-4">
	<div class="product-image-wrapper">
		<div class="single-products">
			<div class="productinfo text-center">
				<img src="images/shop/product9.jpg" alt="" />
				<h2><?php echo $book['name'];?></h2>
				<a target="_blank" href="my_books_library/read/<?php echo rawurlencode($book['name']);?>" class="btn btn-default add-to-cart">Read Book</a>
			</div>
			<img src="images/home/new.png" class="new" alt="" />
		</div>
	</div>
</div>
<?php
}
?>