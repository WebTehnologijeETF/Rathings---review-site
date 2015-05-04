

function validateFormR()
{

	valid = true;
	checkName('el0');
	checkLastName('el1');
	checkAge('el2');
	checkImage('el4');
	checkEmail('el8');
	checkValidPass('el9');
	checkPassConf('el10');
	checkCountry('el5');
	checkCallingCode('el6');
	checkPhone('el7');
	
	return valid;
}


function fieldsValidationR()
{


var valid = true;
if(document.getElementById("el0").addEventListener)
{

document.getElementById("el0").addEventListener( "blur", 
function() { checkName('el0');});

document.getElementById("el1").addEventListener( "blur", 
function() { checkLastName('el1');});

document.getElementById("el2").addEventListener( "blur", 
function() { checkAge('el2');});

document.getElementById("el4").addEventListener( "blur", 
function() { checkImage('el4');});


document.getElementById("el8").addEventListener( "blur", 
function() { checkEmail('el8');});

document.getElementById("el9").addEventListener( "blur", 
function() { checkValidPass('el9');});

document.getElementById("el10").addEventListener( "blur", 
function() { checkPassConf('el10');});

document.getElementById("el5").addEventListener( "blur", 
function() { checkCountry('el5');});

document.getElementById("el6").addEventListener( "blur", 
function() { checkCallingCode('el6');});

document.getElementById("el7").addEventListener( "blur", 
function() { checkPhone('el7');});

}

else
{
	document.getElementById("el0").attachEvent( "onblur", 
function() { checkName('el0');});

document.getElementById("el1").attachEvent( "onblur", 
function() { checkLastName('el1');});

document.getElementById("el2").attachEvent( "onblur", 
function() { checkAge('el2');});

document.getElementById("el4").attachEvent( "onblur", 
function() { checkImage('el4');});


document.getElementById("el8").attachEvent( "onblur", 
function() { checkEmail('el8');});

document.getElementById("el9").attachEvent( "onblur", 
function() { checkValidPass('el9');});

document.getElementById("el10").attachEvent( "onblur", 
function() { checkPassConf('el10');});

document.getElementById("el5").attachEvent( "onblur", 
function() { checkCountry('el5');});

document.getElementById("el6").attachEvent( "onblur", 
function() { checkCallingCode('el6');});

document.getElementById("el7").attachEvent( "onblur", 
function() { checkPhone('el7');});


}


}