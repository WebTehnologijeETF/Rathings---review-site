
function validateFormAdd()
{
	valid = true;
	checkPName('el0');
	checkPImage('el2');
	checkDescription('el3');
	return valid;


}


function prepareForUpdate(prodId)
{
	loadPageWithId('updateform.html', prodId);
	
	
	

}


function updateProduct(prodId)
{
	
	if(!validateFormAdd())
		return false;
		
	else
	{
		var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php";
			
			var product = {
			
				id:prodId,
				naziv:document.getElementById('el0').value,
				opis:document.getElementById('el3').value,
				kategorija:document.getElementById('el1').value,
				slika:document.getElementById('el2').value,
				ocjena:0
				
				
				};
				
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
					var p = document.getElementById('message').getElementsByTagName('p')[0];
					p.innerHTML = "You have successfully updated the product";
					p.style.color = 'green';
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					
					
						var p = document.getElementById('message').getElementsByTagName('p')[0];
						p.style.color = 'red';
						p.innerHTML = "Error: Please try again";
				}
		}
		
		
			  ajax.open("POST", param, true);
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("akcija=promjena" + "&brindexa=16308" + "&proizvod=" + JSON.stringify(product));
	
	
	}



}


function addProduct()
{

	
	

	
	if(!validateFormAdd())
		return false;
	else
	{
		var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php";
			
			var product = {
			
				naziv:document.getElementById('el0').value,
				opis:document.getElementById('el3').value,
				kategorija:document.getElementById('el1').value,
				slika:document.getElementById('el2').value,
				ocjena:0
				
				
				};
				
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
					var p = document.getElementById('message').getElementsByTagName('p')[0];
					p.innerHTML = "You have successfully added a new product";
					p.style.color = 'green';
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					
					
						var p = document.getElementById('message').getElementsByTagName('p')[0];
						p.style.color = 'red';
						p.innerHTML = "Error: Please try again";
				}
		}
		
		
			  ajax.open("POST", param, true);
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("akcija=dodavanje" + "&brindexa=16308" + "&proizvod=" + JSON.stringify(product));
	
	
	
	}
}


function deleteProduct(prodId)
{

		var r = confirm("Press OK to proceed with deleting");
		
		if(!r) return;


	var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php";
			
			var product = {
			
				id:prodId
				
				
				
				};
				
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
					alert("You have successfully deleted the product.");
					loadAll();
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					
					alert("Error: Product couldn't be deleted");
						
				}
		}
		
		
			  ajax.open("POST", param, true);
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("akcija=brisanje" + "&brindexa=16308" + "&proizvod=" + JSON.stringify(product));


}




function fieldsValidationAdd()
{


var valid = true;


if(document.getElementById("el0").addEventListener)
{

document.getElementById("el0").addEventListener( "blur", 
function() { checkPName('el0');});



document.getElementById("el2").addEventListener( "blur", 
function() { checkPImage('el2');});

document.getElementById("el3").addEventListener( "blur", 
function() { checkDescription('el3');});




}

else 
{
	document.getElementById("el0").attachEvent( "onblur", 
function() { checkPName('el0');});


document.getElementById("el2").attachEvent( "onblur", 
function() { checkPImage('el2');});

document.getElementById("el3").attachEvent( "onblur", 
function() { checkDescription('el3');});




}


}


