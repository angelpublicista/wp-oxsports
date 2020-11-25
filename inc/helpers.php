<?php

if(!function_exists('ox_info_series')){
    function ox_info_series(){
        $series = get_the_terms( $post->ID, 'serie_podcast' );
        $serie_name = $series[0]->name;
        $serie_link = get_term_link( $serie_name, 'serie_podcast');

        $season = $series[1];
        if($season){
            $season_name = $season->name;
        } else {
            $season_name = "Sin temporadas";
        }

        $info_serie = [
            'name_serie' => $serie_name,
            'link_serie' => $serie_link,
            'name_season' => $season_name
        ];

        return $info_serie;
    }
}

//Paginación
function pagination_custom(){
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}