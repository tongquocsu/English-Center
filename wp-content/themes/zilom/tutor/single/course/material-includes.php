<?php
/**
 * Template for displaying course Material Includes assets
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
 */


do_action( 'tutor_course/single/before/material_includes' );

$materials = tutor_course_material_includes();

if ( empty( $materials ) ) {
	return;
}

if ( is_array( $materials ) && count( $materials ) ) {
	?>
	<div class="tutor-single-course-segment  tutor-course-material-includes-wrap">
		<h4 class="tutor-segment-title">
			<?php _e('Nội Dung Khóa Học', 'zilom'); ?>
		</h4>
		<div class="tutor-course-target-audience-content">
			<ul class="tutor-course-target-audience-items tutor-custom-list-style">
				<?php foreach ($materials as $material): ?>
					<li>
						<span><?php echo html_entity_decode($material); ?></span>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>	
	</div>
	<?php 
} 

do_action('tutor_course/single/after/material_includes'); 

?>

