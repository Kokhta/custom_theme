<?php
/**
 * Main template file
 */
get_header();
?>

<main id="content" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php
get_footer();
