<?php
/*
Template Name: First Child Redirect
*/
$pagekids = get_pages("child_of=".$post->ID."&sort_column=menu_order");
if ($pagekids) {
$firstchild = $pagekids[0];
wp_redirect(get_permalink($firstchild->ID));
} else {
// Do whatever templating you want as a fall-back.
    while (have_posts()) : the_post();
    echo '<div class="container"><h1>This template only redirects to a child page. Select a different template to create content</h1></div>';
    endwhile;
}
?>
