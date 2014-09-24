$(document).ready(function() {
	$("#sign_in").click(function( event ){
		$.post( "login", $("#loginFrm").serialize(), function( response ) {
			response = JSON.parse(response);
			$("#login_span").html(response.data.first_name+' '+response.data.last_name+' | <a href="logout" class="overlayLink" data-action="registration-form.html">Sign out</a>');
			$(".overlay").fadeToggle("fast");
		});
	});
	$("#loginLink").click(function( event ){
		event.preventDefault();
		$(".overlay").fadeToggle("fast");
	});
	
	$(".overlayLink").click(function(event){
		event.preventDefault();
		var action = $(this).attr('data-action');
		
		$.get( "ajax/" + action, function( data ) {
			$( ".login-content" ).html( data );
		});	
		
		$(".overlay").fadeToggle("fast");
	});
	
	$(".close").click(function(){
		$(".overlay").fadeToggle("fast");
	});
	
	$(document).keyup(function(e) {
		if(e.keyCode == 27 && $(".overlay").css("display") != "none" ) { 
			event.preventDefault();
			$(".overlay").fadeToggle("fast");
		}
	});
});

function addtocart(book_id){
	$.post( "http://localhost/bookmart/shopping_cart/add", {book_id : book_id}, function( response ) {
		response = JSON.parse(response);
		if(response.success){
			alert(response.message);
		}else{
			alert('Error!!!');
		}
	});
}