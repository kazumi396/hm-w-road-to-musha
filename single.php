<?php get_header(); ?>
<main class="u-ptb">
    <div class="l-container-s">
        <!-- single-article -->
        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="single-article">
            <div class="c-meta">
                <?php render_colored_category_labels(); ?>
                <time datetime="<?php the_time('Y-m-d'); ?>" class="c-date"><?php the_time('Y/n/j'); ?></time>
            </div>

            <div class="single-title">
                <h1 class="c-title-level1"><?php echo esc_html(get_the_title()); ?></h1>
            </div>

            <div class="single-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="single-contents">
                <?php the_content(); ?>
            </div>

            <a href="https://www.google.com/" target="_blank" class="single-banner" rel="noopener noreferrer">
                <picture>
                    <source media="(max-width: 767px)"
                        srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner-sp.png' ); ?>" />
                    <source media="(min-width: 768px)"
                        srcset="<?php echo esc_url( get_template_directory_uri() . '/img/banner.png' ); ?>" />
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/banner.png' ); ?>" width="1520"
                        height="338" alt="模写修行 駆け出しエンジニアのためのコーディング練習教材 詳しくはこちら" />
                </picture>
            </a>
        </article>
        <?php endwhile; ?>
        <?php endif; ?>
        <!-- end single-article -->

        <aside class="single-recommend">
            <h2 class="single-recommend-title">おすすめ記事</h2>

            <div class="single-recommend-posts">
                <div class="c-posts c-posts--col2">
                    <?php
                    $args = [
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'orderby' => 'rand',
                        'post__not_in' => [ get_the_ID() ],
                        'category__in' => wp_get_post_categories( get_the_ID() ),
                    ];
                    $latest_query = new WP_Query($args);

                    if ( $latest_query->have_posts()):
                        while ($latest_query->have_posts()): $latest_query->the_post();
                            get_template_part('template-parts/content', 'blog');
                        endwhile;
                        wp_reset_postdata();
                        endif;
                    ?>

                </div>
            </div>
        </aside>
        <!-- end single-recommend -->
    </div>
</main>
<?php get_footer(); ?>