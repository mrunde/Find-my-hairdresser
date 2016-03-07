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
  echo '<filter ';
  echo 'fr_id="' . parseToXML($row['fr_id']) . '" ';
  echo 'fr_name="' . parseToXML($row['fr_name']) . '" ';
  echo 'fr_street="' . parseToXML($row['fr_street']) . '" ';
  echo 'fr_housenr="' . parseToXML($row['fr_housenr']) . '" ';
  echo 'fr_pc="' . parseToXML($row['fr_pc']) . '" ';
  echo 'fr_town="' . parseToXML($row['fr_town']) . '" ';
  echo 'fr_web="' . parseToXML($row['fr_web']) . '" ';
  echo 'fr_info="' . parseToXML($row['fr_info']) . '" ';
  echo 'pr_m1="' . parseToXML($row['pr_m1']) . '" ';
  echo 'pr_m2="' . parseToXML($row['pr_m2']) . '" ';
  echo 'pr_f1="' . parseToXML($row['pr_f1']) . '" ';
  echo 'pr_f2="' . parseToXML($row['pr_f2']) . '" ';
  echo 'pr_k="' . parseToXML($row['pr_k']) . '" '; 
  echo 'lon="' . parseToXML($row['lon']) . '" ';
  echo 'lat="' . parseToXML($row['lat']) . '" ';

  echo '/>';
}

// End XML file
echo '</filter>';

?>