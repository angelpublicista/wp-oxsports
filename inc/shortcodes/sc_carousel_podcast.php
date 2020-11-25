<?php

if (!function_exists('ox_carousel_podcast_func')) {
    function ox_carousel_podcast_func($atts){
        
        $atts = shortcode_atts(
            array(
                "post_type" => "podcast",
                "post_per_page" => 6,
                "category__in"  => "",
                "show_in_carousel" => 4
            ), 
            $atts,
            "ox_carousel_podcast" 
        );

        $cats = $atts['category__in'];
        $arr_cats = false;
        $exclude_post = false;

        // Releated podcast
        if($cats){
            $arr_cats = explode(",", $cats);
            $exclude_post = array(get_the_ID());
        } 

        // args to query
        $args = array(
            "post_type" => $atts['post_type'],
            "post_per_page" => $atts['post_per_page'],
            "category__in"  => $arr_cats,
            'post__not_in'  => $exclude_post
        );

        $data_slick = [
            'slidesToShow' => $atts['show_in_carousel']
        ];

        $json_data_slick = json_encode($data_slick);
        $carousel_query = new WP_Query($args);

        if($carousel_query->have_posts()){
            ob_start();
            ?>
            <div class="slick-theme slick-podcast" data-slick=<?php echo $json_data_slick; ?>>
                <?php while($carousel_query->have_posts()): $carousel_query->the_post();?>
                    <?php 
                        $serie_info = ox_info_series();
                    ?>
                    <div class="item-slick">
                        <figure class="ox-card">
                            <div class="ox-card__body">
                                <span class="ox-card__body__date"><i class="far fa-clock"></i> <?php echo get_the_date('F j, Y'); ?></span>
                                <?php if(get_the_post_thumbnail()): 
                                   the_post_thumbnail( "medium", array('class'=>'ox-card__body__image') );
                                ?> 
                                <?php else: ?>
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sample-podcast.jpg" alt="" class="ox-card__body__image">
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="ox-card__body__button-play">
                                    <i class="fas fa-play"></i>
                                </a>
                            </div>
                            
                            <figcaption class="ox-card__caption">
                                <a href="<?php echo $serie_info['link_serie']; ?>" class="ox-card__caption__serie__link"><span class="ox-card__caption__serie__name"><i class="fas fa-tv"></i> <?php echo $serie_info['name_serie']; ?> - <strong><?php echo $serie_info['name_season']; ?></strong></span></a>
                                <a href="<?php the_permalink(); ?>" class="ox-card__caption__podcast-link"><h3 class="ox-card__caption__podcast-title"><?php the_title(); ?></h3></a>
                            </figcaption>
                        </figure>
                    </div>

                <?php endwhile; ?>
            </div>
            <?php
            wp_reset_query();
            return ob_get_clean();
        }
    }

    add_shortcode( "ox_carousel_podcast", "ox_carousel_podcast_func" );
}