<?php
  /*
  *	---------------------------------------------------------------------
  *	This file create and contains the portfolio post_type meta elements
  *	---------------------------------------------------------------------
  */
  add_action('init', 'tzinteriart_create_portfolio');
  function tzinteriart_create_portfolio()
  {
    $labels = array(
      'name'               => esc_html_x('Portfolio', 'Portfolio General Name', 'tz-interiart'),
      'singular_name'      => esc_html_x('Portfolio Item', 'Portfolio Singular Name', 'tz-interiart'),
      'add_new'            => esc_html_x('Add New', 'Add New Portfolio Name', 'tz-interiart'),
      'add_new_item'       => esc_html__('Add New Portfolio', 'tz-interiart'),
      'edit_item'          => esc_html__('Edit Portfolio', 'tz-interiart'),
      'new_item'           => esc_html__('New Portfolio', 'tz-interiart'),
      'view_item'          => esc_html__('View Portfolio', 'tz-interiart'),
      'search_items'       => esc_html__('Search Portfolio', 'tz-interiart'),
      'not_found'          => esc_html__('Nothing found', 'tz-interiart'),
      'not_found_in_trash' => esc_html__('Nothing found in Trash', 'tz-interiart'),
      'parent_item_colon'  => ''
    );
    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'query_var'          => true,
      'rewrite'            => true,
      'capability_type'    => 'post',
      'hierarchical'       => false,
      'menu_position'      => 5,
      'supports'           => array('title', 'editor','author','excerpt', 'thumbnail','comments'), //'editor', 'excerpt', 'comments',
      'rewrite'            => array('slug' => 'portfolio', 'with_front' => false ),
      //'has_archive'        => 'portfolio'
    );
    register_post_type('portfolio', $args);
    register_taxonomy(
      "portfolio-category", array( "portfolio" ), array(
      "hierarchical"   => true,
      "label"          => "Portfolio Categories",
      "singular_label" => "Portfolio Categories",
      "rewrite"        => true ));
    register_taxonomy_for_object_type('portfolio-category', 'portfolio');

      // function tags
      register_taxonomy(
          "portfolio-tags",array("portfolio"), array(
              "hierarchical"   =>   '',
              "label"          =>   "Portfolio Tags",
              "singular_label" =>   "Portfolio Tags",
              "rewrite"        =>   ''
          )
      );
      register_taxonomy_for_object_type('protfolio-tags','portfolio');
  }

  // filter for portfolio first page
  add_filter("manage_edit-portfolio_columns", "tzinteriart_show_portfolio_column");
  function tzinteriart_show_portfolio_column($columns)
  {
    $columns = array(
      "cb"                 => "<input type=\"checkbox\" />",
      "title"              => "Title",
      "author"             => "Author",
      "portfolio-category" => "Portfolio Categories",
      "portfolio-tags"     => "Portfolio Tags",
      "date"               => "date" );

    return $columns;
  }

  add_action("manage_posts_custom_column", "tzinteriart_portfolio_custom_columns");
  function tzinteriart_portfolio_custom_columns($column)
  {
    global $post;
    switch ($column) {
      case "portfolio-category":
        echo get_the_term_list($post->ID, 'portfolio-category', '', ', ', '');
        break;
        case "portfolio-tags":
            echo get_the_term_list($post->ID, 'portfolio-tags', '', ', ', '');
            break;
    }
  }

  function get_portfolio_categories(){
    $taxonomy     = 'portfolio-category';
    $orderby      = 'name';
    $show_count   = 0;      // 1 for yes, 0 for no
    $pad_counts   = 0;      // 1 for yes, 0 for no
    $hierarchical = 1;      // 1 for yes, 0 for no
    $title        = '';
    $empty        = 0;

    $args = array(
      'taxonomy'     => $taxonomy,
      'orderby'      => $orderby,
      'show_count'   => $show_count,
      'pad_counts'   => $pad_counts,
      'hierarchical' => $hierarchical,
      'title_li'     => $title,
      'hide_empty'   => $empty
    );

    $categories = get_categories( $args );

    return $categories;
  }

function get_cat_portfolio_ID( $cat_name ) {
    $cat = get_term_by( 'name', $cat_name, 'portfolio-category' );
    if ( $cat )
        return $cat->term_id;
    return 0;
}

function get_category_portfolio_link( $category ) {
    if ( ! is_object( $category ) )
        $category = (int) $category;

    $category = get_term_link( $category, 'portfolio-category' );

    if ( is_wp_error( $category ) )
        return '';

    return $category;
}

