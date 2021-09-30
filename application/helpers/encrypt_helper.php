<?php 
	if (!function_exists('encode')) {
		function encode($id){
		    $CI = & get_instance();
		    $CI->load->library('encryption');
			// $base64		= $CI->encryption->encrypt($str);
			// $urisafe	= strtr($base64, '+/=', '-_,');
			$encode = str_replace(array('+', '/', '='), array('-', '_', '~'), $CI->encryption->encrypt($id)).'';
		    return $encode;
		}
	}

	if (!function_exists('decode')) {
		function decode($id){
		    $CI = & get_instance();
		    $CI->load->library('encryption');
			// $urisafe	= strtr($str, '-_,', '+/=');
			// $base64		= $CI->encryption->decrypt($urisafe);
			$decode = $CI->encryption->decrypt(str_replace(array('-', '_', '~'), array('+', '/', '='), $id));
		    return $decode;
		}
	}
?>