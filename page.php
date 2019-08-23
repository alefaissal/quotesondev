<?php

/**
 * The template for displaying all pages.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class='front-page-content'>
			<article>
				<h1 class="about-page-title">About</h1>
				<div class="entry-content front-page-text about-page-text">
					<p>
						Quotes on Dev is a project site for the RED Academy Web Developer Professional program. It’s used to experiment with Ajax, WP API, jQuery, and other cool things. 🙂
					</p>
					<p>
						This site is heavily inspired by Chris Coyier’s
						<a href="https://quotesondesign.com"> Quotes on Design.</a>
					</p>
				</div><!-- .entry-content -->
			</article><!-- #post-## -->
		</div>

	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>