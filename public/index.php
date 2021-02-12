<?php

require_once(__DIR__.'/../lib/controller/IndexController.php');
require_once(__DIR__.'/../lib/controller/UserController.php');
session_start();

$cnt = new IndexController();
$list = $cnt->listAuthorAction();
$listQ = $cnt->listQuoteAction();



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
       
        
        
        <script>
            $(document).ready(function(){
            $('[data-toggle="popover"]').popover(); 
            });
        </script>
        
    </head>
    <body>
    <!-- Navbar Futura implementación -->
    <?php include(__DIR__.'/../lib/inc/header.php'); ?>
    
        <div id="wrapper">
            <!-- Jumbotron -->
            <?php include (__DIR__.'/../lib/inc/jumbotron.php'); ?>
            <img class="d-block w-100" src="../lib/media/logo.jpg">
            <h1 class="text-center"> Authors list </h1>
            <table id="tabla" class="table table-dark table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Country</th>
                        <th scope="col">Total Likes</th>
                        <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?>
                        <th scope="col">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateAuthor">
                                Add Author
                            </button>
                        </th>
                        <?php } ?>
                        <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Standard"){   ?>
                        <th scope="col">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#ModalCreateAuthor">
                                Add Author
                            </button>
                        </th>
                        <?php } ?>  
                    </tr>
                </thead>
                <tbody>    
                    <!-- Recorrer array  -->
                    <?php foreach ($list as $a){ ?>
                        <tr>
                            <td scope="row"> <?=$a->getName()?> </td>
                            <td> <?=$a->getSurname()?> </td>
                            <td> <?=$a->getCountry()?> </td>
                            <!-- Examen  -->
                            <td> <?php 
                                    $likes = $cnt->totalLikes($a->getId()); 
                                    foreach ($likes as $l){
                                        echo $l;
                                    }
                                ?> 
                            </td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal<?=$a->getId()?>">
                                Quotes
                            </button> </td>
                            <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?> <td> <a role="button" class="btn btn-danger" href="delete.php?a=<?=$a->getId()?>"> Delete Author </a> </td> <?php } ?> 
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <!-- Modales -->
            <?php include(__DIR__.'/../lib/inc/modal.php'); ?>

            <!-- Footer -->
            <?php include(__DIR__.'/../lib/inc/footer.php'); ?>
        </div>
    </body>
</html>