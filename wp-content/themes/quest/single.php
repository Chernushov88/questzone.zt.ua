<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="qroom-content ">
<div class="qroom-content_inner blog">
    <a href="/blog" class="back">Назад к новостям</a>
    <h1><?php the_title(); ?></h1>
    <div class="blog-text">
    	<?php 
while( have_posts() ) : the_post();

	the_content(); // выводим контент
endwhile;

    	 ?>
    </div>
</div>

<?php get_footer(); ?>
