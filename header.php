<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package    WordPress
 * @subpackage ericlightbody
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
	<link href='//fonts.googleapis.com/css?family=PT+Serif:400,700,700italic,400italic' rel='stylesheet' type='text/css'>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds2.feedburner.com/ericlightbody/RSS" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="http://feeds2.feedburner.com/ericlightbody/atom" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Comments Feed" href="http://feeds2.feedburner.com/ericlightbody/comments" />
	<?php wp_enqueue_style('foundation');
	wp_enqueue_style('foundation-icons');
	wp_enqueue_script('modernizr');
	wp_enqueue_script("jquery");
	if (is_singular()) {
		wp_enqueue_script('comment-reply');
	}
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<header>
	<div class="row">
		<div class="large-12 columns">
			<nav class="top-bar top-nav" data-topbar role="navigation">
				<ul class="title-area">
					<li class="name">
						<h1><a href="/">eric lightbody</a></h1>
					</li>
					<!-- Remove the class "menu-icon" to get rid oif menu icon. Take out "Menu" to just have icon alone -->
					<li class="toggle-topbar menu-icon"><a href="#"><span></span></a></li>
				</ul>
				<section class="top-bar-section">
					<!-- Right Nav Section -->
					<ul class="right">
						<?php
						$args = array(
							'menu'        => 'Top Nav',
							'sort_column' => 'menu_order',
							'container'   => 'false',
							'items_wrap'  => '%3$s',
						);
						wp_nav_menu($args); ?>
						<li class="hide-for-small-only">
							<form role="search" class="search" method="get" action="/">
								<i class="fi-magnifying-glass"></i>
								<input type="search" name="s"/>
							</form>
						</li>
						<li class="show-for-small-only">
							<a href="/search">Search</a>
						</li>
					</ul>
				</section>
			</nav>
		</div>
	</div>
</header>

<section role="content">
	<div class="row">
		<div class="column large-12">

