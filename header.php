<!DOCTYPE HTML>
<html lang="en">
<head>
        <title><?php echo bloginfo( 'name' );?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="<?php echo bloginfo( 'charset');?>">

        <!-- HOOK-->
        <?php wp_head(); ?>

</head>
<body>

<header>
        <div class="container">
                <a class="logo" href="#"><img src="<?php echo bloginfo('template_directory');?>/img/logo-white.png" alt="Logo"></a>

                <div class="right-area">
                        <?php $footer = get_field('footer');?>
                        <h6><a class="plr-20 color-white btn-fill-primary" href="#">ORDER: <?php echo $footer['phone'];?></a></h6>
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>
                <?php wp_nav_menu( array(
                        'theme_location' => 'top_menu',
                        'menu_id' => 'main-menu',
                        'container' => 'ul',
                        'menu_class' =>  'main-menu font-mountainsre',
                ) );
?>
              <div class="clearfix"></div>
        </div><!-- container -->
</header>
