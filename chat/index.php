<?php
include_once '../includes/db_connect.php';
include_once '../includes/functions.php';
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
?>

<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Chat - Andrew Chumchal   </title>


    <!--[if lt IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.min.js"></script><![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="https://www.andrewchumchal.com" />

<!-- Favicon -->
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/img/favicon.ico" type="image/x-icon">
<!-- End Favicon -->

<!-- Web App --> 
<link rel="manifest" href="/webapp/manifest.json">


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
              <li class="active"><a href="/"><i class="fa fa-home"></i> Home</a></li>
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

      <header class="jumbotron" style="background-image: url(/img/space.jpg);">
        <div class="container">
          <h1><a href="/"> Andrew Chumchal</a></h1>
          <h2><span class="sub-heading-with-links "><a href="/about">Student</a>  <a href="/blog">My Life</a>  <a href="/portfolio">Computer Geek</a></span></h2>
        </div>
      </header>

      <main class="container">
        <!-- Start of Rocket.Chat Livechat Script -->
        <script type="text/javascript">
        (function(w, d, s, u) {
        	w.RocketChat = function(c) { w.RocketChat._.push(c) }; w.RocketChat._ = []; w.RocketChat.url = u;
        	var h = d.getElementsByTagName(s)[0], j = d.createElement(s);
        	j.async = true; j.src = 'https://chat.chumchal.dev/livechat/rocketchat-livechat.min.js?_=201903270000';
        	h.parentNode.insertBefore(j, h);
        })(window, document, 'script', 'https://chat.chumchal.dev/livechat');
        </script>
        <!-- End of Rocket.Chat Livechat Script -->
        
        
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
              <a class="fa-stack" href="https://keybase.io/andrewchumchal">
                <i class="fa fa-square-o fa-stack-2x"></i>
                <i class="fa fa-key fa-stack-1x"></i>
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
          <p><a href="http://gh.andrewchumchal.com"><i class="fa fa-github"></i></a>
          <a href="https://andrewchumchal.com/apple/Andrew's%20WiFi.mobileconfig"><i class="fa fa-wifi"></i></a></p>
          <p>&copy; Andrew Chumchal 2017</p>
        </div>
        
        
        
</footer>

<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" defer"></script>
<!--<![endif]-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js" defer"></script>


<script defer="defer"  src="/scripts/email.js"></script><script defer="defer"  src="/scripts/instagram.js"></script><script defer="defer"  src="/scripts/github.js"></script><script defer="defer"  src="/scripts/addlink.js"></script>
    

<!-- Matomo -->
<script type="text/javascript">
  var _paq = _paq || [];
  /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
  _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
  _paq.push(["setCookieDomain", "*.andrewchumchal.com"]);
  _paq.push(["setDomains", ["*.andrewchumchal.com"]]);
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//owa.ahost4all.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', '3']);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//owa.ahost4all.com/piwik.php?idsite=3&amp;rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Matomo Code -->


    
    <script src="https://cdn.logrocket.io/LogRocket.min.js" crossorigin="anonymous"></script>
    <script>window.LogRocket && window.LogRocket.init('l73nzi/andrew-chumchal');</script>
    </body>
</html>
