window.onload = function() {
	var beads = document.getElementsByClassName('bead');
	function floatChanging(pearl) {
		if (pearl.target.style.cssFloat == "null" || pearl.target.style.cssFloat == "") {
			if (pearl.target.className == "bead beadleft") {
				pearl.target.style.cssFloat = "right";
		    } else {
		    	pearl.target.style.cssFloat = "left";
		    }
		} else 
			if (pearl.target.style.cssFloat == "left") {
	    		pearl.target.style.cssFloat = "right";
		    } else {
		    	pearl.target.style.cssFloat = "left";
		    }
		}
	for (i = 0; i < beads.length; i++) {
		beads[i].onclick = floatChanging;
	}
}