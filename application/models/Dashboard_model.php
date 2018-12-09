<?php 
class Dashboard_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    function __construct()
    {
        parent::__construct();
        $this->cocostscont = "container";
    }
 
    public function getAll()
    {
        $query = $this->db->get($this->cocostscont);
        return $query->result();
    }

    function getBySegmen($data)
    {
        $value = $data["value"];
        $objectName = $data["objectName"];
        $query = $this->db->get_where($this->cocostscont , array($objectName => $value));

        return $query->result();
    }

    function getLikeSegmen($data)
    {
        $like = $data["like"];
        $objectName = $data["objectName"];

        $this->db->like($objectName, $like, 'both');
        $query = $this->db->get($this->cocostscont);

        if($query->num_rows() > 0){

            return $query->result();
        } else {

            return Null;
        }
    }
}
?>