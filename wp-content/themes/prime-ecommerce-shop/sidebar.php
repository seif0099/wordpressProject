<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package prime_ecommerce_shop
 */

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'right-sidebar' ); ?>
</aside>

<?php if ( ! is_active_sidebar( 'right-sidebar' ) ) { ?>

	<aside id="secondary" class="widget-area" role="complementary">
		<!-- Search -->
		<aside id="search" class="widget widget_search" aria-label="<?php esc_attr_e( 'firstsidebar', 'prime-ecommerce-shop' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Search', 'prime-ecommerce-shop'); ?></h2>
		    <form  method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
		        <label>
		            <span class="screen-reader-text"><?php esc_html_e('Search for:', 'prime-ecommerce-shop'); ?></span>
		            <input type="search" class="search-field" placeholder="<?php esc_attr_e('Search...', 'prime-ecommerce-shop'); ?>" value="<?php echo get_search_query(); ?>" name="s">
		        </label>
		        <button type="submit" class="search-submit"></button>
		    </form>
		</aside>
		<!-- Archive -->
		<aside id="archive" class="widget widget_archive" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'prime-ecommerce-shop' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Archive List', 'prime-ecommerce-shop'); ?></h2>
		    <ul>
		        <?php wp_get_archives('type=monthly'); ?>
		    </ul>
		</aside>
		<!-- Recent Posts -->
		<aside id="recent-posts" class="widget widget_recent_posts" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'prime-ecommerce-shop' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Recent Posts', 'prime-ecommerce-shop'); ?></h2>
	        <ul>
		        <?php
		        $args = array(
		            'post_type'      => 'post',
		            'posts_per_page' => 5,
		        );
		        $prime_ecommerce_shop_recent_posts = new WP_Query($args);

		        while ($prime_ecommerce_shop_recent_posts->have_posts()) : $prime_ecommerce_shop_recent_posts->the_post();
		        ?>
		            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		        <?php endwhile; ?>
		        <?php wp_reset_postdata(); ?>
		    </ul>
		</aside>
		<!-- Categories -->
		<aside id="categories" class="widget widget_categories" role="complementary" aria-label="<?php esc_attr_e( 'fourthsidebar', 'prime-ecommerce-shop' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'prime-ecommerce-shop'); ?></h2>
		    <ul>
		        <?php
		        $args = array(
		            'title_li' => '',
		        );
		        wp_list_categories($args);
		        ?>
		    </ul>
		</aside>
	</aside>

<?php } ?>