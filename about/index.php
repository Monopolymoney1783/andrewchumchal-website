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
<html lang="en">
<head>
<title>About Andrew</title>


<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="canonical" href="http://andrewchumchal.com/about/" />

<!-- Favicon -->
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<link rel="icon" href="/img/favicon.ico" type="image/x-icon"> 
<!-- End Favicon -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" onerror="loadBackupCSS('/bower_components/bootstrap/dist/css/bootstrap.min.css')">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" onerror="loadBackupCSS('/bower_components/font-awesome/css/font-awesome.min.css')">

<link  rel="stylesheet" href="/styles/styles.css" />
<link  rel='stylesheet' href="/styles/fonts.css" />


</head>
<body class="about">

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
          <li class="active"><a href="/about/"><i class="fa fa-android"></i> About</a></li>
          <li ><a href="/portfolio/"><i class="fa fa-laptop"></i> Portfolio</a></li>
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


<header class="jumbotron" style="background-image: url(/img/house.jpg);">
	<div class="container">
		<h1><a href="/about/"><i class="fa fa-android"></i> About Andrew</a></h1>
		
	</div>
</header>


<main class="container">
<h1>About</h1>

<p>

<h2>The Essentials</h2>
<p> I am 21 years young. I was born in San Antonio, but I've pretty much grown up in Ridgecrest, California.</p>
<p>then I moved back to Dallas Texas two years ago. </p>

</p>



<div class="clearfix"></div>

<h2>Work</h2>
<blockquote class="quote row">
	<i class="fa fa-quote-left fa fa-4x pull-left"></i>
	<p>The best preparation for good work tomorrow is to do good work today.</p>
	<cite>Elbert Hubbard</cite>
</blockquote> 
<p</p>

<h2>Play</h2>
<p>I like bening outdoors: hiking, camping, sports, hunting, basically anything. I'm not all that great at any sport but I enjoy playing most of them</p>
<p>I've pretty much stop them, but I did enjoy lots of computer games.</p>
<p>I think, more then anything. I like spending time with friends.</p>

<h2>Around the internet</h2>
<img src="/img/profile.jpg" alt="" class="right" />
<p>I show up all over the place:
	<a href="https://www.facebook.com/andrew.w.chumchal">Facebook</a>,
	<a href="https://twitter.com/andrewchumchal">Twitter</a>,
	<a href="https://github.com/andrewchumchal">GitHub</a>,
	<a href="https://www.linkedin.com/in/andrewchumchal">Linked in</a>,
	and pretty much anywhere where you see this picture </p>

<h3>That's all folks</h3>
<p>Thanks for reading, I hope you have a great day!</p>
<p>Have a blessed day.<br />
-Andrew</p>


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
          <!-- <li ><a href="/blog/"><i class="fa fa-terminal"></i> Blog</a></li> -->
        </ul>
      </div>
      
      <div class="col-md-4 info">
        <p>&copy; Andrew Chumchal 2016</p>
      </div>
    <div>
  </div>
</footer>
<div class="chromefix"></div>

<script>
function loadBackupJS(url) {
	var s = document.createElement('script');
	s.src = url;
	document.head.appendChild(s);
}
</script>
 


<!--[if lt IE 9]>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<![endif]-->
<!--[if gte IE 9]><!-->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" onerror="loadBackupJS('/bower_components/jquery/dist/jquery.min.js')"></script>
<!--<![endif]-->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/2.4.1/lodash.min.js" onerror="loadBackupJS('/bower_components/lodash/dist/lodash.min.js')"></script>


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
