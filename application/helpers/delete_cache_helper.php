<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	if (!function_exists('delete_cache')) {

		function delete_cache(){

			$dir = APPPATH.'cache/';

		    if (is_dir($dir)) {

			    $iterator = new \FilesystemIterator($dir);

			    if ($iterator->valid()) {

			        $di = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
			        $ri = new RecursiveIteratorIterator($di, RecursiveIteratorIterator::CHILD_FIRST);

			        foreach ( $ri as $file ) {
			        	
			        	if($file!=APPPATH.'cache/index.html'){
			        		$file->isDir() ?  rmdir($file) : unlink($file);
			        	}

			        }
			    }
			}			

		}

	}