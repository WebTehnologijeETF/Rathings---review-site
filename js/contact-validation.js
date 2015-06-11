
function validateFormC()
{
	
	valid = true;
	checkName('el0');
	checkLastName('el1');
	checkEmail('el2');
	checkRating('el3');
	checkMessage('el5');
	
	
	
	if(valid)
	{
		// pozivanje web servisa za validaciju
		
		

	var ajax = new XMLHttpRequest();
			
			var object = {
			name:document.getElementById('el0').value,
			lastname:document.getElementById('el1').value,
			email:document.getElementById('el2').value,
			rating:document.getElementById('el3').value,
			urgency:document.getElementById('el4').value,
			message:document.getElementById('el5').value
			
			
			};
			
			
			var objectjson = JSON.stringify(object);
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				
				
				//document.getElementById('main_body').innerHTML = getBody(ajax.responseText);
				
				var val = JSON.parse(ajax.responseText);
				
				
				if(val.valid == true)
					{
					
						loadPageWithId("contactConfirmation.php", object);
						
					
					
					}
				
				
				
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					alert("Error loading page");
				
				
				}
		}
			ajax.open("POST", "cValidations.php", true);
			ajax.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			ajax.send("data=" + objectjson); 
} 


	
	
	
}


function fieldsValidationC()
{


var valid = true;

if(document.getElementById("el0").addEventListener)
{

document.getElementById("el0").addEventListener( "blur", 
function() { checkName('el0');});

document.getElementById("el1").addEventListener( "blur", 
function() { checkLastName('el1');});

document.getElementById("el2").addEventListener( "blur", 
function() { checkEmail('el2');});

document.getElementById("el3").addEventListener( "blur", 
function() { checkRating('el3');});


document.getElementById("el5").addEventListener( "blur", 
function() { checkMessage('el5');});

}

else 
{
	document.getElementById("el0").attachEvent( "onblur", 
function() { checkName('el0');});

document.getElementById("el1").attachEvent( "onblur", 
function() { checkLastName('el1');});

document.getElementById("el2").attachEvent( "onblur", 
function() { checkEmail('el2');});

document.getElementById("el3").attachEvent( "onblur", 
function() { checkRating('el3');});


document.getElementById("el5").attachEvent( "onblur", 
function() { checkMessage('el5');});

}


}