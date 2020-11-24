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
    <section class="social-section box-bg-image" style="background-image: url('<?php echo get_stylesheet_directory_uri() ?>/assets/img/bg-siguenos.jpg')">
        <div class="container">
            <h2 class="social-section__title">SÍGUENOS</h2>
            <p class="social-section__subtitle">En las plataformas digitales</p>
        </div>
        <div class="social-section__buttons">
            <ul class="social-section__buttons__list">
                <?php if(get_field('spotify')): ?> 
                    <li><a href="<?php the_field('spotify'); ?>" class="social-section__buttons__list__btn btn-spotify" target="_blank"><i class="fab fa-spotify"></i> <span class="name-social">Spotify</span></a></li>
                <?php endif; ?>

                <?php if( get_field('deezer')): ?> 
                    <li><a href="<?php the_field('deezer'); ?>" class="social-section__buttons__list__btn btn-deezer" target="_blank"><i class="fab fa-deezer"></i> <span class="name-social">Deezer</span></a></li>
                <?php endif; ?>

                <?php if( get_field('sound_cloud')): ?> 
                    <li><a href="<?php the_field('sound_cloud'); ?>" class="social-section__buttons__list__btn btn-soundcloud" target="_blank"><i class="fab fa-soundcloud"></i> <span class="name-social">Sound Cloud</span></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</article>
<?php
get_footer();