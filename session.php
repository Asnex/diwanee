<div class="col-md-12">
 <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand">Back office</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     
   
     <div class="tabbable">
<ul class="nav nav-tabs navbar-right nav nav-tabs" id="myTabs">
<li class="active"><a href="#home" data-toggle="tab">Home</a></li>
<li><a href="./listallusers.php" data-target="#listAllUsers" id="users_tab" data-toggle="tab">List | all | users</a></li>
<li><a href="#logout_tab"   data-toggle="modal" data-target="#logout">Logout</a></li>
</ul>


</nav>
    <hr />
 </div>
<div class="tab-content">
<div class="tab-pane active" id="home">
    <h1>Hello <?php echo $_SESSION['keys']['user'];?>!</h1>
</div>

<div class="tab-pane" id="listAllUsers">

</div>
    
<div class="tab-pane" id="logout_tab">

</div>    
    


</div> 
</div>

    
    <!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Logout modal action</h4>
      </div>
      <div class="modal-body">
          <h3>Are you sure you want to logout?</h3>
           <button type="submit" class="btn btn-primary" name="btn-save-login" id="btn-submit-logout">
     Yes
   </button> 
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
       
      </div>
     
    </div>
  </div>
</div>
