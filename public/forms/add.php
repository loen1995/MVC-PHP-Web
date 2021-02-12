<?php
require_once(__DIR__.'/../../lib/controller/IndexController.php');
session_start();
if(isset($_POST['addAuthor'])){
        
    $na = $_POST['nameAuthor'];
    $sa = $_POST['surnameAuthor'];
    $ca = $_POST['countryAuthor'];

    $cnt = new IndexController();
    $ins = $cnt->createAuthor($na, $sa, $ca);
}


if(isset($_POST['addQuote'])){
        
    $qq = $_POST['quoteQuote'];
    $dq = $_POST['dateQuote'];
    $ia = $_POST['idAuthor'];

    $cnt = new IndexController();
    $ins = $cnt->createQuote($qq, $dq, $ia);
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Adrián - Tercera entrega</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- 
        <link rel="stylesheet" type="text/css" media="screen" href="main.css"> 
        <script src="main.js"></script>
        -->
    </head>
    <body>
        <div id="wrapper">
        <div class="text-center"> 
        <!-- Jumbotron && Author Part -->
        <?php 
            include (__DIR__.'/../../lib/inc/jumbotron.php'); 
            if(isset($_POST['addAuthor'])){ 
        ?>
        
        <h1>Author added</h1>
            
                <p>Name = <?=$ins->getName()?></p>
                <p>Surname = <?=$ins->getSurname()?></p>
                <p>Country = <?=$ins->getCountry()?></p>
            
        
        <?php } ?>

        <!-- Quote Part -->
        <?php 
            if(isset($_POST['addQuote'])){ 
        ?>
        <h1>Quote added</h1>
            <p>Quote = <?=$ins->getQuote()?></p>
            <p>Date = <?=$ins->getDate()?></p>
        <?php } ?>

        <a role="button" class="btn btn-danger" href="../index.php">Return</a>
        </div>
        </div>
    </body>
</html>