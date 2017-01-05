document.getElementById("img1").onmouseover = function() {mouseOver()};
document.getElementById("img1").onmouseout = function() {mouseOut()};

function mouseOver() {
	  document.getElementById("img1").style.opacity = "0.8";
}

function mouseOut() {
	  document.getElementById("img1").style.opacity = "1";
	  
}


function remove1() {
	document.getElementById("1").style.visibility = "hidden";
	document.getElementById("1").style.height = "0px";
	document.getElementById("2").style.visibility = "visible";
	document.getElementById("2").style.height = "auto";
}


