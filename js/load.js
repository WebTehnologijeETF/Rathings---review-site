
function loadPage(page)
{

	
	
	
	var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
 				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				
					
					
				
				fieldsValidation(page);
				
					if(page=='products-table.php')
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
				
				if(page=="updateform.php")
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
	loadPage('products-table.php');
	
	

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
					 <label class="rating_mark right-side">' + data[i].ocjena + '</label> <br>\
					<label class="prod2">Category:' + data[i].kategorija + '</label> <br>\
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
	if(page == 'login.php')
		fieldsValidationL();
	else if (page=="contact.php")
		fieldsValidationC();
	else if(page=="register.php")
		fieldsValidationR();
	else if(page=="products.php" || page=="products-table.php")
		fieldsValidationP();
	else if(page=="addform.php" || page=="updateform.php")
		fieldsValidationAdd();
	
}


function updateId(prodId)
{

	

	var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php?brindexa=16308";
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				var products = JSON.parse(ajax.responseText);
				
				for(var i=0;i<products.length;i++)
					{
						if(prodId == products[i].id) // found product
							break;
					
					
					}
					
					
					document.getElementById('el0').value = products[i].naziv;
					document.getElementById('el1').value = products[i].kategorija;
					document.getElementById('el2').value = products[i].slika;
					document.getElementById('el3').value = products[i].opis;
					
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
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send(); 
	
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


function loadNews(object)
{
	var ajax = new XMLHttpRequest();
			
			object = JSON.stringify(object);
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				window.scrollTo(0,0);
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "singleNews.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("single=" + object);
}