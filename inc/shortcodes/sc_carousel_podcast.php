<?php

if (!function_exists('ox_carousel_podcast_func')) {
    function ox_carousel_podcast_func($atts){
        $atts = shortcode_atts(
            array(
                "post_type" => "podcast",
                "post_per_page" => 12
            ), 
            $atts,
            "ox_carousel_podcast" 
        );

        $carousel_query = new WP_Query($atts);

        if($carousel_query->have_posts()){
            ob_start();
            ?>
            <div class="slick-theme slick-podcast">
                <?php while($carousel_query->have_posts()): $carousel_query->the_post();?>
                    <?php 
                        $series = get_the_terms( $post->ID, 'serie_podcast' );
                        $serie_name = $series[0]->name;
                        $serie_link = get_term_link( $serie_name, 'serie_podcast');

                        $seasons = get_the_terms( $post->ID, 'temporada_podcast' );
                        $season_name = $seasons[0]->name;
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
                                <a href="<?php echo $serie_link; ?>" class="ox-card__caption__serie__link"><span class="ox-card__caption__serie__name"><i class="fas fa-tv"></i> <?php echo $serie_name; ?> - <strong><?php echo $season_name; ?></strong></span></a>
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