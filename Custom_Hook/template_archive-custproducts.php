<?php // File to be placed in the root of wordpress template
get_header();
?>

<?php 


    $terms = get_terms( array(
        'taxonomy' => 'sv_year',
        'hide_empty' => true,
    ));
    $output = '';
    foreach($terms as $term) {
        $output .= $term->name . '<br />';
    }
    echo $output;

    $args = array('post_type' => 'custproduct', 'posts_per_page' => 10);
    $loop = new WP_Query( $args );

    while( $loop->have_posts() ) : $loop->the_post(); ?>
        
        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        
        <?php echo '<div class="entry-content">';
        the_content();
        echo '</div>'; 
    endwhile;
?>

<?php get_sidebar('cust-products'); ?>


<?php get_footer();
