<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Auth {
    public function cek_auth()
    {

        $this->ci =& get_instance();
        $this->sesi  = $this->ci->session->userdata('isLogin');
        $this->hak = $this->ci->session->userdata('stat');


        $username = [];
        $password = null;
        
        // mod_php
        if (isset($_SERVER['PHP_AUTH_USER']))
        {
            $key = $this->ci->Key->getKey($_SERVER['PHP_AUTH_USER']);

            if ($key !='empty') {
            	foreach ($key as $key => $value) {   	
            		$username += [$value->key];
	             }
	           
	            $password = $_SERVER['PHP_AUTH_PW'];
	            $this->ci->session->set_userdata(array(
	                'keys' =>$username
	            ));
            }else{
            	echo 'akses ditolak'."\n";
            }
             
        }
        
        // most other servers
        elseif (isset($_SERVER['HTTP_AUTHENTICATION']))
        {
            if (strpos(strtolower($_SERVER['HTTP_AUTHENTICATION']),'basic')===0) 
                list($username,$password) = explode(':',base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));
        }
        
        if (!isset($_SERVER['PHP_AUTH_USER']))
        {
              if($this->sesi != TRUE){
                redirect('Authentication','refresh');
                exit();
            }
        }
        
        
    }
    public function hak_akses($kecuali="")
    {    
        if($this->hak==$kecuali){ 
            echo "<script>alert('Anda tidak berhak mengakses halaman ini!');</script>";
            redirect('dashboard');
        }elseif ($this->hak=="") {
            echo "<script>alert('Anda belum login!');</script>";
            redirect('Authentication');
        }else{
 
        }
    }
}