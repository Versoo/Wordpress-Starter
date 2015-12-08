<?php
/**
 * Created by PhpStorm.
 * User: Versoo
 * Date: 09.11.15
 * Time: 22:19
 */
add_action('wp_head', 'add_my_script');
function add_my_script() { ?>
    <script type="text/javascript">
        var themeOptions = {
            ajaxurl: '<?php echo get_home_url(null,'/wp-admin/admin-ajax.php'); ?>',
            posts_per_page: '<?php echo get_option('posts_per_page'); ?>',
        }
    </script>
<?php }



add_action('wp_enqueue_scripts', 'register_scripts');
function register_scripts() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    // Deregister WordPress jQuery
    if(!is_admin()) {
        // Deregister WP default jQuery
        wp_deregister_script('jquery');
        wp_deregister_script('emoji');
        // Vendor.js - All Vendors
        wp_register_script('vendor', ASSETS_URI . '/js/vendor.js', null, null, TRUE);
        wp_enqueue_script('vendor');
        // App.js - All Page Scripts
        wp_register_script('app', ASSETS_URI . '/js/app.js', null, null, TRUE);
        wp_enqueue_script('app');
    }
}

add_filter( 'clean_url', 'clean_scripts_url' , 11, 1 );

function clean_scripts_url( $url )
{
    if(!is_admin()) {
        if (FALSE === strpos($url, '.js')) { // not our file
            return $url;
        }
        // Must be a ', not "!
        return "$url' defer='defer";
    }
    return $url;
}