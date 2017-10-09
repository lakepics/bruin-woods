<?php
/**
 * Template Name: Flex Template
 */
?>

    <?php while (have_posts()) : the_post(); ?>

    <?php

// check if the flexible content field has rows of data
if( have_rows('flex_content') ):

     // loop through the rows of data
    while ( have_rows('flex_content') ) : the_row();

        if( get_row_layout() == 'hero' ):

            $hero_image = get_sub_field('hero_image');
            $section_title = get_sub_field('section');
            $heading_antiqua = get_sub_field('heading_antiqua');
            $heading_proxima = get_sub_field('heading_proxima');
            $subheading_proxima = get_sub_field('heading_h2');
            $copy = get_sub_field('copy');


            echo '<div class="hero__background-image" style="background-image: url(\'' . $hero_image['url'] . '\');"><div class="container hero">
                <div class="row">
                    <div class="col-6 hero__text-container">
                        <span class="section-type">' . $section_title . '</span>
                        <h1>' . $heading_antiqua . '<br><span>' . $heading_proxima . '</span></h1>
                        <h2>' . $subheading . '</h2>' .
                        $copy . '
                    </div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div>';

        elseif( get_row_layout() == '100_2col_rc' ):

            $background_image = get_sub_field('background_image');
            $heading = get_sub_field('heading');
            $copy = get_sub_field('copy');

            // layout goes below

            echo '<div class=" content-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container content-section">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6 fade-left-background">
                            <h2 class="blue antiqua">' . $heading . '</h2>' .
                            $copy . '
                        </div>
                    </div>
                </div>
            </div>';

        elseif( get_row_layout() == '100_2col_lc' ):

            $background_image = get_sub_field('background_image');
            $heading = get_sub_field('heading');
            $copy = get_sub_field('copy');

            echo '<div class="content-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container content-section">
                    <div class="row">
                        <div class="col-6 fade-right-background">
                            <h2 class="blue antiqua">' . $heading . '</h2>' .
                            $copy . '
                        </div>
                        <div class="col-6"></div>
                    </div>
                </div>
            </div>';

        elseif( get_row_layout() == '100_2col_rc66' ):

            $background_image = get_sub_field('background_image');
            $heading = get_sub_field('heading');
            $copy = get_sub_field('copy');

            // layout goes below

            echo '<div class="content-section__background-image--offset-right" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container content-section">
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-8">
                            <h2 class="blue antiqua">' . $heading . '</h2>' .
                            $copy . '
                        </div>
                    </div>
                </div>
            </div>';


        elseif( get_row_layout() == '100_2col_rt' ):

            $background_image = get_sub_field('background_image');
            $table = get_sub_field('table');
            // layout goes below
            echo '<div class="table-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container table-section">
                    <div class="row">
                        <div class="col-6"></div>
                        <div class="col-6">';
                // loop over tables
                if ( have_rows('table')) :
                    while ( have_rows ('table')) : the_row();
                    $heading = get_sub_field('heading');
                    echo '<div class="row"><div class="col-12 p-0"><h2 class="blue proxima">' . $heading . '</h2></div>';
                        // count how many cells we're working with
                        $count = count(get_sub_field('cells'));
                        // calculate the half way point
                        $half = ceil((($count / 2) - 1));
                        // loop over cells
                        if ( have_rows ('cells')) :
                            $i = 0;
                            echo '<div class="col-6 cell__wrapper">';
                            while ( have_rows ('cells')) : the_row();
                            $left_cell = get_sub_field('left_cell');
                            $right_cell = get_sub_field('right_cell');
                            // layout table below
                                echo '<div class="row"><div class="col-7 cell cell--reverse cell--left">' . $left_cell . '</div><div class="col-5 cell cell--right">' . $right_cell . '</div></div>';
                                if ( $i == $half ) { echo '</div><div class="col-6 cell__wrapper">'; }
                            $i++;
                            endwhile;
                            echo '</div>';
                        endif;
                        echo '</div>';
                    endwhile;
                endif;

            echo        '</div>
                    </div>
                </div>
            </div>';


        elseif( get_row_layout() == '100_gallery' ):
            // setup container here
            if ( have_rows('images')) :
                echo '<div class="container-fluid activities-grid">';
                while (have_rows('images')) :
                $width = get_sub_field('width');
                $image_url = get_sub_field('image[url]');
                $image_alt = get_sub_field('image[alt]');
                $label = get_sub_field('label');

                // layout goes below

                    echo '<div class="col-' . $width . '"><img src="' . $image_url . '" alt="' . $image_alt . '"><span class="mountain-background">' . $label . '</span></div>';

                endwhile;
                echo '</div>';
            endif;

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>

        <?php endwhile; ?>
