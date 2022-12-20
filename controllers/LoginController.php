<?php
class LoginController extends BaseTwigController
{
	public $template = "login.twig";
	public function post(array $context)
	{
		
	$username = isset($_POST['username']) ? $_POST['username'] : '';
	$password = isset($_POST['password']) ? $_POST['password'] : '';
	$query=$this->pdo->prepare("SELECT * FROM users WHERE username=:username AND password=:password");
	$query->bindValue("username", $username);
	$query->bindValue("password", $password);
	$query->execute();
	$username = $query->fetch();
	if ($username) {

		$_SESSION["is_logged"] = true;
		
	}else{
		$_SESSION["is_logged"] = false;
	}
	
	header("Location: /");
	exit();
		
}
}