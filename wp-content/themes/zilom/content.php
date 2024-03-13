<?php
/**
 * The template for displaying posts in the Default post format
 *
 * @author     Gaviasthemes Team     
 * @copyright  Copyright (C) 2021 gaviasthemes. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */
?>
<?php 
   $post_id = get_the_ID();

	$thumbnail = 'post-thumbnail';
	if(isset($thumbnail_size) && $thumbnail_size){
		$thumbnail = $thumbnail_size;
	}
	if(is_single()){
		$thumbnail = 'full';
	}

	if(!isset($excerpt_words)){
    	$excerpt_words = zilom_get_option('blog_excerpt_limit', 20);
  	}

   $desc = zilom_limit_words($excerpt_words, get_the_excerpt(), '');

   $meta_classes = 'entry-meta';
   if( empty(get_the_date()) ){
      $meta_classes = 'entry-meta schedule-date';
   }

?>
<article id="post-<?php echo esc_attr($post_id); ?>" <?php post_class(); ?>>

	<div class="post-thumbnail <?php echo has_post_thumbnail($post_id) ? '' : 'without_image' ?>">
      <?php if(has_post_thumbnail($post_id)){ ?>
         <div class="thumbnail-content">
            <a href="<?php echo esc_url( get_permalink() ) ?>">
               <?php the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) ); ?>
            </a>
         </div>   
      <?php } ?>   
      <div class="<?php echo esc_attr(empty(get_the_date()) ? 'entry-meta schedule-date' : 'entry-meta' ) ?>">
         <?php zilom_posted_on(); ?>
      </div>
   </div>   	

	<div class="entry-content">
		
      <div class="content-inner">
         <?php if( !is_single() ){ ?>
            <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
         <?php }else{ ?>
            <h1 class="entry-title"><?php echo the_title() ?></h1>
         <?php } ?>
         
			<?php 
            if(is_single()){
               echo '<div class="post-content clearfix">';
      				the_content( sprintf(
      					esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'zilom' ),
      					the_title( '<span class="screen-reader-text">', '</span>', false )
      				) );
      				wp_link_pages( array(
      					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'zilom' ) . '</span>',
      					'after'       => '</div>',
      					'link_before' => '<span>',
      					'link_after'  => '</span>',
      				) );
   			   echo '</div>';
   			}else{
               if($desc){ 
                  echo '<div class="entry-desc">';
                     echo esc_html($desc);
                  echo '</div>';   
               } 
            }
			?>
         <?php the_tags( '<footer class="entry-meta-footer"><span class="tag-links"><span>' . esc_html__( 'Tags:', 'zilom' ) . '</span>' , '', '</span></footer>' ); ?>
         
         <?php 
            if(is_single()){ 
               do_action( 'zilom_share' );
            }
         ?>
      </div>
      
	</div><!-- .entry-content -->	

	
</article><!-- #post-## -->
