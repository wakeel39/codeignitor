<?php Class User extends CI_Model
{
	 public $admin_table = "admin";
	 function login($username, $password)
	 {
	   $this -> db -> select('id, username, password');
	   $this -> db -> from($this->admin_table);
	   $this -> db -> where('username', $username);
	   $this -> db -> where('password', MD5($password));
	   $this -> db -> limit(1);
	 
	   $query = $this -> db -> get();
	 
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
	 }
	 
}
?>