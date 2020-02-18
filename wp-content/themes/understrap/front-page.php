<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );


?>

<?php

$apartments = new WP_Query(
	array(
		'post_type' => 'apartment',
		'order_by' => 'date',
		'orderdir' => 'DESC'
	)
);

?>

<?php if ( is_front_page() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>


	<div class="wrapper" id="full-width-page-wrapper">

		<div class="<?php echo esc_attr( $container ); ?>" id="content">

			<div class="row">

				<div class="col-md-12 content-area" id="primary">

					<main class="site-main" id="main" role="main">

						<?php while ( $apartments->have_posts() ) : $apartments->the_post(); ?>

							<?php get_template_part( 'loop-templates/content', 'apartment'); ?>

							<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
							?>

						<?php endwhile; // end of the loop. ?>

					</main><!-- #main -->

				</div><!-- #primary -->

			</div><!-- .row end -->

		</div><!-- #content -->

	</div><!-- #full-width-page-wrapper -->

<?php get_footer();
