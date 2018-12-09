<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Users extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
    }


    function index_get() {

        $id = $this->get('id');

        if ($id == '') {
            $users = $this->db->get('users')->result();
        } else {
            $this->db->where('id', $id);
            $users = $this->db->get('users')->result();
        }
        $this->response($users, 200);
    }


    function index_post() {
        $data = array(
                    'userusername'           => $this->post('userusername'));
        
        $insert = $this->db->insert('users', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    function index_put()a {
        $id = $this->put('id');

        $data = array(
                    'username'          => $this->put('username'));

       $this->Dashboard->indexPut($id,$data);
    }

    function index_delete() {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('users');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
}
?>