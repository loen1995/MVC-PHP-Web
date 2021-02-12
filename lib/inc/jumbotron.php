<!-- Jumbotron -->
<div class="jumbotron text-center">
  <h1 class="display-4">Hola <?php  if(isset($_SESSION['User']) ){  echo $_SESSION['User']; }?>!</h1>
  <p class="lead">Bienvenido a la tercera práctica de ATSWM</p>
  <hr class="my-4">
  <p>En esta práctica he añadido control de usuarios con sesiones y permisos. </p>
  <a class="btn btn-primary btn-lg" href="#tabla" role="button">Vamos a verlo!</a>
</div>