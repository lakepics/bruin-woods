<?php
/**
 * Template Name: Front Page Template
 */
?>

<?php while (have_posts()) : the_post(); ?>


<?php

// check if the flexible content field has rows of data
if( have_rows('page_content') ):

 	// loop through the rows of data
    while ( have_rows('page_content') ) : the_row();

        if( get_row_layout() == 'centered_h2_3_columns' ):

              echo '<div class="container">
                    <div class="row front-page__content">
                        <div class="col-md-12 text-center front-page__heading">
                            <h2 class="blue antiqua">' .
                            get_sub_field('h2_antiqua') .
                            '<span class="proxima gold"> ' .
                            get_sub_field('h2_proxima') .
                            '</span>
                            </h2>
                        </div>';

                    echo '<div class="col-md-12">' .
                            get_sub_field('full_width_text_column') .
                         '</div>';

        	// check if the nested repeater field has rows of data
            if( have_rows('columns') ):

			 	// loop through the rows of data
			    while ( have_rows('columns') ) : the_row();

					$heading = get_sub_field('heading');
                    $copy = get_sub_field('copy');
                    $link = get_sub_field('round_button');

					echo '<div class="front-page__columns col-sm-4">
                            <h3>' . $heading . '</h3>' .
                            $copy .
                            '<a class="button button--round button--blue" href="' . $link['url'] . '">' . $link['title'] . '</a>
                          </div>';

				endwhile;

            endif;

            echo '</div>'; // close row
            echo '</div>'; // close container

        elseif( get_row_layout() == '80_center' ):
            $button = get_sub_field('button');
            $background_image = get_sub_field('background_image');

        	echo '<div class="front-page__background-image" style="background-image: url(\'' . $background_image['url'] . '\');">
                        <div class="container front-page__map-section">
                            <div class="row">
                            <div class="col-sm-8 col-sm-offset-2 text-center">

                                <div class="front-page__softbox">
                                <div class="col-sm-12 front-page__heading">
                                    <h2 class="blue antiqua">' . get_sub_field('h2_antiqua') . '<br><span class="gold proxima">' . get_sub_field('h2_proxima') . '</span></h2>
                                </div>
                                <div class="col-sm-12 front-page__softbox-content"><p>' .
                                    get_sub_field('copy') .
                                    '</p><a class="button button--blue" target="' . $button['target']. '" href="' . $button['url'] . '">' . $button['title'] . ' <span class="fa fa-chevron-right" aria-hidden="true"></span></a>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>';
        endif;

    endwhile;

else :

    // no layouts found

endif;

?>


<?php endwhile; ?>
