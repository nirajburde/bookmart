	<!-- EPUBJS Renderer -->
	<script src="<?php echo base_url();?>resources/js/epub.min.js"></script>
	
	<style type="text/css">

	  body {
		overflow: hidden;
	  }

	  #main {
		position: absolute;
		width: 100%;
		height: 100%;
	  }

	  #area {
		width: 80%;
		height: 80%;
		margin: 5% auto;
		max-width: 1250px;
	  }

	  #area iframe {
		border: none;
	  }

	  #prev {
		left: 40px;
	  }

	  #next {  
		right: 40px;
	  }

	  .arrow {
		position: absolute;
		top: 50%;
		margin-top: -32px;
		font-size: 64px;
		color: #E2E2E2;
		font-family: arial, sans-serif;
		font-weight: bold;
		cursor: pointer;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	  }

	  .arrow:hover {
		color: #777;
	  }
	   
	  .arrow:active {
		color: #000;
	  }
	</style>
	
	 <script>
		"use strict";
		
		var Book = ePub("<?php echo base_url();?>resources/books/<?php echo $book_name;?>/", { restore: true });
		
	</script>
	
	<div id="main">
		<div id="prev" onclick="Book.prevPage();" class="arrow"><</div>
		<div id="area"></div>
		<div id="next" onclick="Book.nextPage();"class="arrow">></div>
		<div id="loader"><img src="../reader/img/loader.gif"></div>
		<select id="toc"></select>
	</div>

	<script>            
		
		Book.getMetadata().then(function(meta){

			document.title = meta.bookTitle+" – "+meta.creator;
			
		});

		Book.getToc().then(function(toc){

		  var $select = document.getElementById("toc"),
			  docfrag = document.createDocumentFragment();

		  toc.forEach(function(chapter) {
			var option = document.createElement("option");
			option.textContent = chapter.label;
			option.ref = chapter.href;

			docfrag.appendChild(option);
		  });

		  $select.appendChild(docfrag);

		  $select.onchange = function(){
			  var index = $select.selectedIndex,
				  url = $select.options[index].ref;
			  
			  Book.goto(url);
			  return false;
		  }

		});
		
		Book.ready.all.then(function(){
		  document.getElementById("loader").style.display = "none";
		});

		Book.renderTo("area");

	</script>