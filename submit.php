<html>
<head>
	<title>Friseur hinzugefügt</title>
</head>

<body>
	<?php
		require("php/db_info.php");
		
		// Opens a connection to a pgAdmin server
		$connection=pg_connect("host=$host port=$port dbname=$database user=$username password=$password connect_timeout=5");
		if (!$connection) {
			die('Not connected : ' . pg_last_error() );
		}
		
		// Name
		$fr_name = $_POST["name"];
		// Adresse
		$fr_street = $_POST["street"];
		$fr_housenr = $_POST["house_nr"];
		$pc = $_POST["postal_code"];
		$town = $_POST["town"];
		$lon = $_POST["lon"];
		$lat = $_POST["lat"];
		// Telefonnummern
		$fr_tel_1 = $_POST["tel_1"];
		$fr_tel_2 = $_POST["tel_2"];
		$fr_tel_m = $_POST["tel_3"];
		$fr_tel_f = $_POST["tel_4"];
		// Internet
		$fr_web = $_POST["website"];
		$fr_email = $_POST["email_adress"];
		
		
		//Terminabsprache edited by Nicho
		
		if ( !isset($_POST['terminabsprache']) 
			or !isset($_POST['terminabsprache']) 
			or $_POST['terminabsprache'] == "" 
			or $_POST['terminabsprache'] == "")
		
			{$fr_termin = "FALSE";}
		
		else {$fr_termin = "TRUE";}
					
		
		
		// Öffnungszeiten
		$mon_o1 = $_POST["hours_list_1_1_1"];
		$mon_c1 = $_POST["hours_list_1_1_2"];
		$mon_o2 = $_POST["hours_list_1_2_1"];
		$mon_c2 = $_POST["hours_list_1_2_2"];
		
		$tue_o1 = $_POST["hours_list_2_1_1"];
		$tue_c1 = $_POST["hours_list_2_1_2"];
		$tue_o2 = $_POST["hours_list_2_2_1"];
		$tue_c2 = $_POST["hours_list_2_2_2"];
		
		$wed_o1 = $_POST["hours_list_3_1_1"];
		$wed_c1 = $_POST["hours_list_3_1_2"];
		$wed_o2 = $_POST["hours_list_3_2_1"];
		$wed_c2 = $_POST["hours_list_3_2_2"];
			
		$thu_o1 = $_POST["hours_list_4_1_1"];
		$thu_c1 = $_POST["hours_list_4_1_2"];
		$thu_o2 = $_POST["hours_list_4_2_1"];
		$thu_c2 = $_POST["hours_list_4_2_2"];
			
		$fri_o1 = $_POST["hours_list_5_1_1"];
		$fri_c1 = $_POST["hours_list_5_1_2"];
		$fri_o2 = $_POST["hours_list_5_2_1"];
		$fri_c2 = $_POST["hours_list_5_2_2"];
			
		$sat_o1 = $_POST["hours_list_6_1_1"];
		$sat_c1 = $_POST["hours_list_6_1_2"];
		$sat_o2 = $_POST["hours_list_6_2_1"];
		$sat_c2 = $_POST["hours_list_6_2_2"];
			
		$sun_o1 = $_POST["hours_list_7_1_1"];
		$sun_c1 = $_POST["hours_list_7_1_2"];
		$sun_o2 = $_POST["hours_list_7_2_1"];
		$sun_c2 = $_POST["hours_list_7_2_2"];
		
		// Preise
		$pr_m1 = $_POST["pr_m1"];
		$pr_m2 = $_POST["pr_m2"];
		$pr_f1 = $_POST["pr_f1"];
		$pr_f2 = $_POST["pr_f2"];
		$pr_k = $_POST["pr_k"];
		
		// Info
		$fr_info = $_POST["further_info"];
				
		$eintrag = "INSERT INTO hairdresser (lon,lat,fr_name,fr_street,fr_housenr,fr_pc,fr_town,fr_web,fr_email,fr_tel_1,fr_tel_2,fr_tel_m,fr_tel_f,fr_info,fr_termin,mon_o1,mon_c1,mon_o2,mon_c2,tue_o1,tue_c1,tue_o2,tue_c2,wed_o1,wed_c1,wed_o2,wed_c2,thu_o1,thu_c1,thu_o2,thu_c2,fri_o1,fri_c1,fri_o2,fri_c2,sat_o1,sat_c1,sat_o2,sat_c2,sun_o1,sun_c1,sun_o2,sun_c2,pr_m1,pr_m2,pr_f1,pr_f2,pr_k) VALUES ('$lon','$lat','$fr_name','$fr_street','$fr_housenr','$pc','$town','$fr_web','$fr_email','$fr_tel_1','$fr_tel_2','$fr_tel_m','$fr_tel_f','$fr_info','$fr_termin','$mon_o1','$mon_c1','$mon_o2','$mon_c2','$tue_o1','$tue_c1','$tue_o2','$tue_c2','$wed_o1','$wed_c1','$wed_o2','$wed_c2','$thu_o1','$thu_c1','$thu_o2','$thu_c2','$fri_o1','$fri_c1','$fri_o2','$fri_c2','$sat_o1','$sat_c1','$sat_o2','$sat_c2','$sun_o1','$sun_c1','$sun_o2','$sun_c2','$pr_m1','$pr_m2','$pr_f1','$pr_f2','$pr_k')";
		
		$eintragen = pg_query($connection, $eintrag);
		
		if($eintragen == true)
		{
			echo "The hairdresser <b>$fr_name</b> has been created and saved.<br/><a href=\"index.html\">OK</a>";
		}
		else
		{
			echo "Error when trying to save the hairdresser. <a href=\"index.html\">Back</a>";
		}
		
		pg_close($connection);
	?> 
</body>
</html>