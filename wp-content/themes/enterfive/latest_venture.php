<?php

  if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 280, 210, true ); // Normal post thumbnails
    add_image_size( 'screen-shot', 720, 540 ); // Full size screen
  }

  add_action('init', 'latest_register');

  function latest_register() {
      $args = array(
          'label' => __('Latest Venture'),
          'singular_label' => __('Latest Venture'),
          'public' => true,
          'show_ui' => true,
          'capability_type' => 'post',
          'hierarchical' => false,
          'rewrite' => true,
          'supports' => array('title', 'editor', 'thumbnail')
         );

      register_post_type( 'latest_views' , $args );
  }

  register_taxonomy("latest-type", array("latest_views"), array("hierarchical" => true, "label" => "Latest Venture Category", "singular_label" => "Latest Venture Category", "rewrite" => true));

  add_action("admin_init", "latest_meta_box");


  function latest_meta_box(){
      add_meta_box("latestinfo-meta", "Latest Options", "latest_meta_options", "latest_views", "side", "low");
  }


  function latest_meta_options(){
          global $post;
          if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
          $custom = get_post_custom($post->ID);
          $link = $custom["latestLink"][0];
  ?>
      <label>Link:</label><input name="latestLink" value="<?php echo $link; ?>" /><br />
  <?php
      }

  add_action('save_post', 'save_latest_link');

  function save_latest_link(){
      global $post;

      if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){
          return $post_id;
      }else{
          update_post_meta($post->ID, "latestLink", $_POST["latestLink"]);
      }
  }

  add_filter("manage_edit-latest_views_columns", "latest_edit_columns");

  function latest_edit_columns($columns){
          $columns = array(
              "cb" => "<input type=\"checkbox\" />",
              "title" => "Latest Venture",
              "description" => "Info",
              "link" => "Link to Latest Venture",
              "category" => "Category of Latest Venture",
          );

          return $columns;
  }

  add_action("manage_posts_custom_column",  "latest_custom_columns");

  function latest_custom_columns($column){
          global $post;
          switch ($column)
          {
              case "description":
                  the_excerpt();
                  break;
              case "link":
                  $custom = get_post_custom();
                  echo $custom["latestLink"][0];
                  break;
              case "category":
                  echo get_the_term_list($post->ID, 'latest-type', '', ', ','');
                  break;
          }
  }
?>
