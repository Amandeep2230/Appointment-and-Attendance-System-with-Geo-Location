<?php
  session_start();
  include 'dbh.php';
   $isIndex = 1;
  if(!(array_key_exists('a_id',$_SESSION) && isset($_SESSION['a_id']))) {
    session_destroy();
    if(!$isIndex) header('Location: admin_panel.php');
  }
?>
<?php include 'php/node_class.php'; ?>
<html>
 <head>
  <link rel="stylesheet" href="css/style.css"/>
  <title>Admin Dashboard</title>
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
          <a class="navbar-brand" href="#">Admin Panel</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="admin.php">Dashboard</a></li>
            <!--<li><a href="status.php">Status</a></li>
            <li><a href="ticket.php">Entry Paas</a></li>
            <li><a href="profile.php">Profile</a></li>
           
			<li><a href="statistics.php">Statistics</a></li>-->
			<li><a href="php/admin_logout.php">Logout</a></li>
          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav></br></br></br></br>
 
  <div class="container">
    <?php
      /*$name = $_SESSION['name'];
      $email = $_SESSION['email'];
      $phone = $_SESSION['phone'];*/
      echo "<h2 style= 'margin-bottom: 60px;'>Welcome Admin.</h2>
            <label style='margin-right: 72px;'>Name</label>
            <label style='margin-right: 122px;'>Email</label>
            <label style='margin-right: 112px;'>Mobile</label>
            <label>Purpose</label>";   

      $sql = "SELECT * FROM visitors;";
      $result = mysqli_query($conn, $sql);
      $num = mysqli_num_rows($result);
      if ($num>0)
      { 
        
        while ($row = mysqli_fetch_assoc($result)) {
          $GLOBALS['name'] = $row['name'];
          $GLOBALS['email'] = $row['email'];
          $GLOBALS['mobile'] = $row['mobile'];
          $GLOBALS['purpose'] = $row['purpose'];
          $GLOBALS['date'] = $row['date'];
    ?>
    
            <form action='php/admin_dashboard.php' method='post' style='margin-top: 10px;'>
            <input type="text" name="name" value="<?php echo $name; ?> " size=10 readonly>
            
            <input type="text" name="email" value="<?php echo $email; ?>" size=17 readonly>
            
            <input type="text" name="mobile" value="<?php echo $mobile; ?>" size=17 readonly>
            
            <input type="text" name="purpose" value="<?php echo $purpose; ?>" size=17 readonly>
            <input type="submit" name="accept" value="Accept">
            <input type="submit" name="decline" value="Decline">
            <input type="submit" name="none" value="None">
            </form>

        <?php
        }
        
      }
        ?>

    </div>
    
  </div>
 </body>
</html>
