<?php
require_once(__DIR__.'/../../lib/controller/UserController.php');

session_start();
session_destroy();

Header("Location: ../index.php");
?>

