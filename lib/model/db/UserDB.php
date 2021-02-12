<?php 

class UserDB{
    private $conn;

    public function insertUser($user, $pass, $role){
        $this->openConnection();
        $sql = "INSERT INTO Users (User, Password, Role) VALUES (?, ?, ?)";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("sss", $uu, $up, $ur);
        $uu = $user;
        $up = $pass;
        $ur = $role;
        
        $stm->execute();

        return true;
    }


    public function login($user, $password){

        $this->openConnection();
       
        $sql = "SELECT Password FROM users WHERE user = ?";
        $stm = $this->conn->prepare($sql);
        $stm->bind_param("s", $u); 
        $u = $user; 
        $stm->execute();
        $result = $stm->get_result();
        $r = $result->fetch_assoc();
        $passBD = $r['Password'];
        
       
        $salt = md5('Pr4ct1c4 ATSWM2 3');
        $pass = $salt.$password;
        $passEncrypt= md5($pass); 


        if($passEncrypt == $passBD){ 
            return true;
         } else {
             return false;
         }
    }

    public function getRole($user){
        $this->openConnection();
        $sql = "SELECT Role FROM users WHERE user = ?"; 
        $stm = $this->conn->prepare($sql);
        $stm->bind_param("s", $u); 
        $u = $user; 
        $stm->execute();
        $result = $stm->get_result();
        $r = $result->fetch_assoc();
        $role = $r['Role'];

        return $role;

    }

    private function openConnection(){
        if($this->conn == null){
            $this->conn = mysqli_connect("localhost", 
                "root",
                "", 
                "proyecto3");
        }
    }
}