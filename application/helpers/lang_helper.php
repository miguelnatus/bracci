<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('lang')) {

    function lang($lang,$key) {
        
        if($lang!='pt'){
        	return $key.'_'.$lang;
        }
        else{
        	return $key;
        }
        
    }

}