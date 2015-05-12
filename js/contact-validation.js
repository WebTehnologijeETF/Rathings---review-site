
function validateFormC()
{

	valid = true;
	checkName('el0');
	checkLastName('el1');
	checkEmail('el2');
	checkRating('el3');
	checkMessage('el5');
	
	return valid;
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