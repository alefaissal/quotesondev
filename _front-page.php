<?php

/**
 * The main template file.
 *
 * @package QOD_Starter_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main front-page-container" role="main">


		<!-- <div class='front-page-logo'>
			<a href="<?php //echo get_home_url(); ?>">
				<img src="<?php //echo get_template_directory_uri(); ?>/images/qod-logo.svg" alt="quotes on dev logo">
			</a>
		</div> -->



		<div class='front-page-content'>
			<?php if (have_posts()) : ?>
			<?php if (is_home() && !is_front_page()) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
			<?php endif; ?>



			<?php /* Start the Loop */ ?>
			<?php while (have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


				<div class="entry-content front-page-text">
					<div class="test-icon">
				<i class="fa fa-quote-left"></i>
				
				</div>
					<?php the_excerpt(); ?>
				</div><!-- .entry-content -->
				
				<div class="test-icon">
				<i class="fa fa-quote-right"></i>
				
				</div>
				
				<header class="entry-header front-page-author-meta">
					<div class="front-page-author-name">
						-<?php echo the_title(); ?>,
					</div>
					<div class="front-page-author-link">
						<?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">@', esc_url(get_permalink())), '</a></h2>'); ?>
					</div>
				</header><!-- .entry-header -->


			</article><!-- #post-## -->
			<?php endwhile; ?>


			<?php //the_posts_navigation(); 
				?>

			<?php else : ?>

			<?php get_template_part('template-parts/content', 'none'); ?>

			<?php endif; ?>
		</div>

		
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>