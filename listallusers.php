<?php
// Require class Diwanee and it's objects
require './class.php';

$allUsers = $instance->listAllUsers();
// Bootstrap striped table with fix header
?>

 <div class="listAllUsers">
        <table class="table table-striped header-fixed">
      
        <thead>
        <tr>
           
            <th>User_id</th>
            <th>Username</th>
            <th>Date of registration</th>
        </tr>
    </thead>
    <tbody>
        
        
             <?php foreach ($allUsers as $au) :
            // Heredoc syntax output
echo <<< OUTPUT
             <tr>     
             <td>$au->user_id.</td>
             <td>$au->user</td>
             <td>$au->date_reg</td>
             </tr>
OUTPUT;
             endforeach; ?>
    </tbody>
   </table>
  </div>