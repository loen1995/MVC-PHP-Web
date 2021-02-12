<?php 

require_once(__DIR__.'/../Author.php');

class AuthorDB{
    
    private $conn;
    
    public function listAuthor(){
        $this->openConnection();
        $sql = "SELECT * FROM Author";
        $stm = $this->conn->prepare($sql);
        
        $stm->execute();
        $result = $stm->get_result();
        
        $ret = array();
        while($r = $result->fetch_assoc()){
            $curr = new Author($r['Name'],
                $r['Surname'], $r['Country'],$r['Aid']);
            array_push($ret, $curr);
        }
        return $ret;
    }
    
    public function getAuthorById($id){
        $this->openConnection();
        $sql = "SELECT * FROM Author WHERE aid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i", $aid);
        $aid = $id;
        
        $stm->execute();
        $result = $stm->get_result();
        
        $r = $result->fetch_assoc();
        $curr = new Author($r['Name'],$r['Surname'], $r['Country'],$r['Aid'] );
         
        return $curr;
    }
    
    public function insertAuthor($name, $surname, $country){
        $this->openConnection();
        $sql = "INSERT INTO Author (Name, Surname, Country) VALUES (?, ?, ?)";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("sss", $an, $as, $ac);
        $an = $name;
        $as = $surname;
        $ac = $country;
        
        $stm->execute();
        
        
        return new Author($name, $surname, $country);
    }
    
    public function deleteAuthor($id){
        $this->openConnection();
        $sql = "DELETE FROM Author WHERE Aid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i", $aid);
        $aid = $id;
        
        $stm->execute();
        
        
        return;
    }
    
    public function updateAuthor($name, $surname, $country, $id){
        $this->openConnection();
        $sql = "UPDATE Author SET Name = ?, Surname = ?, Country = ? WHERE aid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("sssi", $an, $as, $ac, $aid);
        $an = $name;
        $as = $surname;
        $ac = $country;
        $aid = $id;
        
        $stm->execute();
        
        return $this->getAuthorById($id);
    }

    //Examen

    public function totalLikes($id){
        $this->openConnection();
        $sql = "SELECT SUM(Likes) as Likes From Quote where AuthorFK=?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i",$aid);
        $aid = $id;
        
        $stm->execute();
        $result = $stm->get_result();
        
        $ret = array();
        while($r = $result->fetch_assoc()){
            $curr = $r['Likes'];
            array_push($ret, $curr);
        }
        return $ret;

    }
    
    private function openConnection(){
        if($this->conn == null){
            $this->conn = mysqli_connect("127.0.0.1",
                "root",
                "",
                "Proyecto3");
        }
    }
    
}
