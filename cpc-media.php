<?php
/*
Plugin Name: CPC Sunday Audio
Plugin URI: http://www.lally.us/
Description: Declares a plugin that will create a custom post type for Crossroads Presbyterian Church Audio Files.
Version: 1.0
Author: Michael Lally
Author URI: http://www.lally.us/
License: GPLv2
*/

/*
// Register the 'Sunday Audio' custom post type
add_action ('init', 'create_cpc_sunday_audio_post_type');
function create_cpc_sunday_audio_post_type() {
	$labels = array(
		'name' => _x( 'Sunday Audio', 'post type general name' ),
		'singular_name' => _x( 'Sunday Audio', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'cpc_sunday_audio' ),
		'add_new_item' => __( 'Add New Sunday Audio Entry' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Sunday Audio' ),
		'new_item' => __( 'New Sunday Audio' ),
		'view' => __( 'View Sunday Audio' ),
		'view_item' => __( 'View Sunday Audio' ),
		'search_items' => __( 'Search Sunday Audio' ),
		'not_found' => __( 'No Sunday Audio found' ),
		'not_found_in_trash' => __( 'No Sunday Audio found in Trash' ),
		'parent' => __( 'Parent Sunday' ),
		'menu_name' => 'Sunday Audio'
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Audio files from a Sunday at Crossroads Presbyterian Church.'),
		'menu_position' => 150,
		'menu_icon' => 'dashicons-controls-volumeon',
		'has_archive' => true,
		'hierarchical' => false,
		'query_var' => true,
		'public' => true,
		'supports' => array( 'title', 'page-attributes', 'thumbnail' ),
		'rewrite' => array( 'slug' => 'sunday_audio' ),
		'taxonomies' => array( 'sermon', 'sunschool'),
		'can_export' => true,
		'permalink_epmask' => EP_PERMALINK
	);
	register_post_type( 'cpc_sunday_audio', $args );
}
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
		'menu_icon' => 'dashicons-controls-volumeon',
		'has_archive' => true,
		'hierarchical' => true,
		'query_var' => true,
		'public' => true,
		'supports' => array( 'title', 'page-attributes', 'post-formats'),
		'rewrite' => array( 'slug' => 'sermons' ),
		'taxonomies' => array( 'sermonseries', 'speaker', 'book', 'passage', 'topic'),
		'can_export' => true,
		'permalink_epmask' => EP_PERMALINK
	);
	register_post_type( 'sermons', $args );
}

// Register the 'Sunday School' custom post type
add_action ('init', 'create_sun_school_post_type');
function create_sun_school_post_type() {
	$labels = array(
		'name' => _x( 'Sunday School Lessons', 'post type general name' ),
		'singular_name' => _x( 'Sunday School', 'post type singular name' ),
		'add_new' => _x( 'Add New', 'sun_school' ),
		'add_new_item' => __( 'Add New Sunday School' ),
		'edit' => __( 'Edit' ),
		'edit_item' => __( 'Edit Sunday School' ),
		'new_item' => __( 'New Sunday School' ),
		'view' => __( 'View Sunday School' ),
		'view_item' => __( 'View Sunday School' ),
		'search_items' => __( 'Search Sunday School' ),
		'not_found' => __( 'No sun_school found' ),
		'not_found_in_trash' => __( 'No sun_school found in Trash' ),
		'parent' => __( 'Parent Sunday School' ),
		'menu_name' => 'Sunday School'
	);
	$args = array(
		'labels' => $labels,
		'description' => __('Listen to Sunday School lessons preached at Crossroads Presbyterian Church.'),
		'menu_position' => 6,
		'menu_icon' => 'dashicons-controls-volumeon',
		'has_archive' => true,
		'hierarchical' => true,
		'query_var' => true,
		'public' => true,
		'supports' => array( 'title', 'page-attributes', 'post-formats'),
		'rewrite' => array( 'slug' => 'sundayschool' ),
		'taxonomies' => array( 'sunschoolseries', 'speaker', 'book', 'passage', 'topic'),
		'can_export' => true,
		'permalink_epmask' => EP_PERMALINK
	);
	register_post_type( 'sun_school', $args );
}

// Register Custom taxonomies
add_action( 'init', 'create_audio_taxonomies', 0 );
function create_audio_taxonomies() {
	
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
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'speaker' )
	);
	register_taxonomy( 'speaker', array('sermons','sun_school'), $args );
	
	// Add Sermon Series taxonomy
	$labels = array(
		'name' => _x( 'Sermon Series', 'taxonomy general name' ),
		'singular_name' => _x( 'Sermon Series', 'taxonomy singular name' ),
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
		'menu_name' => __( 'Sermon Series' ),
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'sermonseries' )
	);
	register_taxonomy( 'sermonseries', array('sermons'), $args );
	
	// Add SunSchool Series taxonomy
	$labels = array(
		'name' => _x( 'Sunday School Series', 'taxonomy general name' ),
		'singular_name' => _x( 'Sunday School Series', 'taxonomy singular name' ),
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
		'menu_name' => __( 'Sun School Series' ),
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'sunschoolseries' )
	);
	register_taxonomy( 'sunschoolseries', array('sun_school'), $args );
	
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
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'query_var' => true,
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'book' )
	);
	register_taxonomy( 'book', array('sermons','sun_school'), $args );
	
	// Add Passage taxonomy
	$labels = array(
		'name' => _x( 'Passages', 'taxonomy general name' ),
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
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'passage' )
	);
	register_taxonomy( 'passage', array('sermons','sun_school'), $args );
	
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
//		'meta_box_cb' => false,
		'rewrite' => array( 'slug' => 'topic' )
	);
	register_taxonomy( 'topic', array('sermons','sun_school'), $args );
}

//Rearrange custom taxonomies
function sermon_details_meta_box(){
    remove_meta_box('sermon_details', 'sermons', 'side');
    add_meta_box( 'sermon_details', 'Sermon Details', 'add_sermon_details', 'sermons', 'normal', 'high');
}


function sun_school_details_meta_box(){
    remove_meta_box('sun_school_details', 'sun_school', 'side');
    add_meta_box( 'sun_school_details', 'Sunday School Details', 'add_sun_school_details', 'sun_school', 'normal', 'high');
}

function add_taxonomy_boxes(){
    if ( ! is_admin() )
    return;
    
    add_action( 'admin_init', 'sermon_details_meta_box', 0 );
    add_action( 'admin_init', 'sun_school_details_meta_box', 0 );
    
    /* Use the save_post action to save new post data */
