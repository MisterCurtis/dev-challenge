<?php

function my_strpos($haystack, $needle, $offset = 0)
{
	$haystack_len = strlen( $haystack );

	if( $haystack_len == 0 ){
		return false;
	}

	if( !is_string( $needle ) ){
		$needle = chr( intval( $needle ) );
	}

	$needle_len = strlen( $needle );

	if( $needle_len == 0 ){
		return false;
	}

	if( $offset < 0 || $offset > strlen( $haystack ) ) {
		trigger_error( "my_strpos(): Offset not contained in string", E_USER_WARNING );
		return;
	}

	$haystack = substr( $haystack, $offset );

	$i = 0;

	while( $i < $haystack_len-$needle_len ){	
		if( substr($haystack, $i, $needle_len) == $needle ){
			return $i + $offset;
		}
		$i++;
	}

	return false;
}

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

# Should print "17"
print(my_strpos($alphabet, 'r') . "\n");

# Should print "6"
print(my_strpos($alphabet, 'ghi') . "\n");

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'u', 22));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'A'));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'ghk'));
