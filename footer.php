<?php
/**
 * The template for displaying the footer
 *
 * @package    WordPress
 * @subpackage ericlightbody
 */
?>

</div> <!-- ending column -->
</div> <!-- ending row -->
</section> <!-- ending content section -->

<footer role="footer">
	<div class="row">
		<div class="column large-6">
			<h1>About Me</h1>
			I'm an open source Milwaukee developer with a focus on PHP. I love to develop,
			but also appreciate design. I'm a proud father of two and happily married to my High School sweetheart. If
			you're curious about my professional life, please view my
			<a href="/wp-content/uploads/2015/08/eric-lightbody.pdf">resume</a>.
		</div>
		<div class="column large-6">
			<h1>On the Internet</h1>
			I can be found on <a href="http://twitter.com/elightbo">twitter</a>. I have been starting to share more on
			<a href="https://github.com/elightbo">github</a>. Sometimes, I help out on
			<a href="http://stackoverflow.com/users/680546/elightbo">stackoverflow</a>. I am also on
			<a href="https://www.linkedin.com/in/elightbo">linkedin</a>.
		</div>
	</div>
</footer>

</div><!-- .site -->

<?php
wp_enqueue_script('foundation');
wp_enqueue_script(
	'site',
	esc_url(get_template_directory_uri()) . '/js/site.js', [], false, true
);
wp_footer();
?>
</body>
</html>
