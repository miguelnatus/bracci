<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('slugify'))
{
    
    function slugify($string)
    {
        
        $CI =& get_instance(); 

        $CI->load->helper('text');
        $CI->load->helper('url');

        
        $string = str_replace("'", '-', $string);
        $string = str_replace(".", '-', $string);
        $string = str_replace("²", '2', $string);
        $string = str_replace("/", '/', $string);

       
        return url_title(convert_accented_characters($string), 'dash', true);
    }
}

if ( ! function_exists('line')){
    function line($string){
        return stripslashes(str_replace(array('\n\n\\','\n\n'),'<br/><br/>',$string)); 
    }
}