<?php 

require_once(__DIR__.'/../model/db/UserDB.php');

class UserController{

    public function createUser($user, $pass, $role){
        $dbadapter = new UserDB();
        $usu = $dbadapter->insertUser($user, $pass, $role);
        
        return $usu;
    }
    
    public function loginUser($u, $p){
        $db = new UserDB();

        if($db->login($u, $p)){
            $_SESSION['User'] = $u;
            return true;
           
        }
        return false;
    }

    public function getRole($u){
        $db = new UserDB();

        $role = $db->getRole($u);
        $_SESSION['Role'] = $role;

        return $role;
    }
    
    
    public function isUserLoggedIn(){
        if(isset($_SESSION['User']) 
            && $_SESSION['User']!= null 
            && $_SESSION['User'] != ""){
            return true;
        }
        return false;
    }
    
    public function userName(){
        return $_SESSION['User'];
    }
    
}