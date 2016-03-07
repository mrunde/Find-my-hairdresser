function chkFormNew() {
	// Überprüfe, ob die Adresse bestätigt wurde
	if (document.getElementById('lon').value == "" || document.getElementById('lat').value == "") {
		alert("Bitte bestätige zunächst die Adresse, indem du auf den Button \"Adresse bestätigen\" klickst!");
		return false;
	} else {
		// Überprüfe die Öffnungszeiten
		var error_hours = "Bitte gib die Öffnungszeiten korrekt ein!";
		if((((document.getElementById('hours_list_1_1_1').value == "") || (document.getElementById('hours_list_1_1_2').value == "")) && document.getElementById('mo_c').checked == false) ||
			(((document.getElementById('hours_list_2_1_1').value == "") || (document.getElementById('hours_list_2_1_2').value == "")) && document.getElementById('tu_c').checked == false) ||
			(((document.getElementById('hours_list_3_1_1').value == "") || (document.getElementById('hours_list_3_1_2').value == "")) && document.getElementById('we_c').checked == false) ||
			(((document.getElementById('hours_list_4_1_1').value == "") || (document.getElementById('hours_list_4_1_2').value == "")) && document.getElementById('th_c').checked == false) ||
			(((document.getElementById('hours_list_5_1_1').value == "") || (document.getElementById('hours_list_5_1_2').value == "")) && document.getElementById('fr_c').checked == false) ||
			(((document.getElementById('hours_list_6_1_1').value == "") || (document.getElementById('hours_list_6_1_2').value == "")) && document.getElementById('sa_c').checked == false) ||
			(((document.getElementById('hours_list_7_1_1').value == "") || (document.getElementById('hours_list_7_1_2').value == "")) && document.getElementById('su_c').checked == false))
		{
			alert(error_hours);
			return false;
		} else {
			return true;
		}
	}
	return true; // diese Zeile löschen, wenn Öffnungszeiten wieder kontrolliert werden
}