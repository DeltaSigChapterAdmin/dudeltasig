<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage DSPTheme
 * @since DSPTheme 1.0
 */
?>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="viewport" content="width=device-width" initial-scale = 1.0; maximum-scale=1.0; user-scalable=no" />

<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

<!--FAVICON LINKS (use http://realfavicongenerator.net/ to generate replacement) -->

    <link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="<?php bloginfo('template_url'); ?>/img/favicons/manifest.json">
    <link rel="mask-icon" href="<?php bloginfo('template_url'); ?>/img/favicons/safari-pinned-tab.svg" color="#005b3c">
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="<?php bloginfo('template_url'); ?>/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
<!--END FAVICON LINKS ------------------------------------------------------------->

<!--CUSTOM FONTS-->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">


<?php
//Fetches Scripts And CSS includes from functions.php
wp_head();
?>

    <meta name="verify-v1" content="53/AHENoYym8RbXpIdO+Aa2GaVPVpX8G79ehG6+NYTw=" />


</head>

<!--BEGIN-NAV-->

<body style="overflow-x: hidden;" class="dudeltasig">


<!--Facebook Widget -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.7&appId=726443627465710";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- GOOGLE ANALYTICS -->
<?php include_once('googleAnalyticsTracking.php') ?>


<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container-fluid topnav">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav dspTopLeft" href="#">&Delta; &Sigma; &Phi;</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#recruitment">Recruitment</a>
                </li>
                <li>
                    <a href="#brothers">Brothers</a>
                </li>
                <li>
                    <a href="#donate">Donate</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
//Query posts to select all posts with this pages category
//THERE SHOULD ONLY BE ONE POST WITH "intro" CATEGORY
query_posts( 'category_name=intro' );

//Init variables that exist outside of the loop
$htmlString = "";

//Start the loop
while ( have_posts() ) : the_post();

   // <!-- Header -->
   echo '<a name="intro"></a>
    <div class="intro-header moded">
          <div class="video-overlay"></div>
            <div class="video-wrap">
                <video autoplay="autoplay" muted="muted" loop="loop" poster="' . get_field("intro_image") . '" class="bg-video">
                <source src="' . get_field("intro_video") . '">
                
            </video>
    </div>
        <div class="container intro-container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>' . get_the_title() . '</h1>
                        <h3>' . get_the_content() . '</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                        <li>
                            <a href="https://twitter.com/DrexelDeltaSig" onmouseover="showIfNotMobile(\'.iframeContainerTwitter\', \'block\')" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <span class="closeBTN" style="position: absolute; display: none; top: 70px; left: calc(20vw - 25px); background-color: white; border-radius: 50px; color: darkgreen; padding: 5px 7px;"><i class="fa fa-times"></i></span>
                        <div class="iframeContainerTwitter" style=" position: absolute; display: none; max-width: 30vw; min-width: 25vw; max-height: 80vh; top: 100px; left: -75px; overflow: scroll;">
                           <a class="twitter-timeline" href="https://twitter.com/DrexelDeltaSig">Tweets by DUDeltaSig</a>
                            <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
                        </div>
                        <li>
                            <a href="https://www.facebook.com/DUDeltaSig/" onmouseover="showIfNotMobile(\'.iframeContainerFacebook\', \'block\')" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <div class="iframeContainerFacebook" style=" position: absolute; display: none; max-width: 30vw; max-height: 80vh; top: 100px; left: -75px; overflow: scroll;">
                           <div class="fb-page" data-href="https://www.facebook.com/DUDeltaSig/" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/DUDeltaSig/" class="fb-xfbml-parse-ignore">
                                    <a href="https://www.facebook.com/DUDeltaSig/">Delta Sigma Phi at Drexel University</a>
                                </blockquote>
                           </div>
                        </div>
                        <li>
                            <a href="" class="btn btn-default btn-lg" onclick="function(){jQuery("#donateForm").submit();}"><i class="fa fa-paypal fa-fw"></i> <span class="network-name">Donate</span></a>
                           <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" align="right" id="donateForm" style="display: none;">
                                <!-- Paypal Button-->
                                <input type="hidden" name="cmd" value="_s-xclick">
                                <input type="hidden" name="hosted_button_id" value="FG4VAEKA8N8HU">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </form>
                        </li>
                    </ul>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->';


endwhile;

?>




