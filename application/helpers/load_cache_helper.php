<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('load_cache')) {

    function load_cache($page) {
    	$CI =& get_instance(); 
    	$CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));

		if ( ! $foo = $CI->cache->get('foo'))
		{
		     echo 'Saving to the cache!<br />';
		     $foo = 'foobarbaz!';

		     // Save into the cache for 5 minutes
		     $CI->cache->save('foo', $foo, 300);
		}

		echo $foo;

        if ($CI->cache->apc->is_supported()){
             echo 'funcionou';
             if ($data = $CI->cache->apc->get('my_cache'))
             {
                  // do things.
                echo 'funcionou';
             }
        }
        else{
            echo 'não funcionou';
        }
    	
    	// $CI =& get_instance(); 

    	// $CI->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
    	// if(!$CI->cache->get($page)){
    	// 	$array = array('one'=>1,'two'=>2);
    	// 	$CI->cache->save($page,$array,300);
    	// }

    	// if($CI->cache->apc->is_supported()){
    	// 	echo 'driver is available';
    	// }
    	// else{
    	// 	echo 'not available';
    	// }

    	// $showCache = $CI->cache->cache_info();
    	// var_dump($showCache);
       
    }

}