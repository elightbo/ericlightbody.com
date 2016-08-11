<?php
/**
 * eric lightbody stuff and nonsense
 *
 * @package ericlightbody
 */

add_theme_support('menus');
add_theme_support( 'title-tag' );
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

/**
 * Load up the version of jQuery you want. Pulled from http://bavotasan.com/2010/force-wordpress-use-latest-version-jquery/
 *
 * @param $version
 */
function current_jquery($version)
{
	global $wp_scripts;
	if ((version_compare($version, $wp_scripts->registered[jquery]->ver) == 1) && !is_admin()) {
		wp_deregister_script('jquery');

		wp_register_script(
			'jquery',
			'http://ajax.googleapis.com/ajax/libs/jquery/' . $version . '/jquery.min.js',
			false, $version);
	}
}

add_action('wp_head', current_jquery('2.1.1'));

/**
 * Load up the css into the front-end
 */
$templateDirectory = esc_url(get_template_directory_uri());
wp_register_style('foundation', $templateDirectory . '/css/foundation.css"', [], '5.5.0');
wp_register_style('foundation-icons', $templateDirectory . '/css/foundation-icons.css"', [], '3.0');
wp_register_script('modernizr', $templateDirectory . '/js/modernizr.js', [], '2.8.3');
wp_register_script('foundation', $templateDirectory . '/js/foundation.min.js', []);

// load css into the website's front-end
function ericlightbody_enqueue_style()
{
	wp_enqueue_style('mytheme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'ericlightbody_enqueue_style');

// Custom callback to list comments in the your-theme style
function custom_comments($comment, $args, $depth)
{
	$GLOBALS['comment']       = $comment;
	$GLOBALS['comment_depth'] = $depth;
	?>
	<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author vcard">
		<?php
		$avatar_email = get_comment_author_email();
		$avatar       = str_replace("class='avatar", "class='photo avatar", get_avatar($avatar_email, 80));
		echo $avatar;
		?>
		<div class="comment-meta">
			<?php
			commenter_link();
			printf(
				__('<a href="%1$s" class="comment-time">%2$s at %3$s</a>'),
				'#comment-' . get_comment_ID(),
				get_comment_date(),
				get_comment_time());
			?>
		</div>
	</div>

	<?php if ($comment->comment_approved == '0') _e("<span class='unapproved'>Your comment is awaiting moderation.</span>", 'your-theme') ?>
	<div class="comment-content">
		<?php comment_text() ?>
	</div>
	<?php // echo the comment reply link
	if ($args['type'] == 'all' || get_comment_type() == 'comment') :
		comment_reply_link(
			array_merge(
				$args, array(
				'reply_text' => __('Reply', 'your-theme'),
				'login_text' => __('Log in to reply.', 'your-theme'),
				'depth'      => $depth,
				'add_below'  => 'comment',
			)));
	endif;
	edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
	?>
<?php }

/** restrict search to posts only */
function my_search_filter($query)
{
	if ($query->is_search) {
		$query->set('post_type', 'post');
	}

	return $query;
}

add_filter('pre_get_posts', 'my_search_filter');

// Custom callback to list pings
function custom_pings($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
	<div class="comment-author"><?php printf(
			__('By %1$s on %2$s at %3$s', 'your-theme'),
			get_comment_author_link(),
			get_comment_date(),
			get_comment_time());
		edit_comment_link(__('Edit', 'your-theme'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
	<?php if ($comment->comment_approved == '0') _e('<span class="unapproved">Your trackback is awaiting moderation.</span>', 'your-theme') ?>
	<div class="comment-content">
		<?php comment_text() ?>
	</div>
<?php }

// Produces an avatar image with the hCard-compliant photo class
function commenter_link()
{
	$commenter = get_comment_author_link();
	if (preg_match('<a[^>]* class=[^>]+>', $commenter)) {
		$commenter = preg_replace('(<a[^>]* class=[""]?)', '\1url ', $commenter);
	}
	else {
		$commenter = preg_replace('(<a )/', '\1class="url "', $commenter);
	}
	echo '<cite class="fn n">' . $commenter . '</cite>';
}