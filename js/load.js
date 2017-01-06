
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
				else if(page == 'products.php') fetchProducts();
				
				
				
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
				else if(page=="contactConfirmation.php")
					fillData(id);
					
					
				
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
	{
		
		fieldsValidationC();
		}
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

function loadProductss(object)
{
	var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				fetchReviews(object);
				window.scrollTo(0,0);
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "singleProduct.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("single=" + object);
}


function fillData(object)
{
		document.getElementById("name").innerHTML = object.name;
		document.getElementById("lastname").innerHTML = object.lastname;
		document.getElementById("email").innerHTML = object.email;
		document.getElementById("rating").innerHTML = object.rating;
		document.getElementById("urgency").innerHTML = object.urgency;
		document.getElementById("messagec").innerHTML = object.message;
		
		
		document.getElementById("el0").value = object.name;
		document.getElementById("el1").value = object.lastname;
		document.getElementById("el2").value = object.email;
		document.getElementById("el3").value = object.rating;
		document.getElementById("el4").value = object.urgency;
		document.getElementById("el5").value = object.message; 
		
		window.scrollTo(0,0);

}


function sendMail()
{
	
	var obj = {
	name:document.getElementById("name").innerHTML,
		lastname:document.getElementById("lastname").innerHTML,
		email:document.getElementById("email").innerHTML,
		rating:document.getElementById("rating").innerHTML,
		urgency:document.getElementById("urgency").innerHTML,
		message:document.getElementById("messagec").innerHTML
		
		};
		
		
		
		
		var ajax = new XMLHttpRequest();
			
			obj = JSON.stringify(obj);
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				loadPage("contactMessage.php");
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "sendMail.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("data=" + obj);
		
		
	
}



function addNews()
{
	
	var obj = {
		title:document.getElementById("el0").value,
		caption:document.getElementById("el1").value,
		image:document.getElementById("el2").value,
		text:document.getElementById("el3").value
		
		
		};
		
		
		
		
		var ajax = new XMLHttpRequest();
			
			obj = JSON.stringify(obj);
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				document.getElementById("message").getElementsByTagName('p')[0].innerHTML = "You have successfully added news";
				window.scrollTo(0,0);
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "newsService.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("data=" + obj);
		
		
	
}


function fetchNews()
{
	
	var ajax = new XMLHttpRequest();
			var param = "newsService.php";
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				var data = JSON.parse(ajax.responseText);
				
				var fileOutput = '';
				for(var i = 0;i<data.length;i++)
				{
				
					 fileOutput += '<div class="single_news">' + '<h3>' + 
		 data[i].title + '</h3>' +
		 '<img src="images/author.png" alt="author" class="news_icon">' +
		 '<label class="news_author">' + data[i].author + '</label>' +
		 '<img src="images/date.png" alt="date" class="news_icon">' +
		 '<label class="news_date">' + data[i].date + '</label> <br><br>' +
		 '<div class="img_div">'; 
		 
		 if(data[i].image != '')
		 {			 // there is image
			fileOutput += '<img src="' + data[i].image + '" class="_img" alt="news">';
			
		 }
		
		fileOutput += '</div>';
			
			fileOutput += '<div class="news_text"><p>';
			
			
			
			fileOutput += data[i].caption;
			fileOutput += '</p></div>';
			
			if(document.getElementById("news") == null)
			{
					fileOutput += '<div class="update-delete lab_link"><label onclick="updateNews(' + data[i].id + ');">Update</label>\
					<label  onclick="deleteNews(' + data[i].id + ');">Delete</label></div>';
				
			
			}
			
			if(data[i].text != '') // there is details text
			{	
				var s = data[i].id;
				
				var temp = '<a onclick= "loadNews(';
				
					temp +=  s;
						temp +=  ') ">Details</a>';
						fileOutput += temp;
				
			}
				
			fileOutput += '</div>';
			if(i != data.length - 1) // not last
						fileOutput += '<div class="news_separator"></div>'; 
				
				
				}
				
			fileOutput += '<div class="pagination">\
<input type="button" value="First" class="button narrow_button">\
<input type="button" value="<<" class="button page_button">\
<input type="button" value="1" class="button page_button">\
<input type="button" value="2" class="button page_button">\
<input type="button" value="3" class="button page_button">\
<input type="button" value=">>" class="button page_button">\
<input type="button" value="Last" class="button narrow_button"></div>'; 

if(document.getElementById("news") != null)

document.getElementById("news").innerHTML = document.getElementById("news").innerHTML + fileOutput; 
else
document.getElementById("news2").innerHTML = document.getElementById("news2").innerHTML + fileOutput; 
				
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error: News couldn't be loaded");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();


}



