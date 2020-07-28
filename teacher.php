<?php
  session_start();
  include_once 'dbh.php';
  $isIndex = 0;
  if(!(array_key_exists('teacher_id',$_SESSION) && isset($_SESSION['teacher_id']))) {
    session_destroy();
    if(!$isIndex) header('Location: index.php');
  }
?>
<?php include 'php/node_class.php'; ?>
<html>
 <head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Visitor Dashboard</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/teacher.js"></script>
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
          <a class="navbar-brand" href="#">VMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="teacher.php">Dashboard</a></li>
            <li><a href="status.php">Status</a></li>
            <li><a href="ticket.php">Entry Paas</a></li>
            <!--<li><a href="profile.php">Profile</a></li>
           
			<li><a href="statistics.php">Statistics</a></li>-->
			<li><a href="logout.php">Logout</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav></br></br></br></br>
 
  <div class="container">
    <?php
      $name = $_SESSION['name'];
      $email = $_SESSION['email'];
      $phone = $_SESSION['phone'];
      $classes = $_SESSION['classes'];
      $teacher_id = $_SESSION['teacher_id'];
      echo '<h2>Welcome , '.$name.'.</h2>';
      
      echo "
    <table class='table table-bordered table-striped' style='margin-top: 50px;''>
      <thead>
        <tr>
          <!--<th>Login</th>-->
          <th>Book Appointment</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <form id='signup' action='php/register.php' method='POST'>
              <div class='form-group'>
                <label>Name</label>
                <input class='form-control' value='$name' type='text' name='name' readonly>
              </div>
              <div class='form-group'>
                <label>Phone Number</label>
                <input class='form-control' value='$phone' type='text' name='phone' readonly>
              </div>
              <div class='form-group'>
                <label>Email ID</label>
                <input class='form-control' value='$email' type='email' name='email' readonly>
              </div>
              <div class='form-group'>
                <label>Purpose</label>
                <textarea class='form-control' placeholder='Purpose...' name='purpose'></textarea>
                <span class='help-block'>Not more than 50 characters.</span>
              </div>";
              $email = $_SESSION['email'];
              $getquery=mysqli_query($conn, "SELECT * FROM visitors WHERE email = '$email'");
              $resultCheck = mysqli_num_rows($getquery);
              if ($resultCheck>0){
                echo "<button class='btn btn-primary pull-right' type='submit' name='submit' disabled>Book</button>
                <span class='help-block' style='float: right; padding-right: 10px;'>Request for appointment has already been made</span>
            </form>
          </td>

        </tr>
      </tbody>
    </table>
  </div>";
              }
              else 
              {
                echo "<button class='btn btn-primary pull-right' type='submit' name='submit'>Book</button>
            </form>
          </td>

        </tr>
      </tbody>
    </table>
  </div>";
              }
              
              
    ?>
    
  </div>
 </body>
</html>
