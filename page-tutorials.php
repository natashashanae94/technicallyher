<?php   
    get_header();
?>

<div class="container">

    <div class="row">
        <?php 
                $args = array(
                'post_type'=> 'post',
                'post_status'=> 'publish',
                'category_name'=> 'Tutorials',
            );
    
            $blogposts =  new WP_Query($args);

            if($blogposts->have_posts()) :
                while ($blogposts->have_posts()) : $blogposts->the_post();
        ?>
    
                <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                    <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                    <div class="post_caption">
                    <div class="p_title"><h4><?php the_title(); ?></h4></div>
                        <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                    </div>
                </a>

        <?php endwhile; 
            
            else:
                echo '<p>No content found</p>';
            endif;
        ?>
    </div>
</div>

<?php
    get_footer();
?>

