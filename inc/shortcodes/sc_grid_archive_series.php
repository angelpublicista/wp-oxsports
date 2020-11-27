<?php

if(!function_exists('ox_grid_arch_series_func')){
    function ox_grid_arch_series_func($atts){
        $series = get_terms(array(
            'taxonomy' => 'serie_podcast',
            'orderby'  => 'date',
            'order'    => 'DESC'
        ));
        ob_start();
        ?>

        <div class="ox-more-series ox-all-series row">
            <?php 
                $counter = 0;
                $limit_series = 12;
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
                    if($serie->parent > 0 ){
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
                <div class="col-xs-12 col-md-4">
                    <div class="ox-more-series__item">
                        <a href="<?php echo get_term_link($serie->term_id, 'serie_podcast'); ?>" class="ox-more-series__item__link ox-layer__dark">
                            <h3 class="ox-more-series__item__link__title"><?php echo $serie->name; ?></h3>
                            <img src="<?php echo $image_serie; ?>" alt="" class="ox-more-series__item__link__image">
                            <span class="ox-more-series__item__link__seasons"><?php echo $number_seasons; ?></span>
                        </a>
                    </div>
                </div>
               
            <?php endforeach; ?>
        </div>
        <?php
        return ob_get_clean();
    }

    add_shortcode( 'ox_grid_arch_series', 'ox_grid_arch_series_func' );
}