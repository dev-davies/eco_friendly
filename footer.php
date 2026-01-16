<!-- Trust Footer -->
<footer class="footer" id="warranty">
    <div class="container">
        <div class="footer-grid">
            <!-- Column 1 - About -->
            <div class="footer-column">
                <h4 class="footer-title">
                    <?php _e('About Novel Homes', 'novel-homes'); ?>
                </h4>
                <p class="footer-text">
                    <?php
                    $footer_about = get_theme_mod('footer_about_text', 'Premium energy-efficient appliances designed for modern Nigerian living. Combining Scandinavian minimalism with tropical engineering.');
                    echo esc_html($footer_about);
                    ?>
                </p>
            </div>

            <!-- Column 2 - Support -->
            <div class="footer-column">
                <h4 class="footer-title">
                    <?php _e('Customer Support', 'novel-homes'); ?>
                </h4>
                <?php
                if (has_nav_menu('footer-support')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-support',
                        'container' => false,
                        'menu_class' => 'footer-links',
                    ));
                } else {
                    ?>
                    <ul class="footer-links">
                        <li><a href="#warranty">
                                <?php _e('Warranty Registration', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#repairs">
                                <?php _e('Repairs & Service', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#faq">
                                <?php _e('FAQs', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#contact">
                                <?php _e('Contact Engineers', 'novel-homes'); ?>
                            </a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Column 3 - Quick Links -->
            <div class="footer-column">
                <h4 class="footer-title">
                    <?php _e('Quick Links', 'novel-homes'); ?>
                </h4>
                <?php
                if (has_nav_menu('footer-quick')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer-quick',
                        'container' => false,
                        'menu_class' => 'footer-links',
                    ));
                } else {
                    ?>
                    <ul class="footer-links">
                        <li><a href="#products">
                                <?php _e('All Products', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#financing">
                                <?php _e('Financing Options', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#installers">
                                <?php _e('Find an Installer', 'novel-homes'); ?>
                            </a></li>
                        <li><a href="#blog">
                                <?php _e('Energy Guides', 'novel-homes'); ?>
                            </a></li>
                    </ul>
                    <?php
                }
                ?>
            </div>

            <!-- Column 4 - Contact -->
            <div class="footer-column">
                <h4 class="footer-title">
                    <?php _e('Get in Touch', 'novel-homes'); ?>
                </h4>
                <address class="footer-text">
                    <?php
                    $footer_contact = get_theme_mod('footer_contact_text', 'Lagos Showroom:<br>23 Admiralty Way, Lekki Phase 1<br><br>Email: hello@novelhomes.ng<br>Phone: +234 (0) 800 NOVEL HOMES');
                    echo wp_kses_post($footer_contact);
                    ?>
                </address>
            </div>
        </div>

        <!-- Warranty Seals Row -->
        <div class="warranty-seals">
            <div class="seal-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 2L2 7v10c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V7l-10-5z"></path>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
                <span>
                    <?php _e('5-Year Warranty', 'novel-homes'); ?>
                </span>
            </div>

            <div class="seal-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9 12l2 2 4-4"></path>
                </svg>
                <span>
                    <?php _e('SON Certified', 'novel-homes'); ?>
                </span>
            </div>

            <div class="seal-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M20 7h-9M14 17H5M17 21v-6M7 3v6"></path>
                </svg>
                <span>
                    <?php _e('Certified Engineers', 'novel-homes'); ?>
                </span>
            </div>

            <div class="seal-item">
                <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M12 6v6l4 2"></path>
                </svg>
                <span>
                    <?php _e('24/7 Support', 'novel-homes'); ?>
                </span>
            </div>
        </div>

        <!-- Copyright -->
        <div class="footer-bottom">
            <p>&copy;
                <?php echo date('Y'); ?>
                <?php bloginfo('name'); ?>.
                <?php _e('All rights reserved.', 'novel-homes'); ?>
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>