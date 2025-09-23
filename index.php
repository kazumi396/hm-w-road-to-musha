<?php get_header(); ?>
<main>
    <!-- page-kv -->
    <div class="c-page-kv">
        <div class="l-container">
            <h1 class="c-title-level1 c-title-level1--center">ページが見つかりません</h1>
        </div>
    </div>
    <!-- end page-kv -->

    <div class="u-ptb">
        <div class="l-container-s">
            <p class="error-text">
                <span>お探しのコンテンツは存在しないか、テンプレートが未対応の可能性があります。</span>
            </p>

            <div class="error-button">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="c-button c-button--size-medium">トップへ</a>
            </div>
        </div>
    </div>
</main>
<?php get_footer(); ?>