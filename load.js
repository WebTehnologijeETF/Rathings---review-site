
function loadPage(page)
{

	
	var ajax = new XMLHttpRequest();
			
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				
				
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