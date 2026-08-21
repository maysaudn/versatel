<footer class="site-footer container">
    <div class="footer-grid">
        <div class="footer-section">
                <h4 id="footer-contact-title">Contact Us</h4>
                <nav class="footer-menu" aria-labelledby="footer-contact-title">
                    <ul class="footer-contact">
                        <!-- Site Settings -->
                        <?php 
                        foreach (nmca_get_theme_settings() as $key => $setting) :
                        if (empty($setting['footer'])) { continue; }
                        if (!nmca_setting($key)) { continue; } ?>

                        <li class="footer-item">
                            <?php nmca_render_setting($key, $setting); ?>
                        </li>

                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <div class="footer-section">
                <h4 id="footer-resources-title">Resources</h4>
                <nav class="footer-menu" aria-labelledby="footer-resources-title">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_resources',
                            'container'      => false,
                            'menu_class'     => 'footer-resources',
                            'menu_id'        => 'footer-resources-menu',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>
            </div>
                <div class="footer-section">
                <h4 id="footer-legal-title">Legal</h4>
                <nav class="footer-menu" aria-labelledby="footer-legal-title">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer_legal',
                            'container'      => false,
                            'menu_class'     => 'footer-resources',
                            'menu_id'        => 'footer-legal-menu',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        )
                    );
                    ?>
                </nav>
            </div>
    </div>
    
    <div class="copyright">
        <p>Copyright © 2025 VersaTel Solutions | Website designed by Nebal Maysaud</p>
    </div>
    <!-- Load scripts -->
    <?php wp_footer(); ?>
</footer>
</html>
