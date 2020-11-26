<?php

if(!function_exists('ox_carousel_more_series_func')){
    function ox_carousel_more_series_func($atts){
        $exlude_serie = get_queried_object()->term_id;
        $series = get_terms(array(
            'taxonomy' => 'serie_podcast',
            'orderby'  => 'date',
            'order'    => 'DESC',
            'post__not_in'  => $exlude_serie
        ));
        ob_start();
        ?>

        <div class="ox-more-series slick-theme">
            <?php 
                $counter = 0;
                $limit_series = 8;
            ?>
            <?php foreach ($series as $serie): ?>
                <?php 
                    $counter = $counter + 1;

                    $children_terms = get_term_children($serie->term_id, 'serie_podcast');

                    // Calcula número de temporadas
                    if(count($children_terms) == 1){
                        $number_seasons = count($children_terms) . " temporada";
                    } else if(count($children_terms) > 1) {
                        $number_seasons = count($children_terms) . " temporadas";
                    } else{
                        $number_seasons = "No hay temporadas";
                    }

                    // Descarta taxonomias de temporadas
                    if($serie->parent > 0 || $serie->term_id == $exlude_serie ){
                        $counter = $counter - 1;
                        continue;
                    }

                    if($counter > $limit_series){
                        break;
                    }
                    
                ?>
                <?php
                   $image_serie = get_field('imagen_destacada', $serie);
                   if($image_serie){
                     $image_serie = $image_serie['url'];
                   } else {
                     $image_serie = get_stylesheet_directory_uri() . "/assets/img/image-serie-sample.jpg";
                   }
                  
                ?>
                <div class="ox-more-series__item">
                    <a href="<?php echo get_term_link($serie->term_id, 'serie_podcast'); ?>" class="ox-more-series__item__link ox-layer__dark">
                        <h3 class="ox-more-series__item__link__title"><?php echo $serie->name; ?></h3>
                        <img src="<?php echo $image_serie; ?>" alt="" class="ox-more-series__item__link__image">
                        <span class="ox-more-series__item__link__seasons"><?php echo $number_seasons; ?></span>
                    </a>
                </div>
               
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode( 'ox_carousel_more_series', 'ox_carousel_more_series_func' );
}