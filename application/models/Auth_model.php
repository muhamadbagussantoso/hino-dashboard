<?php 
class Auth_model extends CI_Model {

    public $title;
    public $content;
    public $date;

    function __construct()
    {
        parent::__construct();
        $this->a = "tbladminaccount";
    }
 
    function cek_user($username="",$password="")
    {
        $query = $this->db->get_where($this->a,array('username' => $username, 'password' => $password));
        $query = $query->result_array();
        
        return $query;
    }

    function ambil_user($username)
    {
        $query = $this->db->get_where($this->a, array('username' => $username));
        $query = $query->result_array();
        if($query){
            return $query[0];
        }
    }
    public function getAll ()
    {

        $query = $this->db->get('tbladminaccount');
        return $query->result();
    }

    public function get_last_ten_entries()
    {
        $query = $this->db->get('entries', 10);
        return $query->result();
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }



}
?>