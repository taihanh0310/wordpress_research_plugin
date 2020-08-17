<?php
/**
 * Plugin Name: hanh plugin demo v01
 * Plugin URI: http://hocwp.net // Địa chỉ trang chủ của plugin
 * Description: Đây là plugin đầu tiên mà tôi viết dành riêng cho WordPress, chỉ để học tập mà thôi.
 * Version: 0.1 
 * Author: Hanh Nguyen
 * Author URI: https://github.com/taihanh0310/wordpress_research_plugin
 * License: GPLv2
 */
?>
<?php
if (!class_exists('HanhPluginDemoV01')) {

    class HanhPluginDemoV01 {
        
        public function __construct() {
            if (!function_exists('add_shortcode')) {
                return;
            }

            add_shortcode('hello', array(&$this, 'hello_func'));
            add_shortcode('hanh_sc_batdau', array(&$this, 'demoShortCode_func'));
        }

        function hello_func($attrs = array(), $content = null) {
            extract(shortcode_atts(array('name' => 'World'), $attrs));
            return '<div><p> Hello ' . $name . ' !!!</p></div>';
        }

        function demoShortCode_func() {
            global $wp_query;
            $posts = "";
//            if($wp_query->have_posts()){
//                while( $wp_query->have_posts() ) { // Nếu have_posts() == TRUE thì nó mới lặp, không thì ngừng
//                    $wp_query->the_post(); // Thiết lập số thứ tự bài viết trong chỉ mục của query
//
//                    /*
//                     * Nội dung hiển thị bài viết
//                     */
//                    $posts .=  $post->post_title . '<br>';
//
//                }
//            }
            return '<div><p> Hello shortcode ne!!!</p> <br> '.$posts.'</div>';
        }

        // create setting page cho plugin

        /**
         * 
         */
    }

}

function mfpd_load() {
    global $mfpd;
    $mfpd = new HanhPluginDemoV01();
}

function register_mysettings() {
    register_setting('mfpd-setting-group', 'mfpd_option_name');
}

function mfpd_create_menu() {
    add_menu_page('Hanh Plugin Demo V01', 'Hanh Plugin Setting', 'administrator', __FILE__, 'mfpd_settings_page',plugins_url('/images/icon.png', __FILE__), 1);
    add_action("admin_init", "register_mysettings");
}

function mfpd_settings_page() {
    ?>
    <div class="wrap">
        <h2>Tạo trang cài đặt cho plugin</h2>
        <?php if (isset($_GET['settings-updated'])) { ?>
            <div id="message" class="updated">
                <p><strong><?php _e('Settings saved.') ?></strong></p>
            </div>
        <?php } ?>
        <form method="post" action="options.php">
            <?php settings_fields('mfpd-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Tùy chọn cài đặt</th>
                    <td><input type="text" name="mfpd_option_name" value="<?php echo get_option('mfpd_option_name'); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
<?php } ?>

<?php
// add action

add_action('plugin_loaded', 'mfpd_load');
add_action('admin_menu', 'mfpd_create_menu');
?>