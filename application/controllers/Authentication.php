<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authentication extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->titleHeader = array('Init | Project');
    }
    function index()
    {
        $session = $this->session->userdata('isLogin'); //mengabil dari session apakah sudah login atau belum
        if($session == FALSE) //jika session false maka akan menampilkan halaman login
        {
			$title = 'Login | Project';
			// echo $title;die();
            $this->load->view('auth/login_form',$title);
        }else{
			//jika session true maka di redirect ke halaman dashboard
           redirect('dashboard','refresh');
        }
    }
    function do_login()
    {
        $username = $this->input->post("uname");
        $password = $this->input->post("pass");
        
        $cek = $this->ModelAuth->cek_user($username,md5($password)); //melakukan persamaan data dengan database

        if(count($cek) == 1){ //cek data berdasarkan username & pass
			
            foreach ($cek as $cek) {
				
                $role = $cek['role']; //mengambil data(level/hak akses) dari database
				//var_dump($level);die();
            }
            $this->session->set_userdata(array(
                'isLogin'   => TRUE, //set data telah login
                'uname'  => $username, //set session username
                'role'      => $role, //set session hak akses
            ));
            // var_dump( $this->session);die();
            redirect('Dashboard','refresh');  //redirect ke halaman dashboard
        }else{ //jika data tidak ada yng sama dengan database
            echo "<script>alert('Gagal Login!')</script>";
            redirect('login','refresh');
        }
        
    }
}