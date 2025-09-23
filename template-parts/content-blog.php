<article class="c-post">
    <div class="c-meta">
        <?php render_colored_category_labels(); ?>
        <time datetime="<?php the_time('Y-m-d'); ?>" class="c-date"><?php the_time('Y/n/j'); ?></time>
    </div>
    <a href="<?php the_permalink(); ?>" class="c-post-thumbnail">
        <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
        <?php else: ?>
        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/thumbnail.png' ); ?>" width="1200"
            height="630" alt="no image" />
        <?php endif; ?>
    </a>
    <h2 class="c-post-title">
        <a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a>
    </h2>
</article>