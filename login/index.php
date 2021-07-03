<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
 
sec_session_start();
get_ipaddress();

 
if (login_check($mysqli) == true) {
    $logged = 'in';
    header("Location: https://www.andrewchumchal.com/");
} else {
    $logged = 'out';
}

?>
<?php
  $ipaddress =  $_SESSION['ipaddress'];
  $sql1 = "SELECT COUNT(*) FROM login_attempts WHERE ipaddress='$ipaddress'";
  $result1 = mysqli_query($mysqli,$sql1) or die(mysqli_error($mysqli));
  $rws1 = mysqli_fetch_array($result1);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Secure Login</title>


      <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script><![endif]-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="canonical" href="https://www.andrewchumchal.com/login" />

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
              <li ><a href="/"><i class="fa fa-home"></i> Home</a></li>
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
                <li ><a href="/register/"><i class="fa fa-user"></i> Sign Up</a></li>
                <li class="active"><a href="/login/"><i class="fa fa-sign-in"></i> Login</a></li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>

        <header class="jumbotron" style="background-image: url(/img/space.jpg);">
          <div class="container">
            <h1><a href="/">Secure Login</a></h1>
          </div>
        </header>
        <main class="container">
          <?php
            if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
            }
          ?>
          <form action="/includes/process_login.php" method="post" name="login_form"> 
            Email: <input type="text" name="email" /><br>
            Password: <input type="password" name="password" id="password"/><br>
            <!-- <div class="g-recaptcha" data-sitekey="6LeAFDIUAAAAAPy3vMwwkF9fFdaeOm7ZxGyD9Lxi"></div> -->
            <input type="button" value="Login" onclick="formhash(this.form, this.form.password);"/>
          </form>
          <?php
          if (login_check($mysqli) == true) {
              echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';

          echo '<p>Do you want to change user? <a href="/includes/logout.php">Log out</a>.</p>';
          }
          ?>
          <br><br><br>
          </div>
          
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
                    <li><a href="/login/"><i class="fa-li fa fa-lock"></i>Login</a></li>
                    <!-- <li ><a href="/blog/"><i class="fa fa-terminal"></i> Blog</a></li> -->

                  </ul>
                </div>

                <div class="col-md-4 info">
                  <p>&copy; Andrew Chumchal 2016</p>
                </div>
              <div>
            </div>
          </footer>
            <script src='https://www.google.com/recaptcha/api.js'></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" onerror="loadBackupJS('/bower_components/jquery/dist/jquery.min.js')"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js" onerror="loadBackupJS('/bower_components/lodash/dist/lodash.min.js')"></script>
            <script type="text/JavaScript" src="/scripts/sha512.js"></script><script type="text/JavaScript" src="/scripts/forms.js"></script> 
            <script defer="defer"  src="/scripts/email.js"></script><script defer="defer"  src="/scripts/addlink.js"></script>
            <!-- Piwik -->
              <script type="text/javascript">
              var _paq = _paq || [];
              /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
              _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
              _paq.push(["setCookieDomain", "*.www.andrewchumchal.com"]);
              _paq.push(["setDomains", ["*.www.andrewchumchal.com"]]);
              _paq.push(['trackPageView']);
              _paq.push(['enableLinkTracking']);
              (function() {
              var u="//owa.ahost4all.com/";
              _paq.push(['setTrackerUrl', u+'piwik.php']);
              _paq.push(['setSiteId', '1']);
              var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
              g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
              })();
              </script>
              <noscript><p><img src="//owa.ahost4all.com/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
            <!-- End Piwik Code -->
    </body>
</html>