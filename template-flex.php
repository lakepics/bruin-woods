<?php
/**
 * Template Name: Flex Template
 */
?>

    <?php while (have_posts()) : the_post(); ?>

    <?php

// refactoring common layout functions
function colBalance($col_bal) {
            if ( $col_bal == '4-8' ) { $lt = 4; $rt = 8; }
            elseif ($col_bal == '5-7') { $lt = 5; $rt = 7; }
            elseif ($col_bal == '6-6') { $lt = 6; $rt = 6; }
            elseif ($col_bal == '7-5') { $lt = 7; $rt = 5; }
            elseif ($col_bal == '8-4') { $lt = 8; $rt = 4; }
            elseif ($col_bal == '12-12') { $lt = 12; $rt = 12; }
            return array($lt, $rt);
}

// check if the flexible content field has rows of data
if( have_rows('flex_content') ):

     // loop through the rows of data
    while ( have_rows('flex_content') ) : the_row();

        if( get_row_layout() == 'hero' ):

            $hero_image = get_sub_field('hero_image');
            $section_title = get_sub_field('section');
            $heading_antiqua = get_sub_field('heading_antiqua');
            $heading_proxima = get_sub_field('heading_proxima');
            $subheading = get_sub_field('heading_h2');
            $col_bal = get_sub_field('column_balance');
            $copy_lt = get_sub_field('copy_lt');
            $copy_rt = get_sub_field('copy_rt');

            list($lt_col, $rt_col) = colBalance($col_bal);

            echo '<div class="hero__background-image" style="background-image: url(\'' . $hero_image['url'] . '\');"><div class="container hero">
                <div class="row">';
                if ( $lt_col == 12 ) {
                    echo '<div class="col-sm-12 hero__text-container">
                        <span class="section-type">' . $section_title . '</span>
                        <h1>' . $heading_antiqua . '<span>' . $heading_proxima . '</span></h1>
                        <h2 class="blue antiqua">' . $subheading . '</h2>' .
                        $copy_lt . '
                    </div>';
                }
            else {
                    echo '<div class="col-sm-'.$lt_col.' hero__text-container">
                        <span class="section-type">' . $section_title . '</span>
                        <h1>' . $heading_antiqua . '<span>' . $heading_proxima . '</span></h1>
                        <h2 class="blue antiqua">' . $subheading . '</h2>' .
                        $copy_lt . '
                    </div>
                    <div class="col-sm-'.$rt_col.'">'.$copy_rt.'</div>';
            }
             echo   '</div>
            </div>
        </div>';

        elseif( get_row_layout() == '100_2col' ):

            $background_image = get_sub_field('background_image');
            $heading_lt = get_sub_field('heading_lt');
            $copy_lt = get_sub_field('copy_lt');
            $heading_rt = get_sub_field('heading_rt');
            $copy_rt = get_sub_field('copy_rt');
            $col_bal = get_sub_field('column_balance');

            $text_style = get_sub_field('text_style');
            if ( $text_style == 0 ) { $h2_antiqua_color = 'blue'; $h2_proxima_color = 'gold'; }
            elseif ( $text_style == 1 ) { $h2_antiqua_color = 'gold'; $h2_proxima_color = 'gold'; $copy_color = 'white'; }


            list($lt_col, $rt_col) = colBalance($col_bal);
            // layout goes below

            echo '<div class=" content-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container content-section">
                    <div class="row">
                        <div class="col-sm-'.$lt_col.'">
                            <h2 class="'.$h2_antiqua_color.' antiqua">' . $heading_lt . '</h2><span class="$copy_color">' .
                            $copy_lt . '</span>
                            </div>
                        <div class="col-sm-'.$rt_col.'">
                            <h2 class="'.$h2_antiqua_color.' antiqua">' . $heading_rt . '</h2><span class="$copy_color">' .
                            $copy_rt . '</span>
                        </div>
                    </div>
                </div>
            </div>';

        elseif( get_row_layout() == '100_family' ):

            $background_image = get_sub_field('background_image');
            $holiday_name = get_sub_field('heading_antiqua');
            $holiday_dates = get_sub_field('heading_proxima');
            $arrival = get_sub_field('arrival');
            $departure = get_sub_field('departure');
            $rate_explanation = get_sub_field('rate_explanation');
            $adult_rate = get_sub_field('adult_rate');
            $ya_rate = get_sub_field('ya_rate');
            $child_rate = get_sub_field('child_rate');
            $notice = get_sub_field('waitlist_notice');
            $holiday_full = get_sub_field('holiday_full');
            $program_charts_url = get_sub_field('program_charts_url');

            // layout goes below

            echo '<div class="family-holidays family-holidays__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container family-holidays">
                    <div class="row">';
                                $content_faces = get_sub_field('content_faces');
            if ( $content_faces == left ) {
                echo    '<div class="col-sm-7">
                            <h2 class="blue antiqua">' . $holiday_name . '<span class="gold proxima">' .
                            $holiday_dates . '</span></h2>';
                    echo   '<div class="row">
                                <div class="col-sm-7"><span class="proxima family-holidays__pr">Arrive:</span> '. $arrival.'</div>
                                <div class="col-sm-7"><span class="proxima">Depart:</span> '. $departure .'</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">'.$rate_explanation.'</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 family-holidays__pr"><span class="proxima">Adults:</span> '.$adult_rate.'</div>
                                <div class="col-sm-7 family-holidays__pr"><span class="proxima">3 Years Old — 10<sup>th</sup> Grade:</span> '.$ya_rate.'</div>
                                <div class="col-sm-7 text-left"><span class="proxima">Under 3 Years Old:</span> '.$child_rate.'</div></div>';
                                     if ( $holiday_full == false ) {
                                        echo '<div class="row"><div class="col-sm-12"><a class="button button--blue" href="/family-holidays/apply/">Apply Today! &nbsp; <span class="fa fa-chevron-right" aria-hidden="true"></span></a></div></div>';
                                        }
                                    elseif ( $holiday_full == true ) {
                                        echo '<div class="row"><div class="col-sm-12 family-holidays__notice">'.$notice.'</div></div>';
                                        }
                                    if ( !empty($program_charts_url) ) {
                                        echo '<div class="row"><div class="col-sm-12"><a class="button button--blue" target="_blank" href="'.$program_charts_url.'">Download Program Chart &nbsp; <span class="fa fa-download" aria-hidden="true"></span></a></div></div>';
                                    }
                        echo '
                        </div>
                        <div class="col-sm-5">
                        </div>';
            }
            else {
                echo    '<div class="col-sm-5"></div>

                        <div class="col-sm-7 text-right">
                            <h2 class="blue antiqua">' . $holiday_name . '<span class="gold proxima">' .
                            $holiday_dates.'</span></h2>
                       <div class="row">
                                <div class="col-sm-7 col-sm-offset-5 text-right"><span class="proxima">Arrive:</span> '. $arrival.'</div>
                                <div class="col-sm-7 col-sm-offset-5 text-right"><span class="proxima">Depart:</span> '. $departure .'</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-7 col-sm-offset-5 text-right"><span class="proxima">Adults:</span> '.$adult_rate.'</div>
                                <div class="col-sm-7 col-sm-offset-5 text-right"><span class="proxima">3 Years Old — 10<sup>th</sup> Grade:</span> '.$ya_rate.'</div>
                                <div class="col-sm-7 col-sm-offset-5 text-right"><span class="proxima">Under 3 Years Old:</span> '.$child_rate.'</div>
                            </div></div>';
                                    if ( $holiday_full == false ) {
                                        echo '<div class="row"><div class="col-sm-12 text-right"><a class="button button--blue" href="/family-holidays/apply/">Apply Today! &nbsp; <span class="fa fa-chevron-right" aria-hidden="true"></span></a></div></div>';
                                        }
                                    elseif ( $holiday_full == true ) {
                                        echo '<div class="row"><div class="col-sm-12 family-holidays__notice">'.$notice.'</div></div>';
                                        }
                                    if ( !empty($program_charts_url) ) {
                                        echo '<div class="row"><div class="col-sm-12 text-right"><a class="button button--blue" target="_blank" href="'.$program_charts_url.'">Download Program Chart &nbsp; <span class="fa fa-chevron-right" aria-hidden="true"></span></a></div></div>';
                                    }
            }

            echo '   </div>
                </div>
            </div>';

        elseif( get_row_layout() == '80_center' ):

            $button = get_sub_field('button');
            $background_image = get_sub_field('background_image');
            $h2_antiqua = get_sub_field('h2_antiqua');

        	echo '<div class="container">
                            <div class="row">
                            <div class="col-8-sm text-center">
                                <div class="col-12 front-page__heading">';
                                if (!empty($h2_antiqua)) {
                                    echo '<h2 class="blue antiqua">' . $h2_antiqua . '<br><span class="gold proxima">' . get_sub_field('h2_proxima') . '</span></h2>'; }
                                echo '</div>
                                <div class="col-12 front-page__softbox-content">
                                    <p>' . get_sub_field('copy') . '</p>';
                                    if (!empty($button)) {
                                        echo '<a class="button button--blue" target="' . $button['target']. '" href="' . $button['url'] . '">' . $button['title'] . ' <span class="fa fa-chevron-right" aria-hidden="true"></span></a>';
                                    }
                                echo '</div>
                                </div>
                            </div>
                        </div>';


        elseif( get_row_layout() == '100_2col_rt' ):

            $background_image = get_sub_field('background_image');
            $table = get_sub_field('table');
            // layout goes below
            echo '<div class="table-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container table-section">
                    <div class="row">
                        <div class="col-sm-6"></div>
                        <div class="col-sm-6">';
                // loop over tables
                if ( have_rows('table')) :
                    while ( have_rows ('table')) : the_row();
                    $heading = get_sub_field('heading');
                    $sub_heading = get_sub_field('sub_heading');
                    echo '<div class="row"><div class="col-sm-12 no-padding"><h2 class="blue proxima">' . $heading . '</h2>';
                        if ( $sub_heading ) { echo '<p class="subhead">'.$sub_heading.'</p>'; }
                        echo '</div>';
                        // count how many cells we're working with
                        $count = count(get_sub_field('cells'));
                        // calculate the half way point
                        $half = ceil((($count / 2) - 1));
                        // loop over cells
                        if ( have_rows ('cells')) :
                            $i = 0;
                            echo '<div class="col-sm-6 cell__wrapper">';
                            while ( have_rows ('cells')) : the_row();
                            $left_cell = get_sub_field('left_cell');
                            $right_cell = get_sub_field('right_cell');
                            // layout table below
                                echo '<div class="row table-section__row"><div class="col-xs-7 cell cell--reverse cell--left">' . $left_cell . '</div><div class="col-xs-5 cell cell--right">' . $right_cell . '</div></div>';
                                if ( $i == $half ) { echo '</div><div class="col-sm-6 cell__wrapper">'; }
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

        elseif( get_row_layout() == '100_2col_lt' ):

            $background_image = get_sub_field('background_image');
            $table = get_sub_field('table');
            // layout goes below
            echo '<div class="table-section__background-image" style="background-image: url(\'' . $background_image['url'] . '\');"><div class="container table-section">
                    <div class="row">
                        <div class="col-sm-6">';
                // loop over tables
                if ( have_rows('table')) :
                    while ( have_rows ('table')) : the_row();
                    $heading = get_sub_field('heading');
                    echo '<div class="row"><div class="col-sm-12 no-padding"><h2 class="blue proxima">' . $heading . '</h2></div>';
                        // count how many cells we're working with
                        $count = count(get_sub_field('cells'));
                        // calculate the half way point
                        $half = ceil((($count / 2) - 1));
                        // loop over cells
                        if ( have_rows ('cells')) :
                            $i = 0;
                            echo '<div class="col-sm-6 cell__wrapper">';
                            while ( have_rows ('cells')) : the_row();
                            $left_cell = get_sub_field('left_cell');
                            $right_cell = get_sub_field('right_cell');
                            // layout table below
                                echo '<div class="row table-section__row"><div class="col-xs-7 cell cell--reverse cell--left">' . $left_cell . '</div><div class="col-xs-5 cell cell--right">' . $right_cell . '</div></div>';
                                if ( $i == $half ) { echo '</div><div class="col-sm-6 cell__wrapper">'; }
                            $i++;
                            endwhile;
                            echo '</div>';
                        endif;
                        echo '</div>';
                    endwhile;
                endif;

            echo        '</div>
                    </div>
                                            <div class="col-sm-6"></div>
                </div>
            </div>';

        elseif( get_row_layout() == 'masonry_gallery' ):
            //setup container here
            if (have_rows('gallery')) :
                // let's build a snowman
                // setup container and masonry scaffolding
                echo '<div class="masonry-grid"><div class="grid"><div class="grid-sizer"></div>';
                    // start pulling in images
                while (have_rows('gallery')) : the_row();
                    $image = get_sub_field('image');
                    $factor = get_sub_field('format_size');
                    echo '<div class="grid-item grid-item--'.$factor.'"><img src="'.$image['url'].'" alt="'.$image['alt'].'"></div>';
                endwhile;
                echo '</div></div>';
                echo '</div></div>';
            endif;

        elseif( get_row_layout() == '100_gallery' ):
            // setup container here
            if ( have_rows('images')) :
                echo '<div class="container-fluid activities-grid"><div class="row">';
                $i = 0;
                while (have_rows('images')) : the_row();
                $width = get_sub_field('width');
                $label = get_sub_field('label');
                $image = get_sub_field('image');

                    if( !empty($image) ):
                        $image_url = $image['url'];
                        $image_alt = $image['alt'];
                    endif;

                    $i = $i + $width;
                // layout goes below

                    echo '<div class="col-sm-' . $width . ' image-wrapper no-padding"><img class="img-responsive" src="' . $image_url . '" alt="' . $image_alt . '"><span class="mountain-background"><p>' . $label . '</p></span></div>';
                    if (($i % 12) == 0) { echo '</div><div class="row">'; }

                endwhile;
                echo '</div></div>';
            endif;

        endif;

    endwhile;

else :

    // no layouts found

endif;

?>

        <?php endwhile; ?>
