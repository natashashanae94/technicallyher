<?php get_header(); ?>
    <div class="container">
        <div class="row line mb-2">
            <?php 
                while (have_posts()) {
                    the_post();
            ?>
            <?php
                if ( function_exists('yoast_breadcrumb') ) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
                }
            ?>

                <div class="col-md-12">
                    <div class="post_title"><h2><?php the_title(); ?></h2></div>
                    <div class ="author"><p>Written By <?php the_author(); ?> <h6 class="post_date"><?php echo get_the_date(); ?></h6></p></div>
                </div>
        </div><!--end row-->

        <div class="row">

            <div class="center_img mx-auto"><img class="post_thumbnail" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" width="863" height="608"/></div>

        </div>
        <div class="row">
                <div class="post_content"><?php the_content();
            }
            ?></div>
        </div>

        <div class="row line">
           <div class="row line separator mt-5 mb-5"> C O M M E N T S </div>
                <div id="comments-section">

                        <?php 

                        /*If comments are open or we have atleast one comment, load up the comment template.
                            if( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;*/
                        comment_form();       
                        $comments_number = get_comments_number();
                        if($comments_number != 0) {
                        ?>

                            <div class="comments">
                                <h3>Comments</h3>
                                <ul class="all-comments">
                                    <?php
                                    $comments = get_comments(array(
                                        'post_id' => $post_ID,
                                        'status' => 'approve'
                                    ));
                                    wp_list_comments(array(
                                        'per_page' => 15
                                    ), $comments);
                                    ?>
                                </ul>
                            </div>
                    <?php  } 
		     the_post_navigation();
		    ?>
                </div>
        </div>

        <div class="row line separator mt-5 mb-5"> F O L L O W </div>

        <div class="row mb-5">
            <div class="signup_section">  
                <form class="signup_content">
                    <h2 id="signup_title" class="mb-3">Stay in the know.</h2>
                    <p id="email_label">- E M A I L -</P>
                    <input type="mail" id="mail" name="mail" placeholder="you@example.com"/>
                    <h6 class="disclaimer" class="mb-2">* We respect your privacy</h6>
                    <button type="submit" id="submit_btn" name="submit_btn"> S U B S C R I B E </button>
                </form>
            </div>
        </div>

        <div class="row line separator mt-5 mb-5"> M O R E </div>

        <div class="row"> 
            <?php 
                $args = array(
                    'post_type'=> 'post',
                    'post_status'=> 'publish',
                    'orderby'=> 'rand',
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

    </div>
<?php get_footer(); ?>