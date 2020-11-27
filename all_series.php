<?php
/**
* Template Name: Series page
*/
get_header();
?>
<section class="podcast-single-intro">
    <div class="container">
        <div class="row middle-xs center-xs">
            <div class="col-12">
                <span class="brand-name">Oxsports nutrition</span>
                <h1 class="intro-title"><?php the_title(); ?></h1>
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

<main class="ox-podcast-main">
    <div class="container">
        <div class="podcast-section ox-all-series-section">
            <?php echo do_shortcode( '[ox_grid_arch_series]' ); ?>
        </div>
    </div>
</main>

<?php
get_footer();