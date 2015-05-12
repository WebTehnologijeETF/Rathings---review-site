

function validateFormL()
{
	valid = true;
	
	checkEmail('el0');
	checkPass('el1');
	return valid;

}


function fieldsValidationL()
{


var valid = true;

if(document.getElementById("el0").addEventListener)
{


document.getElementById("el0").addEventListener( "blur", 
function() { checkEmail('el0');});

document.getElementById("el1").addEventListener( "blur", 
function() { checkPass('el1');});

}

else
{
	document.getElementById("el0").attachEvent( "onblur", 
function() { checkEmail('el0');});

document.getElementById("el1").attachEvent( "onblur", 
function() { checkPass('el1');});

}




}