function fetchProducts()
{
	
	var ajax = new XMLHttpRequest();
			var param = "productsService.php";
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				var data = JSON.parse(ajax.responseText);
				
				var productsString = '';
				
				for(var i=0;i<data.length;i++)
				{
					productsString += '<div class="single_product lab-link">' +
					'<img src=' + data[i].image + ' alt="product" class="_img_prod">' +
					'<label class="prod prod3"';
					productsString += "onclick='loadProductss(" + data[i].id + ")'>";
					productsString += data[i].name + '</label>' +
					 '<label class="rating_mark right-side">' + data[i].rating + '</label> <br>' +
					'<label class="prod2">Category:' + data[i].category + '</label> <br>';
					
					if(data[i].number != 0)
						productsString += "<div class='update-delete lab_link'>" +
					"<label onclick='loadProductss(" + data[i].id + ")'>" + data[i].number + " " + "reviews" + "</label>" +
					"</div>";
					
					productsString += '</div>';
					
					if(i != data.length - 1) // not last
						productsString += '<div class="news_separator"></div>';
				
				
				}
				
			productsString += '<div class="pagination">\
<input type="button" value="<<" class="button page_button">\
<input type="button" value="1" class="button page_button">\
<input type="button" value="2" class="button page_button">\
<input type="button" value="3" class="button page_button">\
<input type="button" value=">>" class="button page_button"></div>'; 

				document.getElementById("top_list").innerHTML = document.getElementById("top_list").innerHTML + productsString;
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error: News couldn't be loaded");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();


}


function fetchReviews(object)
{
	
	var ajax = new XMLHttpRequest();
			var param = "reviewsService.php?id=" + object;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				var data = JSON.parse(ajax.responseText);
				
				
				var revOutput = '';
				
				for(var i=0;i<data.length;i++)
				{
					revOutput += '<div class="single_product">' +
			'<img src="images/author.png" alt="author" class="news_icon"><label class="news_author">';
			if(data[i].author_email != "") // there is mail
				revOutput += '<a href = "mailto:' + data[i].author_email + '">' + data[i].author_name + '</a>';
			else
				revOutput += data[i].author_name;
			
			revOutput += '</label><img src="images/date.png" alt="date" class="news_icon"><label class="news_date">' +
			data[i].date + '</label><br><label class="rating_mark right-side">' +
			data[i].rating + '/10</label> <br><p>' +
			data[i].text + '</p>';
			revOutput += '</div>';
			if(i != data.length - 1) // not last
				revOutput += '<div class="news_separator"></div>';	
				
				
				}
				
			

				document.getElementById("reviews").innerHTML = document.getElementById("reviews").innerHTML + revOutput;
				
				
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error: News couldn't be loaded");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();


}


function fetchReviews2()
{
	
	var ajax = new XMLHttpRequest();
			var param = "reviewsService.php";
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				var data = JSON.parse(ajax.responseText);
				
				
				var revOutput = '';
				
				for(var i=0;i<data.length;i++)
				{
					revOutput += '<div class="single_product">' +
			'<img src="images/author.png" alt="author" class="news_icon"><label class="news_author">';
			if(data[i].author_email != "") // there is mail
				revOutput += '<a href = "mailto:' + data[i].author_email + '">' + data[i].author_name + '</a>';
			else
				revOutput += data[i].author_name;
			
			revOutput += '</label><img src="images/date.png" alt="date" class="news_icon"><label class="news_date">' +
			data[i].date + '</label><br><label class="rating_mark right-side">' +
			data[i].rating + '/10</label> <br><p>' +
			data[i].text + '</p>';
			revOutput += '</div>';
			if(i != data.length - 1) // not last
				revOutput += '<div class="news_separator"></div>';	
				
				
				}
				
			

				document.getElementById("reviews1").innerHTML = document.getElementById("reviews1").innerHTML + revOutput;
				
				
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error: News couldn't be loaded");
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();


}


function addReview()
{
	var obj = {
		id:document.getElementById("prodid").value,
		name:document.getElementById("el0").value,
		rmail:document.getElementById("el1").value,
		rating:document.getElementById("el2").value,
		rtext:document.getElementById("el3").value
		
		
		};
		
		
		
		
		var ajax = new XMLHttpRequest();
			
			obj = JSON.stringify(obj);
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				loadPage("reviewConfirmation.php");
				window.scrollTo(0,0);
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "reviewsService.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("data=" + obj);


}


window.setInterval(function test()
{

				if(document.getElementById("news") != null)
				{
					
					document.getElementById("news").innerHTML = '<h2>Latest news</h2>';
					
					fetchNews();
				
				}
				if(document.getElementById("news2") != null)
				{
					document.getElementById("news2").innerHTML = '<h2>Manage site news</h2><div class="addprod lab_link">\
<label onclick="loadPage("addnews.php");">Add news</label>\
</div>';
					
					fetchNews();
				
				}
				
				if(document.getElementById("reviews") != null)
				{
					
					document.getElementById("reviews").innerHTML = '<h2>Product reviews</h2>';
					var idp = document.getElementById("prodid").value;
					fetchReviews(idp);
				
				
				}
				if(document.getElementById("reviews1") != null)
				{
					
					document.getElementById("reviews1").innerHTML = '<h2>Manage site reviews</h2>';
					fetchReviews2();
				
				
				}




	
			
			


}, 3000);