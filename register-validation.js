

function validateForm()
{

	valid = true;
	checkName('el0');
	checkLastName('el1');
	checkAge('el2');
	checkImage('el4');
	checkEmail('el5');
	checkValidPass('el6');
	checkPassConf('el7');
	
	return valid;
}


window.addEventListener('load',function(){


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


document.getElementById("el5").addEventListener( "blur", 
function() { checkEmail('el5');});

document.getElementById("el6").addEventListener( "blur", 
function() { checkValidPass('el6');});

document.getElementById("el7").addEventListener( "blur", 
function() { checkPassConf('el7');});

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


document.getElementById("el5").attachEvent( "onblur", 
function() { checkEmail('el5');});

document.getElementById("el6").attachEvent( "onblur", 
function() { checkValidPass('el6');});

document.getElementById("el7").attachEvent( "onblur", 
function() { checkPassConf('el7');});


}


});