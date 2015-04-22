
function validateForm()
{

	valid = true;
	checkPName('el0');
	checkPImage('el2');
	checkDescription('el3');
	

	
	if(!valid)
		return valid;
	else
	{
		var ajax = new XMLHttpRequest();
			var param = "http://zamger.etf.unsa.ba/wt/proizvodi.php";
			
			var product = {
			
				naziv:document.getElementById('el0').value,
				opis:document.getElementById('el3').value,
				slika:document.getElementById('el2').value,
				
				
				};
				
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
					alert("Success");
				
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					
					
						alert("error");
				}
		}
		
		
			  ajax.open("POST", param, true);
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			ajax.send("akcija=dodavanje" + "&brindexa=16308" + "&proizvod=" + JSON.stringify(product));
	
	
	
	}
}


window.addEventListener('load',function(){


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


});