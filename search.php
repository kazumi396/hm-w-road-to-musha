<?php get_header(); ?>
<main>
    <!-- page-kv -->
    <div class="c-page-kv">
        <div class="l-container">
            <h1 class="c-title-level1">『<?php the_search_query(); ?>』の検索結果</h1>
        </div>
    </div>
    <!-- end page-kv -->
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
    <?php else: ?>
    <div class="u-ptb">
        <div class="l-container">
            <p>『<?php the_search_query(); ?>』の検索結果が見つかりませんでした</p>
        </div>
    </div>
    <?php endif; ?>
</main>
<?php get_footer(); ?>