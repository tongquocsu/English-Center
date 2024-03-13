<?php
/**
 * Template for displaying student & instructor Public Profile.
 * It is used for both of instructor and student. Separate file has not been introduced due to complicacy and backward compatibility. -JK
 *
 * @since v.1.0.0
 *
 * @author Themeum
 * @url https://themeum.com
 *
 * @package TutorLMS/Templates
 * @version 1.4.3
*/

$user_name = sanitize_text_field(get_query_var('tutor_student_username'));
$get_user = tutor_utils()->get_user_by_login($user_name);

if(!is_object($get_user) || !property_exists($get_user, 'ID')){
	wp_redirect(get_home_url().'/404');
	exit;
}

$user_id = $get_user->ID;
$is_instructor = tutor_utils()->is_instructor($user_id);

$profile_layout = tutor_utils()->get_option(($is_instructor ? 'instructor' : 'student').'_public_profile_layout', 'pp-circle');
!$is_instructor ? $profile_layout='pp-circle' : 0; // For now

$tutor_user_social_icons = tutor_utils()->tutor_user_social_icons();

foreach ($tutor_user_social_icons as $key => $social_icon){
	$url = get_user_meta($user_id, $key, true);
	$tutor_user_social_icons[$key]['url']=$url;
}

$cover_photo_src = ZILOM_THEME_URL . '/images/cover-photo.jpg';
$cover_photo_id  = get_user_meta( $user_id, '_tutor_cover_photo', true );
if ( $cover_photo_id ) {
	$url = wp_get_attachment_image_url( $cover_photo_id, 'full' );
	!empty( $url ) ? $cover_photo_src = $url : 0;
}

get_header();
?>

<?php
	// Rating content 
	ob_start();
	if($is_instructor){
		$instructor_rating = tutor_utils()->get_instructor_ratings($user_id);
	?>
		<div class="tutor-rating-container">      
			<div class="ratings">
				<span class="rating-generated">
					<?php tutor_utils()->star_rating_generator($instructor_rating->rating_avg); ?>
				</span>

				<?php
					echo " <span class='rating-digits'>{$instructor_rating->rating_avg}</span> ";
					echo " <span class='rating-total-meta'>({$instructor_rating->rating_count})</span> ";
				?>
			</div>
		</div>
		<?php
	}
	$rating_content=ob_get_clean();

	// Social media content
	ob_start();
	foreach ($tutor_user_social_icons as $key => $social_icon){
		$url = $social_icon['url'];
		echo !empty($url) ? '<a href="'.$url.'" target="_blank" rel="noopener noreferrer nofollow" class="'.$social_icon['icon_classes'].'" title="'.$social_icon['label'].'"></a>' : '';
	}
	$social_media=ob_get_clean();
?>

<?php do_action('tutor_student/before/wrap'); ?>

	<div class="tutor-full-width-student-profile tutor-page-wrap tutor-user-public-profile tutor-user-public-profile-<?php echo esc_html($profile_layout); ?>">
		  	<div class="container photo-area">
				<div class="cover-area">
					<div style="background-image:url(<?php echo esc_url($cover_photo_src) ?>)"></div>
					<div></div>
				</div>
				<div class="pp-area">
					<div class="profile-pic" style="background-image:url(<?php echo get_avatar_url($user_id, array('size' => 150)); ?>)"></div>
					 
					<div class="profile-name">
						<div class="profile-rating-media content-for-mobile">
							<?php echo wp_kses($rating_content, true); ?>
							<div class="tutor-social-container content-for-desktop">
							 	<?php echo wp_kses($social_media, true); ?>
							</div>
						</div>

						<h3><?php echo esc_html($get_user->display_name); ?></h3>
						  	<?php
								if($is_instructor){
								 	$course_count = tutor_utils()->get_course_count_by_instructor($user_id);
								 	$student_count = tutor_utils()->get_total_students_by_instructor($user_id);
								?>
									<span>
									  	<span><?php echo esc_html($course_count); ?></span> 
									  	<?php 
									  		if($course_count > 1){
									  			echo esc_html__('Courses', 'zilom');
									  		}else{
									  			echo esc_html__('Course', 'zilom');
									  		}
									  	?>
									</span>
									<span><span>•</span></span>
									<span>
										<span><?php echo esc_html($student_count);?></span> 
										<?php 
											if($student_count > 1){
												echo esc_html__('Students', 'zilom');
											}else{ 
												echo esc_html__('Student', 'zilom'); 
											}
										?>
									</span>
									<?php
								}
								else{                            
								 	$enrolled_course = tutor_utils()->get_enrolled_courses_by_user($user_id);
								 	$enrol_count = is_object($enrolled_course) ? $enrolled_course->found_posts : 0;

								 	$complete_count = tutor_utils()->get_completed_courses_ids_by_user($user_id);
								 	$complete_count = $complete_count ? count($complete_count) : 0;
								?>
								 	<span>
									  	<span><?php echo esc_html($enrol_count); ?></span> 
								 		<?php 
											if($enrol_count > 1){
												echo esc_html__('Courses Enrolled', 'zilom');
											}else{ 
												echo esc_html__('Course Enrolled', 'zilom'); 
											}
										?>
								 	</span>
								 	<span><span>•</span></span>
								 	<span>
									  	<span><?php echo esc_html($complete_count); ?></span> 
								 		<?php 
											if($complete_count > 1){
												echo esc_html__('Courses Completed', 'zilom');
											}else{ 
												echo esc_html__('Course Completed', 'zilom'); 
											}
										?>
								 	</span>
								<?php
								}
						  ?>
					</div>

					<div class="tutor-social-container content-for-mobile">
						<?php echo html_entity_decode($social_media); ?>
					</div>
					 
					<div class="profile-rating-media content-for-desktop">
						<?php echo html_entity_decode($rating_content); ?>
						<div class="tutor-social-container content-for-desktop">
							<?php    
								foreach ($tutor_user_social_icons as $key => $social_icon){
									 $url = $social_icon['url'];
									 echo !empty($url) ? '<a href="' . esc_url($url) . '" target="_blank" rel="noopener noreferrer nofollow" class="'.  esc_attr($social_icon['icon_classes']) . '" title="' . esc_attr($social_icon['label']) . '"></a>' : '';
								}
							?>
						</div>
					</div>
				</div>
		  </div>

		  
		  <div class="container">
				
				<div class="zl-user-profile-content">
					<div class="profile-bio margin-bottom-50">
						<h3><?php echo esc_html('Biography', 'zilom'); ?></h3>
						<?php tutor_load_template('profile.bio'); ?>
					</div> 	
					<?php if($is_instructor){ ?>
						<h3><?php echo esc_html('Courses', 'zilom'); ?></h3>
						<?php 
							add_filter('courses_col_per_row', function(){
								return 3;
							});
							tutor_load_template('profile.courses_taken'); 
						?>
					<?php } ?>
				</div>
		  </div>
	</div>
<?php do_action('tutor_student/after/wrap'); ?>

<?php
get_footer();
