<?php

if ( ! function_exists('wpn_podcast_func') ) {

    // Register Custom Post Type
    function wpn_podcast_func() {
    
        $labels = array(
            'name'                  => _x( 'Podcasts', 'Post Type General Name', 'master-template-woo' ),
            'singular_name'         => _x( 'Podcast', 'Post Type Singular Name', 'master-template-woo' ),
            'menu_name'             => __( 'Podcast', 'master-template-woo' ),
            'name_admin_bar'        => __( 'Podcast', 'master-template-woo' ),
            'archives'              => __( 'Archivos Podcast', 'master-template-woo' ),
            'attributes'            => __( 'Atributos Podcast', 'master-template-woo' ),
            'parent_item_colon'     => __( 'Parent Item:', 'master-template-woo' ),
            'all_items'             => __( 'Todos los Podcast', 'master-template-woo' ),
            'add_new_item'          => __( 'Agregar nuevo Podcast', 'master-template-woo' ),
            'add_new'               => __( 'Agregar nuevo', 'master-template-woo' ),
            'new_item'              => __( 'Nuevo Podcast', 'master-template-woo' ),
            'edit_item'             => __( 'Editar Podcast', 'master-template-woo' ),
            'update_item'           => __( 'Actializar Podcast', 'master-template-woo' ),
            'view_item'             => __( 'Ver Podcast', 'master-template-woo' ),
            'view_items'            => __( 'Ver Podcasts', 'master-template-woo' ),
            'search_items'          => __( 'Buscar Podcast', 'master-template-woo' ),
            'not_found'             => __( 'Not found', 'master-template-woo' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 'master-template-woo' ),
            'featured_image'        => __( 'Imagen destacada', 'master-template-woo' ),
            'set_featured_image'    => __( 'Set featured image', 'master-template-woo' ),
            'remove_featured_image' => __( 'Remove featured image', 'master-template-woo' ),
            'use_featured_image'    => __( 'Use as featured image', 'master-template-woo' ),
            'insert_into_item'      => __( 'Insert into item', 'master-template-woo' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 'master-template-woo' ),
            'items_list'            => __( 'Items list', 'master-template-woo' ),
            'items_list_navigation' => __( 'Items list navigation', 'master-template-woo' ),
            'filter_items_list'     => __( 'Filter items list', 'master-template-woo' ),
        );
        $rewrite = array(
            'slug'                  => 'podcast',
            'with_front'            => true,
            'pages'                 => true,
            'feeds'                 => true,
        );
        $args = array(
            'label'                 => __( 'podcast', 'master-template-woo' ),
            'description'           => __( 'Post Type Description', 'master-template-woo' ),
            'labels'                => $labels,
            'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'author' ),
            'taxonomies'            => array( 'post_tag', 'category' ),
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-microphone',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'rewrite'               => $rewrite,
            'capability_type'       => 'page',
        );
        register_post_type( 'podcast', $args );
    
    }
    add_action( 'init', 'wpn_podcast_func', 0 );
    
}

add_action( 'pre_get_posts', 'add_my_post_types_to_query' );