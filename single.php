<?php

/**
 * The template for displaying all single posts.
 *
 * @package QOD_Starter_Theme
 */

get_header();
$source = get_post_meta(get_the_ID(), '_qod_quote_source', true);
$source_url = get_post_meta(get_the_ID(), '_qod_quote_source_url', true);
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class='front-page-content'>
			<?php if (have_posts()) : ?>
				<?php if (is_home() && !is_front_page()) : ?>
					<header>
						<h1 class="page-title screen-reader-text"><?php the_title(); ?></h1>
					</header>
				<?php endif; ?>

				<?php /* Start the Loop */ ?>
				<?php while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="entry-content front-page-text">
							<?php the_content(); ?>
						</div><!-- .entry-content -->
					</article><!-- #post-## -->
				<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>
			<div class="entry-header front-page-author-meta">
				<div class="front-page-author-name">
					-- <?php echo the_title(); ?>,
				</div>

				<?php
				//Check if the quote source and url exist
				if ($source && $source_url) : ?>
					<div class="front-page-author-link">
						<h2 class="entry-title"><a href="<?php echo $source_url	?>" rel="bookmark"><?php echo $source ?></a></h2>
					</div>
				<?php
				// check if the url exist
				elseif ($source) : ?>
					<div class="front-page-author-link">
						<h2 class="entry-title"><?php echo $source ?></h2>
					</div>
				<?php elseif ($source_url) : ?>
					<div class="front-page-author-link">
						<h2 class="entry-title"><a href="<?php echo $source_url	?>" rel="bookmark"><?php echo the_title(); ?></a></h2>
					</div>
				<?php else : ?>
					<span class="source"></span>
				<?php endif; ?>

			</div><!-- .entry-header -->
		</div>

		<?php while (have_posts()) : the_post(); ?>

		<?php endwhile; // End of the loop.
		?>
		<div class="button-single-post">
			<button type="button" id="new-quote-button">Show Me Another!</button>
		</div>
	</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>