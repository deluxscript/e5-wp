<?php

  if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
    add_image_size( 'screen-shot', 720, 540 ); // Full size screen
  }

  add_action('init', 'cases_register');

  function cases_register() {
      $args = array(
          'label' => __('Cases'),
          'singular_label' => __('Case'),
          'public' => true,
          'show_ui' => true,
          'capability_type' => 'post',
          'hierarchical' => false,
          'rewrite' => true,
          'supports' => array('title', 'editor', 'thumbnail')
         );

      register_post_type( 'cases_views' , $args );
  }

  register_taxonomy("cases-type", array("cases_views"), array("hierarchical" => true, "label" => "Cases Category", "singular_label" => "Case Category", "rewrite" => true));

  add_action("admin_init", "case_meta_box");


  function case_meta_box(){
      add_meta_box("caseinfo-meta", "Cases Options", "cases_meta_options", "cases_views", "side", "low");
  }


  function cases_meta_options(){
          global $post;
          if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
          $custom = get_post_custom($post->ID);
          $link = $custom["caseLink"][0];
          $logolink = $custom["logoLink"][0];
  ?>
      <label>Link:</label><input name="caseLink" value="<?php echo $link; ?>" /><br />
      <label>Case Logo Link:</label><input name="logoLink" value="<?php echo $logolink; ?>" />
  <?php
      }

  add_action('save_post', 'save_case_link');

  function save_case_link(){
      global $post;

      if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
          return $post_id;
      }else{
          update_post_meta($post->ID, "caseLink", $_POST["caseLink"]);
          update_post_meta($post->ID, "logoLink", $_POST["logoLink"]);
      }
  }

  add_filter("manage_edit-cases_views_columns", "case_edit_columns");

  function case_edit_columns($columns){
          $columns = array(
              "cb" => "<input type=\"checkbox\" />",
              "title" => "Case",
              "description" => "Description",
              "link" => "Link to Case",
              "category" => "Category of Case",
          );

          return $columns;
  }

  add_action("manage_posts_custom_column",  "cases_custom_columns");

  function cases_custom_columns($column){
          global $post;
          switch ($column)
          {
              case "description":
                  the_excerpt();
                  break;
              case "link":
                  $custom = get_post_custom();
                  echo $custom["caseLink"][0];
                  break;
              case "category":
                  echo get_the_term_list($post->ID, 'cases-type', '', ', ','');
                  break;
          }
  }
?>
