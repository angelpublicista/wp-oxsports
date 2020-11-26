<?php

if(!function_exists('ox_grid_seasons_func')){
    function ox_grid_seasons_func($atts){
        $atts = shortcode_atts( array(
            "post_type" => "podcast",
            "id_query" => false
        ), 
        $atts,
        'ox_grid_seasons'
        );

        $args = array(
            "post_type" => $atts['post_type'],
            "orderby"   => 'date',
            "order"     => 'ASC',
            "tax_query" => array(
                array(
                    'taxonomy' => 'serie_podcast',
                    'field'    => 'term_id',
                    'terms'    => $atts['id_query']
                ),
            ),
        );

        $season_query = new WP_Query($args);

        if($season_query->have_posts()){
            ob_start();
            ?>
            <?php while($season_query->have_posts()): $season_query->the_post(); ?>
                <div class="ox-grid-podcast__card">
                    <h3 class="ox-grid-podcast__card__title"><?php the_title(); ?></h3>
                    <?php 
                    $shortcode_spreaker = get_field('shortcode_spreaker');
                    if($shortcode_spreaker){
                        echo do_shortcode( "$shortcode_spreaker" );
                    } else {
                        echo "No hay audio";
                    }
                    
                    ?>
                </div>
            <?php endwhile; ?>
            <?php

            
        } else {
          echo "No hay contenido en esta temporada";
        }
        wp_reset_query();
        return ob_get_clean();
    }

    add_shortcode( 'ox_grid_seasons', 'ox_grid_seasons_func' );
}