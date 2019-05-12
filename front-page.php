<?php get_header(); ?>

<?php 
// Get Data from Advanced Custom Fields Hero
$hero = get_field ('hero');
?>

<section class="bg-1 h-900x main-slider pos-relative">
        <div class="triangle-up pos-bottom"></div>
        <div class="container h-100">
                <div class="dplay-tbl">
                        <div class="dplay-tbl-cell center-text color-white">
                                <h5><b><?php echo $hero['small_title'];?></b></h5>
                                <h1 class="mt-30 mb-15"><?php echo $hero['title'];?></h1>
                                <h5><a href="<?php echo $hero['link'];?>" class="btn-primaryc plr-25"><b><?php echo $hero['link_text'];?></b></a></h5>
                        </div><!-- dplay-tbl-cell -->
                </div><!-- dplay-tbl -->
        </div><!-- container -->
</section>

<?php 
// Get Data from Advanced Custom Fields Main Information
$hero = get_field ('main_information');
?>
<section id="ourstory" class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="<?php echo bloginfo('template_directory');?>/img/heading_logo.png" alt="">
                        <h2><?php echo $hero['title'];?></h2>
                </div>

                <div class="row">
                        <div class="col-md-6">
                            <?php echo $hero['left_side'];?>
                        </div><!-- col-md-6 -->
                        <div class="col-md-6">
                           <?php echo $hero['right_side'];?>                             
                        </div><!-- col-md-6 -->
                </div><!-- row -->
        </div><!-- container -->
</section>

<section id="bestsellers" class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
            <div class="heading">
                    <img class="heading-img" src="<?php echo bloginfo('template_directory');?>/img/heading_logo.png" alt="">
                    <h2>Best Sellers</h2>
            </div>

    <!-- Query post types menu with the dish option best-seller-->
            <?php $loop = new WP_Query( array('post_type' => 'menu', 
                                            'tax_query' => array(
                                                array (
                                                    'taxonomy' => 'dish_options',
                                                    'field' => 'slug',
                                                    'terms' => 'best-seller'
                                                )),
                                            'posts_per_page' => 4 ));?>
            <div class="row">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php $bestSeller = get_field ('information');?>
                        <div class="col-lg-3 col-md-4  col-sm-6 ">
                                <div class="center-text mb-30">
                                        <div class="ïmg-200x mlr-auto pos-relative">
                                                <?php the_post_thumbnail('product_image_small');
                                                $terms=get_the_terms( get_the_ID(), 'dish_options' ); 
                                                if($terms):
                                                        foreach ($terms  as $term ):
                                                            switch($term->slug) :
                                                              case "offer" :?> 
                                                                <h6 class="ribbon-cont"><div class="ribbon primary"></div><b>OFFER</b></h6>
                                                                <?php break;
                                                              case "plus-size" :?>
                                                                <h6 class="ribbon-cont color-black"><div class="ribbon white"></div><b>PLUS SIZE</b></h6>
                                                                <?php break;
                                                              case "speciality" :?>                                                                
                                                                <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>SPECIALITY</b></h6>
                                                                <?php break;?>
                                                            <?php endswitch;?>
                                                        <?php endforeach;?>
                                                <?php endif;?>
                                        </div>
                                        <h5 class="mt-20"><?php the_title(); ?></h5>
                                        <h4 class="mt-5"><b><?php echo $bestSeller['price'];?> €</b></h4>
                                        <!--h6 class="mt-20"><a href="#" class="btn-brdr-primary plr-25"><b>Order Now</b></a></h6-->
                                </div><!--text-center-->
                        </div><!-- col-md-3 -->

                 <?php endwhile; wp_reset_query(); ?>
            </div><!-- row -->
            <!--h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6-->
        </div><!-- container -->
</section>

<section id="menu">
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="<?php echo bloginfo('template_directory');?>/img/heading_logo.png" alt="">
                        <h2>Our Menu</h2>
                </div>
        <!--List the taxonomy dish_types -->
            <div class="row">
                <div class="col-sm-12">
                        <?php $terms=get_terms( array('taxonomy' => 'dish_types','hide_empty' => false)); 
                        if ($terms): ?>
                        <ul class="selecton brdr-b-primary mb-70">
                                <li><a class="active" href="#" data-select="*"><b>All</b></a></li>    
                                <?php foreach ($terms  as $term ):?>
                                        <li><a href="#" data-select="<?php echo $term->slug; ?>"><b><?php echo $term->name; ?></b></a></li>
                                <?php endforeach; ?>
                        </ul>
                        <?php endif;?>
                </div><!--col-sm-12-->
            </div><!--row-->

    <!-- Query all menu post tr-->
    <?php $loop = new WP_Query( array('post_type' => 'menu', 
                                      'order' => 'ASC',
                                      'orderby' => 'rand',
                                      'posts_per_page' => -1 ));?>
            <div class="row">
                <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                    <?php 
                     $dish = get_field ('information');
                     $filter ='';
                     $terms=get_the_terms( get_the_ID(), 'dish_types' ); 
                     if($terms) {
                        foreach ($terms  as $term ) {
                                $filter.= $term->slug. ''; 
                        }
                     }
                    ?>  
                        <div class="col-md-6 food-menu <?php echo $filter;?>">
                                <div class="sided-90x mb-30 ">
                                        <div class="s-left"><?php the_post_thumbnail('product_image_mini'); ?></div><!--s-left-->
                                        <div class="s-right">
                                                <h5 class="mb-10"><b><?php the_title();?></b><b class="color-primary float-right"><?php echo $dish['price'];?></b></h5>
                                                <p class="pr-70"><?php the_excerpt();?></p>
                                        </div><!--s-right-->
                                </div><!-- sided-90x -->
                        </div><!-- food-menu -->
                 <?php endwhile; wp_reset_query(); ?>
            </div><!-- row -->
            <!--h6 class="center-text mt-40 mt-sm-20 mb-30"><a href="#" class="btn-primaryc plr-25"><b>SEE TODAYS MENU</b></a></h6-->
        </div><!-- container -->
</section>

<?php get_footer(); ?>