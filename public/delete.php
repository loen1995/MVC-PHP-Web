<?php 
require_once(__DIR__.'/../lib/controller/IndexController.php');
$cnt = new IndexController();
session_start();

// Get Author
if(isset($_GET["a"])){
  $id = $_GET['a'];
  $ins = $cnt->authorDetails($id);
  $cnt->removeAuthor($id);

}

//Get Quote
if(isset($_GET["q"])){
  $id = $_GET['q'];
  $ins = $cnt->quoteDetails($id);
  $cnt->removeQuote($id);
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
    <!-- Jumbotron -->
    <?php include (__DIR__.'/../lib/inc/jumbotron.php');

    //Author Code
    if(isset($_GET["a"])){
      ?>
      <h1 class="text-center">Author Deleted</h1>
      <table id="tabla" class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Country</th>
            </tr>
        </thead>
        <tbody>    
          <!-- Recorrer array  -->
          <tr>
              <td scope="row"> <?=$ins->getId()?> </td>
              <td> <?=$ins->getName()?> </td>
              <td> <?=$ins->getSurname()?> </td>
              <td> <?=$ins->getCountry()?> </td>
          </tr>
        </tbody>
       </table>

      <?php } ?>

    <?php
    //Quote Code
    if(isset($_GET["q"])){
      ?>
      <h1 class="text-center">Quote Deleted</h1>
      <table id="tabla" class="table table-dark table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Quote</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>    
          <!-- Recorrer array  -->
          <tr>
              <td scope="row"> <?=$ins->getId()?> </td>
              <td> <?=$ins->getQuote()?> </td>
              <td> <?=$ins->getDate()?> </td>
          </tr>
        </tbody>
       </table>

      <?php } ?>
      <div class="text-center">
        <a role="button" class="btn btn-danger" href="index.php"> Return </a>
      </div>
    </div>
  </body>
</html>