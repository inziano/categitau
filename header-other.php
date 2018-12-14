<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package categitau
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Adamina|Great+Vibes|Lora|Open+Sans" rel="stylesheet"> 
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<?php wp_head(); ?>
</head>

<body>
<!-- Navigation -->
   
<header id="site-header" class="main solid dark">
    <div class="inside logo-and-nav clearfix">                                  
   
    <div class="nav-holder">
        <div class="main-nav clearfix">	
               <!-- TODO: Change styling for the navigation -->
			   <?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_class'         => '',
					) );
			   ?>    
        </div>
    </div>

    </div>
</header>
<?php 
$title = 'Nothing here';
if ( is_page('about-me') ) :
	 $title = 'About';
   elseif(is_page('contact-me')):
	 $title = 'Contact';
   elseif ( is_home() ):
    $title = 'Blog';
   elseif ( is_page('portfolio') ):
    $title = 'Portfolio';
   endif;
?>
<div class="header-wrap">
    <header class="main entry-header center">
        <div class="inner">
            <div class="inner">
                <div class="title">	
                    <h1 class="entry-title">
                        <?= $title ?>
                    </h1>										
                </div>
            </div><!-- .inner -->
        </div>
    </header><!-- .entry-header -->
</div>

