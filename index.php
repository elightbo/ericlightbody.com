<?php
/**
 * The main template file
 *
 * @package    WordPress
 * @subpackage ericlightbody
 * @since      Twenty Fifteen 1.0
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if (have_posts()) { ?>

			<?php if (is_home() && !is_front_page()) { ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php }
			// Start the loop.
			while (have_posts()) {
				the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part('content', get_post_format());
				// End the loop.
			}

			$previousLink = get_previous_posts_link('&laquo; Newer Posts');
			$nextLink     = get_next_posts_link('Older Posts &raquo;');
			if ($previousLink || $nextLink) {
				?>
				<div class="row posts-navigation">
					<div class="columns small-6">
						<?php
						if ($previousLink) {
							echo "<div class='previous-posts-link'>{$previousLink}</div>";
						}
						?>
					</div>
					<div class="columns small-6">
						<?php
						if ($nextLink) {
							echo "<div class='next-posts-link'>{$nextLink}</div>";
						}
						?>
					</div>
				</div>
				<?php
			}
		}
		// If no content, include the "No posts found" template.
		else {
			get_template_part('content', 'none');
		}
		?>

	</main>
	<!-- .site-main -->
</div><!-- .content-area -->

<?php get_footer(); ?>
