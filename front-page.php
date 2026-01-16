<?php
/**
 * Template Name: Front Page
 * The main homepage template for Novel Homes
 * 
 * @package Novel_Homes
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section - Split Screen -->
<section class="hero">
    <div class="container hero-container">
        <div class="hero-text">
            <h1 class="hero-headline">
                <?php echo esc_html(get_theme_mod('hero_headline', 'Efficiency is Beautiful.')); ?>
            </h1>
            <p class="hero-subhead">
                <?php echo esc_html(get_theme_mod('hero_subhead', 'Smart appliances engineered for the Nigerian home.')); ?>
            </p>
            <a href="<?php echo esc_url(get_theme_mod('hero_button_link', '#products')); ?>" class="btn-ghost">
                <?php echo esc_html(get_theme_mod('hero_button_text', 'Explore Collection')); ?>
            </a>
        </div>

        <div class="hero-image">
            <?php
            $hero_image = get_theme_mod('hero_image', get_template_directory_uri() . '/assets/images/hero-appliance.jpg');
            ?>
            <img src="<?php echo esc_url($hero_image); ?>" alt="<?php bloginfo('name'); ?> smart appliance">
        </div>
    </div>
</section>

<!-- Specs Grid - Product Showcase -->
<section class="specs-grid" id="products">
    <div class="container">
        <h2 class="section-title">
            <?php echo esc_html(get_theme_mod('products_section_title', 'Energy Rated Collection')); ?>
        </h2>

        <div class="product-grid">
            <?php
            // Check if WooCommerce is active and display products
            if (class_exists('WooCommerce')) {
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 4,
                    'orderby' => 'menu_order',
                    'order' => 'ASC',
                );

                $products = new WP_Query($args);

                if ($products->have_posts()):
                    while ($products->have_posts()):
                        $products->the_post();
                        global $product;
                        ?>
                        <article class="product-card">
                            <div class="product-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        the_post_thumbnail('medium');
                                    } else {
                                        echo '<img src="https://placehold.co/400x400/F7F9FA/1D1D1F?text=' . urlencode(get_the_title()) . '" alt="' . esc_attr(get_the_title()) . '">';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                                <span class="energy-badge">A++</span>
                                <p class="product-price">
                                    <?php echo $product->get_price_html(); ?>
                                </p>
                            </div>
                        </article>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    // Fallback static products if no WooCommerce products exist
                    novel_homes_display_static_products();
                endif;
            } else {
                // Display static products if WooCommerce is not active
                novel_homes_display_static_products();
            }
            ?>
        </div>
    </div>
</section>

<!-- Ecosystem - Solar Integration -->
<section class="ecosystem" id="solar">
    <div class="container ecosystem-container">
        <div class="ecosystem-image">
            <?php
            $ecosystem_image = get_theme_mod('ecosystem_image', get_template_directory_uri() . '/assets/images/solar-integration.jpg');
            ?>
            <img src="<?php echo esc_url($ecosystem_image); ?>"
                alt="<?php bloginfo('name'); ?> Solar Inverter System">
        </div>

        <div class="ecosystem-text">
            <h2 class="ecosystem-title">
                <?php echo esc_html(get_theme_mod('ecosystem_title', 'Power Your Home Sustainably')); ?>
            </h2>
            <p class="ecosystem-description">
                <?php echo esc_html(get_theme_mod('ecosystem_description', 'Our Solar Inverter seamlessly integrates with every Novel Homes appliance, delivering clean, reliable energy that reduces your carbon footprint and electricity costs by up to 60%.')); ?>
            </p>
            <ul class="ecosystem-features">
                <li>
                    <strong>
                        <?php _e('5kW Hybrid Inverter', 'novel-homes'); ?>
                    </strong>
                    <span>
                        <?php _e('Automatic grid and solar switching', 'novel-homes'); ?>
                    </span>
                </li>
                <li>
                    <strong>
                        <?php _e('24/7 Monitoring', 'novel-homes'); ?>
                    </strong>
                    <span>
                        <?php _e('Track energy savings via mobile app', 'novel-homes'); ?>
                    </span>
                </li>
                <li>
                    <strong>
                        <?php _e('10-Year Warranty', 'novel-homes'); ?>
                    </strong>
                    <span>
                        <?php _e('Certified by Nigerian Energy Commission', 'novel-homes'); ?>
                    </span>
                </li>
            </ul>
            <a href="<?php echo esc_url(get_theme_mod('ecosystem_button_link', '#solar')); ?>" class="btn-ghost">
                <?php echo esc_html(get_theme_mod('ecosystem_button_text', 'Learn More About Solar')); ?>
            </a>
        </div>
    </div>
</section>

<?php
get_footer();

/**
 * Display static product fallback
 */
function novel_homes_display_static_products()
{
    $static_products = array(
        array(
            'title' => 'Smart Refrigerator',
            'price' => '₦285,000',
            'image' => 'Refrigerator',
        ),
        array(
            'title' => 'Inverter Air Conditioner',
            'price' => '₦195,000',
            'image' => 'Air+Conditioner',
        ),
        array(
            'title' => 'Eco Washing Machine',
            'price' => '₦175,000',
            'image' => 'Washing+Machine',
        ),
        array(
            'title' => 'Smart Microwave',
            'price' => '₦68,000',
            'image' => 'Microwave',
        ),
    );

    foreach ($static_products as $product):
        ?>
        <article class="product-card">
            <div class="product-image">
                <img src="https://placehold.co/400x400/F7F9FA/1D1D1F?text=<?php echo esc_attr($product['image']); ?>"
                    alt="<?php echo esc_attr($product['title']); ?>">
            </div>
            <div class="product-info">
                <h3 class="product-title">
                    <?php echo esc_html($product['title']); ?>
                </h3>
                <span class="energy-badge">A++</span>
                <p class="product-price">
                    <?php echo esc_html($product['price']); ?>
                </p>
            </div>
        </article>
        <?php
    endforeach;
}
