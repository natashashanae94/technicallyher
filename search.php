<?php   
    get_header();
?>

<div class="container">
    <div class="row">
        <?php  
        
        if( have_posts() ):
            while( have_posts() ): the_post();
        ?>

            <?php  get_template_part('content', 'search') ?>
            <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                <div class="post_caption">
                    <div class="p_title"><h4><?php the_title(); ?></h4></div>
                    <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                </div>
                <?php  the_excerpt();  ?>
            </a>
        <?php  endwhile;
        
        endif;

        ?>
    </div>
</div>

<?php
    get_footer();
?>