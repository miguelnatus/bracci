<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('get_link')) {

    function tirarAcentos($string){
	    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
	}

    function get_link($lang,$ref,$nome) {
       $nome = tirarAcentos($nome);
       $ref = str_replace(' ', '', $ref);
       return base_url(strtolower($lang.'/'.$ref.'-'.str_replace(' ', '-', $nome)));
        
    }



}

