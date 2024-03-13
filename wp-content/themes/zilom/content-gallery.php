<?php
/**
 * The template for displaying posts in the Gallery post format
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
?>
<article id="post-<?php echo esc_attr($post_id); ?>" <?php post_class(); ?>>
	
	<div class="post-thumbnail <?php echo has_post_thumbnail($post_id) ? '' : 'without_image' ?>">
		<?php
			$image_gallery_val = get_post_meta( $post_id, 'zilom_thumbnail_gallery' , false );
			?>
			<?php if($image_gallery_val && is_array($image_gallery_val) && count($image_gallery_val>0)){ ?>
           <div class="thumbnail-content">
   				<div class="thumbnail-content">
                  <div class="blog-gallery">
      					<div class="init-carousel-owl owl-carousel" data-items="1"  data-nav="true" >
      						<?php
      						foreach($image_gallery_val as $gimg_id): ?>
      							<div class="item text-center">
      								<a href="<?php echo esc_url(get_the_permalink()); ?>">
      									<?php echo wp_get_attachment_image( $gimg_id, $thumbnail ); ?>
      								</a>
      							</div>
      						<?php endforeach;
      						?>
      					</div>
      				</div>
               </div>   
            </div>   
			<?php }elseif(has_post_thumbnail($post_id)){
            echo '<div class="thumbnail-content">';
				   the_post_thumbnail( $thumbnail, array( 'alt' => get_the_title() ) );
            echo '</div>';  
			} ?>
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
