<?php   
    get_header();
?>
<div class="container">

<?php
    if ( function_exists('yoast_breadcrumb') ) {
    yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
    }
 ?>
<div class="about"></div>
<img class="about_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>
<?php endwhile; ?>
<?php endif; ?>

</div>
<?php
    get_footer();
?>