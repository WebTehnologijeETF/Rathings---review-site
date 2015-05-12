

function tree(id)
{

	

	var c = document.getElementById(id);
	
	var o;
	
	if(id[0] == 'f') // first item
		 o = document.getElementById("s" + id[1]);
	else if(id[0] == 's') // second item
		 o = document.getElementById("t" + id[2]);
		
		
		if(o.style.display === 'block') // subelement is open
		{
			o.style.display= 'none';
		
			c.className = c.className.replace(/\bopened\b/,'');
			c.className += " closed";
		
		
		}
		else // subelement is closed
		{
			o.style.display = 'block';
			
			c.className = c.className.replace(/\bclosed\b/,'');
			c.className += " opened";
		
		}
	
	
	


}

