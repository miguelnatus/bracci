<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('url_test')) {

    function url_test($file) {
    	
		$file_headers = @get_headers( $file );

		$is_the_file_accessable = true;

		if( strpos( $file_headers[0], ' 200 OK' ) !== false ){
		    $is_the_file_accessable = false;
		}

		if( $is_the_file_accessable ){
			return base_url($file);
		    // echo 'não acessada';
		}
		else{
			return $file;
			// echo 'acessada';
		}
	}
}