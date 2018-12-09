<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller 
{
    // perintah logout
    public function index()
    {
        $this->session->sess_destroy();
        redirect('authentication', 'refresh');
    }
}