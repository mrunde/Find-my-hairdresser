// ein-/ausklappen eines Elementes
function toggle(control) {
	var elem = document.getElementById(control);

	if (elem.style.display == "none") {
		elem.style.display = "block";
	} else {
		elem.style.display = "none";
	}
}

// ausklappen eines Elementes
function toggleDisplay(control) {
	var elem = document.getElementById(control);
	
	if (elem.style.display == "none") {
		elem.style.display = "block";
	}
}

// einklappen eines Elementes
function toggleHide(control) {
	var elem = document.getElementById(control);
	
	elem.style.display = "none";
}

// ausklappen explizit nur für weitere Telefonnummern!
function multitoggle(control1, control2, control3, control4, control5, control6, controlParent) {
	var elem1 = document.getElementById(control1);
	var elem2 = document.getElementById(control2);
	var elem3 = document.getElementById(control3);
	var elem4 = document.getElementById(control4);
	var elem5 = document.getElementById(control5);
	var elem6 = document.getElementById(control6);
	var elem7 = document.getElementById(controlParent);
	
	elem1.style.display = "block";
	elem2.style.display = "block";
	elem3.style.display = "block";
	elem4.style.display = "block";
	elem5.style.display = "block";
	elem6.style.display = "block";
	elem7.style.display = "none";
}