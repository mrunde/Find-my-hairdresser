<?php
	require("db_info.php");

	function parseToXML($htmlStr) 
	{ 
	$xmlStr=str_replace('<','&lt;',$htmlStr); 
	$xmlStr=str_replace('>','&gt;',$xmlStr); 
	$xmlStr=str_replace('"','&quot;',$xmlStr); 
	$xmlStr=str_replace("'",'&apos;',$xmlStr); 
	$xmlStr=str_replace("&",'&amp;',$xmlStr); 
	return $xmlStr; 
	} 

	// Opens a connection to a pgAdmin server
	$connection=pg_connect("host=$host port=$port dbname=$database user=$username password=$password connect_timeout=5");
	if (!$connection) {
		die('Not connected : ' . pg_last_error() );
	}

	// Set the active pgAdmin database
	//$db_selected = pg_select("connection=$connection table_name='hairdressers'");
	//if (!$db_selected) {
	//  die ('Can\'t use db : ' . pg_last_error());
	//}

	// Select all the rows in the markers table
	$query = "SELECT * FROM hairdresser";
	$result = pg_query($connection, $query);
	if (!$result) {
		die('Invalid query: ' . pg_last_error());
	}

	header("Content-type: text/xml");

	// Start XML file, echo parent node
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<markers>';

	// Iterate through the rows, printing XML nodes for each
	while ($row = @pg_fetch_assoc($result)){
		// ADD TO XML DOCUMENT NODE
		echo '<marker ';
		echo 'fr_id="' . parseToXML($row['fr_id']) . '" ';
		echo 'fr_name="' . parseToXML($row['fr_name']) . '" ';
		echo 'lat="' . parseToXML($row['lat']) . '" ';
		echo 'lon="' . parseToXML($row['lon']) . '" ';
		echo 'fr_street="' . parseToXML($row['fr_street']) . '" ';
		echo 'fr_housenr="' . parseToXML($row['fr_housenr']) . '" ';
		echo 'fr_pc="' . parseToXML($row['fr_pc']) . '" ';
		echo 'fr_town="' . parseToXML($row['fr_town']) . '" ';
		echo 'fr_web="' . parseToXML($row['fr_web']) . '" ';
		echo 'fr_email="' . parseToXML($row['fr_email']) . '" ';
		echo 'fr_tel_1="' . parseToXML($row['fr_tel_1']) . '" ';
		echo 'fr_tel_2="' . parseToXML($row['fr_tel_2']) . '" ';
		echo 'fr_tel_m="' . parseToXML($row['fr_tel_m']) . '" ';
		echo 'fr_tel_f="' . parseToXML($row['fr_tel_f']) . '" ';
		echo 'fr_info="' . parseToXML($row['fr_info']) . '" ';
		echo 'fr_termin="' . parseToXML($row['fr_termin']) . '" ';
		echo 'mon_o1="' . parseToXML($row['mon_o1']) . '" ';
		echo 'mon_c1="' . parseToXML($row['mon_c1']) . '" ';
		echo 'mon_o2="' . parseToXML($row['mon_o2']) . '" ';
		echo 'mon_c2="' . parseToXML($row['mon_c2']) . '" ';
		echo 'tue_o1="' . parseToXML($row['tue_o1']) . '" ';
		echo 'tue_c1="' . parseToXML($row['tue_c1']) . '" ';
		echo 'tue_o2="' . parseToXML($row['tue_o2']) . '" ';
		echo 'tue_c2="' . parseToXML($row['tue_c2']) . '" ';
		echo 'wed_o1="' . parseToXML($row['wed_o1']) . '" ';
		echo 'wed_c1="' . parseToXML($row['wed_c1']) . '" ';
		echo 'wed_o2="' . parseToXML($row['wed_o2']) . '" ';
		echo 'wed_c2="' . parseToXML($row['wed_c2']) . '" ';
		echo 'thu_o1="' . parseToXML($row['mon_o1']) . '" ';
		echo 'thu_c1="' . parseToXML($row['thu_c1']) . '" ';
		echo 'thu_o2="' . parseToXML($row['thu_o2']) . '" ';
		echo 'thu_c2="' . parseToXML($row['thu_c2']) . '" ';
		echo 'fri_o1="' . parseToXML($row['fri_o1']) . '" ';
		echo 'fri_c1="' . parseToXML($row['fri_c1']) . '" ';
		echo 'fri_o2="' . parseToXML($row['fri_o2']) . '" ';
		echo 'fri_c2="' . parseToXML($row['fri_c2']) . '" ';
		echo 'sat_o1="' . parseToXML($row['sat_o1']) . '" ';
		echo 'sat_c1="' . parseToXML($row['sat_c1']) . '" ';
		echo 'sat_o2="' . parseToXML($row['sat_o2']) . '" ';
		echo 'sat_c2="' . parseToXML($row['sat_c2']) . '" ';
		echo 'sun_o1="' . parseToXML($row['sun_o1']) . '" ';
		echo 'sun_c1="' . parseToXML($row['sun_c1']) . '" ';
		echo 'sun_o2="' . parseToXML($row['sun_o2']) . '" ';
		echo 'sun_c2="' . parseToXML($row['sun_c2']) . '" ';
		echo 'pr_m1="' . parseToXML($row['pr_m1']) . '" ';
		echo 'pr_m2="' . parseToXML($row['pr_m2']) . '" ';
		echo 'pr_f1="' . parseToXML($row['pr_f1']) . '" ';
		echo 'pr_f2="' . parseToXML($row['pr_f2']) . '" ';
		echo 'pr_k="' . parseToXML($row['pr_k']) . '" ';
		echo '/>';
	}

	// End XML file
	echo '</markers>';
?>