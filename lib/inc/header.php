<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="#">ATSWM3</a>
     

        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            

            <!--
            <ul class="nav navbar-nav">
                <li class="nav-item"><a href="#" class="nav-link">About</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Service</a></li>
                <li class="nav-item"><a href="#" class="nav-link">More</a></li>
            </ul>
            -->
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li>
                <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Admin"){   ?>
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Este usuario tiene acceso a todo el contenido">
                        <?php echo $_SESSION['Role']; ?>
                    </button> 
                <?php } ?> 
                
                <?php  if(isset($_SESSION['Role']) && $_SESSION['Role']=="Standard"){   ?>
                    <button type="button" class="btn btn-secondary" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Este usuario no puede eliminar contenido">
                        <?php echo $_SESSION['Role']; ?>
                    </button> 
                <?php } ?> 

                </li>
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="dropdown order-1">
                    <?php if(isset($_SESSION['User']) ){ ?>
                        <form method="post" action="forms/logout.php">
                            <button type="submit" id="logout" name="logout"  class="btn btn-danger ">Logout </button>
                        </form>
                   <?php  }else{ ?>
                  
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-success dropdown-toggle">Login <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right mt-2">
                       <li class="px-3 py-2">
                       <form action="forms/login.php" method="post">
                            <div class="form-group">
                                <input name="userUser" placeholder="User" class="form-control form-control-sm" type="text" required="">
                            </div>
                            <div class="form-group">
                                <input name="userPass" placeholder="Password" class="form-control form-control-sm" type="password" required="">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="loginUser" class="btn btn-primary btn-block">Login</button>
                            </div>
                            <div class="form-group text-center">
                                <small><a href="#" data-toggle="modal" data-target="#modalCreateUser">Create User</a></small>
                            </div>
                        </form>
                        </li>
                    </ul>
                    <?php } ?>

                   
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Crear user --> 
<div id="modalCreateUser" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create User</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="forms/createUser.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="userUser">User</label>
                        <input type="text" class="form-control" id="userUser" name="userUser"  placeholder="Write the name of the user here" required>
                    </div>
                    <div class="form-group">
                        <label for="userPass">Password</label>
                        <input type="password" class="form-control" id="userPass" name="userPass" placeholder="Write the password here" required>
                    </div>
                    <div class="form-group">
                        <label for="userRole">Role</label>
                        <select class="form-control" id="userRole" name="userRole" required>
                            <option>Admin</option>
                            <option>Standard</option>
                        </select>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button type="submit" name="createUser" class="btn btn-primary">Create User</button>
                </div>
            </form>
        </div>
    </div>
</div>