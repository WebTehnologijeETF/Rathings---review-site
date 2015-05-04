
function setError(divNumber, text)
{
	var d = document.getElementsByClassName('error')[divNumber];
	var t = document.getElementsByClassName('celement')[divNumber];
	if(t==null)
		t = document.getElementsByClassName('selement')[divNumber];
		
	if((" " + t.className + " " ).indexOf( " "+"ctrl_error"+" " ) <= -1) // if it doesn't contain the error class
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
	//t.classList.remove("ctrl_error"); works only on IE10+
	t.className = t.className.replace(/\bctrl_error\b/,'');
	

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

function validDigit(text)
{
	var reg = /^[0-9]+$/;
	if(!reg.test(text)) return false;
	return true;


}

function validPass(text)
{
	// password must contain at least one digit and one capital letter
	
	
	var reg = /^.*[A-Z]+.*\d+.*$/;
	if(!reg.test(text)) return false;
	return true;
	


}

function checkName(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(id[2], 'You must enter your first name.');
		validC = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	

}


function checkPName(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(id[2], 'You must enter the product name.');
		validC = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	

}

function checkLastName(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(id[2], 'You must enter your last name.');
		valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	

}

function checkEmail(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{	setError(id[2], 'You must enter your email address.');
		valid = false;
	}
	else if (!validEmail(c.value))
	{
			setError(id[2], 'You must enter a valid email address.');
			valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	

}

function checkRating(id)
{
	var c = document.getElementById(id);
	if ((c.validity) && (!c.validity.valid))
	{
      setError(id[2], 'You must enter a number between 1 and 10.');
	  valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	
}


function checkMessage(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{
		setError(id[2], 'You must enter your message.');
		valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}

}

function checkDescription(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{
		setError(id[2], 'You must enter a description.');
		valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}

}



function checkPass(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{
		setError(id[2], 'You must enter your password.');
		valid = false;
	
	}
	else
	{
		resolveError(id[2]);
	
	}


}

function checkAge(id)
{
	var c = document.getElementById(id);
	if(isEmpty(c.value))
	{
		setError(id[2], 'You must provide your age.');
		valid = false;
	
	}
	else if ((c.validity) && (!c.validity.valid))
	{
      setError(id[2], 'You must be aged between 15 and 99 to register.');
	  valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}

}

function checkImage(id)
{
	// permitted extensions: .jpg, .jpeg, .png, .gif, .bmp, .ico
	
	var ext = ["jpg", "png", "gif", "bmp", "ico"];
	var c = document.getElementById(id);
	var b = false;

	if(c.value.length >=4)
	{
		s = c.value.substr(c.value.length - 3);
		
	for(var i=0;i<ext.length;i++)
		if(s == ext[i]) b = true;
		
	if(c.value.length >=5 && c.value.substr(c.value.length - 4) == 'jpeg')
		b = true;
		
	}
	else 
		b = true; // empty
		
		
	if(!b)
	{
		setError(id[2], "Invalid picture format");
	  valid = false;
		
	
	}
	else
		resolveError(id[2]);
	

}

function checkPImage(id)
{
	// permitted extensions: .jpg, .jpeg, .png, .gif, .bmp, .ico
	
	var ext = ["jpg", "png", "gif", "bmp", "ico"];
	var c = document.getElementById(id);
	var b = false;
	
	
	
	
	
	if(c.value.length >=4)
	{
		s = c.value.substr(c.value.length - 3);
		
	for(var i=0;i<ext.length;i++)
		if(s == ext[i]) b = true;
		
	if(c.value.length >=5 && c.value.substr(c.value.length - 4) == 'jpeg')
		b = true;
		
	}
	else 
	{
		
	
		setError(id[2], 'You must provide a product image.');
		valid = false;
		b = false; // empty
		return;
		
	}
		
		
	if(!b)
	{
		setError(id[2], "Invalid picture format");
		valid = false;
		
	
	}
	else
	
		
		resolveError(id[2]);
	

}

function checkValidPass(id)
{

	var c = document.getElementById(id);

	if(isEmpty(c.value))
	{	setError(id[2], 'You must provide a password.');
		valid = false;
	}
	else if(c.value.toString().length < 8)
	{
		setError(id[2], 'Your password must be at least 8 characters long');
		valid = false;
	
	}
	else if (!validPass(c.value))
	{
			setError(id[2], 'Your password must contain at least one digit and one capital.');
			valid = false;
	}
	else
	{
			resolveError(id[2]);
			
	}
	
	



}

function checkPassConf(id)
{
	var c = document.getElementById(id);

	var p = document.getElementById('el9'); // first password
	
	if(isEmpty(c.value))
	{	setError(id[2] + id[3], 'You must confirm your password.');
		valid = false;
	}
	else if(p.value != null && c.value != p.value)
	{	setError(id[2], "The two passwords don't match");
		valid = false;
	}
	else
	{
			resolveError(id[2] + id[3]);
			
	}
	
	


}


function checkCountry(id)
{
	var c = document.getElementById(id);

	
	
	if(isEmpty(c.value))
	{	setError(id[2], 'You must enter your country.');
		valid = false;
	}
	
	else
	{
			var ajax = new XMLHttpRequest();
			var param = "https://restcountries.eu/rest/v1/name/" + c.value;
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
				var country = JSON.parse(ajax.responseText)[0].name;
				if(c.value.toUpperCase() == country.toUpperCase() )
					resolveError(id[2]);
					else
					{
						setError(id[2], "The country you entered doesn't exist");
					valid = false;
					
					
					}
					
					
			}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					setError(id[2], "The country you entered doesn't exist");
					valid = false;
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();

			
			
	}


}


function checkCallingCode(id)
{
	var c = document.getElementById(id);

	
		if(isEmpty(c.value))
	{
		setError(id[2], 'You must enter your country calling code');
		valid = false;
	
	}


	
	else
	{
			var ajax = new XMLHttpRequest();
			var param = "https://restcountries.eu/rest/v1/callingcode/" + c.value
			
			ajax.onreadystatechange = function() {// Anonimna funkcija
			if (ajax.readyState == 4 && ajax.status == 200)
			{
			
				var country = document.getElementById('el5').value;
			
				var data = JSON.parse(ajax.responseText);
				if(data[0].name.toUpperCase() != country.toUpperCase())
				{
					setError(id[2], "The calling code you entered doesn't match the country");
					valid = false;
				
				}
				else
				resolveError(id[2]);
				
				}
			if (ajax.readyState == 4 && ajax.status == 404)
				{
					setError(id[2], "The calling code you entered doesn't exist");
					valid = false;
				
				
				}
		}
			ajax.open("GET", param, true);
			ajax.send();

			
			
	}


}


function checkPhone(id)
{
	var c = document.getElementById(id);

	
		if(isEmpty(c.value))
	{
		setError(id[2], 'You must enter your phone number');
		valid = false;
	
	}
	else if(!validDigit(c.value))
	{
		setError(id[2], 'You must enter a valid phone number');
		valid = false;
	
	}
	else
		resolveError(id[2]);
	

}


