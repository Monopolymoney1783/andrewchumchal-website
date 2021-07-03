<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
sec_session_start();

  if (login_check($mysqli) == true){
    $logged = 'in';
    
    $id = $_SESSION['user_id'];
  } else {
    $logged = 'out';
    //header("Location: https://www.andrewchumchal.com?error=2"); 
    
  }
  
  if (! $_GET['username']){
    header("Location: https://www.andrewchumchal.com?error=2");
  }

?>

<?php
$member_username=$_GET['username'];
$current_user=$_GET['username'];
?>

<?php 
  $sql = "SELECT * FROM member_profiles where username='$member_username'";
  $result = mysqli_query($mysqli,$sql) or die(mysqli_error($mysqli)); 
  $rws = mysqli_fetch_array($result);
?>
<?php
    $url = 'https://www.andrewchumchal.com/user/profile.php/?username=';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Profile</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="http://andrewchumchal.com/user/profile.php" />

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
                    <li><a href="/user/profile.php"><i class="fa fa-user"></i> Profile</a></li>
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
    <header>
      <div class="profile">
        <div class="row clearfix">
          <div>
            <center> 
              <img src="/memberfiles/avatars/<?php echo $rws['member_avatar'];?>" class="img-responsive profile-avatar" height="150" width="150">
              <br>
              <div class="btn-group">
                <a href="http://www.facebook.com/sharer.php?u=<?php echo $url?><?php echo $rws['username'];?> " alt="Share this profile on Facebook" title="Share on Facebook" target="_blank" ><button type="button" class="btn btn-default"><i class="fa fa-facebook"></i></button></a>
                <a href="http://twitter.com/share?text=<?php echo $rws['member_firstname'];?>&url=<?php echo $url ?><?php echo $rws['username'];?>" alt="Tweet This Post" title="Tweet about the profile" target="_blank"><button type="button" class="btn btn-default"><i class="fa fa-twitter"></i></button></a>
                <a href="https://plusone.google.com/_/+1/confirm?hl=en-US&url=<?php echo $url ?><?php echo $rws['username'];?>" alt="Share this profile on Google+" title="Share on Google+" target="_blank" ><button type="button" class="btn btn-default"><i class="fa fa-google-plus"></i></button></a>
              </div>
             </center>
             <h1 class="text-center profile-text profile-name"><?php echo $rws['member_firstname'];?> <?php echo $rws['member_lastname'];?></h1>
             <h2 class="text-center profile-text profile-profession"><?php echo $rws['member_profession'];?></h2>
             <br>
             <div class="panel-group white" id="panel-profile">
              <div class="panel panel-default white">
                <div class="panel-heading white">
                  <center>
                     <a class="panel-title" data-toggle="collapse" data-parent="#panel-profile" href="#panel-element-info">Details</a>
                  </center>
                </div>
                <div id="panel-element-info" class="panel-collapse collapse in">
                  <div class="panel-body">
                    <div class="col-md-4 column">
                      <p class="text-center profile-title"><i class="fa fa-info"></i> Basic</p>
                      <hr>
                      <?php if ($rws['member_shortbio']){?><br>
                      <div class="col-md-4">
                        <p class="profile-details"><i class="fa fa-info"></i> Bio</p>
                      </div>
                      <div class="col-md-8">
                        <p><?php echo $rws['member_shortbio'];?></p><br>
                      </div>
                      <?php } ?>
                      <?php if ($rws['member_address']){?> 
                      <div class="col-md-4">
                          <p class="profile-details"><i class="fa fa-info"></i> Location</p>
                      </div>
                      <div class="col-md-8">
                          <p><?php echo $rws['member_address'];?></p><br>
                      </div>
                      <?php } ?>
                      <?php if ($rws['email']){ ?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-envelope"></i> Email</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['email'];?></p><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_country']){ ?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-info"></i> Country</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_country'];?></p><br>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="col-md-4 column">
                    <p class="text-center profile-title"><i class="fa fa-info"></i> Personal</p>
                    <hr>
                      <?php if ($rws['member_gender']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-user"></i> Gender</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_gender'];?></p><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_maritialstatus']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-users"></i> Maritial Status</p>
                        </div>
                        <div class="col-md-8">
                            <p>
                      <?php echo $rws['member_maritialstatus'];?></p><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_dob']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-calendar"></i> Date of Birth</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_dob'];?></p><br>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="col-md-4 column">
                        <p class="text-center profile-title"><i class="fa fa-info"></i> Social</p>
                        <hr>
                      <?php if ($rws['member_facebook']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-facebook"></i> Facebook</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_facebook'];?></p><br><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_twitter']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-twitter"></i> Twitter</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_twitter'];?></p><br><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_linkedin']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-linkedin"></i> LinkedIn</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_linkedin'];?></p><br>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_pinterest']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-pinterest"></i> Pinterest</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_pinterest'];?></p>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_googleplus']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-google-plus"></i> Google Plus</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_googleplus'];?></p>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_stumbleupon']){?>
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-stumbleupon"></i> Stumble Upon</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_stumbleupon'];?></p>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_github']){?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-github"></i> Github</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_github'];?></p>
                        </div>
                      <?php } ?>
                      <?php    if ($rws['member_vimeo']){?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-vimeo-square"></i> Vimeo</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_vimeo'];?></p>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_youtube']){?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-youtube"></i> Youtube</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_youtube'];?></p>
                        </div>
                      <?php } ?>
                      <?php if ($rws['member_skype']){?>   
                        <div class="col-md-4">
                            <p class="profile-details"><i class="fa fa-skype"></i> Skype</p>
                        </div>
                        <div class="col-md-8">
                            <p><?php echo $rws['member_skype'];?></p>
                        </div>
                      <?php } ?>
          </div>
        </div>
      </div>
    </header>
    <main class="container">
    </main>
    </div> <!-- .over-footer -->
    
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
    
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
      _paq.push(["setCookieDomain", "*.www.andrewchumchal.com"]);
      _paq.push(["setDomains", ["*.www.andrewchumchal.com"]]);
       _paq.push(['setUserId', '<?php echo htmlentities($_SESSION['username']); ?>']);
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
