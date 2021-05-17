<?php
include 'Connection.php';

class datafunction{

	use Connection;

	public $conn = "";

	public function __construct()
	{
		 $this->conn = $this->databaseCon();
		
	}

	public function loginCheck($username,$password)
	{
		$password = md5($password);
		$sql = "SELECT * FROM users WHERE user_name='$username' AND password = '$password'";

		$statement = $this->conn->prepare($sql);
		$statement->execute();

		$res = $statement->fetchAll();

		if(count($res) == 1){

			session_start();
			foreach ($res as $value) {
				 $_SESSION['user_name'] = $value['user_name'];
				 $_SESSION['id'] = $value['id'];
				 $_SESSION['user_type'] = $value['user_type'];
				 $_SESSION['image_path'] = $value['img_path'];
			
			$uid=$_SESSION['id'];
			$un=$_SESSION['user_name'];

		$statement = $this->conn->prepare("Insert into logdata (logtype,Description ,user_id,user_name,logdate) Values ('Login','Login',:uid, :un,CURRENT_TIMESTAMP( ))")->execute(array(
			':uid' => $uid,
			':un' => $un,
			));
			}
				
				header("location:dashboard.php");
			
		
		}else{
			return 'Login Failed..';
		}
	}

	//CREATE NEW USER
	public function newUser($username,$fullname,$email,$password)
	{
		$password = md5($password);
		$sql = "INSERT INTO users (user_name,full_name,email,password) VALUES (:user_name,:full_name,:email,:password)";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':user_name' => $username,
			':full_name' => $fullname,
			':email' => $email,
			':password' => $password

		));

		//return true;
		header("location:index.php");
	}

	//CREATE NEW EXPENSES
	public function newExpense($user_id,$exphead)
	{
		$sql = "INSERT INTO expenses (user_id,expense_head) VALUES (:user_id,:exphead)";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':user_id' => $user_id,
			':exphead' => $exphead
		));

		return true;
	}

	//EDIT EXPENSES
	public function EditExpense($id,$exphead,$status)
	{
		$sql = "UPDATE expenses Set expense_head=:exphead,status=:status where id=:id";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':id' => $id,
			':exphead' => $exphead,
			':status' => $status
		));

		return true;
	}

	//Delete EXPENSES
	public function deleteExpense($id)
	{
		$sql = "Delete From expenses where id=:id";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':id' => $id
		));

		return true;
	}


	//ADD EXPENSE DETAILS
	public function addExpenseDetails($expense_id,$expense_name,$description,$amount)
	{
		$sql = "INSERT INTO expensedetails (expense_id,expense_name,description,amount) VALUES (:expense_id,:expense_name,:description,:amount)";

		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':expense_id' => $expense_id,
			':expense_name' => $expense_name,
			':description' => $description,
			':amount' => $amount,
		));

		return 'success';
	}

	//Delete EXPENSES
	public function deleteExpenseDetails($id)
	{
		$sql = "Delete From expensedetails where id=:id";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':id' => $id
		));

		return true;
	}

	//Delete EXPENSES
	public function deleteuser($id)
	{
		$sql = "Delete From expensedetails where id=:id";
		
		$statement = $this->conn->prepare($sql);
		$statement->execute(array(
			':id' => $id
		));

		return true;
	}
	//Clear Photo
	public function RemovePhoto($imgpath)
	{
		unlink('$imgpath');
    	echo 'Photo Removed';
    

		return true;
	}


	public function notificationfetchAll($query){
        
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }
    public function notificationperformQuery($query){
        
        $stmt = $this->conn->prepare($query);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

		}


	private function getData($sql) {
		
		$statement = $this->conn->prepare($sql);
		$statement->execute();

		$res = $statement->fetchAll();

		if(!$res){
			die('Error in query: ');
		}
		$data= array();
		foreach($res as $row) {
			$data[]=$row;            
		}
		return $data;
	}


	public function listUsers(){
		$sql = "SELECT * FROM users WHERE user_name != 'admin'";
        return  $this->getData($sql);
	}
	
	public function saveNotification($title, $msg, $time, $sender,$reciever){
		$sql = "INSERT INTO  notifications (title, message, msg_date, sender, reciever) VALUES('$title', '$msg', '$time', '$sender','$reciever')";
		$statement = $this->conn->prepare($sql);
		$statement->execute();

		$res = $statement->fetchAll();

		if(!$res){
			return ('Error in query: ');
		} else {
			return $res;
		}
	}	




}

?>