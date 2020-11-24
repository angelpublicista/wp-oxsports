<?php
/**
* Template Name: Podcast page
*/
get_header();
?>
<section class="podcast-home-intro box-bg-image row middle-xs" style="background-image:url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/bg-podcast.jpg')">
    <div class="col-12 col-md-3">
        <span class="brand-name">Oxsports nutrition</span>
        <h1 class="intro-title">PODCAST</h1>
    </div>
</section>

<article class="article-main">
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

        <section class="podcast-section">
            <div class="podcast-section__title">
                <h3 class="text">ÚLTIMOS EPISODIOS</h3>
                <hr class="title-line first-line">
                <hr class="title-line last-line">
            </div>

            <?php echo do_shortcode( '[ox_carousel_podcast]' ); ?>
        </section>
    </div>
</article>
<?php
get_footer();