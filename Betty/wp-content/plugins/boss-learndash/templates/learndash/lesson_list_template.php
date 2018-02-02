<?php
/**
 * Lesson Topis
 */
$topics		 = apply_filters( 'boss_edu_topic_list', learndash_get_topic_list( get_the_ID() ) );
$in_progress = false;

if ( empty( $topics[0]->ID ) ) {
    return '';
}

$topics_progress = learndash_get_course_progress( $user_id, $topics[0]->ID );

if ( ! empty( $topics_progress['posts'][0] ) ) {
    $topics = $topics_progress['posts'];
}

if ( !empty( $topics ) ) {
	foreach ( $topics as $key => $topic ) {
		if ( !empty( $topic->completed ) ) {
			$in_progress = true;
		}
	}
}

$lesson_completed	 = !learndash_is_lesson_notcomplete( get_current_user_id(), array( get_the_ID() => 1 ) );
$lesson_status		 = ($lesson_completed) ? 'completed' : 'notcompleted';
?>

<div class="lesson ld-item post-<?php the_ID(); ?> <?php echo (empty( $topics )) ? 'no-topics' : 'has-topics' ?>">
    <h2>
        <a class="<?php echo ($in_progress && $lesson_status == 'notcompleted') ? 'in-progress' : $lesson_status; ?>" href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>
    </h2>
</div>