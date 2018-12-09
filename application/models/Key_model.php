<?php 
class Key_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    function __construct()
    {

        parent::__construct();
        $this->key = "keys";
    }

    public function getKey($key)
    {
        $query = $this->db->get_where($this->key , array('key' => $key));

        if($query->num_rows()>0){
            return $query->result();
        }else{

           return "empty";
        }

    }


}
?>