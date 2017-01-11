function film() {
	document.getElementById("1").style.visibility = "visible";
	document.getElementById("1").style.height = "auto";
	
	document.getElementById("2").style.visibility = "hidden";
	document.getElementById("3").style.visibility = "hidden";
	document.getElementById("2").style.height = "0";
	document.getElementById("3").style.height = "0";
}

function serie() {
	document.getElementById("2").style.visibility = "visible";
	document.getElementById("2").style.height = "auto";
	
	document.getElementById("1").style.visibility = "hidden";
	document.getElementById("3").style.visibility = "hidden";
	document.getElementById("1").style.height = "0";
	document.getElementById("3").style.height = "0";
}

function anime() {
	document.getElementById("3").style.visibility = "visible";
	document.getElementById("3").style.height = "auto";
	
	document.getElementById("1").style.visibility = "hidden";
	document.getElementById("2").style.visibility = "hidden";
	document.getElementById("1").style.height = "0";
	document.getElementById("2").style.height = "0";
}