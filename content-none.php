<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package    WordPress
 * @subpackage ericlightbody
 * @since      Twenty Fifteen 1.0
 */
?>

<?php
$searchQuery = get_search_query();
?>
<section class="no-results not-found">
	<header class="page-header">
		<h2 class="page-title"><?php (empty($searchQuery)) ? _e('Search') : _e('Nothing Found'); ?> </h2>
	</header>
	<!-- .page-header -->

	<div class="page-content">

		<?php if (is_home() && current_user_can('publish_posts')) { ?>

			<p><?php printf(__('Ready to publish your first post? <a href="%1$s">Get started here</a>.'), esc_url(admin_url('post-new.php'))); ?></p>

		<?php }
		else { ?>
			<p>
				<?php (empty($searchQuery)) ? _e('Can\'t find what you\'re looking for? Maybe searching will help. ') : _e('Sorry, but nothing matched your search terms. '); ?>
			<?php
			_e(' If you still can\'t find find it, maybe try a <a href="https://duckduckgo.com/?q=site%3Aericlightbody.com">different search</a>.');
			get_search_form();
			?>
		<?php } ?>
	</div>
	<!-- .page-content -->
</section><!-- .no-results -->
