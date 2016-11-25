  <div class="col-md-6">   
            <form class="form-signin" action="action.php" id="register-form" autocomplete="off">
      
        <h2 class="form-signin-heading">Register</h2><hr />
        
        
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="user" id="user_name" />
        </div>
        
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
        <input type="hidden" name="checker" id="checker" value="register" />
     
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save" id="btn-submit">
      <span class="glyphicon glyphicon-registration-mark"></span> &nbsp; Create Account
   </button> 
        </div>  
      
 </form>
        </div>
            <div class="col-md-6">   
            <form class="form-login" autocomplete="off" action="action.php" id="login-form">
      
        <h2 class="form-login-heading">Login</h2><hr />
        
               
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" name="user" id="user_name" />
        </div>
        
     
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" />
        </div>
        <input type="hidden" name="checker" id="checker" value="login" />
     
      <hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-save-login" id="btn-submit-login">
      <span class="glyphicon glyphicon-log-in"></span> &nbsp; Login
   </button> 
        </div>  
      
 </form>
        </div>
            <hr />
            <div class="response"></div>