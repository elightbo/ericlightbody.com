<?php
/**
 * The template for displaying the footer
 *
 * @package WordPress
 * @subpackage ericlightbody
 */
?>

</div> <!-- ending column -->
</div> <!-- ending row -->
</section> <!-- ending content section -->

<footer role="footer">
    <div class="row">
        <!--<div class="column large-12">-->
        <!--Find out more about me by subscribing to my blog, hitting me up on twitter, seeing my activity on github, or-->
        <!--even grab my resume. I also summarized myself up on the about me page, too.  But since you're here, you-->
        <!--should know that I'm an open source Milwaukee developer with a focus on PHP. I'm a proud father of two and-->
        <!--a happily married to my High School sweetheart.-->
        <!--</div>-->
        <div class="column large-6">
            <h1>About Me</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In laborum libero tempora tempore? Accusantium
            architecto, corporis cum doloribus ea ex
        </div>
        <div class="column large-6">
            <h1>On the internetsite-</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. In laborum libero tempora tempore? Accusantium
            architecto, corporis cum doloribus ea ex
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
