<footer class="site-footer container">
    <div class="footer-grid">
        <div class="footer-section">
                <h4 id="footer-contact-title">Contact Us</h4>
                <navbar class="footer-menu">
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
                </navbar>
            </div>
            <div class="footer-section">
                <h4>Resources</h4>
                <navbar class="footer-menu">
                    <ul class="footer-resources">
                        <li class="footer-item"><a href="#" >BBSB Podcast</a></li>
                        <li class="footer-item"><a href="#" >Articles</a></li>
                        <li class="footer-item"><a href="#" >LinkedIn</a></li>
                        <li class="footer-item"><a href="#" >Other Links</a></li>
                    </ul>
                </navbar>
            </div>
                <div class="footer-section">
                <h4>Legal</h4>
                <navbar class="footer-menu">
                    <ul class="footer-resources">
                        <li class="footer-item"><a href="#" >FAQs</a></li>
                        <li class="footer-item"><a href="#" >Terms of Use</a></li>
                        <li class="footer-item"><a href="<?php echo site_url('/privacy-policy'); ?>" >Privacy Notice</a></li>
                    </ul>
                </navbar>
            </div>
    </div>
    
    <div class="copyright">
        <p>Copyright © 2025 VersaTel Solutions | Website designed by Nebal Maysaud</p>
    </div>
    <!-- Load scripts -->
    <?php wp_footer(); ?>
</footer>
</html>