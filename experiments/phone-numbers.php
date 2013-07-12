<?php
$filterMe = "
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut 
labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco 
laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in 
voluptate velit esse cillum dolore eu fugiat nulla pariatur. no text messages 8-16 //eight /zero three /668 five.  
Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim 
id est laborum.";

function decryptPhone( $string = null, $call = true, $txt = null ) {
	// words and theit associated number
	$txtNumbers = array(
		"zero" => 0,
		"one"=> 1,
		"two" => 2,
		"three" => 3,
		"four" => 4,
		"five" => 5,
		"six" => 6,
		"seven" => 7,
		"eight" => 8,
		"nine" => 9
	);
	
	// remove special characters
	$phoneNumber = preg_replace( '/[^a-zA-Z0-9]/s', '', $string );
	// convert words to numbers
	$phoneNumber = str_replace( array_keys( $txtNumbers ), $txtNumbers, $phoneNumber );
	// remove stray letters
	$phoneNumber = preg_replace( '/([a-zA-Z])/s', '', $phoneNumber );
	// remove all spaces
	$phoneNumber = preg_replace( '/\s+/', '', $phoneNumber );
	
	// custom string, or the actual phone number
	if( $txt ) :
		$text = $txt;
	else :
		$text = $phoneNumber;
	endif;	
	
	
	$allowSMS = "do not text|no texts|no text message|no text messages|no sms|don\'t text|dont text";
	
	$checkAllowSMS = preg_match( '~\b(' . $allowSMS . ')\b~i', $string );

	
	// phone or SMS protocol returned
	if( strlen( $phoneNumber ) >= 10 && strlen( $phoneNumber ) < 12 ) :
		// return phone number
		if( $call ) :
			return "<a href='tel:$phoneNumber'>$text</a>";
		// return SMS, unless it was stated not to in the content
		else :
			if ( $checkAllowSMS < 1 )	
				return "<a href='sms:$phoneNumber'>$text</a>";
		endif;
	endif;
}

echo "<p>Original: {$filterMe}</p>";
echo '<hr />';
echo '<p>' . decryptPhone( $filterMe, true, 'Call me' ) . '</p>';
echo '<p>' . decryptPhone( $filterMe, false, 'Text me' ) . '</p>';
echo '<hr />';
