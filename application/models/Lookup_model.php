<?php 
class Lookup_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    function __construct()
    {

        parent::__construct();
        $this->a = "sys_lookup_types";
        $this->b = "sys_lookup_values";
    }

    public function getLookupValue()
    {

        $query = $this->db->get($this->a);
        return $query->result();
    }

    public function insertLookupType($data)
    {
        $query = $this->db->insert($this->a, $data);
       

        if ($query){
            return "success";
        }else{
            return "failed";
        }
    }

    public function editlookupType($data)
    {

       // var_dump($data);die();
        $this->db->where('type_code', $data['type_code']);
        $query = $this->db->update($this->a, $data);

        if ($query){
                 return "success";
        }else{
                 return "failed";
        }
    }
}
?>