window.onload = function() {
	var beads = document.getElementsByClassName('bead');
	
	for (i = 0; i < beads.length; i++) {
		beads[i].onclick = floatChanging;
	}
	
	function floatChanging(pearl) {
			if (pearl.target.style.cssFloat == "left") {
	    		pearl.target.style.cssFloat = "right";
		    } else {
		    	pearl.target.style.cssFloat = "left";
		    }
}}