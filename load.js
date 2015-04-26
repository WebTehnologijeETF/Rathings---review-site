
function loadPage(page)
{

	
	var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				
					
					
				
				fieldsValidation(page);
				
					if(page=='products-table.html')
				loadProducts();
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("GET", page, true);
			ajax.send();


}


function loadPageWithId(page, id)
{

	
	var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				
				if(page=="updateform.html")
					updateId(id);
					
					
				
				fieldsValidation(page);
				
				
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("GET", page, true);
			ajax.send();


}


function getBody(content) 
{ 
   var x = content.indexOf("<body");
   x = content.indexOf(">", x);    
   var y = content.lastIndexOf("</body>"); 
   return content.slice(x + 1, y);
}



function loadAll()
{
	loadPage('products-table.html');
	
	

}

function loadProducts()
{

	
	
			var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16308";
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				var data = JSON.parse(ajax.responseText);
				var productsString = "";
				
				for(var i=0; i< data.length;i++)
				{
					productsString += '<div class="single_product">\
					<img src=' + data[i].slika + ' alt="product" class="_img_prod">\
					<label class="prod">' + data[i].naziv + '</label>\
					 <label class="rating_mark right-side">8.3</label> <br>\
					<label class="prod2">Category: Movies</label> <br>\
					<div class="update-delete lab_link">\
					<label onclick="prepareForUpdate(' + data[i].id + ');">Update</label>\
					<label  onclick="deleteProduct(' + data[i].id + ');">Delete</label>\
					</div>\
					</div>';
					
					if(i != data.length - 1)
						productsString += '<div class="news_separator"></div>';
				
				}
				
					productsString += '<div class="pagination">\
					<input type="button" value="<<" class="button page_button">\
					<input type="button" value="1" class="button page_button">\
					<input type="button" value="2" class="button page_button">\
					<input type="button" value="3" class="button page_button">\
					<input type="button" value=">>" class="button page_button">\
					</div>';
					
					
					//alert("bla");
					//alert("bla" + document.getElementById('top_list').innerHTML);
				
				document.getElementById('top_list').innerHTML += productsString;
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error: Products couldn't be loaded");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();



}


function fieldsValidation(page)
{
	if(page == 'login.html')
		fieldsValidationL();
	else if (page=="contact.html")
		fieldsValidationC();
	else if(page=="register.html")
		fieldsValidationR();
	else if(page=="products.html" || page=="products-table.html")
		fieldsValidationP();
	else if(page=="addform.html" || page=="updateform.html")
		fieldsValidationAdd();
	
}


function updateId(prodId)
{

	

	if(document.getElementById("upform").addEventListener)
{

document.getElementById("upform").addEventListener( "submit", 
function() { updateProduct(prodId);});
	


}


else
{
	document.getElementById("upform").attachEvent( "onsubmit", 
function() { updateProduct(prodId);});


}


}