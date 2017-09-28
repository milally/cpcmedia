<?php
/*
** template for CPC Sunday School Archive Post
** archive-sun_school.php
*/
get_header(); ?>
<div id="primary">
    <div id="content" role="main">
     <?php $mypost = array( 'post_type' => 'sun_school', 
	    'posts_per_page'	=> -1,
	    'meta_key'			=> 'recording_date',
	    'orderby'			=> 'meta_value',
	    'order'				=> 'DESC');
      $loop = new WP_Query( $mypost ); ?>
      <!-- Cycle through all posts -->
      <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <div style="margin-top: 10px; margin-right: auto; margin-left: auto; width: 60%">
          <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <header class="entry-header">
                <!-- Display featured image in top-aligned floating div -->
                 
                 <div style="float: top; margin: 10px; text-align: center">
                    <?php
                        // get the sun_schoolseries term ID
                        $term = wp_get_post_terms( $post->ID, 'sunschoolseries' );
                        // image id is stored as term meta
                        $image_id = get_term_meta( $term[0]->term_id, 'image', true );
                        // image data stored in array, second argument is which image size to retrieve
                        $image_data = wp_get_attachment_image_src( $image_id, 'medium' );
                        // image url is the first item in the array (aka 0)
                        $image = $image_data[0];
                       if ( ! empty( $image ) ) {
                           echo '<img src="' . esc_url( $image ) . '" />';
                       }
                    ?>
                 </div>
                 <!-- Display Title and Speaker Name -->
                 <table>
                 <tr>
                 <td><strong>Title: </strong><?php the_title(); ?></td>
                 <td><strong>Speaker: </strong>
                 <?php echo esc_html( the_terms( $post->ID, 'speaker', ' ', ' / ' ) ); ?>
                 
                 </td>
                 </tr>
                 <!-- Display Recording Date and Series -->
                 <tr>
                <td><strong>Recording Date: </strong>
                <?php 
                  $format_in = 'Ymd'; // the format your value is saved in (set in the field options)
                  $format_out = 'F d, Y'; // the format you want to end up with
                  $mydate = DateTime::createFromFormat($format_in, get_post_meta( get_the_ID(), 'recording_date', true ));
                  echo esc_html( $mydate->format( $format_out ));
                ?>
                </td>
                <!-- Display series name -->
                <td><strong>Series: </strong>
                <?php echo esc_html( the_terms( $post->ID, 'sunschoolseries', ' ', ' / ' ) ); ?></td>
                </tr>
                </table>
              </header>
              <!-- Display audio file in player -->
              <div class="entry-content" style="text-align: center; align-content: center;">
                   <?php 
                        $file = get_field('audio_file');
                        if( $file ):
	                    $attr = array(
	                        'src'      => wp_get_attachment_url($file),
	                        'style'    => 'width: 75%; align: center; text-align: center'
                            );
                            echo wp_audio_shortcode( $attr );
                        endif;
                    ?>
              </div>
              <hr/>
         </article>
       </div>
   <?php endwhile;  ?>
   </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>