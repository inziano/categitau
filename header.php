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

<?php 

// Change header menu based on page
$header_id = 'site-header';
if ( is_front_page() || is_single() ):
	$header_id = 'site-header-main';
else:
	$header_id;
endif;

?>

<!-- Navigation -->
<header id="<?= $header_id ?>" class="main solid dark">
        <div class="inside logo-and-nav clearfix">                                  
       
	   <div class="nav-holder">
		   <div class="main-nav clearfix">	
				<!-- TODO: Change styling for the navigation -->
			   <?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_class' => 'main-menu sf-menu sf-js-enabled',
						'container' => ' ',
					) );
			   ?>    
		   </div>
	   </div>
   
	   </div>
</header>

<?php 
   $url = get_template_directory_uri().'/assets/img/img_bg_2.jpg';
   if ( is_page('about-me') ) :
	   $url = get_template_directory_uri().'/assets/img/about-bg.jpg';
   elseif(is_page('contact-me')):
	   $url = get_template_directory_uri().'/assets/img/contact-bg.jpg';
   elseif ( is_home() ):
	   $url = get_template_directory_uri().'/assets/img/img_bg_4.jpg';
   elseif ( is_front_page() ):
		   if(has_header_image()):
			$url = get_header_image();
		else:
		   $url = get_template_directory_uri().'/assets/img/home-bg.jpg';
		endif;
   elseif ( is_page('portfolio') ):
	   $url = get_template_directory_uri().'/assets/img/img_bg_3.jpg';
 	elseif ( is_single() ) :
		$url =  get_template_directory_uri().'/assets/img/img_bg_1.jpg';
   endif;
?>
<?php 
   $header_class = '';
   if ( is_front_page() ):
	   $header_class = 'masthead_main masthead';
   else :
	   $header_class = 'masthead';
   endif;
?>

<?php
// Change header
if ( is_front_page() || is_404() || is_single() ):
?>

<!-- Page Header -->
<header class=" <?= $header_class ?> " style="background-image: url('<?= $url ?>')"><!-- end background image style -->
   <div class="overlay"></div>
   <div class="container">
	   <div class="row">
		   <div class="col-lg-8 col-md-10 mx-auto">
		   <div class="page-heading">
			   <h1>
				   <?php if ( is_front_page() ) :
					   bloginfo('name'); ?>
					<?php elseif ( is_single() ) :
					 single_post_title() ; ?>
				   <?php else :
					   echo "Sorry"; ?>
				   <?php endif ?> 
			   </h1>
			   <span class="subheading">
				   <!-- TODO: rename for front page -->
				   <?php if ( is_front_page() ) :
					     bloginfo('description'); ?>
					<?php elseif ( is_single() ) :
						the_category(','); ?>
				   <?php else :
					   echo "Nothing to see here"; ?>
				   <?php endif ?> 
			   </span>
		   </div>
		   </div>
	   </div>
   </div>
</header>
<?php elseif( is_page() || is_home() ): ?>

<?php 
$title = 'Nothing here';
if ( is_page() ) :
	 $title = get_the_title();
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

<?php endif; ?>


