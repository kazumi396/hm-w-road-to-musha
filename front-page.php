<?php get_header(); ?>
<main>
    <!-- top-kv -->
    <?php
		$pickup         = wp_get_nav_menu_items( 'pickup' );
		$pickup_post_id = isset( $pickup[0]->object_id ) ? $pickup[0]->object_id : null;

		if ( $pickup_post_id ) :
			$item          = $pickup[0];
			$pickup_post   = get_page( $pickup_post_id );
			$post_category = get_the_category( $pickup_post_id );
			$thumbnail_id  = get_post_thumbnail_id( $pickup_post_id );
			?>
    <div class="top-kv">
        <div class="l-container">
            <div class="top-kv-inner">
                <article class="top-kv-recommend">
                    <a href="<?php echo esc_attr( $item->url ); ?>" class="top-kv-recommend-link">
                        <div class="top-kv-recommend-thumbnail">
                            <?php the_post_thumbnail( $thumbnail_id ); ?>
                        </div>

                        <div class="top-kv-recommend-body">
                            <?php render_colored_category_labels( $pickup_post_id ); ?>
                            <h2 class="top-kv-recommend-title"><?php echo esc_html( $pickup_post->post_title ); ?>
                            </h2>
                            <div class="top-kv-recommend-date">
                                <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="c-date">
                                    <?php echo mysql2date( 'Y-m-d', $pickup_post->post_date ); ?>
                                </time>
                            </div>
                        </div>
                    </a>
                </article>

                <div class="top-kv-character">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-character.png' ); ?>"
                        width="400" height="569" alt="おすすめの記事" />
                </div>
            </div>
        </div>

        <div class="top-kv-treat">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/img-kv-treat.png' ); ?>" width="500"
                height="172" alt="" />
        </div>
    </div>
    <!-- end top-kv -->
    <?php endif; ?>

    <?php if (have_posts()) : ?>
    <div class="u-ptb">
        <div class="l-container">
            <!-- posts -->
            <div class="c-posts c-posts--col3">
                <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('template-parts/content', 'blog'); ?>
                <?php endwhile; ?>
            </div>
            <!-- end posts -->

            <!-- pagination -->
            <?php if(function_exists('wp_pagenavi')): ?>
            <div class="pagination">
                <?php wp_pagenavi(); ?>
            </div>
            <?php endif; ?>
            <!-- end pagination -->
        </div>
    </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>