//    add_action('save_post', 'save_sermon_data');
//    add_action('save_post', 'save_sunschl_data');
}

//add_taxonomy_boxes();



// Make the custom taxonomies look nice on the Sermons Admin page
function add_sermon_details($post) {
 
    echo '<input type="hidden" name="taxonomy_noncename" id="taxonomy_noncename" value="' . 
            wp_create_nonce( 'taxonomy_sermon' ) . '" />';
 
     
    // Get all appropriate taxonomy terms for books, speakers and such
    $speakers = get_terms('speaker', 'hide_empty=0');
    $sermonseriess = get_terms('sermonseries', 'hide_empty=0');
    $books = get_terms('book', 'hide_empty=0');
    $passages = get_terms('passage', 'hide_empty=0');
    $topics = get_terms('topic', 'hide_empty=0');
 
?>
<table>
    <tr>
        <td colspan="3">
            <b>Series</b>&nbsp;
            <select required name='post_series' id='post_series'>
            <!-- Display sermonseries as options -->
            <?php 
                $names = wp_get_object_terms($post->ID, 'sermonseries'); 
            ?>
                <option class='series-option' value=''
                <?php if (!count($names)) echo "selected";?>>Select Sermon Series</option>
                <?php
            foreach ($sermonseriess as $sermonseries) {
                        if (!is_wp_error($names) && !empty($names) && !strcmp($sermonseries->slug, $names[0]->slug)) 
                    echo "<option class='series-option' value='" . $sermonseries->slug . "' selected>" . $sermonseries->name . "</option>\n"; 
                else
                    echo "<option class='series-option' value='" . $sermonseries->slug . "'>" . $sermonseries->name . "</option>\n"; 
            }
            ?>
            </select>
        </td>
        <td colspan="3">
            <b>Speaker</b>&nbsp;
            <select required name='post_speaker' id='post_speaker'>
            <!-- Display speakers as options -->
            <?php 
                $names = wp_get_object_terms($post->ID, 'speaker'); 
            ?>
                <option class='speaker-option' value=''
                <?php if (!count($names)) echo "selected";?>>Select Speaker</option>
                <?php
            foreach ($speakers as $speaker) {
                if (!is_wp_error($names) && !empty($names) && !strcmp($speaker->slug, $names[0]->slug)) 
                    echo "<option class='speaker-option' value='" . $speaker->slug . "' selected>" . $speaker->name . "</option>\n"; 
                else
                    echo "<option class='speaker-option' value='" . $speaker->slug . "'>" . $speaker->name . "</option>\n"; 
            }
            ?>
            </select>
        </td>
    <tr>
        <td colspan="2">
            <b>Book</b>&nbsp;
            <select required name='post_book' id='post_book'>
            <!-- Display books as options -->
            <?php 
                $names = wp_get_object_terms($post->ID, 'book'); 
            ?>
                <option class='book-option' value=''
                <?php if (!count($names)) echo "selected";?>>Select Book</option>
                <?php
            foreach ($books as $book) {
                if (!is_wp_error($names) && !empty($names) && !strcmp($book->slug, $names[0]->slug)) 
                    echo "<option class='book-option' value='" . $book->slug . "' selected>" . $book->name . "</option>\n"; 
                else
                    echo "<option class='book-option' value='" . $book->slug . "'>" . $book->name . "</option>\n"; 
            }
            ?>
            </select>
        </td>
        <td colspan="2">
            <b>Passage</b>&nbsp;
            <input required class="passage-option" type="text" name="post_passage" id="post_passage" value="<?php echo esc_attr( get_post_meta( $object->ID, 'passage-option', true ) ); ?>" size="30" />
        </td>
        <td colspan="2">
            <b>Topics</b>&nbsp;
            <input required class="topic-option" type="text" name="post_topic" id="post_topic" value="<?php echo esc_attr( get_post_meta( $object->ID, 'topic-option', true ) ); ?>" size="30" />
        </td>
    </tr>
    
</table>    
<?php
}

