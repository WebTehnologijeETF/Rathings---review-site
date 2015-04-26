
function validateFormP()
{

	valid = true;
	checkRating('el0');
	checkRating('el1');
	
	return valid;
}

function fieldsValidationP()
{

var valid = true;



if(document.getElementById("el0").addEventListener)
{
	document.getElementById("el0").addEventListener( "blur", 
function() { checkRating('el0');});

document.getElementById("el1").addEventListener( "blur", 
function() { checkRating('el1');});

}


else

{
		document.getElementById("el0").attachEvent( "onblur", 
function() { checkRating('el0');});

document.getElementById("el1").attachEvent( "onblur", 
function() { checkRating('el1');});


}

}