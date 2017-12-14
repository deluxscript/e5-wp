<?php

  if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
    add_image_size( 'screen-shot', 720, 540 ); // Full size screen
  }

  add_action('init', 'Portfolios_register');

  function Portfolios_register() {
      $args = array(
          'label' => __('Portfolios'),
          'singular_label' => __('Portfolio'),
          'public' => true,
          'show_ui' => true,
          'capability_type' => 'post',
          'hierarchical' => false,
          'rewrite' => true,
          'supports' => array('title', 'editor', 'thumbnail')
         );

      register_post_type( 'portfolio' , $args );
  }

  register_taxonomy("portfolio-type", array("portfolio"), array("hierarchical" => true, "label" => "Portfolio Categories", "singular_label" => "Portfolio Category", "rewrite" => true));


  add_filter("manage_edit-portfolio_columns", "portfolio_edit_columns");

  function portfolio_edit_columns($columns){
          $columns = array(
              "cb" => "<input type=\"checkbox\" />",
              "title" => "Portfolio",
              "description" => "Description",
              "category" => "Category of Portfolio",
          );

          return $columns;
  }

  add_action("manage_posts_custom_column",  "portfolio_custom_columns");

  function portfolio_custom_columns($column){
          global $post;
          switch ($column)
          {
              case "description":
                  the_excerpt();
                  break;
              case "category":
                  echo get_the_term_list($post->ID, 'portfolio-type', '', ', ','');
                  break;
          }
  }
?>
