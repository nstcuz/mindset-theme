<?php
$args = array(
		    'taxonomy'       => 'fwd-testimonial',
        'post_type'      => 'fwd-testimonial',
        'posts_per_page' => 1,
        'orderby'        => 'rand'
	);

    $query = new WP_Query( $args );
    if($query -> have_posts()) {
      while($query -> have_posts()){
       $query -> the_post(); 
        ?>
      <article>
      <h3><?php the_title(); ?></h3>
            <?php the_content();?>
      </article>
        <?php
        }
      wp_reset_postdata();
    };