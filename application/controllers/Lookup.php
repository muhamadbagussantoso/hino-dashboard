<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lookup extends CI_Controller{
    function __construct(){
  parent::__construct();

        $this->auth->cek_auth(); //ngambil auth dari library
        $this->afterAuth = $this->session->userdata('logged_in');

        $getAccount = $this->ModelAuth->ambil_user($this->session->userdata('uname'));
        $this->getLookupType = $this->Lookup->getLookupValue();
        
        $this->menu = array('lookup' => 'active');

        $titleHeader = 'Beranda | Port Dashboard';
        $this->data = array(    
            'user'    => $getAccount,
            'title' => $titleHeader,
            'modules'=> 'Kategori',
            'page' => 'Daftar Kategori',
            'auth' => $this->afterAuth,
            'css' => 'lookup.css',
            'menu' => $this->menu,
            );

        $this->role = $this->session->userdata('role');

    }

    public function index()
    {

        if($this->role == 1){

            $this->data += [ "lookupData" => $this->getLookupType ];    
            $this->template->lookup('lookup',$this->data);

        }else{ //user

            $this->load->view('front/User/dashboard_user',$this->data);
        }
    }

    public function LookupValue()
    {
        header('Content-type: text/javascript');
        $data=  $this->Lookup->getLookupValue();

        $json = json_encode(array('data' => $data), JSON_PRETTY_PRINT);

        echo $json;
    }


    public function insertLookupType()
    {
         $getData = $this->input->post('data');

        $data = array(
                      'type_code'     => $getData[0],
                      'type_title' =>  $getData[1],
                      'type_description ' =>  $getData[2]
                      );

        $this->Lookup->insertLookupType($data);

    }
}