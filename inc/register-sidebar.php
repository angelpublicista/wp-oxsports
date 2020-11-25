<?php

function podcast_sidebar_func(){
    register_sidebar(array(
     'name' => 'Sidebar Podcast',
     'id' => 'sidebar-podcast',
     'description' => 'Widgets para las páginas de podcast',
     'class' => 'sidebar',
     'before_widget' => '<aside id="%1$s" class="widget %2$s">',
     'after_widget' => '</aside>',
     'before_title' => '<h2 class="widget-title">',
     'after_title' => '</h2>',
    ));
  }
add_action( 'widgets_init', 'podcast_sidebar_func');