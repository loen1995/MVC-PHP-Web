<?php
require_once(__DIR__.'/../../lib/controller/IndexController.php');
require_once(__DIR__.'/../../lib/controller/UserController.php');

session_start();

if(isset($_POST['loginUser'])){
        
    $uu = $_POST['userUser'];
    $up = $_POST['userPass'];

    $cnt = new UserController();
    
    $ins = $cnt->loginUser($uu, $up);
    $role = $cnt->getRole($uu);

    Header("Location: ../index.php");
}

?>

