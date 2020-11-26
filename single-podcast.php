<?php

get_header();
$serie_info = ox_info_series();
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

<section class="ox-podcast-main">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-9">
                <div class="ox-info-bar">
                    <a href="<?php echo $serie_info['link_serie']; ?>" class="ox-info-bar__serie__link"><span class="ox-info-bar__serie__name"><i class="fas fa-tv"></i> <?php echo $serie_info['name_serie']; ?> - <strong><?php echo $serie_info['name_season']; ?></strong></span></a>
                    <span class="ox-info-bar__date"><i class="far fa-clock"></i> <?php echo get_the_date('F j, Y'); ?></span>
                </div>
                <article class="ox-podcast-content">
                    <?php the_content(); ?>

                    <div class="ox-share-section">
                        <h5>¿Te gustó este Podcast? <span class="text-primary">Compártelo</span></h5>
                        <ul class="ox-share-section__nav">
                            <li class="ox-share-section__nav__item facebook"><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" class="button-icon" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="ox-share-section__nav__item twitter"><a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>"  class="button-icon" target="_blank"><i class="fab fa-twitter" target="_blank"></i></a></li>
                            <li class="ox-share-section__nav__item linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" class="button-icon" target="_blank"><i class="fab fa-linkedin-in" target="_blank"></i></a></li>
                            <li class="ox-share-section__nav__item pinterest"><a href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>" class="button-icon" target="_blank"><i class="fab fa-pinterest" target="_blank"></i></a></li>
                            <li class="ox-share-section__nav__item mail"><a href="mailto:info@example.com?&subject=&body=<?php the_permalink(); ?> " class="button-icon" target="_blank"><i class="far fa-envelope"></i></a></li>
                        </ul>
                    </div>

                    <!-- Pagination -->
                    <div class="ox-pagination">
                        <?php
                            the_post_navigation(array(
                                'prev_text'                  => __( 'Anterior' ),
                                'next_text'                  => __( 'Siguiente' ),
                                'screen_reader_text' => __( 'Continuar leyendo', 'master-template-woo' )
                            ));
                        ?>
                    </div>

                    <!-- Comments section -->
                    <div class="ox-fb-comments">
                        <?php echo do_shortcode( '[gs-fb-comments]' ); ?>
                    </div>
                </article>

                <?php $podcast_cat = wp_get_post_categories(get_the_ID());
                    $imp_podcast_cat = implode(",", $podcast_cat);
                ?>

                <?php if($imp_podcast_cat): ?>
                    <section class="ox-releated-podcast podcast-section">
                        <div class="podcast-section__title">
                            <h3 class="text">TE PUEDE INTERESAR</h3>
                            <hr class="title-line first-line">
                            <hr class="title-line last-line">
                        </div>
                        <?php echo do_shortcode( '[ox_carousel_podcast show_in_carousel=3 category__in='.$imp_podcast_cat.']' ); ?>
                    </section>
                <?php endif; ?>
            </div>
            <div class="col-xs-12 col-md-3">
                <?php get_sidebar( 'podcast' ); ?>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();