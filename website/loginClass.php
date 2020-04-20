<?PHP
include "Database.php";
ini_set("display_errors",E_ALL);

Class loginClass
{
	public $post;
	public $userName;
	public $password;
	public $db;
	public $result;
	public $id;
	public function __construct(Array $post)
	{
		$this->db = new Database();
		
		$this->post = $post; // $_POST array from form;
		$this->userName = $this->post['userName'];
		$this->password = $this->post['password'];

		$sql = " SELECT * FROM users WHERE userName = '$this->userName' AND password = '$this->password' ";
		$this->db->query($sql);
		$this->result = $this->db->single();

		$this->login_IN();
	
	}
	public function login_IN(){
		
		if($this->result){
			setcookie('id', $this->result->login_id, time()+(60*60),'/');		
			exit(header("Location: http://www.eatsmenu.com/dashboard.php")); /* Redirect browser */
			}
			else {
			 exit(header("Location: http://www.eatsmenu.com/index.php?wp=1")); /* Wrong password, Go back to the same page  */

		}
	 }
	
}
?>