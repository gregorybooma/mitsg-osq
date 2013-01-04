<?php 
// Create a function for escaping the data.
function escape_data ($data) {
	
	// Address Magic Quotes.
	if (ini_get('magic_quotes_gpc')) {
		$data = stripslashes($data);
	}
	
	// Check for mysql_real_escape_string() support.
	//if (function_exists('mysql_real_escape_string')) {
	//	global $dbc_PC; // Need the connection.
	//	$data = mysql_real_escape_string (trim($data), $dbc_PC);
	//} else {
		$data = mysql_escape_string (trim($data));
	//}

	// Return the escaped value.	
	return $data;

} // End of function.
?>
