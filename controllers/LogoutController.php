<?php
class LogoutController extends BaseTwigController
{
	
	public function post(array $context)
	{
		
		// $_SESSION["is_logged"]=false;
		// session_destroy();
		// header("Loscation: /login");
		// exit;
		 if ( $_POST['submit'] == 'logout') {
            session_destroy();
            
            header("Location: /login");
            exit;
            }
		
}}