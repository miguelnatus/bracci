<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('upload_image')) {

        function upload_image($files) {
                $data = Array();
                $CI =& get_instance();
                $CI->load->library('upload');
                $dir_image = getcwd() . "/uploads/";

                $config['upload_path']          = $dir_image;
                $config['allowed_types']        = '*';
                // gif|jpg|jpeg|png|svg

                $config['max_size']             = 10000;
                $config['max_width']            = 10000;
                $config['max_height']           = 10000;

                $CI->upload->initialize($config);

                foreach ($files as $key => $value) :
                    if ($value['name']) :
                        if (!$CI->upload->do_upload($key)) :
                            echo '<pre>';
                            print_r($CI->upload->display_errors());
                            exit();
                            redirect(base_url($redirect.'/erro/'.$CI->upload->display_errors()));
                        else :
                            // echo '<pre>';
                            $nome_arquivo = $CI->upload->data();
                            $data[$key] = 'uploads/'.$nome_arquivo['file_name'];
                            // print_r($data);

                        endif;
                    endif;
                endforeach;
        	return $data;
        }

}