<!doctype html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Document</title>

<link rel="stylesheet" href="jquery.mobile-1.4.5.min.css" />
<script src="jquery-1.11.1.min.js"></script>
<script src="jquery.mobile-1.4.5.min.js"></script>
 
 </head>
 <body>
 	<h1>My Mobile App</h1>

	<p>This is page content</p>
	<!--<div data-role="collapsible" data-collapsed="false">
    <h4>This is a collapsible list items</h4>-->
	
	<ul id="mypetlist" data-role="listview">
		<li><a href="#">List item 1</a></li>
		
	</ul>

	<a id="btnAddParrot" href="" class="ui-btn ui-btn-b ui-corner-all ui-btn-icon-left ui-icon-plus">Add a Parrot</a>
	<button id="btnAddDog">Add a Dog</button>

 <script>
 	//$: JQuery
	//$("Selector"): phep chon
	//$("Selector")."function"

 	$(document).ready(function(){
		//alert("Document is ready");
		$("#btnAddParrot").click(function(){ 
			
			//$("#btnAddParrot") equivalent to document.getElementById("btnAddParrot")
			//.click: equivalent to addEventListener

			//alert("Add Parrot is clicked");

			$("#mypetlist").append('<li><a href="#">A Parrot<button class="view" class="ui-btn ui-btn-inline">View Detail</button></a></li>');
			$("#mypetlist").listview("refresh");

			$(".view").click(function(){
				//addEventListener trong luc runtime
				alert("View Detail is clicked");
			});
			
		});

		$("#btnAddDog").click(function(){
			//alert("Add Parrot is clicked");
			$("#mypetlist").append('<li><a href="#">A Dog</a></li>');
			$("#mypetlist").listview("refresh");
		});

		
	});
 	
 </script>

 </body>
</html>
