<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">   
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <!-- TOP NAVBAR -->
  
    <header>
        <div class="container">
            <div class="navigation">
                <nav class="topnav" id="myTopNav">
                    <!--centered link-->
                    <div class="topnav_centered">
                        <a class="nav_home_logo" href="<?php echo site_url('/home'); ?>">TECH <span id="dot"> &middot;</span> NICALLYHER</a>
                    </div>

                    <div class="icon">
                        <span id="bar1"></span>
                        <span id ="bar2"></span>
                        <span id ="bar3"></span>
                    </div>

                    <!--left aligned links (default)-->
                    <a class="menu_item" href="<?php echo site_url('/about'); ?>">ABOUT</a>
                    <a class="menu_item" href="<?php echo site_url('/category/tutorials'); ?>">TUTORIALS</a>

                    <!--right-aligned links-->
                    <div class="topnav_right">
                        <a class="menu_item" href="<?php echo site_url('/category/lifestyle'); ?>">LIFESTYLE</a>
                        <a class="menu_item" href="<?php echo site_url('/contact'); ?>">CONTACT</a>
                        <a class="menu_item search_glass" ><img class="search" src="http://www.technicallyher.blog/wp-content/themes/technicallyher/img/search_icon.png" alt="search icon"></a>
                    </div>
                </nav>
            </div>
        </div>
        <hr>
    </header>
    <div class="bg-modal">
        <div class="modal-content">
            <div class="close">+</div>
            <?php  get_search_form(); ?>
        </div>
    </div>