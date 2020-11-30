<?php

if(!function_exists('ox_grid_podcast_func')){
    function ox_grid_podcast_func($atts){
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $atts = shortcode_atts( array(
            'post_type' => 'podcast',
            'posts_per_page' => 4,
            'offset'    => 7,
            'paged' => $paged
        ),
        $atts, 
        'ox_grid_podcast'
        );

        $podcast_query = new WP_Query($atts);

        if($podcast_query->have_posts()){
            ob_start();
            ?>
            <div class="row">
                <?php while($podcast_query->have_posts()): $podcast_query->the_post(); ?>
                    <?php 
                        $serie_info = ox_info_series();
                        $shortcode_podcast = get_field('shortcode_spreaker');
                        if($shortcode_podcast){
                            $shortcode_podcast = $shortcode_podcast;
                        } else {
                            $shortcode_podcast = "No hay un audio de podcast";
                        }
                    ?>
                    <div class="col-xs-12">
                        <div class="ox-grid-podcast__card">
                            <h3 class="ox-grid-podcast__card__title"><?php the_title(); ?></h3>
                            <a href="<?php echo $serie_info['link_serie']; ?>" class="ox-grid-podcast__card__serie__link"><span class="ox-grid-podcast__card__serie__name"><i class="fas fa-tv"></i> <?php echo $serie_info['name_serie']; ?> - <strong><?php echo $serie_info['name_season']; ?></strong></span></a>
                            <?php echo do_shortcode( "$shortcode_podcast" ); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="ox-pagination">
                <nav>
                    <ul>
                        <li><?php previous_posts_link( 'Anterior', $podcast_query->max_num_pages) ?></li> 
                        <li><?php next_posts_link( 'Siguiente', $podcast_query->max_num_pages) ?></li>
                    </ul>
                </nav>
            </div>
            <?php

            wp_reset_query();
        } else {
            $image_podcast = get_stylesheet_directory_uri() . "/assets/img/podcasts.png";
            $tag_image = "<div style='text-align:center; margin: 2em 0;'><img src='".$image_podcast."' width='30%' style='margin:1em auto;'><h5>Pronto, más Podcast</h5></div>";

            echo $tag_image;
        }
        return ob_get_clean();
    }

    add_shortcode( 'ox_grid_podcast', 'ox_grid_podcast_func' );
}