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
  <title>Visitor Status</title>
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
          <a class="navbar-brand" href="teacher.php">VMS</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="teacher.php">Dashboard</a></li>
            <li class="active"><a href="status.php">Status</a></li>
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
      $email = $_SESSION['email'];
      echo '<h2>Appointment Status</h2>';

      echo "<form style= 'margin-top: 80px;'>";
      $getquery=mysqli_query($conn, "SELECT * FROM visitors WHERE email = '$email'");
      $resultCheck = mysqli_num_rows($getquery);
      $sql = "SELECT imgpath from teacher WHERE email = '$email';";
      $img = mysqli_query($conn, $sql);

if ($resultCheck>0){
    while($rows=mysqli_fetch_assoc($getquery))
    {
    $name=$rows['name'];
    $phone=$rows['mobile'];
    $purpose=$rows['purpose'];
    $doa=$rows['doa'];
?>
    

    <?php
    echo '<b> Name: </b>' . $name . '<br/>' . '<br/>' . '<b> Phone: </b>' . $phone . '<br/>' . '<br/>' . '<b>Purpose:</b> ' . $purpose . '<br/>' . '<br/>' ;

    if ($rows['ekey'] == 1)
    {
      echo '<b>Status: </b>Confirmed' . '<br/>' . '<br/>' . '<b>Date of Appointment: </b>' . $doa .   '<hr size="3"/>';
    }
    elseif ($rows['ekey'] == 2) {
      echo '<b>Status: </b>Cancelled' . '<hr size="3"/>';
    }
    else 
    {
       echo '<b>Status: </b>Pending' . '<hr size="3"/>';
    }
    }
  }


  echo "</form>";
    ?>
    
    

  </div>
 </body>
</html>
