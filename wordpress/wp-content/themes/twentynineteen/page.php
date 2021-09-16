<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<img class="image" src="<?php echo get_field('bandeau')['image_g']['url']; ?>">

			<h1 class="title"><?php the_field('bandeau_titre_g') ?></h1>

				<h3 class="subtitle"><?php the_field('bandeau_survol_g') ?></h3>

			<?php
			$group = get_field('bandeau_bouton');

			if($group['titre']) :

			$url = $group['url'];
			$target = 'target="_blank" rel="noopener"';

			if($group['choice'] == 'pagelink') {
				$url = $group['page_link'];
				$target = '';
			} ?>

			<a class="lien" href="<?php echo $url ?>" <?php echo $target; ?> >
			<div class="icon_container">
				<img class="icon" href="<?php echo get_field('bandeau')['image_g']['url']; ?>">
			</div>
			<p><?php echo $group['titre']; ?></p>
		    </a>
			<?php endif; ?>
			

			<img class="imagedroite" src="<?php echo get_field('bandeau')['image_d']['url']; ?>">

			<h1 class="title"><?php the_field('bandeau_titre_d') ?></h1>

				<h3 class="subtitle"><?php the_field('bandeau_survol_d') ?></h3>

			<?php
			$group = get_field('bandeau_btn_d');

			if($group['titre']) :

			$url = $group['url'];
			$target = 'target="_blank" rel="noopener"';

			if($group['choice'] == 'pagelink') {
				$url = $group['page_link'];
				$target = '';
			} ?>

			<a class="lien" href="<?php echo $url ?>" <?php echo $target; ?> >
			<div class="icon_container">
				<img class="icon" href="<?php echo get_field('bandeau')['image_d']['url']; ?>">
			</div>
			<p><?php echo $group['titre']; ?></p>
		    </a>
			<?php endif; ?>	

            <?php

			// Start the Loop.
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}

			endwhile; // End the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
