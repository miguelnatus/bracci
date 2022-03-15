<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('assets_version')) {

    function assets_version($asset_path) {
        $path = pathinfo($asset_path);
        $ver = filemtime(FCPATH . $asset_path);
        
        return $path['dirname'].'/'.$path['basename']."?v=".$ver;
    }

}