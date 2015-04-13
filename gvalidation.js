
function setError(divNumber, text)
{
	var d = document.getElementsByClassName('error')[divNumber];
	var t = document.getElementsByClassName('celement')[divNumber];
	t.className += " ctrl_error";
	d.className += " error_img";
	d.getElementsByTagName('p')[0].innerHTML = text;
	
	

}

function resolveError(divNumber)
{

	var d = document.getElementsByClassName('error')[divNumber];
	var t = document.getElementsByClassName('celement')[divNumber];
	d.getElementsByTagName('p')[0].innerHTML = "";
	d.className = "error";
	t.classList.remove("ctrl_error");
	

}

function isEmpty(text)
{
	if (text.length == 0) return true;
	return false;

}

function validEmail(text)
{
	var reg = /^.+@.+$/;
	if(!reg.test(text)) return false;
	return true;

}

function validRating(text)
{
	var reg = /^\d+$/;
	if(!reg.test(text.toString())) return false;
	if(parseInt(text) > 10 || parseInt(text) < 1) return false;
	return true;


}

function checkName(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(0, 'You must enter your first name.');
		valid = false;
	}
	else
	{
			resolveError(0);
			
	}
	

}

function checkLastName(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value)) setError(1, 'You must enter your last name.');
	else
	{
			resolveError(1);
			
	}
	

}

function checkEmail(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(2, 'You must enter your email address.');
		valid = false;
	}
	else if (!validEmail(c.value))
	{
			setError(2, 'You must enter a valid email address.');
			valid = false;
	}
	else
	{
			resolveError(2);
			
	}
	

}

function checkRating(id)
{
	var c = document.getElementById(id);
	if ((c.validity) && (!c.validity.valid))
	{
      setError(3, 'You must enter a number between 1 and 10.');
	  valid = false;
	}
	else
	{
			resolveError(3);
			
	}
	
}


function checkMessage(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{
		setError(5, 'You must enter your message.');
		valid = false;
	}
	else
	{
			resolveError(5);
			
	}

}


function validateForm()
{

	valid = true;
	checkName('el0');
	checkLastName('el1');
	checkEmail('el2');
	checkRating('el3');
	checkMessage('el5');
	
	return valid;
}


window.addEventListener('load',function(){


var valid = true;

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



});