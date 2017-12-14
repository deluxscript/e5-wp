<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Enterfive
 */

?>

	</div><!-- #content -->

	<!-- Footer Section -->
	<footer class="p-t-88 p-b-34 unb-reg" id="footer">
		<div class="text-center">
			<p class="footer-text unb-bo">
				You like us?<br />We like you too!
			</p>
			<div class="text-center m-t-40 m-b-70">
				<a href="#" class="work-btn unb-bo">Work With Us</a>
			</div>
			<div class="social-icons m-b-115">
				<ul class="list-inline">
					<li><img src="<?php echo get_template_directory_uri() . '/img/fb-head.png' ?>" /></li>
					<li><img src="<?php echo get_template_directory_uri() . '/img/twi-head.png' ?>" /></li>
					<li><img src="<?php echo get_template_directory_uri() . '/img/ig-head.png' ?>" /></li>
				</ul>
			</div>
			<div class="copyright">
				<p class="unb-reg">
					©2017 EnterFive LLC. All Rights Reserved
				</p>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
