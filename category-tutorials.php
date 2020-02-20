<?php 
    get_header();
?>
<div class="container">

    <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
     ?>

     <div class="row mt-5">

     <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'category_name'=> 'tutorials',
                    'orderby'=> 'rand',
                    'posts_per_page' => 1,
                );

                $lifestyle =  new WP_Query($args);

                if(have_posts()) :
                    while (have_posts()) : the_post();
            ?>

                <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                    <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                    <div class="post_caption">
                        <div class="p_title"><h4><?php the_title(); ?></h4></div>
                        <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                    </div>
                </a>

            <?php endwhile; ?>                

            <?php  wp_reset_query();

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
    </div>
    
    <div class="row"><div class="page_links mb-5"><?php echo my_pagination(); ?></div></div>
</div>
<?php
    get_footer();
?>