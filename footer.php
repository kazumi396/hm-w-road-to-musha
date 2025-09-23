        <!-- breadcrumb -->
        <?php if ( !is_home()) : ?>
        <?php get_template_part('template-parts/breadcrumb'); ?>
        <?php endif; ?>

        <!-- cta -->
        <?php if ( !is_page('contact') && !is_page('privacy') ) : ?>
        <?php get_template_part('template-parts/cta'); ?>
        <?php endif; ?>

        <!-- footer -->
        <footer class="footer">
            <div class="l-container">
                <div class="footer-inner">
                    <div class="footer-site-info">
                        <div class="footer-logo">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                <img src="<?php echo esc_url( get_template_directory_uri() . '/img/logo.png' ); ?>"
                                    width="640" height="84" alt="武者への道 Presented by 模写修行" />
                            </a>
                        </div>

                        <p class="footer-site-description"><span>武者への道は駆け出しデザイナー・エンジニアを</span><span>応援するメディアです</span>
                        </p>

                        <div class="footer-sns">
                            <div class="c-sns">
                                <a href="https://www.google.com/" class="c-sns-icon" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-twitter.svg' ); ?>"
                                        width="400" height="400" alt="twitter" />
                                </a>

                                <a href="https://www.google.com/" class="c-sns-icon" target="_blank"
                                    rel="noopener noreferrer">
                                    <img src="<?php echo esc_url( get_template_directory_uri() . '/img/icon-sns-facebook.svg' ); ?>"
                                        width="1024" height="1024" alt="facebook" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <nav class="footer-nav">
                        <ul class="footer-nav-list">
                            <li class="footer-nav-item">
                                <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">武者への道とは</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="<?php echo esc_url( home_url( '/company/' ) ); ?>">会社概要</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="<?php echo esc_url( home_url( '/privacy/' ) ); ?>">プライバシーポリシー</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">お問い合わせ</a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <p class="footer-disclaimer">※このWebサイトは、Hello Mentorの課題として制作した架空のメディアサイトです。</p>
                <small class="footer-copyright">&copy; 2024 Road to MUSHA, inc.</small>
            </div>
        </footer>
        <!-- end footer -->
        <?php wp_footer(); ?>
        </body>

        </html>