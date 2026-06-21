<?php
/**
 * The main template file
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

<main data-taxi="">
	<div data-taxi-view="home">
		<?php if ( have_posts() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				the_content();
			endwhile;
			?>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
