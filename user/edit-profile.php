<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();

  if (login_check($mysqli) == true){
    $logged = 'in';
  } else {
    $logged = 'out';
    header("Location: https://www.andrewchumchal.com?error=2");
  }
?>
<?php 
$current_user = $_SESSION['username'];
$member_username = $_SESSION['username'];
$id = $_SESSION['user_id'];
?>
<?php 
  $sql = "SELECT * FROM member_profiles where username='$member_username'";
  $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli)); 
  $rws = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Edit Profile</title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="http://andrewchumchal.com/user/edit-profile.php" />

<!-- Favicon -->
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/img/favicon.ico" type="image/x-icon"> 
<!-- End Favicon -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" onerror="loadBackupCSS('/bower_components/bootstrap/dist/css/bootstrap.min.css')">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" onerror="loadBackupCSS('/bower_components/font-awesome/css/font-awesome.min.css')">

<link  rel="stylesheet" href="/styles/styles.css" />
<link  rel='stylesheet' href="/styles/fonts.css" />
</head>

<body class="homepage">
  <div class="over-footer">
    <nav class="navbar navbar-inverse navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Andrew Chumchal</a>
        </div>
        <div id="nav-menu" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li ><a href="/"><i class="fa fa-home"></i> Home</a></li>
            <li ><a href="/about/"><i class="fa fa-android"></i> About</a></li>
            <li ><a href="portfolio/"><i class="fa fa-laptop"></i> Portfolio</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php if (login_check($mysqli) == true) : ?>
              <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">  Welcome <?php echo htmlentities($_SESSION['username']); ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/user/profile.php?username=<?php echo $_SESSION['username'];?>"><i class="fa fa-user"></i> Profile</a></li>
                    <li><a href="/user/edit-profile.php"> Edit Profile</a></li>
                    <li><a href="/includes/logout.php/"><i class="fa fa-sign-out"></i> Logout</a></li>
                  </ul>
                </li> 
            <?php else : ?>
            <li><a href="/register/"><i class="fa fa-user"></i> Sign Up</a></li>
            <li><a href="/login/"><i class="fa fa-sign-in"></i> Login</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
    
    <header >
    
    </header>
    
    <main class = "container">
    <h1><?php echo $rws['member_firstname'];?> <?php echo $rws['member_lastname'];?></h1>
      <?php include '../includes/user/forms/edit-profile-form.php'?>
    </main>
    </div> <!-- .over -footer -->
    
    <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-5 contact">
          <h3>Contact Andrew</h3>
          <ul>
            <li>
              <a class="email">
                <span class="fa-stack">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-envelope fa-stack-1x"></i>
                </span>
                <span class="email-text">andrew @ This Website</span>
              </a>
            </li>
            <li>
              <a class="fa-stack" href="https://github.com/andrewchumchal">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-github fa-stack-1x"></i>
              </a>
            </li>
            <li>
              <a class="fa-stack" href="https://www.linkedin.com/in/andrewchumchal">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-linkedin fa-stack-1x"></i>
              </a>
            </li>
            <li>
              <a class="fa-stack" href="https://www.facebook.com/andrew.w.chumchal">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-facebook fa-stack-1x"></i>
              </a>
            </li>
            <li>
              <a class="fa-stack" href="https://twitter.com/andrewchumchal">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-twitter fa-stack-1x"></i>
              </a>
            </li>
          </ul>
        </div>

        <div class="col-md-3 sitemap">
          <h3>Site Map</h3>
          <ul class="fa-ul">
            <li><a href="/"><i class="fa-li fa fa-home"></i> Home</a></li>
            <li><a href="/about/"><i class="fa-li fa fa-android"></i>About</a></li>
            <li><a href="/portfolio/"><i class="fa-li fa fa-laptop"></i>Portfolio</a></li>
          </ul>
        </div>

        <div class="col-md-4 info">
          <p>&copy; Andrew Chumchal 2017</p>
        </div>
    </footer>
    
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" onerror="loadBackupJS('/bower_components/jquery/dist/jquery.min.js')"></script>
    <!--<![endif]-->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js" onerror="loadBackupJS('/bower_components/lodash/dist/lodash.min.js')"></script>
  </body>
</html>
