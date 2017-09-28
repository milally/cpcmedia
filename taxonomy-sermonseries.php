<?php
/*
** template for CPC Sermons Series taxonomy
** single-sermons.php
*/

get_header(); ?>
<div id="primary">
   <div id="content" role="main">
     <?php
       // This sets out a variable called $term - we'll use it ALOT for what we're about to do.
       $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
     ?>
          <h2>Sermon Series: <?php echo $term->name; ?></h2></br>
          <h3><?php echo $term->description; ?></h3>
          <div style="float: top; margin: auto; text-align: center; width: 75%; align-content: center;">
     <?php
       // image id for Series is stored as term meta
       $image_id = get_term_meta( $term->term_id, 'image', true );
       // image data stored in array, second argument is which image size to retrieve
       $image_data = wp_get_attachment_image_src( $image_id, 'medium' );
       // image url is the first item in the array (aka 0)
       $image = $image_data[0];
       if ( ! empty( $image ) ) {
         echo '<img src="' . esc_url( $image ) . '" /><br/>';
       }
     ?>
     <?php
       //define the global post variable
       global $post;
       
       // setup shortcode to display playlist
       $myshortcode="[_playlist width=\"400\"]";
       $series_archive = array( ); // creates an array for all terms inside of the given tax using the custom field "recording_date" as the key
       while (have_posts()) : the_post();
         $rec_date = get_field( 'recording_date');
         $series_archive[$rec_date] = $post->ID;
       endwhile;
       ksort( $series_archive); //sorts the issue_archive array from high to low
       $myposts=array();
       foreach ( $series_archive as $rec_date => $postid ) {
         array_push($myposts,$postid);
       }
       $args = array(
         'post_type' => 'sermons',
         'post__in' => $myposts
       );
       $sermposts = get_posts($args);
       foreach ($sermposts as $post) {
         setup_postdata($post);
//         print_r($post);
//         echo"</br>";
         $audioid = get_field('audio_file');
         $audiofile = get_attached_file($audioid);
         $format_in = 'Ymd'; // the format your value is saved in (set in the field options)
         $format_out = 'F d, Y'; // the format you want to end up with
         $mydate = DateTime::createFromFormat($format_in, get_post_meta( get_the_ID(), 'recording_date', true ));
         if ($audiofile) {
           $myshortcode.="[_track src=\"".$audiofile."\" date=\"".$mydate->format( $format_out )."\" thumb_src=\"".$image."\" image_src=\"".$image."\"]";
         }
       }
      $myshortcode .= "[/_playlist]";
      echo do_shortcode($myshortcode);
    ?>
    </div>
   </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>