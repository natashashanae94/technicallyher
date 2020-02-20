<?php 
    get_header();
?>

    <div class="container">

        <div class="row">
            <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'category_name'=> 'Featured',
                    'posts_per_page' => 1
                );
        
                $blogposts =  new WP_Query($args);

                if($blogposts->have_posts()) :
                    while ($blogposts->have_posts()) : $blogposts->the_post();
            ?>
            
            <a class="featured_post mt-5" href="<?php  the_permalink(); ?>">
                <div class="featured_title"><h6>FEATURED POST: <?php echo get_the_date();?></h6></div>
                <img id="featured_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" width="1063" height="608"/>
            </a>

            <?php endwhile; 

                wp_reset_query();

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
        </div>

        <div class="row line separator mt-5 mb-5"> L A T E S T </div>

        <div class="row"> 
            <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'category_name'=> 'Latest',
                    'posts_per_page' => 3
                );

                $latest =  new WP_Query($args);

                if($latest->have_posts()) :
                    while ($latest->have_posts()) : $latest->the_post();
            ?>

                <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                    <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                    <div class="post_caption">
                        <div class="p_title"><h4><?php the_title(); ?></h4></div>
                        <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                    </div>
                </a>

            <?php
                endwhile; 

                wp_reset_query();

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
        </div>

        <div class="row">
            <a class="post_link" href="<?php echo site_url('/tutorials'); ?>">See more posts</a>
        </div>

        <div class="row line separator mt-5 mb-5"> T U T O R I A L S </div>

        <div class="row">
            <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'category_name'=> 'Tutorials',
                    'orderby'=> 'rand',
                    'posts_per_page' => 3,
                );

                $tutorials =  new WP_Query($args);

                if($tutorials->have_posts()) :
                    while ($tutorials->have_posts()) : $tutorials->the_post();
            ?>

                <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                    <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                    <div class="post_caption">
                    <div class="p_title"><h4><?php the_title(); ?></h4></div>
                        <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                    </div>
                </a>

            <?php
                endwhile; 

                wp_reset_query();

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
        </div>

        <div class="row">
            <a class="post_link" href="<?php echo site_url('/tutorials'); ?>">See more posts</a>
        </div>

        <div class="row line separator mt-5 mb-5"> L I F E S T Y L E </div>

        <div class="row">
            <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'category_name'=> 'Lifestyle',
                    'orderby'=> 'rand',
                    'posts_per_page' => 3,
                );

                $lifestyle =  new WP_Query($args);

                if($lifestyle->have_posts()) :
                    while ($lifestyle->have_posts()) : $lifestyle->the_post();
            ?>

                <a class="posts mb-5" href="<?php  the_permalink(); ?>">
                    <img class="post_img" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>"/>
                    <div class="post_caption">
                        <div class="p_title"><h4><?php the_title(); ?></h4></div>
                        <h6 class="post_date"><?php echo get_the_date(); ?></h6>
                    </div>
                </a>

            <?php
                endwhile; 

                wp_reset_query();

                else:
                    echo '<p>No content found</p>';
                endif;
            ?>
        </div>

        <div class="row">
            <a class="post_link mb-5" href="<?php echo site_url('/lifestyle'); ?>">See more posts</a>
        </div>

        <div class="row line separator mt-5 mb-5"> F O L L O W </div>

        <div class="row mb-5">
            <div class="signup_section">  
                <form class="signup_content">
                    <h2 id="signup_title" class="mb-3">Stay in the know.</h2>
                    <p id="email_label">- E M A I L -</P>
                    <input type="mail" id="mail" name="email" placeholder="you@example.com"/>
                    <h6 class="disclaimer" class="mb-2">* We respect your privacy</h6>
                    <button type="submit" id="submit_btn" name="submit_btn"> S U B S C R I B E </button>
                </form>
            </div>
        </div>

        <div class="row line separator mt-5 mb-5"> I N S P I R A T I O N </div>

        <div class="row mb-5">
            <div id="inspire_section">
                <!--<img id="inspire_quote" src="http://www.technicallyher.blog/wp-content/themes/technicallyher/img/inspirational_quote.jpg" alt="inspiritional quote" width="930" height="310"/>-->
                <?php if ( has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div><!--end contaier-->
        
<?php
    get_footer();
?>