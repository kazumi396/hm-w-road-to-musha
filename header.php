<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet" />

    <!-- css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />

    <!-- js -->
    <script src="<?php echo get_template_directory_uri(); ?>/js/main.js" defer></script>
    <?php wp_head(); ?>

    <!-- no index -->
    <meta name="robots" content="noindex, nofollow">
</head>

<body>
    <?php wp_body_open(); ?>
    <!-- header -->
    <header class="header">
        <div class="l-container">
            <div class="header-head-inner">
                <p class="header-logo">
                    <a href="<?php echo esc_url(home_url( '/')) ?>">
                        <picture>
                            <source media="(max-width: 519px)"
                                srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo-sp.png' ); ?>" />
                            <source media="(min-width: 520px)"
                                srcset="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>" />
                            <img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>"
                                width="640" height="84" alt="武者への道 Presented by 模写修行" loading="lazy" />
                        </picture>
                    </a>
                </p>

                <div class="header-search">
                    <button action="" class="header-search-button js-open-button">記事検索</button>
                </div>

                <dialog class="header-search-modal js-modal">
                    <button class="header-search-modal-close js-modal-close">
                        <span class="u-visually-hidden">閉じる</span>
                    </button>
                    <p class="header-search-modal-text">キーワードを入力</p>
                    <form class="header-search-form" action="<?php echo esc_url(home_url( '/')) ?>" method="get">
                        <input type="text" name="s" value="<?php the_search_query(); ?>" aria-label="search">
                        <button class="header-search-button-submit">検索する</button>
                    </form>
                </dialog>

                <div class="c-sns">
                    <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-twitter.svg' ); ?>"
                            width="400" height="400" alt="twitter" loading="lazy" />
                    </a>

                    <a href="https://www.google.com/" class="c-sns-icon" target="_blank" rel="noopener noreferrer">
                        <img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-facebook.svg' ); ?>"
                            width="1024" height="1024" alt="facebook" loading="lazy" />
                    </a>
                </div>
            </div>
        </div>

        <nav class="header-nav">
            <div class="l-container">
                <ul class="header-list">
                    <li class="header-item">
                        <a
                            href="<?php echo esc_url( get_category_link( get_category_by_slug('html-css')->term_id ) ); ?>">HTML/CSS</a>
                    </li>
                    <li class="header-item">
                        <a
                            href="<?php echo esc_url( get_category_link( get_category_by_slug('javascript')->term_id ) ); ?>">JavaScript</a>
                    </li>
                    <li class="header-item">
                        <a
                            href="<?php echo esc_url( get_category_link( get_category_by_slug('wordpress')->term_id ) ); ?>">WordPress</a>
                    </li>
                    <li class="header-item">
                        <a
                            href="<?php echo esc_url( get_category_link( get_category_by_slug('web-design')->term_id ) ); ?>">webデザイン</a>
                    </li>
                    <li class="header-item">
                        <a
                            href="<?php echo esc_url( get_category_link( get_category_by_slug('web-production')->term_id ) ); ?>">web制作</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>