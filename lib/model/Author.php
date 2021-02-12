<?php

class Author{
    private $_Id;
    private $_Name;
    private $_Surname;
    private $_Country;

    public function __construct($n = null, $s = null, $c = null, $i = null){
        $this->setName($n);
        $this->setSurname($s);
        $this->setCountry($c);
        $this->setId($i);
    }

    public function getId(){
        return $this->_Id;
    }

    public function setId($_Id){
        $this->_Id=$_Id;
    }

    public function getName(){
        return $this->_Name;
    }

    public function setName($_Name){
        $this->_Name=$_Name;
    }

    public function getSurname(){
        return $this->_Surname;
    }

    public function setSurname($_Surname){
        $this->_Surname=$_Surname;
    }

    public function getCountry(){
        return $this->_Country;
    }

    public function setCountry($_Country){
        $this->_Country=$_Country;
    }
}