//Save the taxonomy data we have reformatted.
function save_sermon_data($post_id) {
// verify this came from our screen and with proper authorization.
 
    if ( !wp_verify_nonce( $_POST['taxonomy_noncename'], 'taxonomy_sermon' )) {
        return $post_id;
    }
 
    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;
 
   
    // Check permissions
    if ( 'page' == $_POST['post_type'] ) {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return $post_id;
    } else {
        if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    }
 
    // OK, we're authenticated: we need to find and save the data
    $post = get_post($post_id);
    if (($post->post_type == 'post') || ($post->post_type == 'page')) { 
           // OR $post->post_type != 'revision'
           $speaker = $_POST['post_speaker'];
       wp_set_object_terms( $post_id, $speaker, 'speaker' );
        }
    return $speaker;
 
}


// Change byline of post/sermon
function cpc_byline ( $byline ) {
	global $post;
	if ( 'sermons' == $post->post_type )
		$byline = '<p class="byline">By [entry-terms taxonomy="speaker"] on &#91entry-published] &#91entry-edit-link before=" | "]</p>';
	return $byline;
}
add_filter( 'hybrid_byline', 'cpc_byline' );

// Change meta of post/sermon
function cpc_entry_meta ( $meta ) {
	global $post;
	if ( 'sermons' == $post->post_type )
		$meta = '<p class="entry-meta">&#91entry-terms taxonomy="series" before="From the series "] &#91entry-terms taxonomy="topic" before="| Topics: "]</p>';
		
	return $meta;
}
add_filter( 'hybrid_entry_meta', 'cpc_entry_meta' );

// Add some text to the top of a sermons page using 'singular-sermons' contextual hook
function cpc_sermon_scriptures() {
	// Variables to store each of our possible taxonomy lists
	$passage_list = get_the_term_list( $post->ID, 'passage', '', ', ', '' );
	$book_list = get_the_term_list( $post->ID, 'book', 'Find more sermons from the book of ', ', ', '' );
	
	// Display the list					
	echo '<ul>';
	if ($passage_list != '') { echo '<li>Read <a href="http://www.biblegateway.com/passage/?search=' . strip_tags($passage_list) . '&version=ESV" target="_blank">' . strip_tags($passage_list) . '</a> (BibleGateway)</li>'; }
	if ($book_list != '') { echo '<li>' . $book_list . ''; }
	echo '</ul>';
	
}
add_filter( 'hybrid_singular-sermons_before_entry', 'cpc_sermon_scriptures' );

// Add a banner to the sermons pages
function cpc_sermon_series_banner() {
	global $post;
	$series_list = get_the_terms( $post->ID, 'sermonseries' );
	
	// There should only be one series
	foreach( $series_list as $series ) {
		
		// Construct the file source
		
		$filename = '/wp-sermons/images/' . $series->slug . '.jpg';
		echo '<img src="' . $filename . '" title="' . $series->slug . '" style="margin-bottom: 24px;">';
	
	}
}
add_filter( 'hybrid_singular-sermons_before_content', 'cpc_sermon_series_banner' );

//audio_file recording_date

?>