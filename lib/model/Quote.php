<?php

class Quote{
    private $_Id;
    private $_Quote;
    private $_Date;
    private $_Likes;
    private $_AutorFK;

    public function __construct($q = null, $d = null,$l = null,$afk = null, $i = null){
        $this->setQuote($q);
        $this->setDate($d);
        $this->setLikes($l);
        $this->setAutorFK($afk);
        $this->setId($i);
    }

    public function getId(){
        return $this->_Id;
    }

    public function setId($_Id){
        $this->_Id=$_Id;
    }

    public function getQuote(){
        return $this->_Quote;
    }

    public function setQuote($_Quote){
        $this->_Quote=$_Quote;
    }

    public function getDate(){
        return $this->_Date;
    }

    public function setDate($_Date){
        $this->_Date=$_Date;
    }


    //Modificación examen
    public function getLikes(){
        return $this->_Likes;
    }

    public function setLikes($_Likes){
        $this->_Likes=$_Likes;
    }



    public function getAutorFK(){
        return $this->_AutorFK;
    }

    public function setAutorFK($_AutorFK){
        $this->_AutorFK=$_AutorFK;
    }
}