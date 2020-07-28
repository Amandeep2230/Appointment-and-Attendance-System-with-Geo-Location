<?php
  session_start();
?>
<!DOCTYPE html>
<html>
 <head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Student Attendance</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
   <!-- Custom styles for this template -->
    <link href="navbar-fixed-top.css" rel="stylesheet">
 </head>
 <body>
 
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="admin_panel.php">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="admin_panel.php">Home</a></li>
           
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
  <div class="container">
    <!--<h2>For Students</h2>
    <h4>Click here for <a href="student.php">Student Dashboard</a></h4>
    <hr>
    <h2>For Faculty</h2>-->
    <div class="alert alert-warning hidden">
      <span></span>
      <button type="button" class="close" onclick="$('.alert').addClass('hidden');">&times;</button>
    </div>
    <table class="table table-bordered table-striped" style="margin-top: 150px;">
      <thead>
        <tr>
          <th>Login</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form id="login"  action="php/login_inc.php" method= "POST">
              <div class="form-group">
                <label>Email ID</label>
                <input class="form-control" placeholder="Email" type="email" name="email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input class="form-control" placeholder="Password" type="password" name="password">
              </div>
              <button class="btn btn-primary pull-right" name="submit" type="submit">Login</button>
            </form>
          </td>
          

        </tr>
      </tbody>
    </table>
  </div>
    

    </div><!-- /.container -->

 </body>
</html>
