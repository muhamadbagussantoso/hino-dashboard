<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->auth->cek_auth(); //ngambil auth dari library
		$this->afterAuth = $this->session->userdata('logged_in');

		$getAccount = $this->ModelAuth->ambil_user($this->session->userdata('uname'));

        
        $this->menu = array('lookup' => '');
		$titleHeader = 'Beranda | Project';
		$this->data = array(	
			'user'	=> $getAccount,
			'title' => $titleHeader,
			'modules'=> 'Dashboard',
			'page' => '',
			'auth' => $this->afterAuth,
			'menu' => $this->menu,
			);

		$this->role = $this->session->userdata('role');
	}
	function index()
	{

		$role = $this->session->userdata('role');
		$key = $this->session->userdata('keys');
		if($role == 1){

			$this->template->display('display',$this->data);
		}
		elseif( count($key) > 0){

			echo "ada key";

		}else{

			 show_404();
			$this->output->set_status_header('404');
		}	
	}

	function getAll()
	{

		header('Content-type: text/javascript');
        $data =  $this->Dashboard->getAll();

        $json = json_encode(array('data' => $data), JSON_PRETTY_PRINT);

        echo $json;

	}

	function cocostscont()
	{
		header('Content-type: text/javascript');
        $data =  $this->Dashboard->getAll();

        $segment['method'] = $this->uri->segment(3);
        $segment['objectName'] = $this->uri->segment(4);
        $segment['value'] = $this->uri->segment(5);
        $segment['like'] = $this->uri->segment(6);

        switch ($segment) {
            case $segment['method'] == 'filter' :
            		switch ($segment) {
            			case $segment['value'] == 'like':
            					
		           			$data = $this->Dashboard->getLikeSegmen($segment);

		    				if (empty($data)) {
		    					
		    					echo 'Data empty';

		    				}else{

		    					$json = json_encode($data, JSON_PRETTY_PRINT);
		    					echo $json;
		    				}

            				break;
            			
            			default:
            				
		           			$data = $this->Dashboard->getBySegmen($segment);
		           			$json = json_encode($data, JSON_PRETTY_PRINT);

		    				echo $json;
            				break;
            		}

              break;
            case $segment['value'] == 'like' :
            		echo "like";	
              break;
            default:
    			echo json_encode(array('data' => $data), JSON_PRETTY_PRINT);
          }
	}
}