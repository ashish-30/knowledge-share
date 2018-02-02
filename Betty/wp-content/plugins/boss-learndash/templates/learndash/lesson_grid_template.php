<?php
/**
 * This file contains the code that displays the lesson grid.
 */

global $post, $bp;

$post_id			 = $post->ID;
$post_title			 = $post->post_title;
$user_info			 = get_userdata( absint( $post->post_author ) );
$author_link		 = !$bp ? get_author_posts_url( absint( $post->post_author ) ) : bp_core_get_user_domain( absint( $post->post_author ) );
$author_avatar		 = get_avatar( $post->post_author, 75 );
$author_display_name = $user_info->display_name;
$author_id			 = $post->post_author;
$button_text         =  __( 'See more...', 'boss-learndash' );
$class               = '';

?>

<div class="<?php echo esc_attr( join( ' ', get_post_class( array( 'course', 'post' ), $post_id ) ) ); ?>">

    <div class="course-inner">
        <div class="course-image">
            <div class="course-overlay">
                <a href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo esc_attr( $post_title ); ?>" class="bb-course-link">
                    <span class="play"><i class="fa fa-play"></i></span>
                </a>
                <a href="<?php echo $author_link; ?>" title="<?php echo esc_attr( $author_display_name ); ?>">
                    <?php echo $author_avatar; ?>
                </a>
            </div>

            <?php if( has_post_thumbnail( $post_id ) ) :?>
                <a href="<?php the_permalink( $post_id ); ?>" class="course-cover-image">
                    <?php echo get_the_post_thumbnail( $post_id, 'course-archive-thumb', array( 'class' => 'woo-image thumbnail alignleft' ) ); ?>
                </a>
            <?php else :?>
                <a href="<?php the_permalink(); ?>" class="course-cover-image">
                    <img alt="" src="http://placehold.it/360x250&text=<?php echo LearnDash_Custom_Label::get_label( 'lesson' ) ?>"/>
                </a>
            <?php endif;?>
        </div><!-- .course-inner -->

        <section class="entry">
            <div class="course-flexible-area">
                <header>
                    <h2><a href="<?php echo get_permalink( $post_id ); ?>" title="<?php echo esc_attr( $post_title ); ?>"><?php echo mb_strimwidth( $post_title, 0, 80, '...' ); ?></a></h2>
                </header>

                <p class="sensei-course-meta">
                    <span class="course-author"><?php _e( 'by ', 'boss-learndash' ); ?><a href="<?php echo $author_link; ?>" title="<?php echo esc_attr( $author_display_name ); ?>"><?php echo esc_html( $author_display_name ); ?></a></span>
                </p>
            </div>

            <div class="sensei-course-meta">
                <p class="ld_course_grid_button"><a class="button" role="button" href="<?php the_permalink( $post_id ); ?>" rel="bookmark"><?php echo esc_attr( $button_text ); ?></a></p>
            </div>
        </section><!-- .entry -->

    </div>

</div>