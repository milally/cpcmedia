<?php
/*
Plugin Name: CPC 
Plugin URI: http://www.lally.us/
Description: Declares a plugin that will create a custom post type for Crossroads Presbyterian Church sermons.
Version: 1.0
Author: Michael Lally
Author URI: http://www.lally.us/
License: GPLv2
*/

// Register the 'Sermons' custom post type
add_action ('init', 'create_sermon_post_type');
function create_sermon_post_type() {
	$labels = array(
		'name' => _x( 'Sermons', 'post type general name' ),
		'singular_name' => _x( 'Sermon', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'sermon' ),
		'add_new_item' => __( 'Add New Sermon' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Sermon' ),
		'new_item' => __( 'New Sermon' ),
		'view' => __( 'View Sermon' ),
		'view_item' => __( 'View Sermon' ),
		'search_items' => __( 'Search Sermons' ),
		'not_found' => __( 'No sermons found' ),
		'not_found_in_trash' => __( 'No sermons found in Trash' ),
		'parent' => __( 'Parent Sermon' ),
		'menu_name' => 'Sermons'
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Listen to sermons preached at Crossroads Presbyterian Church.'),
		'menu_position' => 5,
		'has_archive' => true,
		'hierarchical' => false,
		'query_var' => true,
		'public' => true,
		'supports' => array( 'title', 'editor', 'hybrid-post-settings', 'excerpt' ),
		'rewrite' => array( 'slug' => 'sermons' ),
		'taxonomies' => array( 'series', 'speaker', 'passage', 'topic'),
		'can_export' => true,
		'permalink_epmask' => EP_PERMALINK
	);
	register_post_type( 'sermons', $args );
}

// Register Sermon taxonomies
add_action( 'init', 'create_sermon_taxonomies', 0 );
function create_sermon_taxonomies() {
	
	// Add Speaker taxonomy
	$labels = array(
		'name' => _x( 'Speakers', 'taxonomy general name' ),
		'singular_name' => _x( 'Speaker', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Speakers' ),
		'popular_items' => __( 'Popular Speakers' ),
		'all_items' => __( 'All Speakers' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Speaker' ), 
		'update_item' => __( 'Update Speaker' ),
		'add_new_item' => __( 'Add New Speaker' ),
		'new_item_name' => __( 'New Speaker Name' ),
		'separate_items_with_commas' => __( 'Separate speakers with commas' ),
		'add_or_remove_items' => __( 'Add or remove speakers' ),
		'choose_from_most_used' => __( 'Choose from the most used speakers' ),
		'menu_name' => __( 'Speakers' ),
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'speaker' )
	);
	register_taxonomy( 'speaker', 'sermons', $args );
	
	// Add Series taxonomy
	$labels = array(
		'name' => _x( 'Series', 'taxonomy general name' ),
		'singular_name' => _x( 'Series', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Series' ),
		'popular_items' => __( 'Popular Series' ),
		'all_items' => __( 'All Series' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Series' ), 
		'update_item' => __( 'Update Series' ),
		'add_new_item' => __( 'Add New Series' ),
		'new_item_name' => __( 'New Series Name' ),
		'separate_items_with_commas' => __( 'Separate series with commas' ),
		'add_or_remove_items' => __( 'Add or remove series' ),
		'choose_from_most_used' => __( 'Choose from the most used series' ),
		'menu_name' => __( 'Series' ),
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'series' )
	);
	register_taxonomy( 'series', 'sermons', $args );

	// Add Book taxonomy
	$labels = array(
		'name' => _x( 'Books', 'taxonomy general name' ),
		'singular_name' => _x( 'Book', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Books' ),
		'popular_items' => __( 'Popular Books' ),
		'all_items' => __( 'All Books' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Book' ), 
		'update_item' => __( 'Update Book' ),
		'add_new_item' => __( 'Add New Book' ),
		'new_item_name' => __( 'New Book Name' ),
		'separate_items_with_commas' => __( 'Separate Books with commas' ),
		'add_or_remove_items' => __( 'Add or remove Books' ),
		'choose_from_most_used' => __( 'Choose from the most used Books' ),
		'menu_name' => __( 'Books' ),
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'book' )
	);
	register_taxonomy( 'book', 'sermons', $args );

	// Add Passage taxonomy
	$labels = array(
		'name' => _x( 'Passagess', 'taxonomy general name' ),
		'singular_name' => _x( 'Passage', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Passages' ),
		'popular_items' => __( 'Popular Passages' ),
		'all_items' => __( 'All Passages' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Passage' ), 
		'update_item' => __( 'Update Passage' ),
		'add_new_item' => __( 'Add New Passage' ),
		'new_item_name' => __( 'New Passage Name' ),
		'separate_items_with_commas' => __( 'Separate passages with commas' ),
		'add_or_remove_items' => __( 'Add or remove passages' ),
		'choose_from_most_used' => __( 'Choose from the most used passages' ),
		'menu_name' => __( 'Passages' ),
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'passage' )
	);
	register_taxonomy( 'passage', 'sermons', $args );

	// Add Topic taxonomy
	$labels = array(
		'name' => _x( 'Topics', 'taxonomy general name' ),
		'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Topics' ),
		'popular_items' => __( 'Popular Topics' ),
		'all_items' => __( 'All Speakers' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Topic' ), 
		'update_item' => __( 'Update Topic' ),
		'add_new_item' => __( 'Add New Topic' ),
		'new_item_name' => __( 'New Topic Name' ),
		'separate_items_with_commas' => __( 'Separate topics with commas' ),
		'add_or_remove_items' => __( 'Add or remove topics' ),
		'choose_from_most_used' => __( 'Choose from the most used topics' ),
		'menu_name' => __( 'Topics' ),
	);
	$args = array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'topic' )
	);
	register_taxonomy( 'topic', 'sermons', $args );

}

// Create admin page functions
add_action( 'admin_init', 'my_admin' );
function my_admin() {
    add_meta_box( 'sermon_meta_box',
        'Sermon Details',
        'display_sermon_meta_box',
        'sermons', 'normal', 'high'
    );
}

// Change byline of post/sermon
function ccc_byline ( $byline ) {
	global $post;

	if ( 'sermons' == $post->post_type )
		$byline = '<p class="byline">By [entry-terms taxonomy="speaker"] on &#91entry-published] &#91entry-edit-link before=" | "]</p>';

	return $byline;
}
add_filter( 'hybrid_byline', 'ccc_byline' );

// Change meta of post/sermon
function ccc_entry_meta ( $meta ) {
	global $post;

	if ( 'sermons' == $post->post_type )
		$meta = '<p class="entry-meta">&#91entry-terms taxonomy="series" before="From the series "] &#91entry-terms taxonomy="topic" before="| Topics: "]</p>';
		
	return $meta;
}
add_filter( 'hybrid_entry_meta', 'ccc_entry_meta' );

// Add some text to the top of a sermons page using 'singular-sermons' contextual hook
function ccc_sermon_scriptures() {

	// Variables to store each of our possible taxonomy lists
	$passage_list = get_the_term_list( $post->ID, 'passage', '', ', ', '' );
	$book_list = get_the_term_list( $post->ID, 'book', 'Find more sermons from the book of ', ', ', '' );
	
	// Display the list					
	echo '<ul>';
	if ($passage_list != '') { echo '<li>Read <a href="http://www.biblegateway.com/passage/?search=' . strip_tags($passage_list) . '&version=ESV" target="_blank">' . strip_tags($passage_list) . '</a> (BibleGateway)</li>'; }
	if ($book_list != '') { echo '<li>' . $book_list . ''; }
	echo '</ul>';
	
}
add_filter( 'hybrid_singular-sermons_before_entry', 'ccc_sermon_scriptures' );

// Add a banner to the sermons pages
function ccc_sermon_series_banner() {

	global $post;
	$series_list = get_the_terms( $post->ID, 'series' );
	
	// There should only be one series
	foreach( $series_list as $series ) {
		
		// Construct the file source
		$filename = '/wp-sermons/images/' . $series->slug . '.jpg';
		echo '<img src="' . $filename . '" title="' . $series->slug . '" style="margin-bottom: 24px;">';
	
	}

}
add_filter( 'hybrid_singular-sermons_before_content', 'ccc_sermon_series_banner' );



?>
