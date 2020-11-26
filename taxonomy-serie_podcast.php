<?php

get_header();
$serie_info = ox_info_series();
?>
<section class="podcast-single-intro">
    <div class="container">
        <div class="row middle-xs center-xs">
            <div class="col-12">
                <span class="brand-name">Oxsports nutrition</span>
                <h1 class="intro-title"><?php the_archive_title(); ?></h1>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <div class="breadcrumbs-podcast">
        <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
            <?php
            if(function_exists('bcn_display'))
            {
            bcn_display();
            }?>
        </div>
    </div>
</div>

<section class="podcast-section">
    <div class="container">
        <?php 
            $cate = get_queried_object();
            $cateID = $cate->term_id;

            $seasons_serie = get_term_children($cateID, "serie_podcast");
        ?>
        <div class="podcast-section__title">
            <h3 class="text">ÚLTIMOS EPISODIOS</h3>
            <hr class="title-line first-line">
            <hr class="title-line last-line">
        </div>

        <?php echo do_shortcode( '[ox_carousel_podcast tax_query='.$cateID.']' ); ?>
    </div>
</section>

<?php if($seasons_serie): ?>
    <section class="podcast-section">
        <div class="container">
            <div class="podcast-section__title">
                <h3 class="text">TEMPORADAS</h3>
                <hr class="title-line first-line">
                <hr class="title-line last-line">
            </div>

            <ul id="my-accordion" class="accordion-js accordion-season">
                <?php foreach(array_reverse($seasons_serie) as $season_serie): ?>
                    <?php $term_name = get_term( $season_serie )->name; ?>
                    <li>
                        <div><?php echo $term_name; ?> <i class="fas fa-chevron-down"></i></div>
                        <div>
                            <?php echo do_shortcode( '[ox_grid_seasons id_query='.$season_serie.']' ); ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
<?php endif; ?>

<section class="podcast-section ox-bg-primary" id="more-series">
    <div class="container">
        <div class="podcast-section__title">
            <h3 class="text">OTRAS SERIES</h3>
            <hr class="title-line first-line">
            <hr class="title-line last-line">
        </div>
        <?php echo do_shortcode( '[ox_carousel_more_series]' ); ?>
    </div>
</section>

<?php
get_footer();