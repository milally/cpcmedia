<?php
/*
** template for CPC Speaker taxonomy
** taxonomy-speakers.php
*/

get_header(); ?>
<div id="primary">
   <div id="content" role="main">
     <?php
	   /**
        * Do we need to filter by speakers tag?
       */
if(is_tax('speaker') ) :
	$tag = strip_tags( get_query_var('speaker') );
	$term = get_term_by( 'slug', $tag, 'speaker' );
?>
	<h2>Sermons and Sunday School Lessons By <?php echo $term->name; ?></h2></br>
    <div style="float: top; margin: auto; text-align: center; width: 75%; align-content: center;">
<?php 
	$querystr = "
	    SELECT wposts.* 
	    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta, $wpdb->terms wterms, $wpdb->term_taxonomy wtax, $wpdb->term_relationships wrels
	    WHERE wposts.ID = wpostmeta.post_id
	    AND wterms.term_id = wtax.term_id
	    AND wtax.term_taxonomy_id = wrels.term_taxonomy_id
	    AND wrels.object_id = wposts.ID
	    AND wterms.slug = '$tag'
	    ";
 
else:
	$querystr = "
	    SELECT wposts.* 
	    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
	    WHERE wposts.ID = wpostmeta.post_id";
endif;
 
// Build the rest of the query, i.e. only get speaker posts with dates, and order newest first.
$querystr .= "
    AND wpostmeta.meta_key = 'recording_date'"
//    AND STR_TO_DATE(wpostmeta.meta_value,'%m/%d/%Y') <= CURDATE()
."    AND wposts.post_status = 'publish'
    AND ( wposts.post_type = 'sermons' OR wposts.post_type = 'sun_school' )
    ORDER BY wpostmeta.meta_value ASC
    ";
	
$speakerposts = $wpdb->get_results($querystr, OBJECT_K);
//print_r ($speakerposts);
// setup shortcode to display playlist
       $myshortcode="[_playlist width=\"400\"]";
 
if ($speakerposts):
 	foreach ($speakerposts as $post):
 		global $post;
 		global $term;
 		setup_postdata($post);
		
		$posttype = get_post_type( $post );
		
		if ($posttype == 'sermons' ):
		   $term = wp_get_post_terms( $post->ID, 'sermonseries' );
		else:
		   $term = wp_get_post_terms( $post->ID, 'sunschoolseries' );
		endif;

        // image id for series is stored as term meta
       $image_id = get_term_meta( $term[0]->term_id, 'image', true );
       // image data stored in array, second argument is which image size to retrieve
       $image_data = wp_get_attachment_image_src( $image_id, 'medium' );
       // image url is the first item in the array (aka 0)
       $image = $image_data[0];
 //      if ( ! empty( $image ) ) {
 //        echo '<img src="' . esc_url( $image ) . '" /><br/>';
 //      }
 
 		// Get a friendlier version of the date.
 		$date = get_post_meta($post->ID, 'recording_date', true);
 		$date = date_create($date);
 		$date = date_format($date, 'jS F, Y');
		
		$audioid = get_field('audio_file');
        $audiofile = get_attached_file($audioid);
        $format_in = 'Ymd'; // the format your value is saved in (set in the field options)
        $format_out = 'F d, Y'; // the format you want to end up with
        $mydate = DateTime::createFromFormat($format_in, get_post_meta( get_the_ID(), 'recording_date', true ));
        if ($audiofile) {
           $myshortcode.="[_track src=\"".$audiofile."\" date=\"".$mydate->format( $format_out )."\" thumb_src=\"".$image."\" image_src=\"".$image."\"]";
        }	
 	endforeach;
	$myshortcode .= "[/_playlist]";
    echo do_shortcode($myshortcode);
endif; 

    ?>
    </div>
   </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>