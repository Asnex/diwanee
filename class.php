<?php
require_once './pdo.php';
/*
 *  setting a constant variables
 */
  const SALT_KEY = "kljfld3530964:20(#3l;fs;";
  const SESSION_STARTED = TRUE;
  
  // Class for handling the sessions...
  class Session {
      // Function for starting the session
      public static function start(){
          
          session_start();
      }

      // Setting the $key => $value $_SESSION pairs
      public static function set($key, $value) {
          $_SESSION[$key] = $value;
      }
      
      // Getting the $key to show $value pair
      public static function get($key){
          if(isset($_SESSION[$key])) :
              
          return $_SESSION[$key];  
          
          else :
          return false;    
          endif;
      }
      // Function for destroying session
      public static function destroy(){
          
          return session_destroy();
      }
  }
  
  // Class for handling post requests
  class Request{
      // Post static function
       public static function post($key){
          if(isset($_POST[$key])) :
              
          return $_POST[$key];  
          
          else :
          return false;    
          endif;
      }
  }
  
  class Images {
      public $cover = '<img class="coverPhoto" src="./images/diwanee.jpeg" />';
      
      public function coverPhoto (){
          echo $this->cover;
      }
  }
/*
 *  Main class Diwanee of app
 */
  class Diwanee extends Images {
     
      // Function for setting the title, depending on $_SESSION status of user
      public function setTitle(){
           if(Session::get('keys','start') == true) : 
          $title = "Back office";
       else :
          $title = "Diwanee app";
       endif;
       echo $title;
      }

            // Function for checking does user already exists in database
      public function checkUser($user){
                
		try {
                  
		$sth = Connect::getInstance()->db->prepare("SELECT * FROM `users` WHERE user = '$user'");
                $sth->bindParam(':user', $user);
		$sth->execute();
                return  $sth->rowCount();
		
		}
		catch(PDOException $e)
		{
			echo 'Database error!'.$e->getMessage();
		}
     }
     
     // Two functions for checking lenght of username and password
     public function checkUserLenght($user) {
         return mb_strlen($user);
     }
     public function checkPassLenght($pass) {
         return mb_strlen($pass);
     }

          // Function for creating a new user
     public function register($user, $pass){
         
                
		try {
                    
                $pass = $this->hashPass($pass);
                $date_reg = date("Y-m-d H:i:s");    
                  
		$sth = Connect::getInstance()->db->prepare("INSERT INTO users (`user`, `pass`, `date_reg`) VALUES (:user, :pass, :date_reg)");
                $sth->bindParam(':user', $user);
                $sth->bindParam(':pass', $pass);
                $sth->bindParam(':date_reg', $date_reg);
		$sth->execute();
		
		}
		catch(PDOException $e)
		{
			echo 'Database error!'.$e->getMessage();
		}
     }
     
      // Function for checking login credentials
      public function checkUserPass($user, $pass){
                
		try {
                    
                $pass = $this->hashPass($pass);  
		$sth = Connect::getInstance()->db->prepare("SELECT * FROM `users` WHERE user = '$user' AND pass = '$pass'");
                $sth->bindParam(':user', $user);
                $sth->bindParam(':pass', $pass);
		$sth->execute();
                return  $sth->rowCount();
		
		}
		catch(PDOException $e)
		{
			echo 'Database error!'.$e->getMessage();
		}
     }
     
      // Function for extracting all additional data of user
      public function checkUserInfo($user, $pass){
                
		try {
                    
                $pass = $this->hashPass($pass);  
		$sth = Connect::getInstance()->db->prepare("SELECT * FROM `users` WHERE user = '$user' AND pass = '$pass'");
                $sth->bindParam(':user', $user);
                $sth->bindParam(':pass', $pass);
		$sth->execute();
                $result = $sth->fetchAll(PDO::FETCH_OBJ);
                
                foreach ($result as $res) :
                    $user_id = $res->user_id;
                    $date_reg = $res->date_reg;
                endforeach;
                 
                // Call private method
                $this->sessionBegin($user_id, $user, $date_reg);
		
		}
		catch(PDOException $e)
		{
			echo 'Database error!'.$e->getMessage();
		}
              
     }
     
     // Function for extracting all users from database
     public function listAllUsers() {
         
         try {
                    
		$sth = Connect::getInstance()->db->prepare("SELECT * FROM `users` ORDER BY date_reg ASC");
		$sth->execute();
                return $result = $sth->fetchAll(PDO::FETCH_OBJ);
             
		}
		catch(PDOException $e)
		{
			echo 'Database error!'.$e->getMessage();
		}
     }

     // Function for checking session status
     public function sessionChecker(){
          // Checking does $_SESSION start exists
       if(Session::get('keys','start') == true) : 
           // session_destroy();
          return  include './session.php';
         
       else :
          return  include './nosession.php';
       endif;
     
     }

          // Private method for setting the session paramerets
     private function sessionBegin($user_id, $user, $date_reg){
         
         Session::set('keys',array(
             'start' => SESSION_STARTED,
             'user_id' => $user_id,
             'user' => $user,
             'date_reg' => $date_reg,
             'cookie_lifetime' => 32000
         ));
                
       
     }
     
     // Private function for creating hash pass
     private function hashPass($pass) {
         
         // Creating salt key for hashing password
        return  hash('sha256', $pass . SALT_KEY);
     }
     
  } 
 
 // Creating object instance of Diwanee class
 $instance = new Diwanee();
 