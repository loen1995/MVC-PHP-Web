<?php 

require_once(__DIR__.'/../Quote.php');

class QuoteDB{
    
    private $conn;
    
    public function listQuote(){
        $this->openConnection();
        $sql = "SELECT * FROM Quote";
        $stm = $this->conn->prepare($sql);
        
        $stm->execute();
        $result = $stm->get_result();
        
        $ret = array();
        while($r = $result->fetch_assoc()){
            $curr = new Quote($r['Quote'],
                $r['Date'], $r['Likes'] ,$r['AuthorFK'], $r['Qid']);
            array_push($ret, $curr);
        }
        return $ret;
    }
    
    public function getQuoteById($id){
        $this->openConnection();
        $sql = "SELECT * FROM Quote WHERE Qid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i", $qid);
        $qid = $id;
        
        $stm->execute();
        $result = $stm->get_result();
        
        $r = $result->fetch_assoc();
        $curr = new Quote($r['Quote'],$r['Date'], $r['Likes'] ,$r['AuthorFK'],$r['Qid']);
         
        return $curr;
    }
    
    public function getQuoteByIdAuthor($idA){
        $this->openConnection();
        $sql = "SELECT * FROM Quote WHERE AuthorFK = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i", $aid);
        $aid = $idA;
        
        $stm->execute();
        $result = $stm->get_result();
        
        $ret = array();
        while($r = $result->fetch_assoc()){
            $curr = new Quote($r['Quote'],
                $r['Date'], $r['Likes'] ,$r['AuthorFK'], $r['Qid']);
            array_push($ret, $curr);
        }
        return $ret;
         
        return $curr;
    }


    public function insertQuote($quote, $date, $authorFK){
        $this->openConnection();
        $sql = "INSERT INTO Quote (Quote, Date, AuthorFK) VALUES (?, ?, ?)";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("ssi", $qq, $qd, $afk);
        $qq = $quote;
        $qd = $date;
        $afk = $authorFK;
        
        $stm->execute();
        

        
        return new Quote($quote, $date, $authorFK);
    }
    
    public function deleteQuote($id){
        $this->openConnection();
        $sql = "DELETE FROM Quote WHERE Qid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i", $qid);
        $qid = $id;
        
        $stm->execute();
        
        
        return;
    }
    
    public function updateQuote($quote, $date, $id){
        $this->openConnection();
        $sql = "UPDATE Quote SET Quote = ?, Date = ? WHERE Qid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("ssi", $qq, $qd, $qid);
        $qq = $quote;
        $qd = $date;
        $qid = $id;
        
        $stm->execute();
        
        return $this->getQuoteById($id);
    }

    //Examen

    public function updateLikes($id){
        $this->openConnection();
        $sql = "UPDATE Quote SET Likes = Likes+1 WHERE Qid = ?";
        $stm = $this->conn->prepare($sql);
        
        $stm->bind_param("i",$qid);
        $qid = $id;
        
        $stm->execute();
        
        return $this->getQuoteById($id);
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
