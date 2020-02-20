<?php   
    get_header();
?>
<div class="container">

    <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
     ?>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
    <?php endif; ?>

    <!--OLD CONTACT FORM-->
    <!--<section class="contact_section mt-5 mb-5">
        <div class="row">
            <h3 class="form_title">Leave a Message.</h3>
        </div>

        <div class="row">
            <form class="myForm form-inline mb-2" method="POST" action="/action_page.php">

                <span class="form-box">
                    <label for="firstname">First Name</label>
                    <input type="text" class="firstname" id="fname" name="fname">
                    <p class="error_msg1"></p>
                </span>
                <span class="form-box">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="lastname" id="lname" name="lname">
                    <p class="error_msg2"></p>
                </span>
                <span class="form-box">
                    <label for="email">Email</label>
                    <input type="email" class="mail" id="mail" name="mail">
                    <p class="error_msg3"></p>
                </span>
                <span class="form-box">
                    <label for="subject">Subject</label>
                    <input type="text" class="subject" id="subject" name="subject">
                    <p class="error_msg4"></p>
                </span>

                <label for="message">Message</label>
                <textarea class="msg" id="msg" name="msg" row="5"></textarea>
                <p class="error_msg5"></p>
                
                <button type="submit" class="send mt-5 mb-5" id="send_btn"  name="submit">SEND MESSAGE</button><br>
            </form>
        </div>
    </section>-->
</div>

<?php
    get_footer();
?>