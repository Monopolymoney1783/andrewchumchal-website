<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<?php
if (!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== 'on') {
    if(!headers_sent()) {
        header("Status: 301 Moved Permanently");
        header(sprintf(
            'Location: https://%s%s',
            $_SERVER['HTTP_HOST'],
            $_SERVER['REQUEST_URI']
        ));
        exit();
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
<title>Privacy Policy</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="https://www.andrewchumchal.com/privacy-policy/" />

<!-- Favicon -->
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<!-- End Favicon -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">

<link  rel="stylesheet" href="/styles/styles.css" />
<link  rel='stylesheet' href="/styles/fonts.css" />

<!-- Keywords -->
<meta name="keywords" content="andrew,chumchal, andrew chumchal, andrew william chumchal, andrew william" />
<!-- End Keywords -->
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
              <li "><a href="/"><i class="fa fa-home"></i> Home</a></li>
              <li ><a href="/about/"><i class="fa fa-android"></i> About</a></li>
              <li ><a href="portfolio/"><i class="fa fa-laptop"></i> Portfolio</a></li>
              <!-- <li ><a href="/blog/"><i class="fa fa-terminal"></i> Blog</a></li> -->
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