<?php

require_once(__DIR__.'/../model/db/AuthorDB.php');
require_once(__DIR__.'/../model/db/QuoteDB.php');

class IndexController{
    //Author Controller
    public function listAuthorAction(){
        $dbadapter = new AuthorDB();
        $list = $dbadapter->listAuthor();
        
        return $list;
    }
    
    public function authorDetails($id){
        $dbadapter = new AuthorDB();
        $author = $dbadapter->getAuthorById($id);
        
        return $author;
    }
    
    public function createAuthor($name, $surname, $country){
        $dbadapter = new AuthorDB();
        $author = $dbadapter->insertAuthor($name, $surname, $country);
        
        return $author;
    }
    
    public function removeAuthor($id){
        $dbadapter = new AuthorDB();
        $author = $dbadapter->deleteAuthor($id);
        
        return;
    }
    
    public function updateAuthor($name, $surname, $country, $id){
        $dbadapter = new AuthorDB();
        $author = $dbadapter->updateAuthor($name, $surname, $country, $id);
        
        return $author;
    }

    //Quote Controller
    public function listQuoteAction(){
        $dbadapter = new QuoteDB();
        $list = $dbadapter->listQuote();
        
        return $list;
    }
    
    public function quoteDetails($id){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->getQuoteById($id);
        
        return $quote;
    }
    
    public function quoteByAuthor($idA){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->getQuoteByIdAuthor($idA);
        
        return $quote;
    }


    public function createQuote($quote, $date, $authorFK){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->insertQuote($quote, $date, $authorFK);
        
        return $quote;
    }
    
    public function removeQuote($id){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->deleteQuote($id);
        
        return;
    }
    
    public function updateQuote($quote, $date, $id){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->updateQuote($quote, $date, $id);
        
        return $quote;
    }

    //Examen
    public function updateLikes($id){
        $dbadapter = new QuoteDB();
        $quote = $dbadapter->updateLikes($id);
        
        return $quote;
    }

    public function totalLikes($id){
        $dbadapter = new AuthorDB();
        $list = $dbadapter->totalLikes($id);
        
        return $list;
    }
    
}