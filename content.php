<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package    WordPress
 * @subpackage ericlightbody
 * @since      Twenty Fifteen 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if (is_single()) :
			the_title('<h2 class="entry-title">', '</h2>');
		else :
			the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
		endif;
		?>
	</header>
	<!-- .entry-header -->
	<?php if (!is_page()) { ?>
		<footer>
			<ul>
				<li>
					<time datetime="<?= get_the_date(DateTime::RFC3339); ?>"><?= get_the_date('j F Y'); ?></time>
				</li>
				<li>
					<?= get_the_category_list(',') ?>
				</li>
				<li><a href="<?= comments_link(); ?>">Comment</a></li>
			</ul>
		</footer>
	<?php } ?>

	<div class="entry-content">
		<?php
		/* translators: %s: Name of current post */
		the_content(
			sprintf(
				__('Continue reading %s'),
				the_title('<span class="screen-reader-text">', '</span>', false)
			));

		wp_link_pages(
			array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __('Pages:') . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __('Page') . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			));
		?>
	</div>
	<!-- .entry-content -->

	<?php
	// Author bio.
	if (is_single() && get_the_author_meta('description')) :
		get_template_part('author-bio');
	endif;
	?>

	<footer class="entry-footer">
		<!--        --><?php //twentyfifteen_entry_meta(); ?>
		<?php edit_post_link(__('Edit'), '<span class="edit-link">', '</span>'); ?>
	</footer>
	<!-- .entry-footer -->

</article><!-- #post-## -->
