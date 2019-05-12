<footer id="contact" class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="index.html"><img src="<?php echo bloginfo('template_directory');?>/img/logo-white.png" alt="Logo"></a>
                <?php $footer = get_field('footer');?>
                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p><?php echo $footer['address'];?></p>
                </div>
                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:<?php echo $footer['phone'];?>"><?php echo $footer['phone'];?></a>
                </div>
                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Email:</b></p>
                        <a href="mailto:<?php echo $footer['email'];?>"> <?php echo $footer['email'];?>m</a>
                </div>
                <?php $socials = get_field('social');?>
                <?php if($socials):?>
                        <ul class="icon mt-30">
                        <?php foreach($socials as $net => $social):?>
                            <?php if($social!=''):?>
                                <li><a href="<?php echo $social; ?>"><i class="ion-social-<?php echo $net; ?>"></i></a></li>
                            <?php endif;?>
                        <?php endforeach;?>       
                        </ul>
                <?php endif;?>
                <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by 
                <a href="https://colorlib.com" target="_blank">Colorlib</a> | Adapted to Wordpress by <a href="https://code-fish.eu" target="_blank">code-fish.eu</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

        </div><!-- container -->
</footer>
<!--hook footer-->
<?php wp_footer(); ?>
</body>
</html>